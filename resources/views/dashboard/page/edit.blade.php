@extends('master')
@section('title', 'Stránky')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class=" pt-4 pb-2"><b>Vytvoriť stránku</b></h1>
                <a href="{{url('dashboard/service')}}">Späť na stránky</a>

                @include('dashboard.partials._messages')
                <div class="item mt-2">



                    {!!  \Collective\Html\FormFacade::open(['action' =>['PageController@update', $page->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                    @csrf
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $page->title, ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
                            </div>
                            <script>
                                let value = document.getElementById('title');
                                value.onkeyup = function () {
                                    document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-');
                                }
                            </script>

                            <p class="font-italic text-gray">URL : http://www.ehbpro.sk/page/<span id="url">{{$page->slug}}</span></p>
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $page->text, ['class' => 'form-control description']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('img', 'Header obrázok' , ['class' => 'form-control-label mb-3']) }}
                                {{ \Collective\Html\FormFacade::file('img') }}
                            </div>
                            <button type="submit" class="btn pl-3 btn-custom mt-2 mb-2">Vytvoriť stránku</button>
                             {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>

</body>
@else
    <script>window.location = "/";</script>
@endif
@endsection

