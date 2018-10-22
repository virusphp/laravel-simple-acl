@extends('layouts.b.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <ul class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">user</li>
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
          <table class="table table-responsive table-bordered table-striped jambo_table bulk_action">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php $no=1; ?>
            @foreach($users as $user)
            <tbody>
              <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="label label-success">{{ $user->roles()->pluck('name') }}</span></td>
                <td>
                {!! Form::open(['route' => ['users.destroy',$user->id], 'method' => 'DELETE']) !!}
                  <a href="{{ route ('users.edit',$user->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit User">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="{{ route ('users.password',$user->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ganti Password">
                        <i class="fa fa-key"></i>
                      </a>
                      <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah kamu yakin ingin Menghapus data ini')" >
                            <i class="fa fa-trash-o"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
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
@endsection
@include('b.users.script')
