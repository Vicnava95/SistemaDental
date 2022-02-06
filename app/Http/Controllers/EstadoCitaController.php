<?php

namespace App\Http\Controllers;

use App\Models\EstadoCita;
use Illuminate\Http\Request;

/**
 * Class EstadoCitaController
 * @package App\Http\Controllers
 */
class EstadoCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoCitas = EstadoCita::paginate();

        return view('estado-cita.index', compact('estadoCitas'))
            ->with('i', (request()->input('page', 1) - 1) * $estadoCitas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoCita = new EstadoCita();
        return view('estado-cita.create', compact('estadoCita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadoCita::$rules);

        $estadoCita = EstadoCita::create($request->all());

        return redirect()->route('estado-citas.index')
            ->with('success', 'EstadoCita created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoCita = EstadoCita::find($id);

        return view('estado-cita.show', compact('estadoCita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoCita = EstadoCita::find($id);

        return view('estado-cita.edit', compact('estadoCita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadoCita $estadoCita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoCita $estadoCita)
    {
        request()->validate(EstadoCita::$rules);

        $estadoCita->update($request->all());

        return redirect()->route('estado-citas.index')
            ->with('success', 'EstadoCita updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoCita = EstadoCita::find($id)->delete();

        return redirect()->route('estado-citas.index')
            ->with('success', 'EstadoCita deleted successfully');
    }
}
