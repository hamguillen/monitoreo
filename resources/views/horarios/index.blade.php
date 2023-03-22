@extends('layouts/myapp')
@section('content')
<section id="services" class="services-area services-eight">
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <h6>Calendario de monitoreo</h6>
              <p>Administre aqui las guardias para Monitoreo</p>
              @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        {{Session::get('mensaje')}}
                    </div>
                @endif
              <a href="{{route('horarios.create')}}" class="btn btn-sm btn-primary">+ Agregar</a>
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
            @if(count($horarios))
          <table class="table table-condensed table-striped table-bordered">
              <thead><tr><td>Id</td><td>Turno</td><td>Horario</td><td>Personal</td><td>Periodo</td><td>Dias</td><td></td></tr></thead>
          @foreach($horarios as $horario)
              <tr><td>{{$horario->id}}</td><td>{{$horario->turno}}</td><td>{{$horario->inicio."-".$horario->fin}}</td>
              <td>{{$horario->personal}}</td>
              <td>{{$horario->fecha." - ".$horario->fecha_fin}}</td>
              <td>{{implode(", ",array_intersect_key($dias,array_flip(explode(",",$horario->dia))))}}</td>
              <td><form action="{{route('horarios.destroy',['horario'=>$horario->id])}}" method="POST" >
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">X</button>
              </form></td>
            </tr>
          @endforeach
          </table>
          @else
          <p>No hay jornadas de monitoreo registradas</p>
          @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  