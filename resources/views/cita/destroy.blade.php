
        <form id="formDelete" action="{{ route('citas.destroy', $cita->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar la cita a realizar el dia <b>{{ $cita->fecha }}</b>?
                    </div>
                </div>

            </div>
        </form>
