@extends('master')
@section('title', 'Zoznam doplnkových služieb')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Doplnkové služby</b></h1>
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

                <div class="item mt-2">
                    <h3>Zmena obrazku doplnkových služieb</h3>
                    {!!  \Collective\Html\FormFacade::open(['action' =>['ImageController@update', $image->id], 'method' => 'PUT', "enctype" => "multipart/form-data"])  !!}
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::file('img') }}
                    </div>
                    <button type="submit" class="btn col-sm-1 pl-3 btn-custom mt-2 mb-2">Zmeniť</button>
                    {!! \Collective\Html\FormFacade::close() !!}
                </div>
                <div class="item mt-2">
                    <a href="{{ url('dashboard/list/create') }}" class="mt-4 mb-2 btn btn-custom">Pridať novú službu</a>
                    <div class="row">
                        @foreach($list as $item)
                            <div class="col-md-3 mb-2">
                                <div class="card">
                                    <div class="card-body">

                                        <a href="{{url('list/'. $item->id . '/edit')}}"><h5 class="card-title">{{'#'. $item->id .' '. $item->title}}</h5></a>
                                        @csrf()
                                        {!! \Collective\Html\FormFacade::open(['action' => ['ListController@destroy', $item->id], 'method' => 'DELETE']) !!}
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
    @else
        <script>window.location = "/";</script>
    @endif
@endsection
</body>
