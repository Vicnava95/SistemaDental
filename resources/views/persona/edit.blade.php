
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Persona</span>
                </div>
                <div class="card-body">
                    <form method="POST" id="formEdit" action="{{ route('personas.update', $persona->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('persona.form')

                    </form>
                </div>
            </div>
        </div>
