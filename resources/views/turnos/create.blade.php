@extends('layouts/myapp')
@section('content')
<section id="contact" class="contact-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-4">
          <div class="contact-form-wrapper">
            <div class="row">
              <div class="col-xl-10 col-lg-8 mx-auto">
                <div class="section-title text-center">
                  <span> Agregar Turnos de Monitoreo </span>
                </div>
              </div>
            </div>
            <form action="{{route('turnos.store')}}" class="contact-form" method='POST'>
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <input type="text" name="descripcion" placeholder="Descripcion" required class="@error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" />
                  @error('descripcion')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <input type="time" name="inicio" placeholder="Inicio" required class="@error('inicio') is-invalid @enderror" value="{{old('inicio')}}" />
                  @error('inicio')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <input type="time" name="fin" placeholder="Fin" required class="@error('fin') is-invalid @enderror" value="{{old('fin')}}" />
                  @error('fin')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12">
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