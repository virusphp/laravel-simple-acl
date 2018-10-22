    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		{!! Form::label('name','Name',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	{!! Form::hidden('slug', null, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}

	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		{!! Form::label('email','E-Mail',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{!! Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
			{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
		{!! Form::label('password','Password',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{!! Form::password('password', ['class' => 'form-control col-md-7 col-xs-12']) !!}
			{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
		{!! Form::label('password_confirmation','Password Confirmasi',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{!! Form::password('password_confirmation', ['class' => 'form-control col-md-7 col-xs-12']) !!}
			{!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-3">
			{!! Form::submit($user->exists ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
			<a href="{{ route('users.index') }}" class="btn btn-success">Batal</a>
		</div>
	</div>

