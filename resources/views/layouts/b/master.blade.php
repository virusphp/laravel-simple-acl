<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pekalongan Info | Dashboard') }}</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- Bootstrap -->
    <link href="{{ asset('b/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('b/plugin/font-awesome/css/font-awesome.min.css') }}">
    @yield('css')
	<link rel="stylesheet" href="{{ asset('b/plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('b/plugin/toast/css/toast.min.css') }}">
	<link rel="stylesheet" href="{{ asset('b/css/custom.min.css') }}">
	<link rel="stylesheet" href="{{ asset('b/css/pekalonganinfo.css') }}">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	{{--  @include('layouts.b.partials._flash') --}}

	  {{-- menu --}}
	  @include('layouts.b.partials.sidebar')

	  {{-- header --}}
	  @include('layouts.b.partials.header')

	  {{-- content --}}
	  @yield('content')

	  {{-- footer --}}
	  @include('layouts.b.partials.footer')
      </div>
    </div>

 	<!-- jQuery -->
    <script src="{{ asset('b/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('b/js/bootstrap.min.js') }}"></script>

  {{-- tinymce --}}
    <script src="{{ asset('b/plugin/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('b/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('b/plugin/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('b/plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('b/plugin/toast/js/toast.min.js') }}"></script>
	<!-- Custom Theme Scripts -->
	<script src="{{ asset('b/js/custom.min.js') }}"></script>

 	@stack('scripts')

  </body>
</html>
