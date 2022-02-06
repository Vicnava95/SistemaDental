<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">¿Está seguro de eliminar este tratamiento?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body" style="color: black;">
    {{$descripcion}}
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <a class="btn btn-danger" href="{{route('destroyDienteTratamiento',$id)}}" role="button">Eliminar</a>
</div>