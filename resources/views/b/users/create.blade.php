{!! Form::model([
    'method' => 'POST',
    'route'=>'users.store',
    'id' => 'form-user',
    'class'=> 'form-horizontal form-label-left form-inputan'
])!!}
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {!! Form::text('name', null, ['id' => 'name', 'placeholder' => 'Nama','class' => 'form-control col-md-7 col-xs-12','title' => 'Nama Dilarang Kosong']) !!}
        </div>
    </div>
    <br><br>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
        {!! Form::text('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Email Dilarang Kosong']) !!}
        {!! $errors->first('email', '<p class="help-block"><b>:message</b></p>') !!}
    </div>
    <br>
    {!! Form::hidden('slug', null, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}
    <br>
    <div class="form-group { $errors->has('role_id') ? 'has-error' : '' }}">
            <div class="col-md-12 col-sm-12 col-xs-12">
            {!! Form::select('role_id', $role, null, ['placeholder' => 'Pilih Role', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Silahkan Pilih Role']) !!}
            {!! $errors->first('role_id', '<p class="help-block"><b>:message</b></p>') !!}
        </div>
    </div>
    <br>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Password dilarang kosong']) !!}
        {!! $errors->first('password', '<p class="help-block"><b>:message</b></p>') !!}
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
        {!! Form::password('password_confirmation', ['placeholder' => 'Password confirmation', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Password dilarang kosong']) !!}
        {!! $errors->first('password_confirmation', '<p class="help-block"><b>:message</b></p>') !!}
    </div>
    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
            {!! Form::submit(isset($edit) ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}