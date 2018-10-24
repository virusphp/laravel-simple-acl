{!! Form::model($edit, ['route' => ['users.update', $edit->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    <div class="x_content">
        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::text('name', null, ['id'=> 'name', 'placeholder' => 'Nama', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Nama Dilarang Kosong']) !!}
                {!! $errors->first('name', '<p class="help-block"><b>:message</b></p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! Form::text('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Email Dilarang Kosong']) !!}
            {!! $errors->first('email', '<p class="help-block"><b>:message</b></p>') !!}
        </div>
        {!! Form::hidden('slug', null, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}
        <div class="form-group { $errors->has('role_id') ? 'has-error' : '' }}">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::select('role_id', App\Role::pluck('name', 'id'), null, ['placeholder' => 'Pilih Role', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Silahkan Pilih Role']) !!}
                {!! $errors->first('role_id', '<p class="help-block"><b>:message</b></p>') !!}
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                {!! Form::submit(isset($edit) ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}
