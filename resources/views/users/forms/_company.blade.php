<div class="col-md-12 col-sm-6 col-xs-12">

    <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}" id="company_error">
        {{ Form::label('company', 'Company:') }}
        {{ Form::text('company', old('company'), ['class' => 'form-control'])}}
        {!! $errors->first('company', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}" id="company">
        {{ Form::label('department', 'Department:') }}
        {{ Form::select('department',
            $departments->lists('department','id'), old('department'),
            ['class' => 'form-control']) }}
        {!! $errors->first('department', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}" id="department">
        {{ Form::label('phone', 'Phone No:') }}
        {{ Form::text('phone', old('phone'), ['placeholder' => 'Phone No', 'class' => 'form-control']) }}
        {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}" id="address">
        {{ Form::label('address', 'Company Address:') }}
        {{ Form::textarea('address', old('address'), ['placeholder' => 'Company Address', 'class' => 'form-control', 'size' => '50x4']) }}
        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
    </div>



</div>