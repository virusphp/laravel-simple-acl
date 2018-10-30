@extends('layouts.b.master')
@section('content')
		<div class="right_col" role="main">
      <div class="">
        <div class="page-title"> </div>
          <div class="title_left">
            <ul class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('users.index') }}">User</a></li>
              <li class="active">Create</li>
            </ul>
          </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					          <h3><i class="fa fa-list"></i> Delete Konfirmasi</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <br />
                        {!! Form::open([
                            'route'=> ['categories.store'], 
                            'class'=> 'form-horizontal form-label-left'
                        ]) !!}
                    
                        <div class="col-xs-9">
                            <div class="box">
                                <div class="box-body">
                                    <p>DI sini tempat penghapusan teori</p> 
                                    <p>ID #{{ $user->id }} {{ $user->nama }}</p>
                                    <p>Apa kamu ingin memindahkan kontent pada user ini!!</p>
                                    <p>
                                      <input type="radio" name="delete_option" value="delete"> Deleted All Content
                                    </p>
                                    <p>
                                      <input type="radio" name="delete_option" value="attribute"> Attribute content to user: 
                                      {!! Form::select('akun_user', $users, null)  !!}
                                    </p>
                                </div> 
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