@extends('layouts.app')

@section('content')
    <div class="alert alert-info">
        <strong>Info!</strong> Permissions have not been implemented throughtout the whole system yet.
    </div>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">

                        <div class="board-inner">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active icon-nav"><a href="#personal" data-toggle="tab" title="Personal Details">
                                        <span class="round-tabs one"><i class="glyphicon glyphicon-user"></i></span>
                                    </a></li>
                                <li class="icon-nav"><a href="#company_details" data-toggle="tab" title="Company Details">
                                        <span class="round-tabs three"><i class="glyphicon glyphicon-briefcase"></i></span>
                                    </a></li>
                                <li class="icon-nav"><a href="#settings" data-toggle="tab" title="Permissions">
                                        <span class="round-tabs four"><i class="glyphicon glyphicon-tasks"></i></span>
                                    </a></li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div id="personal" class="row tab-pane fade in active">
                                {!! Form::model($userInfo, ['route' => ['updateUser_path', $user->username], 'method' => 'PATCH']) !!}
                                {!! Form::hidden('hidden_id', $user->id) !!}

                                @include ('users.forms._form')

                                {!! Form::close() !!}
                            </div>

                            <div id="company_details" class="row tab-pane fade in">
                                {!! Form::model($userInfo, ['route' => ['editCompany_path', $user->username], 'method' => 'PATCH']) !!}
                                {!! Form::hidden('hidden_id', $user->id) !!}

                                @include ('users.forms._company')

                                {{Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Update User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )}}

                                {!! Form::close() !!}
                            </div>

                            <div id="settings" class="row tab-pane fade in">
                                {!! Form::model($userInfo, ['route' => ['editPermissions', $user->username], 'method' => 'PATCH']) !!}
                                {!! Form::hidden('hidden_id', $user->id) !!}

                                @include ('users.forms._settings')

                                <div class="form-group">
                                    {{Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Update User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )}}

                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3 hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul>
                            <li>
                                {!! link_to_route('editPassword_path', 'Change Password', [$user->username]) !!}
                            </li>
                            <li>
                                <a data-toggle='modal' data-target = '#myModal'>Delete User</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include ('modal-box.delete-modal')

@endsection

@section('extra_js')
    <script type="text/javascript">
        $(function () {
            $("#company").autocomplete({
                source: "{{ url('users/search/autocomplete') }}",
                minLength: 3,
                select: function (event, ui) {
                    $('#company').val(ui.item.value);
                }
            });
        });
    </script>
@endsection
