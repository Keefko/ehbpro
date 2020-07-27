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
                    @foreach($user as $item)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{'#'. $item->id .' '. $item->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at}}</h6>
                                    <p class="card-text">{{$item->email}}</p>
                                    <a href="{{url('user/'. $item->id . '/edit')}}" class="btn btn-custom">Upraviť</a>
                                    @csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['UserController@destroy', $item->id], 'method' => 'DELETE']) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom mt-2'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @else
        <script>window.location = "/";</script>



    @endif
@endsection
</body>
