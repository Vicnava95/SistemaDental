<form id="formDelete" action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
    @csrf
    @method("DELETE")
    <div class="modal-content bg-dark">
        
        <div class="modal-body" id="mediumBody">
            <div>
                <!-- the result to be displayed apply here -->
                ¿Desea eliminar al paciente: {{ $paciente->nombres." ".$paciente->apellidos }}?
            </div>
        </div>
        
    </div>
</form>