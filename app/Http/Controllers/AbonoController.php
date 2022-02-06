<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pago;
use App\Models\Abono;
use Illuminate\Http\Request;

/**
 * Class AbonoController
 * @package App\Http\Controllers
 */
class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonos = Abono::paginate();

        return view('abono.index', compact('abonos'))
            ->with('i', (request()->input('page', 1) - 1) * $abonos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abono = new Abono();
        return view('abono.create', compact('abono'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Abono::$rules);
        $request->request->add(['fecha'=> Carbon::today('America/El_Salvador')->format('Y-m-d')]);
        $abonos = Abono::select('*')->where('pago_id',$request->get('pago_id'))->get()->sum('monto');
        $totalAbonos = $abonos + $request->get('monto');
        $pago = Pago::where('id', $request->get('pago_id'))->first();
        $pagoTotal = $pago->costo;
        $faltante = $pagoTotal - $abonos;
        if($abonos==$pagoTotal) {
            return redirect()->route('abonos.index')
            ->with('error', 'El pago esta cancelado por completado');
        } elseif ($totalAbonos>$pagoTotal){
            return redirect()->route('abonos.index')
            ->with('error', 'El abono a agregar supera el pago total. Para completar el pago hace falta $'.$faltante);
        }
        else{
            $abono = Abono::create($request->all());
            if($pagoTotal==$totalAbonos) $pago->update(['estado_pago_id'=>'1']);
            else $pago->update(['estado_pago_id'=>'2']);
            return redirect()->route('abonos.index')
            ->with('success', 'Abono creado satisfactoriamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abono = Abono::find($id);

        return view('abono.show', compact('abono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abono = Abono::find($id);

        return view('abono.edit', compact('abono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Abono $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        request()->validate(Abono::$rules);
        $request->request->add(['fecha'=> Carbon::today('America/El_Salvador')->format('Y-m-d')]);
        $abonos = Abono::select('*')->where('pago_id',$request->get('pago_id'))->where('id','!=',$abono->id)->get()->sum('monto');
        $totalAbonos = $abonos + $request->get('monto');
        $pago = Pago::where('id', $request->get('pago_id'))->first();
        $pagoTotal = $pago->costo;
        $faltante = $pagoTotal - $abonos;
        if ($totalAbonos>$pagoTotal) {
            return redirect()->back()
            ->with('error', 'El abono a actualizar supera el pago total. Para completar el pago hace falta $'.$faltante);
        }else{
            $abono->update($request->all());
            if($pagoTotal==$totalAbonos) $pago->update(['estado_pago_id'=>'1']);
            else $pago->update(['estado_pago_id'=>'2']);
            return redirect()->back()
            ->with('success', 'Abono actualizado satisfactoriamente');
        }
    }

    public function delete($id)
    {
        $abono = Abono::find($id);
        return view('abono.destroy', compact('abono'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $abono = Abono::find($id)->delete();

        return redirect()->route('abonos.index')
            ->with('success', 'Abono eliminado satisfactoriamente');
    }
}
