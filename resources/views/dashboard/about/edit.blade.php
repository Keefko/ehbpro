@extends('master')
@section('title', 'Admin panel')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class=" pt-4 pb-2"><b>Upraviť O nás sekciu</b></h1>
                @include('dashboard.partials._messages')
                <div class="item">
                    {!!  \Collective\Html\FormFacade::open(['action' =>['AboutController@update', $about->id], 'method' => 'PUT','enctype' => "multipart/form-data"])  !!}
                    @csrf
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $about->title, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('sub_title', 'Pod nadpis', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('sub_title', $about->sub_title, ['class' => 'form-control','required' => 'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('', '' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $about->text, ['class' => 'form-control description','required' => 'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button_text', 'Text Tlačítka' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button_text', $about->button_text, ['class' => 'form-control','required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button_url', 'Url Tlačítka' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button_url', $about->button_url, ['class' => 'form-control','required' => 'true']) }}
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-2">
                        {{ \Collective\Html\FormFacade::label('img1', 'Obrázok 1' , ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::file('img1') }}
                    </div>

                    <div class="form-group mt-4">
                        {{ \Collective\Html\FormFacade::label('img2', 'Obrázok 2' , ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::file('img2') }}
                    </div>




                    <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť položku</button>

                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>
    @endif
@endsection
</body>
