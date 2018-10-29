<div id="da-slider" class="da-slider">
    @foreach($sliders as $slider)
    <div class="da-slide">
        {{-- <h2>Easy management</h2> --}}
        <p>{{ $slider->content }}</p>
        <a href="#" class="da-link">Selengkapnya </a>
        <div class="img-slide"><img src="{{ $slider->ImageSlider }}" alt="{{ $slider->content }}" /></div>
    </div>
    @endforeach
    <nav class="da-arrows">
        <span class="da-arrows-prev"></span>
        <span class="da-arrows-next"></span>
    </nav>
</div>
