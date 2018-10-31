<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="PEKALONGANINFO">
  <meta name="revisit-after" content="1 days">
  <meta name="robots" content="all,index,follow">
  <meta content="@yield('title')" name="description"/>
  <meta content="Pekalongan info, Pekalonganinfo, InfoPekalongan, Info Peklaongan, Info Seputar Pekalongan, pklinfo, isp, info pekalongan terkini" name="keywords"/>
  <meta name="google-site-verification" content="HpziBw6YVTEPc0xztAmxGwb0UEwjf7haS8FX4AZQtX0" />
  {{--  ==========twiter=============  --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@pekalonganinfo" />
  <meta name="twitter:site:id" content="@pekalonganinfo" />
  <meta name="twitter:creator" content="@pekalonganinfo" />
  <link rel="manifest" href="{{ asset('f/js/OneSignal/manifest.json')}}" />
  @stack('css')
  <link rel="icon" href="{{ asset('img/favicon.png') }}">
  <title>pekalonganinfo - @yield('title')</title>
  <link href="{{ asset('f/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="{{ asset('f/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('f/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('f/fontawesome/css/all.min.css') }}">

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
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script src="{{ asset('f/js/jquery-3.3.1.min.js')}} "></script>
  <script src="{{ asset('f/js/popper.min.js')}} "></script>
  <script src="{{ asset('f/js/bootstrap.min.js')}} "></script>
  <script src="{{ asset('f/js/OneSignal/OneSignalSDKUpdaterWorker.js')}} "></script>
  <script src="{{ asset('f/js/OneSignal/OneSignalSDKWorker.js')}} "></script>
  <script src="{{ asset('f/js/pekalonganinfo.js')}} "></script>
  <script src="{{ asset('b/js/jquery.validate.min.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
      OneSignal.init({
        appId: "7fbe2d0d-6194-457a-abee-dd4c782be3f2",
      });
    });
  </script>
  @stack('scripts')
</body>
</html>
