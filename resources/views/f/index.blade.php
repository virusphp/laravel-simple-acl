@extends('layouts.f.master')
@section('title', 'Dasboard')
@section('iklanwebkiri')
@include('f.iklans.iklanwebkiri')
@endsection @section('content')
@include('f.widgets.sliders')
<div class="row py-4">
  @foreach($utama as $u)
  <div class="col-md-6">
    <div class="card flex-md-row mb-4 h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <strong class="d-inline-block mb-2 text-judul">{{ $u->category->name }}</strong>
        <h6 class="mb-0"><span class="text-dark">{{ $u->TitlePost }}</span></h6>
        <div class="mb-1 text-muted">
          {{ $u->PublishAt }}
        </div>
        <p class="card-text mb-auto">
          {{ $u->BodyPost }}
        </p>
        <a href="javascript:void(0)">
          <button type="submit" class="btn-cont">Continue reading <i class="fas fa-angle-double-right animated fadeInLeft infinite"></i></button>
        </a>
      </div>
      <img class="card-img-right flex-auto d-none d-lg-block" src="{{ $u->ImageThumbUrl }}" alt="{{ $u->title }}">
    </div>
  </div>
  @endforeach
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
              <img class="card-img-top image" src="{{ $bl->ImageThumbUrl }}" alt="{{ $bl->title }}">
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
              <h5 class="card-title">{{ $bl->TitlePost }}</h5>
              <p class="card-text">
                {{ $u->BodyPost }}
              </p>
            </div>
            <div class="card-footer">
              <small class="text-muted">{{ $u->Date }}</small>
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
      <div class="row py-4">
        <div class="col-md-12 card border bg-white">
          <article>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <figure class="py-2">
                  <img src="http://placeimg.com/180/180/people" class="img-post-right img-fluid">
                </figure>
              </div>
              <div class="col-sm-6 col-md-8">
                <h5 class="py-1">Raymond Dragon</h5>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                <hr>
                <section>
                  <span class="badge badge-primary">
                        <i class="fa fa-user"></i> admin
                        </span>
                  <span class="badge badge-primary">
                        <i class="fa fa-calendar"></i> 01-january-2018
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
