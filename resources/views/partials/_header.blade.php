
<nav id="navbar" class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a id="logo" class="navbar-brand " href="{{ url('/') }}">
            <i class="fas fa-bolt"></i> SPORTS ZONE
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-links" href="{{ url('/') }}">{{'Home'}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navbar-links" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clubs
                    </a>
                    <div class="dropdown-menu navbar-dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item navbar-links" href="{{ route('clubs.index') }}">Search Club</a>
                        <a class="dropdown-item navbar-links" href="{{ route('clubs.create') }}">Add my Club</a>
                    </div>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link navbar-links" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link navbar-links" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item navbar-links" href="{{ route('home') }}">Dashoard</a>
                            <a class="dropdown-item navbar-links" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
