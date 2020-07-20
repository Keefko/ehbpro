
@extends('master')
@section('title', 'Hlavná stránka')

<body data-spy='scroll' data-target='.navbar' data-offset='-250'>
@section('content')
    @include('partials/_menu')

    <style>

        #hero {
            background: url({{asset('img/images/'.$image->img)}}) no-repeat center;
            height: 100vh;
            width: 100%;
            background-size: cover;
        }
    </style>

    <section id="hero">
    </section>

    @include('partials/_about')

    @include('partials/_service')

    @include('partials/_aditional')

    @include('partials/_contact')
@endsection
</body>
