    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		{!! Form::label('name','Name',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			{!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	{{-- slug --}}
	{!! Form::hidden('slug', null, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}

	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-3">
			{!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
			{!! Form::submit(isset($category) ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>

