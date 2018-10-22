@extends('layouts.b.master')
@section('content')
     <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
				<div class="title_left">
					<ul class="breadcrumb">
						<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li><a href="{{ route('blogs.index') }}">Post</a></li>
						<li class="active">All</li>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p>
                    <a href="{{ route('blogs.create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></a>
                    <a href="{{ route('blogs.filter', 'filter=publish') }}"><button class="btn btn-success btn-sm pull-right">Publish</button></a>
                    <a href="{{ route('blogs.filter', 'filter=schedule') }}"><button class="btn btn-primary btn-sm pull-right">Schedule</button></a>
                    <a href="{{ route('blogs.filter', 'filter=draft') }}"><button class="btn btn-warning btn-sm pull-right">Draft</button></a>
                </p>

                <div class="x_panel">
					@include('b.blogs.partials.message')

					@if (! $posts->count())
						<div class="alert alert-danger">
							<strong>No Record</strong>
						</div>
					@else
						<div class="x_content">
							@include('b.blogs.table')
						</div>
					@endif

					<div class="ln_solid clearfix"></div>
					<div>
						<div class="pull-left">
							{!! $posts->links() !!}
						</div>
						<div class="pull-right">
							{{ $postCount }} {{ str_plural('Item', $postCount) }}
						</div>
					</div>

				</div>
			</div>
        </div>
    </div>
@endsection
