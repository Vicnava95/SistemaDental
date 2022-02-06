
        <form id="formDelete" action="{{ route('rolpersonas.destroy', $rolpersona->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar el rol: {{ $rolpersona->nombreRolPersona }}?
                    </div>
                </div>
                
            </div>
        </form>