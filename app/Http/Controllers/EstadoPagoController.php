<?php

namespace App\Http\Controllers;

use App\Models\EstadoPago;
use Illuminate\Http\Request;

/**
 * Class EstadoPagoController
 * @package App\Http\Controllers
 */
class EstadoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoPagos = EstadoPago::paginate();

        return view('estado-pago.index', compact('estadoPagos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadoPagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoPago = new EstadoPago();
        return view('estado-pago.create', compact('estadoPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadoPago::$rules);

        $estadoPago = EstadoPago::create($request->all());

        return redirect()->route('estado-pagos.index')
            ->with('success', 'EstadoPago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoPago = EstadoPago::find($id);

        return view('estado-pago.show', compact('estadoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoPago = EstadoPago::find($id);

        return view('estado-pago.edit', compact('estadoPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadoPago $estadoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoPago $estadoPago)
    {
        request()->validate(EstadoPago::$rules);

        $estadoPago->update($request->all());

        return redirect()->route('estado-pagos.index')
            ->with('success', 'EstadoPago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoPago = EstadoPago::find($id)->delete();

        return redirect()->route('estado-pagos.index')
            ->with('success', 'EstadoPago deleted successfully');
    }
}
