
        <form id="formDelete" action="{{ route('pagos.destroy', $pago->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar el pago de <b>${{ $pago->costo }}</b>?
                    </div>
                </div>
                
            </div>
        </form>