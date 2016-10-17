<div class="col-md-12 col-sm-12 col-xs-12 personal-info">

    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}" id="firstname">
        {!! Form::label('firstname', 'First Name:') !!}
        {!! Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
        {!! $errors->first('firstname', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}" id="lastname">
        {!! Form::label('lastname', 'Last Name:') !!}
        {!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
        {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}" id="dob">
        {!! Form::label('dob', 'Date of Birth:') !!}
        <div class="input-group">
            {!! Form::input('text', 'dob', null, ['class' => 'form-control hasDatePicker', 'placeholder' => 'Date of Birth', 'id' => 'date']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>

    {!! Form::label('gender', 'Gender:') !!}
    <div class="input-group {{ $errors->has('gender') ? 'has-error' : '' }}" id="gender">
        <span class="input-group-addon">
        {!! Form::radio('gender', 'male') !!}
        </span>
        {!! Form::input('text', 'gender_male', 'Male', ['class' => 'form-control', 'readonly']) !!}

        <span class="input-group-addon">
        {!! Form::radio('gender', 'female') !!}
        </span>
        {!! Form::input('text', 'gender_female', 'Female', ['class' => 'form-control', 'readonly']) !!}
    </div>
    <br>

    <div class="form-group {{ $errors->has('postal_address') ? 'has-error' : '' }}" id="postal_address">
        {!! Form::label('postal_address', 'Postal Address:') !!}
        {!! Form::textarea('postal_address', null, ['placeholder' => 'Postal Address', 'class' => 'form-control', 'size' => '50x4']) !!}
        {!! $errors->first('postal_address', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('physical_address') ? 'has-error' : '' }}" id="physical_address">
        {!! Form::label('physical_address', 'Physical Address:') !!}
        {!! Form::textarea('physical_address', null, ['placeholder' => 'Physical Address', 'class' => 'form-control', 'size' => '50x4']) !!}
        {!! $errors->first('physical_address', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group pull-right">
        {{Form::button(
            '<span class="glyphicon glyphicon-user"></span> Update User',
            [
                'type' => 'submit',
                'class' => 'btn btn-default']
         )}}

        {{ Form::button(
            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete User',
            [
                'class' => 'btn btn-danger',
                'data-toggle' => 'modal',
                'data-target' => '#myModal'
            ]
         )}}
    </div>

</div>

