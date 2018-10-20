<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between nav-menu bg-white">
      @foreach($categories as $ca)
      <a class="p-2 text-menu" href="#">{{ $ca->name }}</a>
      @endforeach
    </nav>
  </div>
