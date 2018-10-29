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
<div class="container">
  <div class="row slider-post">
    @foreach($sliderblog as $sl)
    <div class="col-md-4 col-sm-6">
      <div class="box">
        <img src="{{ $sl->ImageThumbUrl }}" alt="{{ $sl->slug }}">
        <div class="box-content">
          <p class="description">
            {!! $sl->title !!}
          </p>
          <a href="{{ route('show.post', $sl->slug) }}" class="read-more">selengkapnya</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<main role="main " class="container py-4">
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
      <div class="infinite-scroll">
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
                    <button type="submit" class="btn-cont">Baca selanjutnya
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
      {{ $bloglatest->links() }}
    </div>
      @endif
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
<script src="https://unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript">
  $(function() {

    $('#da-slider').cslider({
      autoplay: true,
      bgincrement: 450
    });

  });
  $(function() {
    $('.slider-post').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: false,
      dots: false,
      pauseOnHover: false,
      responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 4
        }
      }, {
        breakpoint: 520,
        settings: {
          slidesToShow: 3
        }
      }]
    });
  });

  $('ul.pagination').hide();
  $(function() {
      $('.infinite-scroll').jscroll({
          autoTrigger: true,
          loadingHtml: '<img class="center-block" src="{{ asset('f/loading.gif') }}" alt="Loading..." width="100px"/>',
          padding: 0,
          nextSelector: '.pagination li.active + li a',
          contentSelector: 'div.infinite-scroll',
          callback: function() {
              $('ul.pagination').remove();
          }
      });
  });

</script>
@endpush
