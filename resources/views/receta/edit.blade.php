<div class="col-md-12">
    @includeif('partials.errors')
    <div class="card-header">
        <span class="card-title">Receta</span>
    </div>
    <div class="card-body">
        <form method="POST" id="formEdit" action="{{ route('recetas.update', $receta->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('receta.form')
        </form>
    </div>
</div>

