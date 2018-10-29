<div class="my-3 p-3 bg-white rounded shadow-sm">
  <h6 class="border-bottom border-primary pb-2 mb-1">POPULER</h6>
  @foreach($populer as $po)
  <div class="media text-muted pt-3">
    <img class="mr-2 rounded img-fluid" style="width:120px; height:100px;" src="{{ $po->ImageThumbUrl }}" alt="{{ $po->slug }}">
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-left">
      <strong class="d-block text-gray-dark ">{{ $po->category->name }}</strong>{{ $po->title }}<br>
        <a href="{{ route('show.post', $po->slug) }}"><strong>Read More</strong></a>
    </p>
  </div>
  @endforeach
  <small class="d-block text-right mt-3">      <a href="#">All updates</a>
      </small>
</div>
