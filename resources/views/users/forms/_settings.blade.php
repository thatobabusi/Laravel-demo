<div class="form-group">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4 class="panel-title font_white">Roles</h4>
        </div>
        {{ $errors->first('roles', '<span class="help-block">:message</span>') }}
        <div class="panel-body">
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}" id="roles">
                <ul class="list-group">
                    @foreach($roles as $role)
                        <li class="list-group-item">
                            {{ Form::label($role->name, $role->name.':') }}
                            {{ Form::checkbox($role->name,$role->name, $user->hasRole($role->name) ? 'true' : null , ['id' => $role->name,'class'=>'checkbox-inline pull-right']) }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="form-group pull-right" style="padding-right: 15px">

        {{ Form::button(
            '<i class="fa fa-square-o" aria-hidden="true"></i> Toggle Permissions',
            [
                'class' => 'btn btn-default',
                'data-toggled' => 'deselected',
                'id' => 'toggle-permissions']
         )}}

        {{ Form::button(
            '<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Expand All',
            [
                'class' => 'btn-skip btn btn-default',
                'id' => 'toggle-accordion']
         )}}

    </div>
</div>

<div class="form-group">
    <div class="panel-group" id="accordion">

        @foreach($permission_categories as $permission_category)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title font_white">
                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ strtolower($permission_category->name) }}">
                            <span class="icon"><span class="glyphicon glyphicon-chevron-up"></span></span> {{ $permission_category->name }}
                        </a>
                    </h4>
                </div>

                <div id="{{ strtolower($permission_category->name) }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($permission_category->Permissions()->get() as $permission)
                                <li class="list-group-item">
                                    {{ Form::label($permission->name, $permission->name) }}
                                    {{ Form::checkbox($permission->name,$permission->name, $user->hasPermissionTo($permission->name) ? 'true' : null, ['id' => $permission->name,'class'=>'checkbox-inline pull-right']) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach


    </div>


</div>