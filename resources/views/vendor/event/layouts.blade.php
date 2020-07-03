@extends('layouts.admin')
@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{asset('vendor/event/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/event/css/custom.css')}}" rel="stylesheet">

@endsection
@section('content')
<nav class="navbar navbar-inverse">
    <div class="container">

            <a class="navbar-brand" href="{{ url('event') }}">Appointments</a>

            <ul class="nav navbar-nav">

                <li><a href="{{url('event-list')}}">Appointment List</a></li>
            </ul>

    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        @yield('contents')

    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('vendor/event/js/parsley.js')}}"></script>
@endsection






