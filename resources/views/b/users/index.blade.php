@extends('layouts.b.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <ul class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('users.index') }}">Users</a></li>
          <li class="active">All User | Create</li>
        </ul>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="x_panel">
        @if (session('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
        </div>
        @endif
        @if (! $users->count())
        <div class="alert alert-danger">
          <strong>No Record</strong>
        </div>
        @else
        <div class="x_content">
          @include('b.users.table')

          <div class="ln_solid clearfix"></div>
          <div>
            <div class="pull-left">
              {!! $users->links() !!}
            </div>
            <div class="pull-right">
              {{ $userCount }} {{ str_plural('Item', $userCount) }}
            </div>
          </div>

        </div>
        @endif
      </div>
    </div>

      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="x_panel">

            <div class="x_title">
              <h3><i class="fa fa-list"></i> Tambah User</h3>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              @if(!empty($edit))
                @include('b.users.edit')
              @elseif(!empty($password))
                @include('b.users.gantipassword')
              @else
                @include('b.users.create')
              @endif
            </div>

          </div>
        </div>
      </div>

  </div>
  </div>
  </div>
</div>
@endsection
@include('b.users.script')
@push('scripts')
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;
      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;
      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;
      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
    }
  @endif
</script>
@endpush
