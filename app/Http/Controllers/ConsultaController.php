<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rol = Auth::user()->rols_fk;
        $texto =trim($request->get('texto'));
        if($texto==''){
            switch ($rol) {
                case 2:
                    $consultas = Consulta::select('*')
                        ->where('persona_id', 2)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                case 3:
                    $consultas = Consulta::select('*')
                        ->where('persona_id', 3)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                default:
                    $consultas = Consulta::paginate();
            }
        }
        else{
            $pacientes = Paciente::select('*')
                ->where('nombres','LIKE',$texto.'%')
                ->orWhere('apellidos','LIKE',$texto.'%')
                ->pluck('id')
                ->all();

            switch($rol){
                case 2:
                    $consultas = Consulta::select('*')
                        ->where('persona_id', 2)
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                case 3:
                    $consultas = Consulta::select('*')
                        ->where('persona_id', 3)
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                default:
                    $consultas = Consulta::select('*')
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
            }
        }


        return view('consulta.index', compact('consultas'))
            ->with('i', (request()->input('page', 1) - 1) * $consultas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $consulta = new Consulta();
        $pacientes = Paciente::all();
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('consulta.create', compact('consulta','pacientes', 'personas'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            request()->validate(Consulta::$rulesWithoutPersona);
        }
        else {
            request()->validate(Consulta::$rules);
        }

        //Calculo de IMC antes de guardar

        if($request->input('estatura') > 0){
            $peso = $request->input('peso');
            $estatura = $request->input('estatura');
            $imc = round($peso / ($estatura * $estatura), 2, PHP_ROUND_HALF_EVEN);
        }else{
            $imc = 0;
        }

        $request->request->add(['imc'=>$imc]);
        // Fin del calculo

        request()->request->remove('paciente_id_hid');
        $consulta = Consulta::create($request->all());
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);

        return view('consulta.show', compact('consulta'));
    }

    public function imprimir($id)
    {
        $consulta = Consulta::find($id);
        $fecha = Carbon::now()->format('Y-m-d');
        $pdf = PDF::loadView('pdf.consulta', compact('consulta', 'fecha'));
        return $pdf->stream();
    }

    public function descargar($id)
    {
        $consulta = Consulta::find($id);
        $fecha = Carbon::now()->format('Y-m-d');
        $pdf = PDF::loadView('pdf.consulta', compact('consulta', 'fecha'));
        return $pdf->download('consulta.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('consulta.edit', compact('consulta','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        if (Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            request()->validate(Consulta::$rulesWithoutPersona);
        }
        else {
            request()->validate(Consulta::$rules);
        }

        //Calculo de IMC antes de guardar

        if ($request->input('estatura') > 0) {
            $peso = $request->input('peso');
            $estatura = $request->input('estatura');
            $imc = round($peso / ($estatura * $estatura), 2, PHP_ROUND_HALF_EVEN);
        } else {
            $imc = 0;
        }

        $request->request->add(['imc' => $imc]);
        // Fin del calculo

        request()->request->remove('paciente_id_hid');
        $consulta->update($request->all());

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta actualizada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $consulta = Consulta::find($id);
        $paciente = Paciente::find($consulta->paciente_id);
        return view('consulta.destroy', compact('consulta', 'paciente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta eliminada exitosamente');
    }

    public function searchPaciente($name){
        if($name != '' || $name != ' '){
            $data = DB::table('pacientes')
                ->where('nombres','LIKE',"%{$name}%")
                ->get();//obtenemos el data si cumple la restricción

                $output = '<ul id="listP" class="dropdown-menu modal-body bg-dark text-white" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .=
                '<li id="cadena" class="modal-body bg-dark text-white" value="'.$row->id.' "onclick="searchPhase('.$row->id.')">'.$row->nombres.' '.$row->apellidos.'</li>';
            }
            $output .= '</ul><br>';
            echo $output;
        }

    }

}
