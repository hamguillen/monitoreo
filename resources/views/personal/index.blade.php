@extends('layouts/myapp')
<section id="services" class="services-area services-eight">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Personal de Monitoreo</h6>
              <p>Administre aqui al personal encargado de Monitoreo</p>
              @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
              <a href="{{route('personal.create')}}" class="btn btn-sm btn-primary">+ Agregar</a>
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
                @if(count($personal))
                <table class="table table-condensed table-striped table-bordered">
                    <thead><tr><td>Id</td><td>Nombre</td><td>Email</td></tr></thead>
                @foreach($personal as $persona)
                    <tr><td>{{$persona->id}}</td><td>{{$persona->name}}</td><td>{{$persona->email}}</td></tr>
                @endforeach
                </table>
                @else
                <p>No hay personal de monitoreo registrado</p>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>