@extends('layouts/myapp')
<section id="services" class="services-area services-eight">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Turnos para monitoreo</h6>
              <p>Administre aqui turnos para Monitoreo</p>
              @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
              <a href="{{route('turnos.create')}}" class="btn btn-sm btn-primary">+ Agregar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="single-services">
            <div class="service-content">
                @if(count($turnos))
                <table class="table table-condensed table-striped table-bordered">
                    <thead><tr><td>Id</td><td>Descripcion</td><td>Inicio</td><td>Fin</td></tr></thead>
                @foreach($turnos as $turno)
                    <tr><td>{{$turno->id}}</td><td>{{$turno->descripcion}}</td><td>{{$turno->inicio}}</td><td>{{$turno->fin}}</td></tr>
                @endforeach
                </table>
                @else
                <p>No hay turnos de monitoreo registrados</p>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>