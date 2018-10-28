<div class="col-md-9 col-sm-9 col-xl-12">
	<div class="x_panel">
		<div class="x_content">
			<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
				<div class="col-md-12 col-sm-12 col-xs-12">
					{!! Form::url('link', null, ['id' => 'title', 'class' => 'form-control col-md-7 col-xs-12','title' => 'Title tidak boleh kosong', 'placeholder' => 'link . . .']) !!}
					{!! $errors->first('link', '<p class="help-block"><b>:message</b></p>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
				<div class="col-md-12 col-sm-12 col-xs-12">
					{!! Form::textarea('content', null, ['class'=>'form-control', 'required' => 'required', 'title' => 'Body Dilarang Kosong', 'placeholder' => 'content . . .'])!!}
                    {!! $errors->first('content', '<p class="help-block"><b>:message</b></p>') !!}
                </div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<p>Fiture Image</p>
		</div>

	 	<div class="x_content  {{ $errors->has('image') ? 'has-error' : '' }}">
			<div class="row">
				<div class="image view view-first" style="width:224px; height:120px;">
					 <img src="{{ ($slider->imageSlider) ? $slider->imageSlider : 'http://placehold.it/224x120&text=No+Image' }}" class="img" id="img" alt="...">
                    {!! Form::file('image', ['id' => 'image', 'class' => 'image-thumb']) !!}
				</div>
				<div class="clearfix"></div>
				<div class="text-center">
					<button type="button" id="browser_file" class="btn btn-primary form-control">
						<i class="fa fa-camera"></i>
					</button>
                </div>
                {!! $errors->first('image', '<p class="help-block"><b>:message</b></p>') !!}
            </div>
		  </div>
	</div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="x_panel">
	 	<div class="x_content">
			<div class="ln_solid clearfix"></div>

			<div>
				<div>
                        {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit(isset($edit) ? 'Update' : 'Simpan', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

	  	</div>
	</div>
</div>
