@extends('master')
@section('title', 'Služby')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class=" pt-4 pb-2"><b>Vytvoriť službu</b></h1>
                <a href="{{url('dashboard/service')}}">Späť na zoznam služieb</a>

                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    {!!  \Collective\Html\FormFacade::open(['action' =>'ServiceController@store' ,'method' => 'POST', 'enctype' => "multipart/form-data"])  !!}
                    @csrf
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', '', ['id' =>'title','class' => 'form-control', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control description']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label mb-3']) }}
                                {{ \Collective\Html\FormFacade::file('img') }}
                            </div>
                            <button type="submit" class="btn col-sm-1 pl-3 btn-custom mt-2 mb-2">Pridať službu</button>
                            {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>
</body>
@endif
@endsection


