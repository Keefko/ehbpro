@extends('master')
@section('title', 'Užívatelia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

    <div class="wrapper">
        @include('dashboard.partials._menu')
        <div class="main_container">
            <h1 class="pt-4 pb-2"><b>Užívatelia</b></h1>
            <a href="{{ url('dashboard/user/create') }}" class=" btn btn-custom">Pridať nového užívateľa</a>

            @include('dashboard.partials._messages')

            <div class="item mt-2">
                <div class="row">

                    <table class="table table-responsive-sm">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Meno</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td><a href="{{url('user/'. $item->id . '/edit')}}">{{$item->name}}</a></td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @csrf()
                                        {!! \Collective\Html\FormFacade::open(['action' => ['UserController@destroy', $item->id], 'method' => 'DELETE']) !!}
                                        {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom mt-2'])}}
                                        {!! \Collective\Html\FormFacade::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @else
        <script>window.location = "/";</script>



    @endif
@endsection
</body>
