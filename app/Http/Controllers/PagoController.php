<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Abono;
use App\Models\Persona;
use App\Models\Paciente;
use App\Models\EstadoPago;
use Illuminate\Http\Request;

/**
 * Class PagoController
 * @package App\Http\Controllers
 */
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::paginate();
        
        foreach ($pagos as $pago) {
            $pago['abono'] = Abono::select('*')->where('pago_id',$pago->id)->get()->sum('monto');
        }
        return view('pago.index', compact('pagos'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pago();
        $estadosPago = EstadoPago::pluck('nombre','id');
        return view('pago.create', compact('pago','estadosPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pago::$rules);
        $request->request->add(['estado_pago_id'=> strval(2)]);
        $pago = Pago::create($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::find($id);
        
        $paciente = Paciente::find($pago->ExpedienteDoctor->paciente_id);
        return view('pago.show', compact('pago', 'paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);
        $estadosPago = EstadoPago::pluck('nombre','id');
        return view('pago.edit', compact('pago','estadosPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pago $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        request()->validate(Pago::$rules);
        $abonos = Abono::select('*')->where('pago_id',$pago->id)->get()->sum('monto');
        if($request->get('costo')>=$abonos){
            $pago->update($request->all());
            if($request->get('costo')==$abonos)
                $pago->update(['estado_pago_id'=>'1']);
            else
                $pago->update(['estado_pago_id'=>'2']);
            return redirect()->route('pagos.index')
                ->with('success', 'Pago actualizado satisfactoriamente');
        } else{
        return redirect()->route('pagos.index')
            ->with('error', 'El pago no se puede actualizar. El total de abono es de $'.$abonos);
        }  
    }

    public function delete($id)
    {
        $pago = Pago::find($id);
        return view('pago.destroy', compact('pago'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pago::find($id)->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado satisfactoriamente');
    }
}
