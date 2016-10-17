@extends('layouts.app')

@section('content')
    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <ul>
                            <li>{!! link_to_route('index_path', 'Set Roles') !!}</li>
                            <li>{!! link_to_route('index_path', 'Set Permissions') !!}</li>
                            <li>{!! link_to_route('index_path', 'Reset Password') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">

                        {!! Form::model($user, ['route' => ['editUserSettings', $user->username], 'method' => 'PATCH']) !!}

                        @include ('users.forms._form')

                        <div class="form-group">
                            {!! Form::submit('Update User', ['class' => 'btn btn-default']) !!}

                            {{ Form::button(
                                '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back',
                                [
                                    'class' => 'btn btn-warning',
                                    'onclick' => "window.history.back()"]
                             )}}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop