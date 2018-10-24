<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-11 align-items-center form-search ">
        <form action="{{ url('/') }}" method="get" class="animated fadeInDown">
          <input type="text" class="form-control input-text" name="" placeholder="cari..." id="">
        </form>
      </div>
      <div class="col-1 d-flex justify-content-end align-items-left">
        <a class="btn btn-sm btn-outline-primary align-items-center btn-close" href="#"><i class="fa fa-times-circle"></i></a>
      </div>
    </div>
    <div class="row flex-nowrap justify-content-between align-items-center header-logo">
      <div class="col-4 float-left sosial-media">
        <a href="https://twitter.com/pekalongan_info">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.facebook.com/pekalonganinfo">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.instagram.com/pekalonganinfo">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{ url('/') }}"><img src="{{ asset('f/image/web-logo.png') }}" class="img-logo" alt="" srcset=""></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-primary btn-search" href="#"><i class="fa fa-search"></i></a>
      </div>
    </div>
  </header>
