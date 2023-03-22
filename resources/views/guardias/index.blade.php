@extends('layouts/myapp')
@section('content')
<section id="services" class="services-area services-eight">
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Listado de guardias</h6>
              @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
              <a href="{{route('guardias.create')}}" class="btn btn-sm btn-primary">+ Agregar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="single-services">
            <div class="service-content">
            @if(count($guardias))
          <table class="table table-condensed table-striped table-bordered">
              <thead><tr><td>Id</td><td>Area</td><td>Jornada a Cubrir</td><td>Personal</td><td>Apoyo</td><td>Periodo</td><td></td></tr></thead>
          @foreach($guardias as $guardia)
              <tr><td>{{$guardia->id}}</td><td>{{$guardia->area}}</td><td>{{$guardia->inicio."-".$guardia->fin}}</td>
              <td>{{$personal[$guardia->personal]}}</td>
              <td>{{$personal[$guardia->personal_id]}}</td>
              <td>{{$guardia->fecha_inicio.' - '.$guardia->fecha_fin}}</td>
              <td><form action="{{route('guardias.destroy',['guardia'=>$guardia->id])}}" method="POST" >
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">X</button>
              </form></td>
            </tr>
          @endforeach
          </table>
          @else
          <p>No hay guardias de monitoreo registradas</p>
          @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  