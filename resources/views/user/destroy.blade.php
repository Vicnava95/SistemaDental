
        <form id="formDelete" action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar al registro: {{ $user->name }}?
                    </div>
                </div>
                
            </div>
        </form>