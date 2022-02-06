<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cita;
use App\Models\ExpedienteDoctor;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Persona;
use App\Models\Diente;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CitaController
 * @package App\Http\Controllers
 */
class CitaController extends Controller
{

    const urlRedirect = [
        'cita.create',
        'citasdg.index'
    ];
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
            switch($rol){
                case 2:
                    $citas = Cita::select('*')
                        ->where('persona_id', 2)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                case 3:
                    $citas = Cita::select('*')
                        ->where('persona_id', 3)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                default:
                    $citas = Cita::paginate();
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
                    $citas = Cita::select('*')
                        ->where('persona_id', 2)
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                case 3:
                    $citas = Cita::select('*')
                        ->where('persona_id', 3)
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
                default:
                    $citas = Cita::select('*')
                        ->whereIn('paciente_id', $pacientes)
                        ->orderByDesc('fecha')
                        ->paginate(10);
                    break;
            }
        }

        return view('cita.index', compact('citas'))
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*

    */
    /**
      * $bandera
        0 == index,
        0 != otro
      */
    public function create(Request $request)
    {
        $estadocita = EstadoCita::pluck('nombre','id');
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        $cita = new Cita();
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        $pacientes = Paciente::all();
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('cita.create', compact('cita', 'pacientes', 'personas', 'urlView','estadocita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $urlView)
    {
        if(Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            request()->validate(Cita::$rulesWithoutPersona);
        }
        else{
            request()->validate(Cita::$rules);
        }
        request()->request->remove('paciente_id_hid');
        $cita = Cita::create($request->all());
        //Busco al doctor o doctora que fue asignada a la cita y obtengo el objeto
        $persona = Persona::find($request->persona_id);
        //dd($persona);

        //Obtengo el tipo de doctor que es la persona
        //Es un if para conocer que de doctor se va abrir el expediente
        // 2-Doctor General
        // 3-Doctora Dental
        if($persona->rolpersona_id == 2){
            //Doctor General
            $expedientePaciente_Doctor = ExpedienteDoctor::where('paciente_id',$cita->paciente_id)->get();
            //dd($expedientePaciente_Doctor);

            if($expedientePaciente_Doctor->isEmpty()){
                //Crear expediente
                $crearExpedientePaciente_Doctor = ExpedienteDoctor::create([
                    'paciente_id' => $cita->paciente_id
                ]);
                $crearExpedientePaciente_Doctor->save();
                //dd($crearExpedientePaciente_Doctor);

            }else{
                //dd('La paciente ya existe'); //El expediente de ese paciente ya existe
            }


        }else{
            //Doctora Dental
            $expedientePaciente_DoctoraDental = ExpedienteDoctoraDental::where('paciente_id',$cita->paciente_id)->get();
            //dd($expedientePaciente_DoctoraDental);

            if($expedientePaciente_DoctoraDental->isEmpty()){
                //Crear expediente
                $crearExpedientePaciente_Doctor = ExpedienteDoctoraDental::create([
                    'paciente_id' => $cita->paciente_id
                ]);
                $crearExpedientePaciente_Doctor->save();
                //dd($crearExpedientePaciente_Doctor);
                //Creación de dientes
                /** Ya que se le van agregar los nombres, no se va a poder hacer por un for
                 * Hay que hacerlo uno por uno, cada diente
                 * va a variar el id y el nombre
                 * Una solución puede ser: hacer un array de los nombres de los dientes y su respectivo número
                 * y cuando sea igual, que se cree el diente
                 */

                //Hacer el listado de todos los dientes
                $infoDientes =array(
                    array("11","Incisivo central superior derecho permanente"),
                    array("12","Incisivo lateral superior derecho permanente"),
                    array("13","Canino superior derecho permanente"),
                    array("14","Primer premolar superior derecho permanente"),
                    array("15","Segundo premolar superior derecho permanente"),
                    array("16","Primer molar superior derecho permanente"),
                    array("17","Segundo molar superior derecho permanente"),
                    array("18","Tercer molar superior derecho permanente"),
                    array("21","Incisivo central superior izquierdo permanente"),
                    array("22","Incisivo lateral superior izquierdo permanente"),
                    array("23","Canino superior izquierdo permanente"),
                    array("24","Primer premolar superior izquierda permanente"),
                    array("25","Segundo premolar superior izquierdo permanente"),
                    array("26","Primer molar superior izquierda permanente"),
                    array("27","Segundo molar superior izquierda permanente"),
                    array("28","Tercer molar superior izquierdo permanente"),
                    array("31","Incisivo central inferior izquierdo permanente"),
                    array("32","Incisivo lateral inferior izquierdo permanente"),
                    array("33","Canino inferior izquierdo permanente"),
                    array("34","Primer premolar inferior izquierdo permanente"),
                    array("35","Segundo premolar inferior izquierdo permanente"),
                    array("36","Primer molar inferior izquierdo permanente"),
                    array("37","Segundo molar inferior izquierdo permanente"),
                    array("38","Tercer molar inferior izquierdo permanente"),
                    array("41","Incisivo central inferior derecho permanente"),
                    array("42","Incisivo lateral inferior derecho permanente"),
                    array("43","Canino inferior derecho permanente"),
                    array("44","Primer premolar inferior derecho permanente"),
                    array("45","Segundo premolar inferior derecho permanente"),
                    array("46","Primer molar inferior derecha permanente"),
                    array("47","Segunda molar inferior derecha permanente"),
                    array("48","Tercera molar inferior derecha permanente"),
                );

                for($i = 11; $i <= 48; $i++){
                    foreach ($infoDientes as $info){
                        if($i == $info[0]){
                            $diente = Diente::create([
                                'numeroDiente' =>$info[0],
                                'nombreDiente' => $info[1],
                                'expedienteDental_id' => $crearExpedientePaciente_Doctor->id
                            ]);
                            $diente->save();
                        }
                    }
                }
            }else{
                //dd('La paciente ya existe Doctora'); //El expediente de ese paciente ya existe
            }
        }
        return redirect()->route($urlView)
            ->with('success', 'Cita creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);
        return view('cita.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadocita = EstadoCita::pluck('nombre','id');
        $cita = Cita::find($id);
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('cita.edit', compact('cita','estadocita','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cita $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        if(Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            request()->validate(Cita::$rulesWithoutPersona);
        }
        else{
            request()->validate(Cita::$rules);
        }
        request()->request->remove('paciente_id_hid');
        $cita->update($request->all());
        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cita = Cita::find($id);
        return view('cita.destroy', compact('cita'));
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cita = Cita::find($id)->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada satisfactoriamente');
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

    public function finalizada($id)
    {
        $cita = Cita::find($id);
        return view('cita.finalizada', compact('cita'));
    }

    public function finished($id)
    {
        $cita = Cita::find($id);
        $cita->update(['estadoCita_id'=>1]);
        if(Auth::user()->rols_fk==1)
            return redirect()->route('dshAdministrador.index')->with('success', 'Estado de la cita cambia a finalizado satisfactoriamente');
        if(Auth::user()->rols_fk==2)
            return redirect()->route('dshDoctorGeneral.index')->with('success', 'Estado de la cita cambia a finalizado satisfactoriamente');
        if(Auth::user()->rols_fk==3)
            return redirect()->route('dshDoctorDental.index')->with('success', 'Estado de la cita cambia a finalizado satisfactoriamente');
        if(Auth::user()->rols_fk==4)
            return redirect()->route('dshSecretaria.index')->with('success', 'Estado de la cita cambia a finalizado satisfactoriamente');
    }

    public function cancelada($id)
    {
        $cita = Cita::find($id);
        return view('cita.cancelada', compact('cita'));
    }

    public function cancelled($id)
    {
        $cita = Cita::find($id);
        $cita->update(['estadoCita_id'=>2]);
        if(Auth::user()->rols_fk==1)
            return redirect()->route('dshAdministrador.index')->with('success', 'Estado de la cita cambia a cancelado satisfactoriamente');
        if(Auth::user()->rols_fk==2)
            return redirect()->route('dshDoctorGeneral.index')->with('success', 'Estado de la cita cambia a cancelado satisfactoriamente');
        if(Auth::user()->rols_fk==3)
            return redirect()->route('dshDoctorDental.index')->with('success', 'Estado de la cita cambia a cancelado satisfactoriamente');
        if(Auth::user()->rols_fk==4)
            return redirect()->route('dshSecretaria.index')->with('success', 'Estado de la cita cambia a cancelado satisfactoriamente');
    }

    public function programada($id)
    {
        $cita = Cita::find($id);
        return view('cita.programada', compact('cita'));
    }

    public function programated(Request $request, Cita $cita)
    {
        $request->request->add(['estadoCita_id'=>3]);
        $request->validate([
            'fecha' => 'required',
		    'hora' => 'required',
        ]);
        $cita->update($request->all());
        if(Auth::user()->rols_fk==1)
            return redirect()->route('dshAdministrador.index')->with('success', 'Estado de la cita cambia a programado satisfactoriamente');
        if(Auth::user()->rols_fk==2)
            return redirect()->route('dshDoctorGeneral.index')->with('success', 'Estado de la cita cambia a programado satisfactoriamente');
        if(Auth::user()->rols_fk==3)
            return redirect()->route('dshDoctorDental.index')->with('success', 'Estado de la cita cambia a programado satisfactoriamente');
        if(Auth::user()->rols_fk==4)
            return redirect()->route('dshSecretaria.index')->with('success', 'Estado de la cita cambia a programado satisfactoriamente');
    }

}
