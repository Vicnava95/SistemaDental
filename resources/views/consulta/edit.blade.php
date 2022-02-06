<div class="col-md-12">
    @includeif('partials.errors')
    <div class="card-header">
        <span class="card-title">Consulta</span>
    </div>
    <div class="card-body">
        <form method="POST" id="formEdit" action="{{ route('consultas.update', $consulta->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('consulta.form')
        </form>
    </div>
</div>

