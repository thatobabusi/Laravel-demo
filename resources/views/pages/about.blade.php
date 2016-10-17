@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h1>About Me! {{ $first }} {{ $last }}</h1>

                        <p>

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet aperiam aspernatur atque
                            consectetur, cumque doloremque eligendi error, et expedita ipsa iusto laborum molestias
                            neque pariatur, perspiciatis quidem saepe voluptas!

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
