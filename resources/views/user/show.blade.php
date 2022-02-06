<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Usuario</span>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        <strong>Rol:</strong>
                        @foreach ($roles as $r)
                            @if ($r->id == $user->rols_fk )
                                {{ $r->nombreRol }}
                            @endif
                        @endforeach
                        {{-- $user->rols_fk --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

