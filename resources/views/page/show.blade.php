@extends('master')
@section('title', $page->title)

<body>
@section('content')
    @include('partials/_menu')
    <style>

        .masthead{

            background: url({{asset('img/page/'.$page->img)}}) no-repeat center;
            background-size:cover;
            height: 40vh;
            width: 100%;
            padding-top: 100px;
        }

    </style>

    <div class="masthead mt-5">
        <div class="container">
            <h1 class="pt-5 text-uppercase text-white">{{$page->title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-white"><a href="{{url('/')}}">Hlavná stránka</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{$page->slug}}</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4 mb-4">
                <p>{!! $page->text !!}</p>
            </div>
        </div>
    </div>
    @include('partials._contact')
@endsection
</body>
