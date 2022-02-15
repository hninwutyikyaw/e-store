<div class="l-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-none">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">E-store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('category') }}">Category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    @auth
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                            logout
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-done">
                            @csrf
                        </form>
                    </ul>
                    @endauth
                    @guest
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item p-3" href="{{ url('/login') }}"><i class="fas fa-user-cog"></i>  Log in</a></li>
                            <li><a class="dropdown-item p-3" href="{{ url('/register') }}"><i class="fas fa-sign-in-alt"></i> Register account</a></li>
                        </ul>
                    @endguest
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div>