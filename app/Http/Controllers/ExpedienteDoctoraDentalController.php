<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Pago;
use App\Models\Abono;
use App\Models\Diente;
use App\Models\Receta;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use App\Models\RecetasDentale;
use App\Models\EstadoPago;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamenesDoctoraDental;
use App\Models\ExpedienteDoctoraDental;

class ExpedienteDoctoraDentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cita)
    {
        $i = 0;
        $citaPaciente = Cita::find($cita);
        $paciente = Paciente::find($citaPaciente->paciente_id);
        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedienteDoctora')
                    ->where('expedienteDoctora_id', $expedientePaciente->id)
                    ->get();
        $cantidadConsultas = count($consultasExpediente);
        //dd($consultasExpediente);
        if($cantidadConsultas != 0){
            foreach ($consultasExpediente as $consulta){
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas [] = ['fecha' => $consultas[0]->fecha , 'descripcion' => $consultas[0]->descripcion, 'id' =>$consultas[0]->id];
            }
        }else{
            $collecionConsultas [] = ['fecha' => 0 , 'descripcion' => 0, 'id' => 0];
        }
        //dd($collecionConsultas);

        $pagos = Pago::where('expediente_doctora_dental_id', $expedientePaciente->id)->get();
        foreach ($pagos as $pago) {
            $pago['abono'] = Abono::select('*')->where('pago_id',$pago->id)->get()->sum('monto');
        }

        $dientes = Diente::where('expedienteDental_id',$expedientePaciente->id)->get();
        //dd($dientes);
        return view('DoctoraDental.ExpedientePacienteDoctoraDental',compact('i','paciente','citaPaciente','collecionConsultas','cantidadConsultas','pagos','dientes','expedientePaciente'));
    }

    public function showExpediente($id){
        $i = 1;
        $paciente = Paciente::find($id);
        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$paciente->id)->first();
        $dientes = Diente::where('expedienteDental_id',$expedientePaciente->id)->get();
        $pagos = Pago::where('expediente_doctora_dental_id', $expedientePaciente->id)->get();
        foreach ($pagos as $pago) {
            $pago['abono'] = Abono::select('*')->where('pago_id',$pago->id)->get()->sum('monto');
        }
        return view('DoctoraDental.ExpedienteShow',compact('i','paciente','dientes','pagos', 'expedientePaciente'));
    }

    public function crearConsulta(Request $request){
        //dd(request('descripcionConsulta'));
        $idPaciente = request('idPaciente');

        $consulta = Consulta::create([
            'paciente_id' => request('idPaciente'),
            'persona_id'=> request('idPersona'),
            'descripcion'=> request('descripcionConsulta'),
            'fecha'=> request('fechaConsulta')
        ]);
        $consulta->save();

        $idCita = request('idCita');
        $cita = Cita::find($idCita);

        $cita->update([
            'estadoCita_id' => 1
        ]);

        $expedientePaciente = ExpedienteDoctoraDental::where('paciente_id',$idPaciente)->first();
        //dd($expedientePaciente);
        $pivotTable = DB::table('consulta_expedienteDoctora')->insert([
            'consulta_id' => $consulta->id,
            'expedienteDoctora_id' => $expedientePaciente->id,
        ]);

        return redirect()->back();
    }

    public function expedientes(){
        $i = 1;
        $expedientes = ExpedienteDoctoraDental::all();
        $pacientes = Paciente::all();
        return view('DoctoraDental.expedientesDentales',compact('i','expedientes','pacientes'));
    }

    public function crearCitaDoctora($idPaciente){
        $estadocita = EstadoCita::pluck('nombre','id');
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        $cita = new Cita();
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        //dd($urlView);
        $pacientes = Paciente::all();
        $paciente = Paciente::find($idPaciente);
        //dd($paciente->id);
        $personas = Persona::select('*')
                ->where('rolpersona_id',2)
                ->orWhere('rolpersona_id',3)
                ->get();
        return view('DoctoraDental.create',compact('cita', 'pacientes','paciente','personas', 'urlView','estadocita'));
    }

    public function storeCita(Request $request, $urlView)
    {
        //dd($request);
        if(Auth::user()->rols_fk==3 || Auth::user()->rols_fk==2){
            $request->request->add(['persona_id'=> strval(Auth::user()->rols_fk)]);
            //request()->validate(Cita::$rulesWithoutPersona);
        }
        else{
            //request()->validate(Cita::$rules);
        }
        $cita = DB::table('citas')->insert([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'paciente_id' => $request->paciente_id_hid,
            'persona_id'=> 3,
            'estadoCita_id' => $request->estadoCita_id
        ]);
        return redirect()->route('dshDoctorDental.index')
            ->with('success', 'Cita creada satisfactoriamente.');
    }

    public function deleteExpediente($id){
        $expedientePaciente = ExpedienteDoctoraDental::find($id);
        $paciente = Paciente::find($expedientePaciente->paciente_id);
        return view('DoctoraDental.destroy',compact('expedientePaciente','paciente'));
    }

    public function destroy($id)
    {
        $expedientePaciente = ExpedienteDoctoraDental::find($id);
        $dientes = Diente::where('expedienteDental_id',$expedientePaciente->id)->get();
        foreach ($dientes as $diente){
            $diente->delete();
        }
        $expedientePaciente->delete(); 
        return redirect()->route('expedientesDentales');
    }

    public function createPaciente()
    {
        $paciente = new Paciente();
        return view('DoctoraDental.pacienteCreate', compact('paciente'));
    }

    public function storePaciente(Request $request)
    {
        //Paciente::create($request->validate());// valida con las reglas establecidas en app/Http/Request/ValidatePacienteFormRequest
        /*return redirect()->route('pacientes.index');*/
        request()->validate(Paciente::$rules);

        $paciente = Paciente::create($request->all());
        $crearExpedientePaciente_Doctor = ExpedienteDoctoraDental::create([
            'paciente_id' => $paciente->id
        ]);
        $crearExpedientePaciente_Doctor->save();

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

        return redirect()->route('expedientesDentales')
            ->with('success', 'Expediente creado satisfactoriamente');
    }

    public function createReceta($idCita)
    {
        $receta = new Receta();
        return view('DoctoraDental.createReceta', compact('receta','idCita'));
    }

    public function storeReceta(Request $request)
    {
        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());
        return redirect()->back()
            ->with('success', 'Receta creada satisfactoriamente.');
    }

    //Pago

    public function createPago($idPaciente)
    {
        $pago = new Pago();
        return view('DoctoraDental.createPago', compact('pago','idPaciente'));
    }

    public function storePago(Request $request, $idPaciente)
    {
        request()->validate(Pago::$rulesWithoutExpedienteDoctoraDental);
        $request->request->add(['estado_pago_id'=> strval(2)]);

        $expedienteDental = ExpedienteDoctoraDental::select('*')->where('paciente_id', $idPaciente)->first();
        $request->request->add(['expediente_doctora_dental_id'=> $expedienteDental->id]);

        $pago = Pago::create($request->all());

        return redirect()->back()
            ->with('success', 'Pago creado satisfactoriamente.');
    }

    public function createAbono($idPaciente, $idPago)
    {
        $abono = new Abono();
        return view('DoctoraDental.createAbono', compact('abono', 'idPaciente', 'idPago'));
    }

    public function storeAbono(Request $request, $idPaciente, $idPago)
    {
        request()->validate(Abono::$rulesWithoutPago);
        $request->request->add(['pago_id'=> strval($idPago)]);
        $request->request->add(['fecha'=> Carbon::today('America/El_Salvador')->format('Y-m-d')]);
        $abonos = Abono::select('*')->where('pago_id',$request->get('pago_id'))->get()->sum('monto');
        $totalAbonos = $abonos + $request->get('monto');
        $pago = Pago::where('id', $request->get('pago_id'))->first();
        $pagoTotal = $pago->costo;
        $faltante = $pagoTotal - $abonos;
        if($abonos==$pagoTotal) {
            return redirect()->back()
            ->with('error', 'El pago esta cancelado por completado');
        } elseif ($totalAbonos>$pagoTotal){
            return redirect()->back()
            ->with('error', 'El abono a agregar supera el pago total. Para completar el pago hace falta $'.$faltante);
        }
        else{
            $abono = Abono::create($request->all());
            if($pagoTotal==$totalAbonos) $pago->update(['estado_pago_id'=>'1']);
            else $pago->update(['estado_pago_id'=>'2']);
            return redirect()->back()
            ->with('success', 'Abono creado satisfactoriamente.');
        }
    }

    public function editAbono($id)
    {
        $abono = Abono::find($id);

        return view('DoctoraDental.editAbono', compact('abono'));
    }

    public function updateAbono(Request $request, Abono $abono)
    {
        request()->validate(Abono::$rulesWithoutPago);
        $request->request->add(['fecha'=> Carbon::today('America/El_Salvador')->format('Y-m-d')]);
        $request->request->add(['pago_id'=> $abono->pago_id]);
        $abonos = Abono::select('*')->where('pago_id',$request->get('pago_id'))->where('id','!=',$abono->id)->get()->sum('monto');
        $totalAbonos = $abonos + $request->get('monto');
        $pago = Pago::where('id', $request->get('pago_id'))->first();
        $pagoTotal = $pago->costo;
        $faltante = $pagoTotal - $abonos;
        if ($totalAbonos>$pagoTotal) {
            return redirect()->back()
            ->with('error', 'El abono a actualizar supera el pago total. Para completar el pago hace falta $'.$faltante);
        }else{
            $abono->update($request->all());
            if($pagoTotal==$totalAbonos) $pago->update(['estado_pago_id'=>'1']);
            else $pago->update(['estado_pago_id'=>'2']);
            return redirect()->back()
            ->with('success', 'Abono actualizado satisfactoriamente');
        }
    }

    public function showAbonos(Request $request, $idPago)
    {
        $abonos = Abono::where('pago_id', $idPago)->get();
        return view('DoctoraDental.showAbonos', compact('abonos'));
    }


    /***************************** */
    //Examen
    public function createExamen($idExpediente)
    {
        $examenesDoctoraDental = new ExamenesDoctoraDental();
        return view('DoctoraDental.createExamen', compact('examenesDoctoraDental', 'idExpediente'));
    }

    public function storeExamen(Request $request, $idExpediente)
    {
        request()->validate(ExamenesDoctoraDental::$rulesWithoutExpediente);
        $request->request->add(['expediente_doctora_dental_id'=> $idExpediente]);
        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            $direccionDestino = 'examenesDentalesImagenes/';
            $imagenExamen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($direccionDestino, $imagenExamen);
            $input['imagen'] = "$imagenExamen";
        }

        $examenesDoctoraDental = ExamenesDoctoraDental::create($input);

        return redirect()->back()
            ->with('success', 'Examen creado satisfactoriamente.');
    }

    /**************************************************************** */
    //Diente - Tratamiento
    public function showDiente($idDiente , $fecha, $idPaciente){
        $n = 1;
        $diente = Diente::find($idDiente);
        $tratamientos = Tratamiento::where('diente_id',$diente->id)
                                    ->orderBy('created_at','desc')
                                    ->get();
        //dd($tratamientos);
        return view('DoctoraDental.modalDiente',compact('diente','tratamientos','fecha','n','idPaciente'));
    }

    public function showInfoDiente($idDiente, $idPaciente){
        $n = 1;
        $diente = Diente::find($idDiente);

        $tratamientos = Tratamiento::where('diente_id',$diente->id)
                                    ->orderBy('created_at','desc')
                                    ->get();

        return view('DoctoraDental.showDiente',compact('diente','tratamientos','n','idPaciente'));
    }
    public function storeTratamiento(Request $request, $idDiente, $fecha){
        $tratamiento = Tratamiento::create([
            'descripcion' => request('descripcion'),
            'diente_id' => $idDiente,
            'fecha' => $fecha
        ]);
        $tratamiento->save();
        return redirect()->back()
            ->with('success', 'Tratamiento creado satisfactoriamente.');
    }

    public function editTratamiento($idPaciente, Tratamiento $idTratamiento){
        $expedienteDental = ExpedienteDoctoraDental::where('paciente_id', $idPaciente)->get();
        $paciente = Paciente::find($idPaciente);
        //dd($idTratamiento);
        return view('DoctoraDental.editTratamiento',compact('idTratamiento','expedienteDental','paciente'));
    }

    public function updateTratamiento(Tratamiento $tratamiento, $idExpediente){
        $tratamiento->update([
            'descripcion' => request('descripcion')
        ]);
        $tratamiento->save();
        return redirect()->route('ExpedientePacienteDoctoraDental',$idExpediente)
            ->with('success', 'Tratamiento actualizado satisfactoriamente.');
    }

    public function destroyTratamiento($idTratamiento){
        $tratamiento = Tratamiento::find($idTratamiento);
        $tratamiento->delete();
        return redirect()->back()
            ->with('success', 'Tratamiento eliminado satisfactoriamente.');
    }

    public function tratamientosExpediente($pacienteId){
        $i=1;
        $expedientDental = ExpedienteDoctoraDental::where('paciente_id', $pacienteId)->get();
        $paciente = Paciente::find($pacienteId);
        $dientes = Diente::where('expedienteDental_id',$expedientDental[0]->id)->get();
        foreach ($dientes as $diente){
            $tratamientos = Tratamiento::where('diente_id',$diente->id)->get();
            if($tratamientos->isEmpty()){
                $arrayTratamiento[] = ['idDiente' => 0, 'descripcion' => 0, 'fecha' => 0, 'idTratamiento' => 0];
            }else{
                foreach ($tratamientos as $tratamiento) {
                    $arrayTratamiento[] = ['idDiente' => $tratamiento->diente_id, 'descripcion' => $tratamiento->descripcion, 'fecha' => $tratamiento->fecha, 'idTratamiento' => $tratamiento->id];
                }
            }

        }
        return view('DoctoraDental.tratamientos',compact('arrayTratamiento','i','dientes','paciente','expedientDental'));
    }

    public function showTratamientosExpediente($pacienteId){
        $i=1;
        $expedientDental = ExpedienteDoctoraDental::where('paciente_id', $pacienteId)->get();
        $paciente = Paciente::find($pacienteId);
        $dientes = Diente::where('expedienteDental_id',$expedientDental[0]->id)->get();
        foreach ($dientes as $diente){
            $tratamientos = Tratamiento::where('diente_id',$diente->id)->get();
            if($tratamientos->isEmpty()){
                $arrayTratamiento[] = ['idDiente' => 0, 'descripcion' => 0, 'fecha' => 0, 'idTratamiento' => 0];
            }else{
                foreach ($tratamientos as $tratamiento) {
                    $arrayTratamiento[] = ['idDiente' => $tratamiento->diente_id, 'descripcion' => $tratamiento->descripcion, 'fecha' => $tratamiento->fecha, 'idTratamiento' => $tratamiento->id];
                }
            }

        }
        return view('DoctoraDental.showTratamientos',compact('arrayTratamiento','i','dientes','paciente','expedientDental'));
    }

    public function updateTramientoDiente(Request $request, $idTratamiento){
        $tratamiento = Tratamiento::find($idTratamiento);

        $tratamiento->update([
            'descripcion' => request('descripcion')
        ]);
        $tratamiento->save();
        return redirect()->back()
            ->with('success', 'Tratamiento actualizado satisfactoriamente.');
    }

    public function showInfoRecetas($pacienteId){
        $i = 0;
        $expediente = ExpedienteDoctoraDental::where('paciente_id',$pacienteId)->first();
        $paciente = Paciente::find($expediente->paciente_id);
        $recetas = RecetasDentale::where('expedienteDental_id',$expediente->id)
                                    ->where('estadoReceta_id',1)
                                    ->orderBy('created_at','desc')
                                    ->get();
        //Falta mostrar el nombre del paciente
        return view('DoctoraDental.showInfoRecetas',compact('recetas','i','paciente','expediente'));
    }

}
