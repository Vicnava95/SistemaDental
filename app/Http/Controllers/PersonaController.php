<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Sexo;
use App\Models\Rolpersona;
use Illuminate\Http\Request;
use Auth;

/**
 * Class PersonaController
 * @package App\Http\Controllers
 */
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto =trim($request->get('texto'));
        
        $personas = Persona::select('*')->where('nombrePersonas','LIKE',$texto.'%')
                            ->orWhere('apellidoPersonas','LIKE',$texto.'%')
                           //->orWhere('id','LIKE',$texto.'%')
                            ->orderBy('apellidoPersonas')
                            ->paginate(10);   
        // $personas = Persona::paginate();
        $sexos = Sexo::all();
        $roles = Rolpersona::all();

        return view('persona.index', compact('personas','sexos','roles'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = new Persona();
        $roles = Rolpersona::all();
        $sexos = Sexo::pluck('nombre','id');
        $roles = Rolpersona::pluck('nombreRolPersona','id');
        return view('persona.create', compact('persona','sexos','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Persona::$rules);

        $persona = Persona::create($request->all());

        return redirect()->route('personas.index')
            ->with('success', 'Persona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        $sexos = Sexo::all();
        $roles = Rolpersona::all();

        return view('persona.show', compact('persona','sexos','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        $sexos = Sexo::pluck('nombre','id');
        $roles = Rolpersona::pluck('nombreRolPersona','id');

        return view('persona.edit', compact('persona','sexos','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        request()->validate(Persona::$rules);

        $persona->update($request->all());

        return redirect()->route('personas.index')
            ->with('success', 'Persona updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $persona = Persona::find($id);
        return view('persona.destroy', compact('persona'));
    }

    public function destroy($id)
    {
        $persona = Persona::find($id)->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona deleted successfully');
    }
}
