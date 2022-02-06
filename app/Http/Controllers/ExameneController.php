<?php

namespace App\Http\Controllers;

use App\Models\Examene;
use Illuminate\Http\Request;

/**
 * Class ExameneController
 * @package App\Http\Controllers
 */
class ExameneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examene::paginate();

        return view('examene.index', compact('examenes'))
            ->with('i', (request()->input('page', 1) - 1) * $examenes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examene = new Examene();
        return view('examene.create', compact('examene'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Examene::$rules);

        $input = $request->all();

        if ($imagen = $request->file('imagen')) {
            $direccionDestino = 'examenesGeneralesImagenes/';
            $imagenExamen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($direccionDestino, $imagenExamen);
            $input['imagen'] = "$imagenExamen";
        }

        $examene = Examene::create($input);

        return redirect()->route('examenesGenerales.index')
            ->with('success', 'Examen creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examene = Examene::find($id);

        return view('examene.show', compact('examene'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examene = Examene::find($id);

        return view('examene.edit', compact('examene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Examene $examene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examene $examenesGenerale)
    {
        request()->validate(Examene::$rules);

        $input = $request->all();
        if ($imagen = $request->file('imagen')) {
            $direccionDestino = 'examenesGeneralesImagenes/';
            $imagenExamen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($direccionDestino, $imagenExamen);
            $input['imagen'] = "$imagenExamen";
        }else{
            unset($input['imagen']);
        }

        $examenesGenerale->update($input);

        return redirect()->route('examenesGenerales.index')
            ->with('success', 'Examen actualizado satisfactoriamente.');
    }

    public function delete($id)
    {
        $examen = Examene::find($id);
        return view('examene.destroy', compact('examen'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examene = Examene::find($id)->delete();

        return redirect()->route('examenesGenerales.index')
            ->with('success', 'Examen eliminado satisfactoriamente.');
    }
}
