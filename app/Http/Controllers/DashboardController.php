<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Persona;
use App\Models\Consulta;
use App\Models\ExpedienteDoctor;
use App\Models\EstadoCita;
use App\Models\Rolpersona;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function doctorGeneralIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();
        $estadocitas = EstadoCita::all();
        $rolUsuario = Auth::user()->rols_fk;
        $cita = new Cita([
            'persona_id'=> 0,
            'paciente_id' => 0,
            'estadoCita_id' => 0,
            'hora' => '00:00',
            'fecha' => Carbon::now()->format('Y-m-d')
        ]);
        if($rolUsuario == 2){
            $personas = Persona::select('*')->where('rolpersona_id',$rolUsuario)->get()->toArray();
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('persona_id',$personas)
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('persona_id',$personas)
                ->where('fecha', Carbon::today('America/El_Salvador')->format('Y-m-d'))
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('DoctorGeneral.index', compact('citas', 'consulta','fechaInicio', 'fechaFin', 'personas','cita','estadocitas'));
        }
        else{
            return redirect()->back();
        }
    }

    public function doctorDentalIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();
        $estadocitas = EstadoCita::all();
        $cita = new Cita([
            'persona_id'=> 0,
            'paciente_id' => 0,
            'estadoCita_id' => 0,
            'hora' => '00:00',
            'fecha' => Carbon::now()->format('Y-m-d')
        ]);
        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 3){
            $personas = Persona::select('*')->where('rolpersona_id',$rolUsuario)->get()->toArray();
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('persona_id',$personas)
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('persona_id',$personas)
                ->where('fecha', Carbon::today('America/El_Salvador')->format('Y-m-d'))
                ->where('estadoCita_id','!=','1')
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('DoctoraDental.index', compact('citas', 'consulta','fechaInicio', 'fechaFin','cita','estadocitas'));
        }
        else{
            return redirect()->back();
        }
    }

    public function administradorIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $estadocitas = EstadoCita::all();
        $consulta = new Consulta();
        $cita = new Cita([
            'persona_id'=> 0,
            'paciente_id' => 0,
            'estadoCita_id' => 0,
            'hora' => '00:00',
            'fecha' => Carbon::now()->format('Y-m-d')
        ]);
        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 1){
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('estadoCita_id','!=','1')
                ->where('fecha', Carbon::today('America/El_Salvador')->format('Y-m-d'))
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('Admin.index', compact('citas', 'consulta','fechaInicio', 'fechaFin','cita','estadocitas'));
        }
        else{
            return redirect()->back();
        }
    }

    public function secretariaIndex(Request $request){
        $fechaInicio = trim($request->get('fechaInicio'));
        $fechaFin = trim($request->get('fechaFin'));
        $consulta = new Consulta();
        $estadocitas = EstadoCita::all();
        $cita = new Cita([
            'persona_id'=> 0,
            'paciente_id' => 0,
            'estadoCita_id' => 0,
            'hora' => '00:00',
            'fecha' => Carbon::today()->format('Y-m-d')
        ]);
        $rolUsuario = Auth::user()->rols_fk;
        if($rolUsuario == 4){   
            if($fechaInicio && $fechaFin ){
                $citas = Cita::select('*')
                    ->where('estadoCita_id','!=','1')
                    ->where('fecha','>=',$fechaInicio)
                    ->where('fecha','<=',$fechaFin)
                    ->orderBy('fecha','ASC')
                    ->orderBy('hora','ASC')
                    ->get();
            } else {
                $citas =  Cita::select('*')
                ->where('estadoCita_id','!=','1')
                ->where('fecha', Carbon::today('America/El_Salvador')->format('Y-m-d'))
                ->orderBy('fecha','ASC')
                ->orderBy('hora','ASC')
                ->get();
            }
            return view('Secretaria.index', compact('citas', 'consulta','fechaInicio', 'fechaFin','cita','estadocitas'));
        }
        else{
            return redirect()->back();
        }
    }

    
}
