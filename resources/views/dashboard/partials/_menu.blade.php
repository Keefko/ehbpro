
    <div class="top_navbar">
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="top_menu">
            <div class="logo">EHBPRO</div>
            <ul class="pt-3">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Odhlásiť sa</a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>

        <div class="sidebar">
            <ul>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">Prejsť na hlavnú stránku</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('dashboard')}}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('about/1/edit')}}" class="nav-link">O nás</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('dashboard/service')}}" class="nav-link">Služby</a>
                </li>

                <li class="nav-item">
                    <a href="{{url('dashboard/list')}}" class="nav-link">Doplnkové služby</a>
                </li>

                <li class="nav-item">
                    <a href="{{url('section/3/edit')}}" class="nav-link">Kontakt</a>
                </li>

                <li class="nav-item">
                    <a href="{{url('dashboard/user')}}" class="nav-link">Užívatelia</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('dashboard/menu')}}" class="nav-link">Menu</a>
                </li>

                <li class="nav-item">
                    <a href="{{url('dashboard/page')}}" class="nav-link">Stránky</a>
                </li>

            </ul>
        </div>

    </div>
