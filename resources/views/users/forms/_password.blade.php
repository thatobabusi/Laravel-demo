<div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
    {!! Form::label('current_password', 'Current Password:') !!}
    {!! Form::password('current_password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    {!! $errors->first('current_password', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
    {!! Form::label('new_password', 'New Password:') !!}
    {!! Form::password('new_password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    {!! $errors->first('new_password', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
    {!! Form::label('new_password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('new_password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    {!! $errors->first('new_password_confirmation', '<span class="help-block">:message</span>') !!}
</div>