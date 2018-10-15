@extends('layouts.f.master')
@section('title', 'Dasboard')
@push('css')
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
              @foreach($utama as $u)
              <div class="col-md-4 eckcon">
                <a href="https://www.ebubekirbastama.com">
                  <img class="mediasliderimage" src="{{ $u->ImageThumbUrl }}" alt="{{ $u->slug }}" style="max-width:100%;">
                  <div class="overlay">
                    <div class="text-justify text mx-auto">{{ $u->title }}
                      <p>
                        <button type="submit" class="btn-cont">Continue reading<i class="fas fa-angle-double-right animated fadeInLeft infinite"></i></button>
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
         CONTENT POST
        </h3>
      <div class="row">
        <div class="card-group">
          @php $no = 1 @endphp
          @foreach($blogutama as $bl)
          <div class="card">
            <div class="image-post">
              <img class="card-img-top image" src="{{ $bl->ImageThumbUrl }}" alt="{{ $bl->slug }}" style="max-width:100%;">
              <div class="middle">
                <h3 class="pb-1 mb-1 font-bold">share</h3>
                <div class="share text-center animated bounce">
                  <a href="https://twitter.com">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://facebook.com">
                    <i class="fab fa-facebook"></i>
                  </a>
                  <a href="https://instagram.com">
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">{!! $bl->TitlePost !!}</h5>
              <p class="card-text">
                {{--  {!! $bl->BodyPost !!}  --}}
              </p>
            </div>
            <div class="card-footer">
              <small class="text-muted">{{ $bl->Date }}</small>
              <a href="javascript:void(0)" class="float-right">
                <button type="submit" class="btn-cont">Continue reading<i class="fas fa-angle-double-right animated fadeInLeft infinite"></i></button>
              </a>
            </div>
          </div>
          @if($no++%2 == 0 )
        </div>
      </div>
      <div class="row">
        <div class="card-group">
          @endif
          @endforeach
        </div>
      </div>
      @foreach($random as $ra)
      <div class="row py-4">
        <div class="col-md-12 card border bg-white">
          <article>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <figure class="py-2">
                  <img src="{{ $ra->ImageThumbUrl }}" class="img-post-right img-fluid">
                </figure>
              </div>
              <div class="col-sm-6 col-md-8">
                <h5 class="py-1">{{ $ra->TitlePost }}</h5>
                {!! $ra->BodyPost !!}
                <hr>
                <section>
                  <span class="badge badge-primary">
                        <i class="fa fa-user"></i> {{ $ra->user->name }}
                        </span>
                  <span class="badge badge-primary">
                        <i class="fa fa-calendar"></i> {{ $ra->Date }}
                        </span>
                  <a href="javascript:void(0)" class="float-right mb-1">
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
      <!-- /.blog-post -->
      <nav class="blog-pagination py-3">
        <a class="btn btn-outline-primary " href="# ">Older</a>
        <a class="btn btn-outline-secondary disabled " href="# ">Newer</a>
      </nav>
    </div>
    <!-- widgets -->
    <aside class="col-md-4 blog-sidebar">
      @include('f.widgets.terkini')
      @include('f.widgets.populer')
      @include('f.widgets.categori')
      @include('f.widgets.followus')
    </aside>
  </div>
</main>
</div>
@include('f.iklans.iklanwebkanan')
@endsection
