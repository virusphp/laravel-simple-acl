<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div id="da-slider" class="da-slider">
        @foreach($sliders as $slider)
        <div class="da-slide">
          <p>{{ $slider->content }}</p>
          @if($slider->link != "")
          <a href="{{ $slider->link }}" class="da-link">Selengkapnya </a>
          @else
          @endif
          <div class="img-slide">
            <img src="{{ $slider->ImageSlider }}" class="img-responsive" alt="{{ $slider->content }}" />
        </div>
          </div>
          @endforeach
          <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
          </nav>
        </div>
      </div>
    </div>
  </div>
