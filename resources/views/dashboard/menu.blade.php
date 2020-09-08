@extends('master')
@section('title', 'Navigácia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())


        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Nastavenia menu</b></h1>
                <div class="item mt-2">
                    <div class="row">
                        {!! \Harimayco\Menu\Facades\Menu::render() !!}
                    </div>
                </div>
            </div>
        </div>
            @else
                <script>window.location = "/";</script>
    @endif
@endsection
</body>
