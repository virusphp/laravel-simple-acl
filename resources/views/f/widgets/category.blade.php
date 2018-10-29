<div class="panel panel-default">
          <ul class="list-group">
            <button type="button" class="list-group-item list-group-item-action active btn-cont">
              <h2 class="font-weight-bold" style="font-size:20px;">Category</h2>
            </button>
            @foreach($categories as $cat)
            <li class="list-group-item text-left">
                <div class="col-md-10">
                  <a href="{{ route('category', $cat->slug) }}" ><i class="fa fa-angle-right"></i> {{ $cat->name }} </a>
                  <span class="badge badge-primary badge-pill float-right">{{ $cat->posts->count() }}</span>
                </div>
            </li>
            @endforeach
          </ul>
        </div>
