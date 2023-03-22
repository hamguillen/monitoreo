@extends('layouts/myapp')

@section('css')
<link rel="stylesheet" href="{{asset('daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">
@endsection

@section('content')
<section id="contact" class="contact-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-4">
          <div class="contact-form-wrapper">
            <div class="row">
              <div class="col-xl-10 col-lg-8 mx-auto">
                <div class="section-title text-center">
                  <span> Asignar Guardias de Monitoreo </span>
                </div>
              </div>
            </div>
            <form action="{{route('guardias.store')}}" class="contact-form" method='POST'>
                @csrf
              <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="horario" required class="@error('horario') is-invalid @enderror"/>
                        <option value="">Elija la jornada a cubrir</option>
                        @foreach($horarios as $horario)
                        <option value="{{$horario->id}}">{{$horario->area.' - '.$horario->turno.' - '.$horario->personal.' - '.$horario->fecha.'|'.$horario->fecha_fin}}</option>
                        @endforeach
                    </select>
                  @error('horario')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-12 pt-2">
                    <select class="form-control" name="personal" required class="@error('personal') is-invalid @enderror"/>
                        <option value="">Elija al personal</option>
                        @foreach($personal as $persona)
                        <option value="{{$persona->id}}">{{$persona->name}}</option>
                        @endforeach
                    </select>
                  @error('personal')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-6 pt-2">
                  <label>Inicio</label>
                  <input type="text" name="inicio" required class="datepicker @error('inicio') is-invalid @enderror" value="{{old('inicio')}}" />
                  @error('inicio')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-6 pt-2">
                  <label>Fin</label>
                  <input type="text" name="fin" required class="datepicker @error('fin') is-invalid @enderror" value="{{old('fin')}}" />
                  @error('fin')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12 pt-3">
                  <div class="button text-center rounded-buttons">
                    <button type="submit" class="btn primary-btn rounded-full">
                      Guardar
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('javascript')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('moment/moment.min.js')}}"></script>
<script src="{{asset('daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('select2/js/select2.min.js')}}"></script>
<script>
     $('.datepicker').daterangepicker({
        autoApply:true,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2023,
        maxYear: 2023,
        locale:{
        "firstDay": 1,
        "format": "YYYY/MM/DD"}
    });
    $('.days').select2();
</script>
@endsection