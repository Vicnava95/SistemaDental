
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Rol</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="formEdit" action="{{ route('rolpersonas.update', $rolpersona->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('rolpersona.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

