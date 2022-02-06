

        <div class="col-md-12">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Nueva versión Receta Dental</span>
                </div>
                <div class="card-body">
                    <form method="POST" id="formEdit" action="{{ route('rDentales.update', $recetasDentale->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        @include('recetas-dentale.form')
                    </form>
                </div>
            </div>
        </div>
    
