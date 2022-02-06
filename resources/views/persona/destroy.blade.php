<form id="formDelete" action="{{route('personas.destroy',$persona->id) }}" method="POST">
    @csrf
    @method("DELETE")
    <div class="modal-content bg-dark">
        
        <div class="modal-body" id="mediumBody">
            <div>
                <!-- the result to be displayed apply here -->
                ¿Desea eliminar a la persona: {{ $persona->nombrePersonas." ".$persona->apellidoPersonas }}?
            </div>
        </div>
        
    </div>
</form>