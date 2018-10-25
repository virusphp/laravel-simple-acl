<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="PEKALONGANINFO">
  <meta name="google-site-verification" content="HpziBw6YVTEPc0xztAmxGwb0UEwjf7haS8FX4AZQtX0" />
  {{--  ==========twiter=============  --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@pekalonganinfo" />
  <meta name="twitter:site:id" content="@pekalonganinfo" />
  <meta name="twitter:creator" content="@pekalonganinfo" />
  <link rel="icon" href="{{ asset('img/favicon.png') }}">
  <title>pekalonganinfo - @yield('title')</title>
  <link href="{{ asset('f/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="{{ asset('f/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('f/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('f/fontawesome/css/all.min.css') }}">
  @stack('css')
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      @yield('iklanwebkiri')
      <div class="col-md-8 col-sm-12 bg-white">
       @include('layouts.f.patrials.head')
       {{--  ===============================header==================================  --}}
       @include('layouts.f.patrials.menu')
       {{--  ===============================menu==================================  --}}
       @yield('content')
    </div>
  </div>

  <script src="{{ asset('f/js/jquery-3.3.1.min.js')}} "></script>
  <script src="{{ asset('f/js/popper.min.js')}} "></script>
  <script src="{{ asset('f/js/bootstrap.min.js')}} "></script>
  <script src="{{ asset('f/js/pekalonganinfo.js')}} "></script>
  <script src="{{ asset('b/js/jquery.validate.min.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  @stack('scripts')
</body>
</html>
