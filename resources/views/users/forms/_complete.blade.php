<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="text-center">
        <img src="{{ URL::asset('images/exclamation2.png') }}" class="avatar img-circle img-thumbnail" width="100" height="100" alt="avatar">
    </div>
</div>

<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
    <div class="form-group">
        <h1>Congratulations {{ $user->username }}! You have completed you profile.</h1>
    </div>
    <div class="form-group">
        <a class="btn btn-success" onclick="goToProfile()">Go to Profile</a>
        <a class="btn btn-primary" href="/users">Done</a>
    </div>

</div>