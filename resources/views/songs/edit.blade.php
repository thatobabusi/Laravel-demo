@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $song->title }} Edit</div>
                    <div class="panel-body">

                        {!! Form::model($song, ['route' => ['update_path', $song->slug], 'method' => 'PATCH']) !!}

                        @include ('songs._form')

                        <div class="form-group">
                            {!! Form::submit('Update Song', ['class' => 'btn btn-default']) !!}
                        </div>

                        {!! Form::close() !!}

                        {!! delete_form(['destroy_path', $song->slug]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop