@extends('master')
@section('title', 'Navigácia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class=" pt-4 pb-2"><b>Pridať položku do navigácie</b></h1>
                <a href="{{ url('dashboard/menu') }}" class="text-dark">Späť na navigáciu</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    {!!  \Collective\Html\FormFacade::open(['action' =>'SubmenuController@store' ,'method' => 'POST'])  !!}
                    @csrf
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('title', '', ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('url', 'Url' , ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('url', '', ['class' => 'form-control description']) }}
                    </div>
                    {!! \Collective\Html\FormFacade::hidden('id', $id) !!}

                    <button type="submit" class="btn pl-3 btn-custom mt-2 mb-2">Vytvoriť stránku</button>
                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/";</script>
    @endif
@endsection
</body>
