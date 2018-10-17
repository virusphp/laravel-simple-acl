@extends('layouts.f.master')
@section('title', '-')
@push('css')
@endpush
@section('iklanwebkiri')
@include('f.iklans.iklanwebkiri')
@endsection
@section('content')
<div class="container">
    <img src="{{ $post->ImageUrl }}" class="img-fluid" alt="{{ $post->slug }}">
</div>
<main role="main " class="container py-4">
    <div class="row ">
      <div class="col-md-8 blog-main ">
        <div class="blog-post">
          <h5 class="blog-post-title ">{{ $post->title }}</h5>
          <p class="blog-post-meta ">{{ tanggalIndo($post->published_at) }} by
            <a href="{{ route('author',$post->user->slug) }}">{{ $post->user->name }}</a>
          </p>
          <hr>
          {!! $post->body !!}
        </div>
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
