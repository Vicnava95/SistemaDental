<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(Auth::user()->rols_fk){
            case 1:
                return redirect()->route('dshAdministrador.index');
                break;
            case 2:
                return redirect()->route('dshDoctorGeneral.index');
                break;
            case 3:
                return redirect()->route('dshDoctorDental.index');
                break;
            case 4;
                return redirect()->route('dshSecretaria.index');
                break;
            default:
                return view('home');
        }
        
    }
}
