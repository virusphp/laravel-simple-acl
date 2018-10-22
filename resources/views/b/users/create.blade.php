@extends('layouts.b.master')
@section('content')
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title"> </div>
            	<div class="title_left">
					<ul class="breadcrumb">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="{{ route('users.index') }}">Users</a></li>
						<li class="active">Create</li>
					</ul>
            	</div>
			
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					           <h3><i class="fa fa-list"></i> Tambah User</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                      {!! Form::model($user,[
                          'route'=>'users.store', 
                          'file'=>TRUE,
                          'class'=> 'form-horizontal form-label-left',
                          'id'=> 'user-form'
                      ]) !!}

                      @include('b.users._form')

                      {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
@endsection
@include('b.users.script')