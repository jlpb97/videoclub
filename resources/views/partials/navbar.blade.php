<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> Videoclub</a>
        </div>
        
        @if( Auth::check() )
        <ul class="nav navbar-nav">
            <li class="{{ Request::is('catalog') && ! Request::is('catalog/create') ? 'active' : ''}}">
                <a href="{{ url('/catalog') }}">
                    <span class="glyphicon glyphicon-film"></span>
                    Catálogo
                </a>
            </li>
            <li class="{{ Request::is('catalog/create') ? 'active' : ''}}">
                <a href="{{ url('/catalog/create') }}">
                    <span>&#10010</span>
                    Nueva película
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-link nav-link">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
        @endif
    </div>
</nav>
