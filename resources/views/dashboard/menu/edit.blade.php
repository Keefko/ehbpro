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

                            <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť</button>
                            {!! \Collective\Html\FormFacade::close() !!}
                            <div>
                                @if($submenu->order != 1)
                                    <button class="btn btn-custom" id="up" onclick="event.preventDefault(); document.getElementById('frm-delete').submit();"><i class="arrow-up"></i></button>
                                @endif
                                <b class="pl-2 pr-2">{{$submenu->order}}</b>
                                @if($submenu->order != count($menu->submenus))
                                        <button class="btn btn-custom" id="down" onclick="event.preventDefault(); document.getElementById('frm-delete').submit();"><i class="arrow-down"></i></button>
                                @endif
                                <button class="btn btn-custom" onclick="event.preventDefault(); document.getElementById('frm-delete').submit();">Vymazať</button>

                                 <form id="frm-delete" action=" {{route('submenu/'. $submenu->id)}}" method="DELETE" style="display: none;">
                                        {{ csrf_field() }}
                                 </form>

                                 <form id="frm-up" action=" {{route('submenu/up/'. $submenu->order)}}" method="PUT" style="display: none;">
                                    {{ csrf_field() }}
                                 </form>
                                 <form id="frm-down" action=" {{route('submenu/down/'. $submenu->order)}}" method="PUT" style="display: none;">
                                    {{ csrf_field() }}
                                 </form>
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
