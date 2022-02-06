
        <form id="formDelete" action="{{ route('examenesGenerales.destroy', $examen->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar el examen del paciente?
                    </div>
                </div>

            </div>
        </form>
