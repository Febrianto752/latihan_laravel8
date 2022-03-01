@php
if (!isset($nav_link)) {
$nav_link = null;
}

@endphp
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">F-Post</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  {{ ($nav_link === 'home')? 'active':'' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ ($nav_link === 'about')? 'active':'' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ ($nav_link === 'blog')? 'active':'' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($nav_link === 'categories')? 'active':'' }}"
                        href="/categories">Categories</a>
                </li>
            </ul>

            @auth
            <ul class="ms-auto navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door-fill"></i> My
                                Dashboard</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> My Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="ms-auto navbar-nav">
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($nav_link === 'login')? 'active':'' }}"><i
                            class="bi bi-box-arrow-in-right"></i>Login</a>
                </li>
            </ul>
            @endauth


        </div>
    </div>
</nav>
