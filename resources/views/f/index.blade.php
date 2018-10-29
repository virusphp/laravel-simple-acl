@extends('layouts.f.master')
@section('title', '-')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('f/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('f/css/style2.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
<noscript>
    <link rel="stylesheet" type="text/css" href="{{ asset('f/css/nojs.css')}}" />
</noscript>
@endpush
@section('iklanwebkiri')
@include('f.iklans.iklanwebkiri')
@endsection
@section('content')
@include('f.widgets.sliders')
<!--media slider-->
<div class="container py-3">
  <div class="row blog">
    <div class="col-md-12">
      <div id="blogCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              @php $slide = 1 @endphp
              @foreach($sliderblog as $sl)
              <div class="col-md-4 eckcon">
                <a href="{{ route('show.post', $sl->slug) }}">
                  <img class="mediasliderimage" src="{{ $sl->ImageThumbUrl }}" alt="{{ $sl->slug }}" style="max-width:100%;">
                  <div class="overlay">
                    <div class="text-justify text mx-auto">{{ $sl->title }}
                      <p>
                        <button type="submit" class="btn-cont">Baca Selengkapnya<i class="fas fa-angle-double-right animated fadeInLeft infinite"></i></button>
                      </p>
                    </div>
                  </div>
                </a>
              </div>
              @if($slide++%3 == 0 )
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<main role="main " class="container ">
  <div class="row ">
    <div class="col-md-8">
      <h3 class="pb-3 mb-4 font-italic text-center border-bottom ">
         CONTENT PEKALONGAN INFO
      </h3>
      @if(!$bloglatest->count())
        <div class="alert alert-info">
          <p>Tidak ada artikel</p>
        </div>
      @else
        @foreach($bloglatest as $bl)
        <div class="row py-4">
          <div class="col-md-12 card border bg-white">
            <article>
              <div class="row">
                <div class="col-sm-6 col-md-4">
                  <figure class="py-2">
                    <img src="{{ $bl->ImageThumbUrl }}" class="img-post-right img-fluid" alt="{{ $bl->slug }}">
                  </figure>
                </div>
                <div class="col-sm-6 text-left col-md-8">
                  <h5 class="py-1">{{ $bl->TitlePost }}</h5>
                  {!! $bl->BodyPost !!}
                  <hr>
                  <section>
                    <span class="badge badge-primary">
                          <i class="fa fa-user"></i> {{ $bl->user->name }}
                          </span>
                    <span class="badge badge-primary">
                          <i class="fa fa-calendar"></i> {{ $bl->Date }}
                          </span>
                    <a href="{{ route('show.post', $bl->slug) }}" class="float-right mb-1">
                      <button type="submit" class="btn-cont">Continue reading
                        <i class="fas fa-angle-double-right animated fadeInLeft infinite"></i>
                      </button>
                    </a>
                  </section>
                </div>
              </div>
            </article>
          </div>
        </div>
        @endforeach
      @endif
      <!-- /.blog-post -->
      <nav class="blog-pagination py-3">
        <a class="btn btn-outline-primary " href="# ">Older</a>
        <a class="btn btn-outline-secondary disabled" href="# ">Newer</a>
      </nav>
    </div>
    <!-- widgets -->
    <aside class="col-md-4 blog-sidebar">
      @include('f.widgets.terkini')
      @include('f.widgets.populer')
      @include('f.widgets.category')
      @include('f.widgets.followus')
    </aside>
  </div>
</main>
</div>
@include('f.iklans.iklanwebkanan')
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('f/js/modernizr.custom.28468.js')}}"></script>
<script type="text/javascript" src="{{ asset('f/js/jquery.cslider.js') }}"></script>
<script type="text/javascript">
    $(function() {

        $('#da-slider').cslider({
            autoplay	: true,
            bgincrement	: 450
        });

    });
</script>
@endpush
