@extends('master')
@section('title', 'Admin panel')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Upraviť <span class="text-lowercase">{{$section->title}} </span> sekciu</b></h1>
                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    {!!  \Collective\Html\FormFacade::open(['action' =>['SectionController@update', $section->id], 'method' => 'PUT'])  !!}
                    @csrf
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $section->title, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('sub_title', 'Pod nadpis', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('sub_title', $section->sub_title, ['class' => 'form-control','required' => 'true']) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('', '' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $section->text, ['class' => 'form-control description','required' => 'true']) }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-custom mt-2 mb-2">Upraviť</button>

                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/";</script>
    @endif
@endsection
</body>
