@extends('layouts.b.master')
@section('content')
     <!-- page content -->
<div class="right_col" role="main">
  <div class="">

		<div class="page-title">

			<div class="title_left">
				<ul class="breadcrumb">
					<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="{{ route('users.index') }}">Users</a></li>
					<li class="active">All</li>
				</ul>
			</div>

			@include('b.users.partials.search')

		</div>

    <div class="clearfix"></div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<p><a href="{{ route('users.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> </a></p>

		<div class="x_panel">

			<div class="x_content">
				@include('b.users.table')
			</div>
			
			<!-- paginate -->
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
	</div>

  </div>
</div>
@endsection
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
