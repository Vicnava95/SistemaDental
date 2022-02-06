<?php

namespace App\Http\Controllers;

use App\Models\RecetasDentale;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Http\Request;

/**
 * Class RecetasDentaleController
 * @package App\Http\Controllers
 */
class RecetasDentaleController extends Controller
{

    public function index()
    {
        $recetasDentales = RecetasDentale::where('estadoReceta_id',1)
                            ->paginate();
        $expedientes = ExpedienteDoctoraDental::all();
        $pacientes = Paciente::all();

        return view('recetas-dentale.index', compact('recetasDentales','expedientes','pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $recetasDentales->perPage());
    }

    public function create()
    {
        $recetasDentale = new RecetasDentale();
        return view('recetas-dentale.create', compact('recetasDentale'));
    }

    public function createReceta($idCita){
        $cita = Cita::find($idCita);
        $expediente = ExpedienteDoctoraDental::where('paciente_id',$cita->paciente_id)->first();
        $expedienteId = $expediente->paciente_id;
        $recetasDentale = new RecetasDentale();
        return view('DoctoraDental/createRecetaDental',compact('recetasDentale','cita','expedienteId'));
    }

    public function store(Request $request)
    {
        //dd($request); 
        $recetasDentale = RecetasDentale::create($request->all());
        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale created successfully.');
    }

    public function storeExpediente(Request $request)
    {
        $recetasDentale = RecetasDentale::create($request->all());
        return redirect()->route('ExpedientePacienteDoctoraDental',$request->idCita)
            ->with('success', 'RecetasDentale created successfully.');
    }

    public function show($id)
    {
        $recetasDentale = RecetasDentale::find($id);
        $expediente = ExpedienteDoctoraDental::find($recetasDentale->expedienteDental_id);
        $paciente = Paciente::find($expediente->paciente_id);
        return view('recetas-dentale.show', compact('recetasDentale','paciente'));
    }

    public function edit($id)
    {
        $recetasDentale = RecetasDentale::find($id);

        return view('recetas-dentale.edit', compact('recetasDentale'));
    }

    public function update(Request $request, RecetasDentale $recetasDentale)
    {
        /*$recetasDentale->update([
            'fecha' => request('fecha'),
            'descripcion' => request('descripcion'),
            'proximaCita' => request('proximaCita'),
            'expedienteDental_id' => request('expedienteDental_id'),
            'estadoReceta_id' => request('estadoReceta_id'),
        ]);
        $recetasDentale->save();*/

        $request->request->add(['estadoReceta_id'=> strval(1)]);
        request()->validate(RecetasDentale::$rules); 
        $request->recetasDentale->update(['estadoReceta_id'=> strval(2)]);
        $recetasDentale = RecetasDentale::create($request->all());

        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale updated successfully');
    }

    public function delete($receta){
        $rDentale = RecetasDentale::find($receta);
        return view('recetas-dentale.destroy',compact('rDentale'));
    }

    public function destroy($id)
    {
        //Cambiar el estado de la receta
        $recetasDentale = RecetasDentale::find($id)->update(['estadoReceta_id'=> strval(2)]);
        //$recetasDentale->update(['estadoReceta_id'=> strval(2)]);

        return redirect()->route('rDentales.index')
            ->with('success', 'RecetasDentale deleted successfully');
    }

    public function showRecetas($idCita){
        $i = 0;
        $cita = Cita::find($idCita); 
        $expediente = ExpedienteDoctoraDental::where('paciente_id',$cita->paciente_id)->first();
        $paciente = Paciente::find($expediente->paciente_id);
        $recetas = RecetasDentale::where('expedienteDental_id',$expediente->id)
                                    ->where('estadoReceta_id',1)
                                    ->orderBy('created_at','desc')
                                    ->get();
        //Falta mostrar el nombre del paciente
        return view('DoctoraDental.showRecetas',compact('idCita','recetas','i','paciente'));
    }
}
