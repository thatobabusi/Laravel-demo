<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="text-center">
        <img src="{{ URL::asset('images/avatar.png') }}" class="avatar img-circle img-thumbnail" width="150"
             height="150" alt="avatar">
        <h6>Upload a different photo...</h6>
    </div>
</div>

<div class="col-md-8 col-sm-6 col-xs-12 personal-info">

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

    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}" id="username">
        {!! Form::label('username', 'Username:') !!}
        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="email">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}" id="password">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" id="password_confirmation">
        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
        {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
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

    {!! Form::label('gender', 'Gender:') !!}
    <div class="input-group {{ $errors->has('gender') ? 'has-error' : '' }}" id="gender">
        <span class="input-group-addon">
        {!! Form::radio('gender', 'male') !!}
        </span>
        {!! Form::input('text', 'gender_text', 'Male', ['class' => 'form-control', 'readonly']) !!}

        <span class="input-group-addon">
        {!! Form::radio('gender', 'female') !!}
        </span>
        {!! Form::input('text', 'gender_text', 'Female', ['class' => 'form-control', 'readonly']) !!}
    </div>

    <div class="form-group pull-right" style="padding-top: 15px ">
        {{ Form::button(
            '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Capture User',
            [
                'class' => 'btn-submit btn btn-default',
                'href' => '#address',
                'name' => 'home_form']
         )}}

        {{ Form::button(
            '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back',
            [
                'class' => 'btn btn-warning',
                'onclick' => "window.history.back()"]
         )}}
    </div>

</div>

