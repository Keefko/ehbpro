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

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Url</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($menu as $item)
                                        <tr>
                                            <th scope="row"><a href="{{url('menu/'. $item->id . '/edit')}}">{{ $item->text}}</a></th>
                                            <td>{{$item->url}}</td>
                                            <td>
                                                @csrf()
                                                {!! \Collective\Html\FormFacade::open(['action' => ['MenuController@destroy', $item->id], 'method' => 'DELETE']) !!}
                                                {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom mt-2'])}}
                                                {!! \Collective\Html\FormFacade::close() !!}
                                            </td>
                                        </tr>
                                        @if(count($item->submenus) > 0)
                                            @foreach($item->submenus as $submenu)
                                                <tr>
                                                    <td>{{$submenu->order}}</td>
                                                    <td>{{$submenu->title}}</td>
                                                    <td>{{$submenu->url}}</td>
                                                </tr>
                                            @endforeach
                                        @endif

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
