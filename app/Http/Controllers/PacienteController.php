<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Diente;
use Illuminate\Http\Request;
use Auth;

/**
 * Class PacienteController
 * @package App\Http\Controllers
 */
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$id = Auth::user()->rols_fk;
        //dd($id); 
        $texto =trim($request->get('texto'));
        
        $pacientes = Paciente::select('*')->where('nombres','LIKE',$texto.'%')
                            ->orWhere('apellidos','LIKE',$texto.'%')
                            ->orWhere('id','LIKE',$texto.'%')
                            ->orderBy('apellidos')
                            ->paginate(10);              
        //$pacientes = Paciente::paginate();

        return view('paciente.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente = new Paciente();
        return view('paciente.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Paciente::create($request->validate());// valida con las reglas establecidas en app/Http/Request/ValidatePacienteFormRequest
        /*return redirect()->route('pacientes.index');*/
        request()->validate(Paciente::$rules);

        $paciente = Paciente::create($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);

        return view('paciente.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);

        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        request()->validate(Paciente::$rules);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $paciente = Paciente::find($id);
        return view('paciente.destroy', compact('paciente'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $citas = Cita::where('paciente_id',$id)->get();
        foreach ($citas as $cita){
            $cita->delete();
        }
        $dientes = Diente::where('expedienteDental_id',$id)->get();
        foreach ($dientes as $diente){
            $diente->delete();
        }
        $paciente = Paciente::find($id)->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado satisfactoriamente');
    }
}
