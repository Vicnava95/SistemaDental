<?php

namespace App\Http\Controllers;

use App\Models\Rolpersona;
use Illuminate\Http\Request;
use Auth;

/**
 * Class RolpersonaController
 * @package App\Http\Controllers
 */
class RolpersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolpersonas = Rolpersona::paginate();

        return view('rolpersona.index', compact('rolpersonas'))
            ->with('i', (request()->input('page', 1) - 1) * $rolpersonas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolpersona = new Rolpersona();
        return view('rolpersona.create', compact('rolpersona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rolpersona::$rules);

        $rolpersona = Rolpersona::create($request->all());

        return redirect()->route('rolpersonas.index')
            ->with('success', 'Rol creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolpersona = Rolpersona::find($id);

        return view('rolpersona.show', compact('rolpersona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolpersona = Rolpersona::find($id);

        return view('rolpersona.edit', compact('rolpersona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rolpersona $rolpersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rolpersona $rolpersona)
    {
        request()->validate(Rolpersona::$rules);

        $rolpersona->update($request->all());

        return redirect()->route('rolpersonas.index')
            ->with('success', 'Rol actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function delete($id)
    {
        $rolpersona = Rolpersona::find($id);

        return view('rolpersona.destroy', compact('rolpersona'));
    } 

    public function destroy($id)
    {
        $rolpersona = Rolpersona::find($id)->delete();

        return redirect()->route('rolpersonas.index')
            ->with('success', 'Rol eliminado satisfactoriamente');
    }
}
