<div class="col-md-12 col-sm-6 col-xs-12">

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

    <div class="form-group pull-right" style="padding-top: 15px ">
        {{ Form::button(
            '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Capture Address',
            [
                'class' => 'btn-submit btn btn-default',
                'href' => '#company_details',
                'name' => 'address_form']
         )}}
    </div>

</div>