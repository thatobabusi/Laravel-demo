@extends('layouts.app')

@section('content')

    <div class="container spark-screen">
        <div class="row bootstrap snippets">
            <div class="col-md-7 col-sm-5">
                <h2>Users</h2>
            </div>
            <div class="col-md-3 col-sm-5">
                <form method="get" role="form" class="search-form-full">
                    <div class="form-group">
                        <input type="text" class="form-control" name="s" id="search-input" placeholder="Search...">
                        <i class="entypo-search"></i>

                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-3">
                <button type="button" class="btn btn-primary" aria-label="Left Align"
                        onclick="window.location='{{ url("users/create") }}'">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create User
                </button>
            </div>
        </div>

        @foreach($users as $user)
            <div class="member-entry">
                <a href="#" class="member-img">
                    <img src="http://bootdey.com/img/Content/avatar/avatar{!! $user->id!!}.png" class="img-rounded">
                    <i class="fa fa-forward"></i>
                </a>
                <div class="member-details">
                    <h4>{!! link_to_route('showUsers_path', $user->firstname . ' ' . $user->lastname, [$user->username]) !!}</h4>
                    <div class="row info-list">
                        <div class="col-sm-4">
                            <i class="fa fa-briefcase"></i>
                            {{ isset($user->Department->first()->department) ? $user->Department->first()->department : 'Not Set' }}
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-building"></i>
                            <a href="#">{{ isset($user->Company->first()->company) ? $user->Company->first()->company : 'Not Set' }}</a>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-calendar"></i>
                            {{ isset($user->dob) ? $user->dob : 'Not Set' }}
                        </div>
                        <div class="clear"></div>
                        <div class="col-sm-4">
                            <i class="fa fa-globe"></i>
                            {{ isset($user->physical_address) ? $user->physical_address : 'Not Set' }}
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{ $user->email }}" target="_top">{{ $user->email }}</a>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-phone"></i>
                            {{ isset($user->Company->first()->phone) ? $user->Company->first()->phone : 'Not Set' }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $users->links() !!}
    </div>

@stop