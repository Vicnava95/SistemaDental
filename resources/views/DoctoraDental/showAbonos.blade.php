<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Abonos</span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                            <tr>
                                <th>Monto</th>
                                <th>Fecha</th>
                                {{-- <th>Editar</th> --}}
                            </tr>
                            @foreach ($abonos as $abono)
                                <tr>
                                    <th>${{ $abono->monto }}</th>
                                    <th>{{ $abono->fecha }}</th>
                                    {{-- <th>
                                        <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                            id="mediumButton3" data-toggle="modal" data-target="#mediumModal3"
                                            data-attr="{{ route('editAbonoExpedienteDental', $abono->id) }}">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </th> --}}
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
