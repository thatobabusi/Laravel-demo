@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add A New Song</div>
                    <div class="panel-body">

                        {!! Form::open(['route' => 'store_path']) !!}

                        @include ('songs._form')

                        <div class="form-group">
                            {{Form::button('<span class="glyphicon glyphicon-music"></span> Create Song', ['type' => 'submit', 'class' => 'btn btn-default'])}}

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