@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add A New User</div>
                    <div class="panel-body">
                        <section>
                            <div class="board">
                                <div class="board-inner">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <div class="liner"></div>
                                        <li class="active icon-nav"><a href="#home" data-toggle="tab" title="Personal Details">
                                                <span class="round-tabs one"><i class="glyphicon glyphicon-user"></i></span>
                                            </a></li>
                                        <li class="disabled icon-nav"><a href="#address" data-toggle="tab" title="Address Details">
                                                <span class="round-tabs two"> <i class="glyphicon glyphicon-home"></i></span>
                                            </a></li>
                                        <li class="disabled icon-nav"><a href="#company_details" data-toggle="tab" title="Company Details">
                                                <span class="round-tabs three"><i class="glyphicon glyphicon-briefcase"></i></span>
                                            </a></li>
                                        <li class="disabled icon-nav"><a href="#settings" data-toggle="tab" title="Permissions">
                                                <span class="round-tabs four"><i class="glyphicon glyphicon-tasks"></i></span>
                                            </a></li>
                                        <li class="disabled icon-nav"><a href="#complete" data-toggle="tab" title="completed">
                                                <span class="round-tabs five"><i class="glyphicon glyphicon-ok"></i></span>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        {{ Form::open(['route' => 'storeUser_path', 'name' => 'home_form', 'id' => 'home_form']) }}
                                        {{ Form::hidden('hidden_type', '/users/store') }}

                                        @include ('users.forms._personal')

                                        {{ Form::close() }}
                                    </div>
                                    <div class="tab-pane fade" id="address">
                                        {{ Form::open(['route' => 'storeAddress', 'name' => 'address_form', 'id' => 'address_form']) }}
                                        {{ Form::hidden('hidden_type', '/users/storeAddress') }}

                                        @include ('users.forms._address')

                                        {{ Form::close() }}
                                    </div>
                                    <div class="tab-pane fade" id="company_details">
                                        {{ Form::open(['route' => 'storeCompany', 'name' => 'company_form', 'id' => 'company_form']) }}
                                        {{ Form::hidden('hidden_type', '/users/storeCompany') }}

                                        @include ('users.forms._company')

                                        <div class="form-group pull-right" style="padding-top: 15px ">
                                            {{ Form::button(
                                                '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Capture Company',
                                                [
                                                    'class' => 'btn-submit btn btn-default',
                                                    'href' => '#settings',
                                                    'name' => 'company_form']
                                             )}}
                                        </div>

                                        {{ Form::close() }}

                                    </div>
                                    <div class="tab-pane fade" id="settings">
                                        {{ Form::open(['route' => 'updatePermissions', 'name' => 'settings_form', 'id' => 'settings_form']) }}
                                        {{ Form::hidden('hidden_type', '/users/updatePermissions') }}

                                        @include ('users.forms._settings')

                                        {{ Form::button(
                                            '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Save',
                                            [
                                                'class' => 'btn-submit btn btn-default',
                                                'href' => '#complete',
                                                'name' => 'settings_form']
                                        )}}
                                        {{ Form::close() }}
                                    </div>
                                    <div class="tab-pane fade" id="complete">

                                        @include ('users.forms._complete')

                                        <div class="form-group pull-right" style="padding-top: 15px ">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        function goToProfile() {
            window.location.href = '/users/' + $('#firstname .form-control').val();
        }

    </script>

@stop