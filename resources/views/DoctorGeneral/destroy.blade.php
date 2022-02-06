<form id="formDelete" action="{{route('destroyExpedienteGeneral',$expedientePaciente->id) }}" method="POST">
    @csrf
    @method("DELETE")
    <div class="modal-content bg-dark">
        
        <div class="modal-body" id="mediumBody">
            <div>
                <!-- the result to be displayed apply here -->
                ¿Desea eliminar el expediente de: {{ $paciente->nombres." ".$paciente->apellidos }}?
            </div>
        </div>
        
    </div>
</form>