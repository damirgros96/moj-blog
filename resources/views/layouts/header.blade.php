<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-film mr-2"></i> Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link nav-link-1 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Posts</a></li>
                <li class="nav-item"><a class="nav-link nav-link-1 {{ request()->routeIs('photos') ? 'active' : '' }}" href="{{ route('photos') }}">Photos</a></li>
                <li class="nav-item"><a class="nav-link nav-link-2 {{ request()->routeIs('videos') ? 'active' : '' }}" href="{{ route('videos') }}">Videos</a></li>
                <li class="nav-item"><a class="nav-link nav-link-3 {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link nav-link-4 {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>