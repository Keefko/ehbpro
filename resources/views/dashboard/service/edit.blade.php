@extends('master')
@section('title', 'Navigácia')


@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

<body class="adminBody">
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Upraviť službu</b></h1>
                <a href="{{url('dashboard/service')}}">Späť na zoznam služieb</a>

                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    {!!  \Collective\Html\FormFacade::open(['action' =>['ServiceController@update', $service->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                    @csrf
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $service->title , ['class' => 'form-control', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $service->text , ['class' => 'form-control description', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::file('img') }}
                            </div>

                            <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť</button>

                </div>
            </div>
        </div>
</body>
    @else
        <script>window.location = "/";</script>
    @endif
@endsection
