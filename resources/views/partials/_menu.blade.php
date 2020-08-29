
<nav class="navbar  navbar-expand-lg navbar-light fixed-top" id="mainNav" role="navigation">
        <a href="{{url('/')}}"><img  src="{{asset('img/images/'.$image->img)}}"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
{{--
        <div class="collapse navbar-collapse" id="bs-slide-dropdown">
            <ul class="navbar-nav ml-auto">
                @foreach($menu as $item)

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>

                    @if(count($item->submenus) > 0)
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">   {{$item->text}} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($item->submenus as $submenu)
                                    <li><a class="dropdown-item" href="{{$submenu->url}}">{{$submenu->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{$item->url}}">{{$item->text}} </a>
                        </li>
                    @endif
                @endforeach
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">Admin panel</a>
                    </li>
                    <li class="nav-item pt-2">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            Odhlásiť sa
                        </a>
                    </li>

                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
</nav>





<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <a href="{{url('/')}}"><img  src="{{asset('img/images/'.$image->img)}}"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse pr-4" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

                @foreach($menu as $item)

                    @if(count($item->submenus) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" data-hover="dropdown">
                                {{$item->text}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($item->submenus as $submenu)
                                    <a class="dropdown-item" href="{{$submenu->url}}">{{$submenu->title}}</a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{$item->url}}">{{$item->text}} </a>
                        </li>
                    @endif
                @endforeach
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dashboard') }}">Admin panel</a>
                        </li>
                        <li class="nav-item pt-2">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                Odhlásiť sa
                            </a>
                        </li>

                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
        </ul>
    </div>--}}
</nav>

