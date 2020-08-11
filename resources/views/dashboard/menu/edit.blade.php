@extends('master')
@section('title', 'Navigácia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Upraviť položku navigácie</b></h1>
                <a href="{{ url('dashboard/menu') }}" class="text-dark">Späť na navigáciu</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">

                        {!!  \Collective\Html\FormFacade::open(['action' =>['MenuController@update', $menu->id], 'method' => 'PUT'])  !!}
                        @csrf

                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('title', 'Text', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('title', $menu->text, ['class' => 'form-control', 'required' => 'true']) }}
                        </div>

                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('url', 'Url', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('url', $menu->url, ['class' => 'form-control','required' => 'true']) }}
                        </div>

                        <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť</button>

                        {!! \Collective\Html\FormFacade::close() !!}
                </div>
                @if(count($menu->submenus) > 0)
                        <h3 class="pt-2"> Podmenu</h3>
                        <button id="addMenu" class="btn btn-custom mt-2 mb-2">Pridať podmenu</button>
                        <div id="submenu">
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
                                {!! \Collective\Html\FormFacade::hidden('id', $menu->id) !!}

                                <button type="submit" class="btn pl-3 btn-custom mt-2 mb-2">Vytvoriť podmenu</button>
                                {!! \Collective\Html\FormFacade::close() !!}
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('#addMenu').click(function () {
                                    $('#submenu').css('display','block');
                                });
                            });
                        </script>
                        @foreach($menu->submenus as $submenu)
                        <div class="item mt-2">
                            {!!  \Collective\Html\FormFacade::open(['action' =>['SubmenuController@update', $submenu->id], 'method' => 'PUT'])  !!}
                            @csrf

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Text', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $submenu->title, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('url', 'Url', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('url', $submenu->url, ['class' => 'form-control','required' => 'true']) }}
                            </div>
                            {!! \Collective\Html\FormFacade::hidden('order', $submenu->order) !!}
                            {!! \Collective\Html\FormFacade::hidden('parent', $menu->id) !!}
                            <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť</button>
                            {!! \Collective\Html\FormFacade::close() !!}
                            <div>

                                <div class="row">
                                    <div class="col-md-1">
                                        @if($submenu->order != 1)
                                            @csrf()
                                            {!! \Collective\Html\FormFacade::open(['action' => ['SubmenuController@up', $submenu->order, $menu->id], 'method' => 'PUT']) !!}
                                            {{\Collective\Html\FormFacade::submit('&#8593;', ['class' => 'btn btn-custom'])}}
                                            {!! \Collective\Html\FormFacade::close() !!}
                                        @endif
                                    </div>
                                    <div class="col-md-1">
                                        <b class="pl-2 pr-2">{{$submenu->order}}</b>
                                    </div>
                                    <div class="col-md-1">
                                        @if($submenu->order != count($menu->submenus))
                                            @csrf()
                                            {!! \Collective\Html\FormFacade::open(['action' => ['SubmenuController@down', $submenu->order, $menu->id], 'method' => 'PUT']) !!}
                                            {{\Collective\Html\FormFacade::submit('&#8595;', ['class' => 'btn btn-custom'])}}
                                            {!! \Collective\Html\FormFacade::close() !!}
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        @csrf()
                                        {!! \Collective\Html\FormFacade::open(['action' => ['SubmenuController@destroy', $submenu->id], 'method' => 'DELETE']) !!}
                                        {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom'])}}
                                        {!! \Collective\Html\FormFacade::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                @endif

            </div>
        </div>

    @else
        <script>window.location = "/";</script>
    @endif
@endsection
</body>
