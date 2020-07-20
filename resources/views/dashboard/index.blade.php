@extends('master')
@section('title', 'Admin panel')

<body class="adminBody">
@section('content')
@if(\Illuminate\Support\Facades\Auth::check())

    <div class="wrapper">
        @include('dashboard.partials._menu')
        <div class="main_container">
            <h1 class="pt-4 pb-2"><b>Profil</b></h1>

            @include('dashboard.partials._messages')
            <div class="item">
                <h3>Zmena loga</h3>
                {!!  \Collective\Html\FormFacade::open(['action' =>['ImageController@update', $logo->id], 'method' => 'PUT', "enctype" => "multipart/form-data"])  !!}
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('img', 'Logo' , ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::file('img') }}
                </div>
                <button type="submit" class="btn col-sm-1 pl-3 btn-custom mt-2 mb-2">Zmeniť</button>
                {!! \Collective\Html\FormFacade::close() !!}
            </div>
            <div class="item mt-2">
                <h3>Zmena headeru</h3>
                {!!  \Collective\Html\FormFacade::open(['action' =>['ImageController@update', $hero->id], 'method' => 'PUT', "enctype" => "multipart/form-data"])  !!}
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('img', 'Header' , ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::file('img') }}
                </div>
                <button type="submit" class="btn col-sm-1 pl-3 btn-custom mt-2 mb-2">Zmeniť</button>
                {!! \Collective\Html\FormFacade::close() !!}
            </div>
            <div class="item mt-2">
                <h3>Správy odoslané cez formulár</h3>
                <div class="row mt-2">
                    @foreach($mails as $mail)
                    <div class="col-md-4">
                        <div class="card card-white post p-3">
                            <div class="post-heading">
                                <div class="float-left meta">
                                    <div class="title h5">
                                        <b>{{$mail->name}}</b>
                                    </div>
                                    <h6 class="text-muted time">{{$mail->created_at}}</h6>
                                    <h6>{{$mail->subject}}</h6>
                                    <h6>{{$mail->phone}}</h6>
                                </div>
                            </div>
                            <div class="post-description">
                                <p>{!! $mail->text !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>


@endif
@endsection
</body>
