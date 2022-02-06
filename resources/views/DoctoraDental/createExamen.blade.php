<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Examen</span>
                </div>
                <div class="card-body">
                    <form method="POST" id="formCreate" action="{{ route('storeExamenExpedienteDental', $idExpediente) }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('DoctoraDental.formExamen')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>