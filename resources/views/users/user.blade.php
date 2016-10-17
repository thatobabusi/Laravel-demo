@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row panel">
            <div class="col-md-4 bg_blur ">
            </div>
            <div class="col-md-8  col-xs-12">
                <img src="{{ URL::asset('images/avatar.png') }}" class="img-thumbnail picture hidden-xs"/>
                <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
                <div class="header">
                    <h1>{{ $user->firstname . ' ' . $user->lastname }}</h1>
                    <h4>Web Developer</h4>
                    <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                          "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
                    </span>
                </div>
            </div>
        </div>

        <div class="row nav">
            <div class="col-md-4"></div>
            <div class="col-md-8 col-xs-12" style="margin: 0px;padding: 0px;">
                <div class="col-md-4 col-xs-4 well1"><i class="fa fa-weixin fa-lg"></i> 16</div>
                <div class="col-md-4 col-xs-4 well2"><i class="fa fa-heart-o fa-lg"></i> 14</div>
                <div class="col-md-4 col-xs-4 well3"><i class="fa fa-thumbs-o-up fa-lg"></i> 26</div>
            </div>
        </div>

        <hr class="invisible">
        <div class="panel panel-primary">
            <div class="panel-heading">User Profile</div>
            <div class="panel-body">
                This page is still currently under construction
            </div>
        </div>

        <div class="form-group">
            <div class="btn-group">
                <button type="button" class="btn btn-default" aria-label="Left Align"
                        onclick="window.location='{{ url("users/{$user->username}/edit") }}'">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit User
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-warning" aria-label="Left Align"
                        onclick="window.location='{{ url("users") }}'">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                </button>
            </div>
        </div>
    </div>


@stop