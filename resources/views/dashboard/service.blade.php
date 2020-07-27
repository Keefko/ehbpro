@extends('master')
@section('title', 'Služby')

<body class="adminBody">
    @section('content')
        @if(\Illuminate\Support\Facades\Auth::check())

            <div class="wrapper">
                @include('dashboard.partials._menu')
                <div class="main_container">
                    <h1 class="pt-4 pb-2"><b>Služby</b></h1>
                    @include('dashboard.partials._messages')
                    <div class="item">
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

                    <div class="box">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="box-part text-center">
                                    <div class="title">
                                        <h6><b>Pridaj novú službu</b></h6>
                                    </div>

                                    <div class="text mt-4">
                                        <a href="{{url('service/create')}}" class="plus radius"></a>
                                    </div>
                                </div>
                            </div>

                            @foreach($service as $item)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                    <div class="box-part text-center">


                                        <div class="title">
                                            <h6><b>{{$item->title}}</b></h6>
                                        </div>

                                        <div class="text">
                                            <span>{!! \Illuminate\Support\Str::words($item->text, 8) !!}</span>
                                        </div>

                                        <div class="button-box col-lg-12 mt-2">
                                            <a href="{{url('service/'. $item->id . '/edit')}}" class="btn btn-custom">Upraviť</a>
                                            {!! \Collective\Html\FormFacade::open(['action' => ['ServiceController@destroy', $item->id], 'method' => 'DELETE']) !!}
                                            {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom mt-2'])}}
                                            {!! \Collective\Html\FormFacade::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>


        @endif
    @endsection
</body>
