@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">




            <div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">

                        {!! Form::model($user, ['route' => ['updatePassword_path', $user->username], 'method' => 'PATCH']) !!}

                        @include ('users.forms._password')

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

            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3 hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <ul>
                            <li>
                                <a data-toggle='modal' data-target = '#myModal'>Delete User</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop