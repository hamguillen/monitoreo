@extends('layouts/myapp')
<section id="services" class="services-area services-eight">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Areas de Trabajo</h6>
              <p>Administre aqui las areas de monitoreo a calendarizar </p>
              @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
              <a href="{{route('areas.create')}}" class="btn btn-sm btn-primary">Agregar nueva</a>
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
                @if(count($areas))
                <table class="table table-condensed table-striped table-bordered">
                    <thead><tr><td>Id</td><td>Nombre</td></tr></thead>
                @foreach($areas as $area)
                    <tr><td>{{$area->id}}</td><td>{{$area->name}}</td></tr>
                @endforeach
                </table>
                @else
                <p>No hay areas de monitoreo registradas</p>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>