@extends('layouts.b.master')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="page-title"> </div>
			<div class="title_left">
				<ul class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('categories.index') }}">Post</a></li>
					<li class="active">Create</li>
				</ul>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
					{!! Form::model($post,
						['route' => ['blogs.update', $post->id],
						'files' => true,
						'method' => 'put',
						'class' => 'form-horizontal form-inputan']) !!}
					@include('b.blogs._form')
				{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@include('b.blogs.script')

