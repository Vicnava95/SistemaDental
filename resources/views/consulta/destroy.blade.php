
        <form id="formDelete" action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Desea eliminar la consulta del paciente <b>{{$paciente->apellidos}}, {{$paciente->nombres}}</b>  en el dia <b>{{ $consulta->fecha }}</b>?
                    </div>
                </div>
                
            </div>
        </form>