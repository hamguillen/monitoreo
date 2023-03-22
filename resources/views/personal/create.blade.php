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
                  <span> Agregar Personal de Monitoreo </span>
                </div>
              </div>
            </div>
            <form action="{{route('personal.store')}}" class="contact-form" method='POST'>
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <input type="text" name="nombre" placeholder="Nombre" required class="@error('nombre') is-invalid @enderror" value="{{old('nombre')}}" />
                  @error('nombre')
                      <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <input type="text" name="email" placeholder="Email" required class="@error('email') is-invalid @enderror" value="{{old('email')}}" />
                  @error('email')
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