@extends('master')
@section('title', 'Navigácia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Nastavenia menu</b></h1>
                <a href="{{ url('dashboard/menu/create') }}" class="btn btn-custom">Pridať novú položku</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">
                    <div class="row">
                        @foreach($menu as $item)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->text}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$item->url}}</h6>
                                        @if(count($item->submenus) > 0)
                                            @foreach($item->submenus as $submenu)
                                                <h6 class="nav-link">{{$submenu->title. ' ' . $submenu->order}}</h6>
                                            @endforeach
                                        @endif
                                        <a href="{{url('menu/'. $item->id . '/edit')}}" class="btn btn-custom">Upraviť</a>
                                        <a href="{{url('submenu/create')}}" class="btn btn-custom">Pridať submenu</a>
                                        @csrf()
                                        {!! \Collective\Html\FormFacade::open(['action' => ['MenuController@destroy', $item->id], 'method' => 'DELETE']) !!}
                                        {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom mt-2'])}}
                                        {!! \Collective\Html\FormFacade::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

            @else
                <script>window.location = "/";</script>
    @endif
@endsection
</body>
