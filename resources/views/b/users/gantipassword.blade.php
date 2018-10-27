{!! Form::model($password, ['route' => ['ganti.password', $password->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <p>Ganti Password <b>{{ $password->name }}</b></p>
            </div>
            <div class="x_content">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" name="password" class="form-control col-md-8 col-xs-12" placeholder="Password">
                        {!! $errors->first('password', '<p class="help-block"><b>:message</b></p>') !!}
                    </div>
                </div>
                <br><br>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::submit(isset($edit) ? 'Update' : 'Ganti Password', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
