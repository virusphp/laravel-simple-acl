<div class="col-md-9 col-sm-9 col-xl-12">
	<div class="x_panel">
		<div class="x_content">
			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
				<div class="col-md-12 col-sm-12 col-xs-12">
					{!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'title' => 'Title tidak boleh kosong', 'placeholder' => 'Title . . .']) !!}
					{!! $errors->first('title', '<p class="help-block"><b>:message</b></p>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
				<div class="col-md-12 col-sm-12 col-xs-12">
					{!! Form::textarea('body', null, ['id' => 'editor', 'class'=>'form-control', 'required' => 'required', 'title' => 'Body Dilarang Kosong'])!!}
                    {!! $errors->first('body', '<p class="help-block"><b>:message</b></p>') !!}
                </div>
			</div>
		</div>
	</div>
</div>

{!! Form::hidden('slug', null, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}
{!! Form::hidden('user_id', Auth::user()->id, ['id' => 'slug','class' => 'form-control col-md-7 col-xs-12']) !!}

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="x_panel">

		<div class="x_title">
			<p>Category</p>
		</div>
		<div class="x_content">
			<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
				<div class="pull-left">
				  	{!! Form::select('category_id', App\Category::pluck('name', 'id'), null, ['placeholder' => 'Pilih Category', 'class' => 'form-control col-md-8 col-xs-12', 'required' => 'required', 'title' => 'Silahkan Pilih Category']) !!}
					{!! $errors->first('category_id', '<p class="help-block"><b>:message</b></p>') !!}
				</div>
				<div class="pull-right">
           	 		<a href="#" id="add-cat-btn" class="btn btn-default btn-block">Add</a>
				</div>
			</div>
			<div class="row">
				<div class="form-group" id="add-new-cat" style="display: none;">
				  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="input-group">
					  <input type="text" name="name" id="new_cat" class="form-control">
					  <span class="input-group-btn">
						<a href="#" id="add-new-btn" class="btn btn-default">
						  <i class="glyphicon glyphicon-ok"></i>
						</a>
					  </span>
					</div>
				  </div>
				</div>
			</div>
			{!! Form::hidden('cat-slug', null, ['id' => 'cat-slug','class' => 'form-control col-md-7 col-xs-12']) !!}
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
					 <img src="{{ ($post->ImageThumbUrl) ? $post->ImageThumbUrl : 'http://placehold.it/224x120&text=No+Image' }}" class="img" id="img" alt="...">
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
		<div class="x_title">
			<p>Published Date</p>
		</div>

	 	<div class="x_content">
			<div class="form-group">
				<div class='input-group date' id='datetimepicker1'>
					{!! Form::text('published_at', null, ['id' => 'published_at', 'class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>

			<div class="ln_solid clearfix"></div>

			<div>
				<div class="pull-left">
					<a id="draft-btn" class="btn btn-default" href="#">Save Draft</a>
				</div>
				<div class="pull-right">
					{!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>

	  	</div>
	</div>
</div>
