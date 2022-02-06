
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Rol</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rolpersonas.store') }}"  id="formCreate" enctype="multipart/form-data">
                            @csrf

                            @include('rolpersona.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

