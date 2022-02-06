
        <form id="formDelete" action="{{ route('abonos.destroy', $abono->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">

                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar el abono con monto <b>${{ $abono->monto }}</b>?
                    </div>
                </div>

            </div>
        </form>
