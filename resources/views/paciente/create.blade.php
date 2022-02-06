<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Paciente</span>
                </div>
                <div class="card-body">
                    <form method="POST" id="formCreate" action="{{ route('pacientes.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('paciente.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
