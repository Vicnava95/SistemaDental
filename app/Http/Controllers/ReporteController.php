<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Receta;
use App\Models\ExpedienteDoctor;
use App\Models\ExpedienteDoctoraDental;
use App\Models\Diente;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\EstadoCita;
use App\Models\Tratamiento;
use App\Models\Pago;
use App\Models\Abono;
use App\Models\EstadoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

/**
 * Class ReporteController
 * @package App\Http\Controllers
 */
class ReporteController extends Controller
{

    public function reporteCitas()
    {
        //Reporte de Citas Agendadas
        $citas = DB::table('citas')
        ->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
        ->join('personas', 'citas.persona_id', '=', 'personas.id')
        ->join('estado_citas', 'citas.estadoCita_id', '=', 'estado_citas.id')
        ->select('pacientes.nombres', 'pacientes.apellidos', 'citas.fecha', 'citas.hora', 'estado_citas.nombre', 'personas.nombrePersonas', 'personas.apellidoPersonas')
        ->orderBy('citas.fecha')
        ->orderBy('citas.hora')
        ->get();

        $i = 0;
        $view = \View::make('cita.reporteCita', compact('citas', 'i'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeCitas_Agendadas'.'.pdf');
    }

    public function reporteRecetas()
    {
        //Reporte de Recetas y Proximas Citas
        $fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $recetas = DB::table('recetas')
        ->join('consultas', 'recetas.consulta_id', '=', 'consultas.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->select('*')
        //->whereDate('proximaCita','>=', $fecha)
        //->where('estadoReceta_id', '=', '1')
        ->get();
        $pacientes = DB::table('pacientes')->select('*')->get();

        $i = 0;
        $view = \View::make('receta.reporteReceta', compact('recetas', 'i', 'pacientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeRecetas_ProximasCitas'.'.pdf');
    }

    public function reporteDiagnosticoDental($paciente,$expediente)
    {
        //Reporte de diagnostico dental
        $paciente = Paciente::find($paciente);
        //$dientes = Diente::select('*')
        //->where('expedienteDental_id','=',$expediente);
        $dientes = DB::table('dientes')->select('*')
        ->where('expedienteDental_id','=',$expediente)
        ->get();

        $recetas = DB::table('recetas_dentales')->select('*')
        ->where('expedienteDental_id','=',$expediente)
        ->get();

        $tratamientos = DB::table('tratamientos')->select('*')
        ->orderBy('diente_id','ASC')
        ->get();


        $view = \View::make('DoctoraDental.reporteDiagnosticoDental', compact('paciente','dientes','recetas','tratamientos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informePaciente_DiagnosticoDental' . '.pdf');


    }

    public function reporteExamenes()
    {
        //Reporte descriptivo de examenes
        $fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $examenes = DB::table('examenes')
        ->join('consultas', 'examenes.consulta_id', '=', 'consultas.id')
        ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
        ->select('*')
        ->get();
        $pacientes = DB::table('pacientes')->select('*')->get();

        $i = 0;
        $view = \View::make('examene.reporteExamen', compact('examenes', 'i', 'pacientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeExamenes'.'.pdf');
    }

    public function reporteDiagnosticoGeneral($idExpedienteGeneral)
    {        
        
        $expedienteGeneral = ExpedienteDoctor::find($idExpedienteGeneral);
        $paciente = Paciente::find($expedienteGeneral->paciente_id);
        
        $listadoConsultaExpedienteDoctor = DB::table('consulta_expedienteDoctor')
        ->where('expedienteDoctor_id',$expedienteGeneral->id)
        ->get();        
        $consultas=[];
        foreach ($listadoConsultaExpedienteDoctor as $consultaExpedienteDoctor) {
            $consulta = Consulta::find($consultaExpedienteDoctor->consulta_id);
            $recetas = Receta::select('*')
                ->where('consulta_id', $consulta->id)
                ->get();
            $consulta['recetas'] = $recetas;
            array_push($consultas, $consulta);
        }

        $pdf = PDF::loadView('DoctorGeneral.reporteDiagnosticoGeneral', compact('paciente','consultas'));
        return $pdf->stream('reporteDiagnosticoGeneral'.'.pdf');
    }
    /** Start Reportes Victor */
    public function reporteDiaTratamientos($reporteDiario){
        
        $pacientes = Paciente::all();
        $fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $tratamientos = Tratamiento::where('fecha',$fecha)
                        ->orderBy('fecha','desc')
                        ->get();

        $i = 0;
        $view = \View::make('DoctoraDental.reporteDiaTratamientos', compact('tratamientos', 'i','fecha','pacientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeTratamientoDia'.'.pdf');
    }

    public function reportePacienteTratamiento(Paciente $paciente, $reporteTratamiento){
        $expedienteDental = ExpedienteDoctoraDental::where('paciente_id',$paciente->id)->first();
        $dientes = Diente::where('expedienteDental_id',$expedienteDental->id)->get();
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

        $i = 1;
        $view = \View::make('DoctoraDental.reportePacienteTratamiento', compact('arrayTratamiento', 'i','paciente','dientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informeTratamientoDia'.'.pdf');
        
    }
    /** END Reportes Victor */
    public function reportePagos()
    {
        //Reporte pagos
        //$fecha = Carbon::yesterday()->format('Y-m-d', 'America/El_Salvador');
        $pagos = DB::table('pagos')
        ->join('estado_pagos', 'pagos.estado_pago_id', '=', 'estado_pagos.id')
        ->join('expediente_doctora_dentals', 'pagos.expediente_doctora_dental_id', '=', 'expediente_doctora_dentals.id')
        ->join('pacientes', 'expediente_doctora_dentals.paciente_id', '=', 'pacientes.id')
        ->join('abonos', 'pagos.id', '=', 'abonos.pago_id')
        ->select('*')
        ->get();
        $pacientes = DB::table('pacientes')->select('*')->get();
        $abonos = DB::table('abonos')->select('*')->get();
        $expedientes = DB::table('expediente_doctora_dentals')->select('*')->get();
        $estadoPagos = DB::table('estado_pagos')->select('*')->get();

        $i = 0;
        $view = \View::make('pago.reportePagos', compact('pagos', 'i', 'pacientes', 'abonos', 'expedientes', 'estadoPagos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('informePagos'.'.pdf');
    }

}
