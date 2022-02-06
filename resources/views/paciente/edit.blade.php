<div class="col-md-12">
    @includeif('partials.errors')
    <div class="card-header">
        <span class="card-title">Paciente</span>
    </div>
    <div class="card-body">
        <form method="POST" id="formEdit" action="{{ route('pacientes.update', $paciente->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('paciente.form')
        </form>
    </div>
</div>

