<form id="formDelete" action="{{ route('rDentales.destroy', $rDentale->id) }}" method="POST">
    @csrf
    @method("DELETE")
    <div class="modal-content bg-dark">

        <div class="modal-body" id="mediumBody">
            <div>
                <!-- the result to be displayed apply here -->

                Está por anular la receta emitida el:  <b>{{ $rDentale->fecha }}</b><br><br>
                        
                        Si desea cambiar la receta actual seleccione <b>Crear nueva versión</b>
                        <div align="center">
                            <a data-toggle="modal" id="nuevo" href="#myModal2" data-attr="{{ route('rDentales.edit',$rDentale->id) }}"
                                class="btn btn-success btn-circle btn-circle-sm m-1">NV
                            </a>
                        </div> 
                        <br>
                        Si solamente desea dar de baja la receta seleccionada presione <b>Anular</b>.
            </div>
        </div>

    </div>
</form>