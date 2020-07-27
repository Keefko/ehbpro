@extends('master')
@section('title', 'Navigácia')

<body class="adminBody">
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())

        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class=" pt-4 pb-2"><b>Pridať položku do navigácie</b></h1>
                <a href="{{ url('dashboard/menu') }}" class="text-dark">Späť na navigáciu</a>
                @include('dashboard.partials._messages')
                <div class="item mt-2">

                    <form action="{{ action('MenuController@store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-control-label m-0">Text</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label m-0">Url</label>
                            <input type="text" name="url" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-custom mt-2 mb-2">Vytvoriť</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <script>window.location = "/";</script>
    @endif
@endsection
</body>
