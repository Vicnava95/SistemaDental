@extends('Base.base')

@section('tituloPagnia')
    EXPEDIENTE
@endsection

@section('titulo')
    EXPEDIENTE
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card">
        <div class="container">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 d-flex justify-content-sm-start align-items-center">
                        <a class="btn btn-primary" href="#" role="button">Gestionar Receta</a>
                    </div>
                    <div class="col-6 d-flex justify-content-sm-end align-items-center">
                        <a class="btn btn-primary" href="#" role="button">Gestionar Pagos</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <h2>Nueva cita 24/05/2021</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        <a class="btn btn-primary" href="#" role="button">Tratamientos</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <a class="btn btn-primary" href="#" role="button">Programar cita</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2 class="text-center">Citas programadas para este dia</h2>
                <div class="bg-dark p-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, dicta repellendus repudiandae amet ipsum nam, incidunt aliquid velit sapiente similique possimus atque error beatae quo porro harum vel quos veritatis?
                        </div>
                    </div>
                </div>
                <h2 class="text-center">Detalle de la consulta actual</h2>
                <div class="bg-dark p-4 mb-4">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            Fecha:
                        </div>
                        <div class="col-md-6 col-12">
                            Doctor:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            Descripcion: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae ea amet doloribus error dicta voluptate, porro rerum voluptatum exercitationem modi praesentium ex molestias harum. Alias ea tempore vel blanditiis voluptatibus!
                        </div>
                    </div>
                </div>
                <h2 class="text-center">Detalle de las citas</h2>
                <p>Cantidad de citas: 25</p>
                <div class=" p-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection