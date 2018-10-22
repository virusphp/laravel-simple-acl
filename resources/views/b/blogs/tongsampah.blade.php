@extends('layouts.b.master')
@section('content')
     <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
				<div class="title_left">
					<ul class="breadcrumb">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li class="active">Post</li>
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

                <div class="x_panel">
					@if (session('flash_notification.message'))
					<div class="alert alert-{{ session('flash_notification.level') }}">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{!! session('flash_notification.message') !!}
					</div>
					@endif
					@if (! $posts->count())
						<div class="alert alert-danger">
							<strong>No Record</strong>
						</div>
					@else
						<div class="x_content">
                            <table class="table table-responsive table-bordered table-striped jambo_table bulk_action">
                                <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Author</th>
                                      <th>Category</th>
                                      <th>Date</th>
                                      <th>Action</th>
                                  </tr>
                                </thead>
                                  <?php $no=1; ?>
                                  @foreach($posts as $post)
                                <tbody>
                                  <tr>
                                      <td scope="row">{{ $no++ }}</td>
                                      <td>{{ substr($post->title,0, 50) }}{{ strlen($post->title) > 50 ? "..." : "" }}</td>
                                      <td>{{ $post->user->name }}</td>
                                      <td>{{ $post->category->name }}</td>
                                      <td>
                                          {{ tanggalIndo($post->published_at) }}
                                          {!! $post->publicationLabel() !!}
                                      </td>
                                      <td>
                                          <a href="{{ route ('blogs.restore',$post->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Kembali Ke Post">
                                              <i class="fa fa-reply"></i>
                                          </a>
                                          <a href="{{ route ('blogs.forceDestroy',$post->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus Permanent">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                      </td>
                                  </tr>
                                </tbody>
                                @endforeach
                              </table>

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
					@endif
				</div>
			</div>
        </div>
    </div>
@endsection
