@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-sm-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Songs Fan Page</div>
                    <div class="panel-body">
                        <table class="table table-hover data-table" style="width:100%">
                            <thead>
                            <tr>
                                <th class="min-mobile">Song</th>
                                <th class="min-mobile">Created By</th>
                            </tr>
                            </thead>

                            <tbody>

                                @foreach($songs as $song)
                                    <tr style="cursor:pointer">
                                        <td data-href='{{ route('show_path', $song->slug, [$song->slug]) }}' class="data-link"> {{ $song->title }}</td>
                                        <td data-href='{{ route('show_path', $song->slug, [$song->slug]) }}'>
                                            <a href="{{ route('show_path', $song->slug, [$song->slug]) }}">
                                                {!! link_to_route('showUsers_path', $song->User->firstname . ' ' . $song->User->lastname, [$song->User->username]) !!}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        {!! link_to_route('create_path', 'Create') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('extra_js')
    <script>
        $(document.body).on('click', '.data-link', function () {
            window.document.location = $(this).data("href");
        });

        $('.data-table').DataTable({responsive: true});

    </script>
@endsection