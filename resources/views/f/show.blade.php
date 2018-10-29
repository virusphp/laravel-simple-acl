@extends('layouts.f.master')
@section('title', $post->title)
@push('css')
@endpush
@section('iklanwebkiri')
@include('f.iklans.iklanwebkiri')
@endsection
@section('content')
<div class="container">
  <img src="{{ $post->ImageUrl }}" class="img-fluid" alt="{{ $post->slug }}">
      </div>
  <main role="main" class="py-4">
    <div class="row">
      <div class="col-md-8 blog-main ">
        <div class="blog-post">
          <h5 class="blog-post-title">{{ $post->title }}</h5>
          <p class="blog-post-meta">
            <i class="fa fa-calendar"></i> {{ tanggalIndo($post->published_at) }} |
            <i class="fa fa-users"></i> {{ $post->view_count }} x dibaca |
            <a href="# "><i class="fa fa-user"></i> {{ $post->user->name }}</a>
          </p>
          <hr>
          <div class="blog-post-body d-block">
            {!! $post->body !!}
          </div>
        </div>
        <nav class="blog-pagination py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-8 float-left sosial-media">
              <a href="#"><b>BAGIKAN KE :</b></a>
              <a href="https://twitter.com">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://facebook.com">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="https://instagram.com">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="whatsapp://send?text={{ url()->full()}}" data-action="share/whatsapp/share">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
          </div>
          <hr>
          <div class="fb-comments" data-href="{{ url()->full()}}" data-numposts="10"></div>
          <div id="fb-root"></div>
          <script>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s);
              js.id = id;
              js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.1';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

          </script>
        </nav>
      </div>
      <!-- widgets -->
      <aside class="col-md-4 blog-sidebar">
        @include('f.widgets.terkini')
        @include('f.widgets.populer')
        @include('f.widgets.followus')
      </aside>
    </div>
  </main>
</div>
@include('f.iklans.iklanwebkanan')
@endsection
