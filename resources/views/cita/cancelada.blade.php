
        <form id="formEstadoCita" action="{{route('citas.cancelled', $cita->id)}}" method="GET">
            {{ method_field('PATCH') }}
            @csrf
            <div class="modal-content bg-dark">
                
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                        ¿Quieres cancelar la cita de <b>{{$cita->Paciente->apellidos}}, {{$cita->Paciente->nombres}}</b> programado en el dia <b>{{ $cita->fecha }}</b>, a la hora de <b>{{ $cita->hora }}</b>?
                    </div>
                </div>
                
            </div>
        </form>