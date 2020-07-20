@extends('master')
@section('title', 'Doplnkové služby')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Vytvoriť doplnkovú službu</b></h1>
                <a href="{{ url('dashboard/list') }}" class="text-dark">Späť na zoznam služieb</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    {!!  \Collective\Html\FormFacade::open(['action' =>'ListController@store' ,'method' => 'POST'])  !!}
                    @csrf

                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('title', '', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>

                    <button type="submit" class="btn btn-custom mt-2 mb-2">Pridať službu</button>


                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>

    @endif
@endsection
</body>
