<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Abono</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Monto:</strong>
                        ${{ $abono->monto }}
                    </div>
                    <div class="form-group">
                        <strong>Pago:</strong>
                        {{ $abono->Pago->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $abono->fecha }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
