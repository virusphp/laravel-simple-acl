@extends('layouts.b.master')
@section('content')
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title"> </div>
            	<div class="title_left">
					<ul class="breadcrumb">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="{{ route('categories.index') }}">Categories</a></li>
						<li class="active">Edit</li>
					</ul>
            	</div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<h3><i class="fa fa-list"></i> Edit Category</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
						<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
									{!! Form::label('title','Name',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
									<div class="col-md-6 col-sm-6 col-xs-12">
										{!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
										{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
									</div>
							</div>
							<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
								{!! Form::label('title','Parent id',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
									<div class="col-md-6 col-sm-6 col-xs-12">
										{!! Form::text('parent_id', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
										{!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
									</div>
							</div>

							<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-3">
									{!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
									{!! Form::submit(isset($category) ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
				   {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
@endsection
