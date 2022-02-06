<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Cita</span>
                </div>
                <div class="card-body">
                    <form method="POST" id="formEdit" action="{{ route('citas.update', $cita->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('cita.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
