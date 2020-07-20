@extends('master')
@section('title', 'Stránky')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Stránky</b></h1>
                <a href="{{ url('dashboard/page/create') }}" class="btn btn-custom">Pridať novú stránku</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">
                    <div class="row">
                        @foreach($page as $item)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{'#'. $item->id .' '. $item->title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$item->slug}}</h6>
                                    <p class="card-text">{!! \Illuminate\Support\Str::words($item->text, 10) !!}</p>
                                    <a href="{{url('page/'. $item->id . '/edit')}}" class="btn btn-custom">Upraviť</a>
                                    @csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['PageController@destroy', $item->id], 'method' => 'DELETE']) !!}
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

    @endif
@endsection
</body>
