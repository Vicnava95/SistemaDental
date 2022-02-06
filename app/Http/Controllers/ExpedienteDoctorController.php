<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cita;
use App\Models\Receta;
use App\Models\Examene;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use Illuminate\Http\Request;
use App\Models\ExpedienteDoctor;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpedienteDoctoraDental;

class ExpedienteDoctorController extends Controller
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
        $expedientePaciente = ExpedienteDoctor::where('paciente_id', $paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedienteDoctor')
            ->where('expedienteDoctor_id', $expedientePaciente->id)
            ->get();
        $cantidadConsultas = count($consultasExpediente);
        //dd($consultasExpediente);
        if ($cantidadConsultas != 0) {
            foreach ($consultasExpediente as $consulta) {
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas[] = ['fecha' => $consultas[0]->fecha, 'descripcion' => $consultas[0]->descripcion, 'id' => $consultas[0]->id, 'peso' => $consultas[0]->peso, 'frecuencia_cardiaca' => $consultas[0]->frecuencia_cardiaca];
            }
        } else {
            $collecionConsultas[] = ['fecha' => 0, 'descripcion' => 0, 'id' => 0, 'peso' => 0, 'frecuencia_cardiaca'=>0];
        }
        //dd($collecionConsultas);

        return view('DoctorGeneral.ExpedientePacienteDoctorGeneral', compact('i', 'paciente', 'citaPaciente', 'collecionConsultas', 'cantidadConsultas', 'expedientePaciente'));
    }

    public function crearConsulta(Request $request)
    {
        //dd(request('descripcionConsulta'));
        $idPaciente = request('idPaciente');

        //Calculo de IMC antes de guardar

        if ($request->input('estatura') > 0) {
            $peso = $request->input('peso');
            $estatura = $request->input('estatura');
            $imc = round($peso / ($estatura * $estatura), 2, PHP_ROUND_HALF_EVEN);
        } else {
            $imc = 0;
        }

        //$request->request->add(['imc' => $imc]);
        // Fin del calculo

        $consulta = Consulta::create([
            'paciente_id' => request('idPaciente'),
            'persona_id' => request('idPersona'),
            'descripcion' => request('descripcionConsulta'),
            'fecha' => request('fechaConsulta'),
            'peso' => request('peso'),
            'estatura' => request('estatura'),
            'imc' => $imc,
            'presion' => request('presion'),
            'temperatura' => request('temperatura'),
            'frecuencia_cardiaca' => request('frecuencia_cardiaca'),
            'frecuencia_respiratoria' => request('frecuencia_respiratoria'),
            'solicitud_examen' => request('solicitud_examen'),

        ]);
        $consulta->save();

        $idCita = request('idCita');
        $cita = Cita::find($idCita);

        $cita->update([
            'estadoCita_id' => 1
        ]);

        $expedientePaciente = ExpedienteDoctor::where('paciente_id', $idPaciente)->first();
        //dd($expedientePaciente);
        $pivotTable = DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id' => $consulta->id,
            'expedienteDoctor_id' => $expedientePaciente->id,
        ]);

        return redirect()->back();
    }

    public function expedientes()
    {
        $i = 1;
        $expedientes = ExpedienteDoctor::all();
        $pacientes = Paciente::all();
        return view('DoctorGeneral.expedientesGeneral', compact('i', 'expedientes', 'pacientes'));
    }

    public function showExpediente($id)
    {
        $i = 1;
        $paciente = Paciente::find($id);
        $expedientePaciente = ExpedienteDoctor::where('paciente_id', $paciente->id)->first();
        $consultasExpediente = DB::table('consulta_expedienteDoctor')
            ->where('expedienteDoctor_id', $expedientePaciente->id)
            ->get();
        $cantidadConsultas = count($consultasExpediente);
        //dd($consultasExpediente);
        if ($cantidadConsultas != 0) {
            foreach ($consultasExpediente as $consulta) {
                $consultas = Consulta::where('id', $consulta->consulta_id)->get();
                $collecionConsultas[] = ['fecha' => $consultas[0]->fecha, 'descripcion' => $consultas[0]->descripcion, 'id' => $consultas[0]->id, 'peso' => $consultas[0]->peso, 'frecuencia_cardiaca' => $consultas[0]->frecuencia_cardiaca];
            }
        } else {
            $collecionConsultas[] = ['fecha' => 0, 'descripcion' => 0, 'id' => 0, 'peso' => 0, 'frecuencia_cardiaca'=>0];
        }
        //dd($collecionConsultas);

        return view('DoctorGeneral.ExpedienteGeneralShow', compact('i', 'paciente', 'collecionConsultas', 'cantidadConsultas', 'expedientePaciente'));
    }

    public function crearCitaDoctor($idPaciente)
    {
        $estadocita = EstadoCita::pluck('nombre', 'id');
        $personas = Persona::select('*')
            ->where('rolpersona_id', 2)
            ->orWhere('rolpersona_id', 3)
            ->get();
        $cita = new Cita();
        $url = url()->previous();
        $urlView = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        //dd($urlView);
        $pacientes = Paciente::all();
        $paciente = Paciente::find($idPaciente);
        //dd($paciente->id);
        $personas = Persona::select('*')
            ->where('rolpersona_id', 2)
            ->orWhere('rolpersona_id', 3)
            ->get();
        return view('DoctorGeneral.create', compact('cita', 'pacientes', 'paciente', 'personas', 'urlView', 'estadocita'));
    }

    public function storeCita(Request $request, $urlView)
    {
        //dd($request);
        if (Auth::user()->rols_fk == 3 || Auth::user()->rols_fk == 2) {
            $request->request->add(['persona_id' => strval(Auth::user()->rols_fk)]);
            //request()->validate(Cita::$rulesWithoutPersona);
        } else {
            //request()->validate(Cita::$rules);
        }
        $cita = DB::table('citas')->insert([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'paciente_id' => $request->paciente_id_hid,
            'persona_id' => 2,
            'estadoCita_id' => $request->estadoCita_id
        ]); 
        return redirect()->route('dshDoctorGeneral.index')
            ->with('success', 'Cita creada satisfactoriamente.');
    }

    public function deleteExpediente($id)
    {
        $expedientePaciente = ExpedienteDoctor::find($id);
        $paciente = Paciente::find($expedientePaciente->paciente_id);
        return view('DoctorGeneral.destroy', compact('expedientePaciente', 'paciente'));
    }

    public function destroy($id)
    {
        $expedientePaciente = ExpedienteDoctor::find($id);
        $expedientePaciente->delete();
        return redirect()->route('expedientesGeneral');
    }

    public function createPaciente()
    {
        $paciente = new Paciente();
        return view('DoctorGeneral.pacienteCreate', compact('paciente'));
    }

    public function storePaciente(Request $request)
    {
        //Paciente::create($request->validate());// valida con las reglas establecidas en app/Http/Request/ValidatePacienteFormRequest
        /*return redirect()->route('pacientes.index');*/
        request()->validate(Paciente::$rules);

        $paciente = Paciente::create($request->all());
        $crearExpedientePaciente_Doctor = ExpedienteDoctor::create([
            'paciente_id' => $paciente->id
        ]);
        $crearExpedientePaciente_Doctor->save();


        return redirect()->route('expedientesGeneral')
            ->with('success', 'Expediente creado satisfactoriamente');
    }

    public function createReceta($idCita)
    {

        $receta = new Receta();
        return view('DoctorGeneral.createReceta', compact('receta', 'idCita'));
    }

    public function storeReceta(Request $request)
    {
        request()->validate(Receta::$rulesWithoutEstadoReceta);
        $request->request->add(['estadoReceta_id'=> '1']);
        $receta = Receta::create($request->all());


        return redirect()->back()
            ->with('success', 'Receta creada satisfactoriamente.');
    }

    public function createExamen($idCita)
    {
        $examene = new Examene();
        return view('DoctorGeneral.createExamen', compact('examene', 'idCita'));
    }

    public function storeExamen(Request $request, $idCita)
    {
        request()->validate(Examene::$rulesWithoutConsulta);
        $request->request->add(['consulta_id'=> strval($idCita)]);
        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            $direccionDestino = 'examenesGeneralesImagenes/';
            $imagenExamen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($direccionDestino, $imagenExamen);
            $input['imagen'] = "$imagenExamen";
        }

        $examene = Examene::create($input);

        return redirect()->back()
            ->with('success', 'Examen creado satisfactoriamente.');
    }

}
