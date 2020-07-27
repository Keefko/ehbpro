@extends('master')
@section('title', 'Užívatelia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Upraviť užívateľa</b></h1>
                <a href="{{url('dashboard/user')}}">Späť na zoznam užívateľov</a>
                @include('dashboard.partials._messages')
                <div class="item">
                    {!!  \Collective\Html\FormFacade::open(['action' =>['UserController@update', $user->id], 'method' => 'PUT'])  !!}
                    @csrf


                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('login', 'Užívateľské meno', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('login', $user->name, ['class' => 'form-control', 'required' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('email', 'Email', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('email', $user->email, ['class' => 'form-control','required' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('password', 'Heslo', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::password('password',['class' => 'form-control']) }}
                    </div>

                    <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť užívateľa</button>
                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>
    @endif
@endsection
</body>
