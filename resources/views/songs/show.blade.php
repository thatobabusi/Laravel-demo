@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Linken Park Fan Page</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <h2>{{ $song->title }}</h2>

                            @if ($song->lyrics)
                                <article class="lyrics">
                                    {!! nl2br($song->lyrics) !!}
                                </article>
                            @endif

                        </div>

                        <div class="form-group">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" aria-label="Left Align"
                                        onclick="window.location='{{ url("songs/{$song->slug}/edit") }}'">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Song
                                </button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" aria-label="Left Align"
                                        onclick="window.location='{{ url("songs") }}'">
                                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">List Of Songs</div>
                    <div class="panel-body">

                        @foreach($songs as $song)
                            <li><a href="/songs/{{ $song->slug }}"> {{ $song->title }}</a></li>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <li><a href="{{ url('/songs/create') }}">Create</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
