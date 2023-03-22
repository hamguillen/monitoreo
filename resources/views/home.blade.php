@extends('layouts.myapp')
@section('css')
<link rel="stylesheet" href="{{asset('calendar/calendar-gc.css')}}" />
@endsection
@section('content')
<section id="hero-area" class="header-area header-eight">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="header-content">
            <div id="calendar" style="padding: 0rem;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('javascript')
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('calendar/calendar-gc.js')}}"></script>
    <script>
      $(function (e) {
      var calendar = $("#calendar").calendarGC({
        dayBegin: 1,
      dayNames:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        prevIcon: '&#x3c;',
        nextIcon: '&#x3e;',
        events: getEvents()
      });
    });
    function getEvents()
    {
      var events=[];
    @foreach($eventos as $evento)
      events.push({
        date:new Date('{{$evento["dateEvent"]}} 00:00:00'),
        eventName:'{{$evento["eventName"]}}',
        className:'{{$evento["className"]}}'
      });
    @endforeach
      return events;
    }
    </script>
  @endsection