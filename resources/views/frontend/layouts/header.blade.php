<!-- header section strats -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand mr-5" href="{{ route('home') }}">

                <span>
                    XOSS
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}"> Blogs </a>
                        </li>
                        @if (Auth::check())

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.post.index') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                    href="{{ route('login') }}">Logout</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                    @if (Route::is('blog'))
                        <form class="form-inline" action="{{route('blog')}}" method="GET">
                            <div class="mr-2">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="search"
                                    id="search"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                        </form>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
