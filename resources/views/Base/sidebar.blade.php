<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span class="pt-2">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    style="color: white">
                                    <span class="link-collapse">
                                        {{ __('Cerrar sesion') }}
                                    </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li hidden>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li hidden>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">

                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modeloFormulario">
                        Modelo de inputs para formulario
                    </button> --}}
                </li>
                {{-- <li class="nav-item active">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../demo1/index.html">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="../demo2/index.html">
                                    <span class="sub-item">Dashboard 2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Opciones</h4>
                </li>

                <!--Dashboar-->
                <li class="nav-item">
                    @switch(Auth::user()->rols_fk)
                    @case(1)
                    <a href="{{route('dshAdministrador.index')}}">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                    @break
                    @case(2)
                    <a href="{{route('dshDoctorGeneral.index')}}">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                    @break
                    @case(3)
                    <a href="{{route('dshDoctorDental.index')}}">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                    @break

                    @default
                    <a href="{{route('dshSecretaria.index')}}">
                        <i class="fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                    @endswitch
                </li>

                <!-- Expedientes-->
                @if(!(Auth::user()->rols_fk==4))
                @switch(Auth::user()->rols_fk)
                @case(1)
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-id-card-alt"></i>
                        <p>Expedientes</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href=" {{ route('expedientesGeneral') }} ">
                                    <i class="fas fa-user-md"></i>
                                    <span class="sub-item">Medicos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('expedientesDentales') }} ">
                                    <i class="fas fa-tooth"></i>
                                    <span class="sub-item">Dentales</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @break
                @case(2)
                <li class="nav-item">
                    <a href=" {{ route('expedientesGeneral') }}">
                        <i class="fas fa-id-card-alt"></i>
                        <p>Expedientes</p>
                    </a>
                </li>
                @break
                @default
                <li class="nav-item">
                    <a href="{{ route('expedientesDentales') }} ">
                        <i class="fas fa-id-card-alt"></i>
                        <p>Expedientes</p>
                    </a>
                </li>
                @endswitch
                @endif

                <!-- Citas-->
                <li class="nav-item">
                    <a href="{{route('citas.index')}}">
                        <i class="far fa-calendar-alt"></i>
                        <p>Citas</p>
                    </a>
                </li>

                <!-- Consultas-->
                @if(Auth::user()->rols_fk==1 || Auth::user()->rols_fk==2)
                <li class="nav-item">
                    <a href="{{route('consultas.index')}}">
                        <i class="fas fa-stethoscope"></i>
                        <p>Consultas Médicas</p>
                    </a>
                </li>
                @endif

                <!-- Tratamientos-->
                {{-- @if(Auth::user()->rols_fk==1 || Auth::user()->rols_fk==3)
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-procedures"></i>
                        <p>Tratamientos Dentales</p>
                    </a>
                </li>
                @endif --}}

                <!-- Recetas-->
                @if(!(Auth::user()->rols_fk==4))
                @switch(Auth::user()->rols_fk)
                @case(1)
                <li class="nav-item">
                    <a data-toggle="collapse" href="#bases">
                        <i class="fas fa-receipt"></i>
                        <p>Recetas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="bases">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href=" {{ route('recetas.index') }} ">
                                    <i class="fas fa-user-md"></i>
                                    <span class="sub-item">Médicas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rDentales.index') }} ">
                                    <i class="fas fa-tooth"></i>
                                    <span class="sub-item">Dentales</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @break
                @case(2)
                <li class="nav-item">
                    <a href=" {{ route('recetas.index') }}">
                        <i class="fas fa-receipt"></i>
                        <p>Recetas</p>
                    </a>
                </li>
                @break
                @default
                <li class="nav-item">
                    <a href="{{ route('rDentales.index') }} ">
                        <i class="fas fa-receipt"></i>
                        <p>Recetas</p>
                    </a>
                </li>
                @endswitch
                @endif

                <!---Examenes-->
                @if(!(Auth::user()->rols_fk==4))
                @switch(Auth::user()->rols_fk)
                @case(1)
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base2">
                        <i class="fas fa-file-medical-alt"></i>
                        <p>Examenes</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href=" {{ route('examenesGenerales.index') }} ">
                                    <i class="fas fa-user-md"></i>
                                    <span class="sub-item">Medicos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('examenesDentales.index') }} ">
                                    <i class="fas fa-tooth"></i>
                                    <span class="sub-item">Dentales</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @break
                @case(2)
                <li class="nav-item">
                    <a href=" {{ route('examenesGenerales.index') }}">
                        <i class="fas fa-file-medical-alt"></i>
                        <p>Examenes</p>
                    </a>
                </li>
                @break
                @default
                <li class="nav-item">
                    <a href="{{ route('examenesDentales.index') }} ">
                        <i class="fas fa-file-medical-alt"></i>
                        <p>Examenes</p>
                    </a>
                </li>
                @endswitch
                @endif

                <!-- Pagos-->
                @if(Auth::user()->rols_fk==1 || Auth::user()->rols_fk==3)
                <li class="nav-item">
                    <a href="{{route('pagos.index')}}">
                        <i class="far fa-money-bill-alt"></i>
                        <p>Pagos</p>
                    </a>
                </li>
                @endif

                <!--Abonos-->
                {{-- @if(Auth::user()->rols_fk==1 || Auth::user()->rols_fk==3)
                <li class="nav-item">
                    <a href="{{route('abonos.index')}}">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Abonos</p>
                    </a>
                </li>
                @endif --}}

                <!-- Pacientes-->
                <li class="nav-item">
                    <a href="{{route('pacientes.index')}}">
                        <i class="fas fa-user-plus"></i>
                        <p>Pacientes</p>
                    </a>
                </li>

                <!-- Recurso Humano-->
                @if(!(Auth::user()->rols_fk==4))
                <li class="nav-item">
                    <a href=" {{ route('personas.index') }}">
                        <i class="fas fa-user-alt"></i>
                        <p>Recuso humano</p>
                    </a>
                </li>
                @endif
                <!-- Usuarios-->
                @if (Auth::user()->rols_fk!=4)
                <li class="nav-item">
                    <a href="{{route('usuarios.index')}}">
                        <i class="fas fa-users"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                @endif




                            <!--
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>-->

                        </ul>
                    </div>
        </div>
    </div>
