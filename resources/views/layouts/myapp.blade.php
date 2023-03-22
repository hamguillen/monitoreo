<!DOCTYPE html>
<html lang="es">

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--====== Title ======-->
	<title>Monitoreo SNOC</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />
  @yield('css')
</head>

<body>

  <!--====== NAVBAR NINE PART START ======-->

  <section class="navbar-area navbar-nine">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="assets/images/white-logo.svg" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine"
              aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a href="{{route('/')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('areas.index')}}">Areas</a>
                </li>

                <li class="nav-item">
                  <a href="{{route('personal.index')}}">Personal</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('turnos.index')}}">Turnos</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('horarios.index')}}">Jornadas</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('guardias.index')}}">Guardias</a>
                </li>
				        <li class="nav-item">
                  <a class="page-scroll" href="#">Logout</a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- navbar -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>

  @yield('content')

  <a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
  </a>

  <!--====== js ======-->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  @yield('javascript')
</body>
</html>