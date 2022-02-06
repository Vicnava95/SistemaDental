<?php

namespace App\Http\Controllers;

use App\Models\ExamenesDoctoraDental;
use Illuminate\Http\Request;

/**
 * Class ExamenesDoctoraDentalController
 * @package App\Http\Controllers
 */
class ExamenesDoctoraDentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenesDoctoraDentals = ExamenesDoctoraDental::paginate();

        return view('examenes-doctora-dental.index', compact('examenesDoctoraDentals'))
            ->with('i', (request()->input('page', 1) - 1) * $examenesDoctoraDentals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examenesDoctoraDental = new ExamenesDoctoraDental();
        return view('examenes-doctora-dental.create', compact('examenesDoctoraDental'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExamenesDoctoraDental::$rules);

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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examenesDoctoraDental = ExamenesDoctoraDental::find($id);

        return view('examenes-doctora-dental.show', compact('examenesDoctoraDental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examenesDoctoraDental = ExamenesDoctoraDental::find($id);

        return view('examenes-doctora-dental.edit', compact('examenesDoctoraDental'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExamenesDoctoraDental $examenesDoctoraDental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamenesDoctoraDental $examenesDentale)
    {
        request()->validate(ExamenesDoctoraDental::$rules);

        $input = $request->all();
        if ($imagen = $request->file('imagen')) {
            $direccionDestino = 'examenesDentalesImagenes/';
            $imagenExamen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($direccionDestino, $imagenExamen);
            $input['imagen'] = "$imagenExamen";
        }else{
            unset($input['imagen']);
        }

        $examenesDentale->update($input);

        return redirect()->route('examenesDentales.index')
            ->with('success', 'Examen actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        $examenesDentale = ExamenesDoctoraDental::find($id);
        return view('examenes-doctora-dental.destroy', compact('examenesDentale'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $examenesDoctoraDental = ExamenesDoctoraDental::find($id)->delete();

        return redirect()->route('examenesDentales.index')
            ->with('success', 'Examen eliminado satisfactoriamente');
    }
}
