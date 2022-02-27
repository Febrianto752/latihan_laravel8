@php
if (!isset($nav_link)) {
  $nav_link = null;
}
    
@endphp
<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">F-Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link {{ ($nav_link === 'categories')? 'active':'' }}" href="/categories">Categories</a>
        </li>

      </ul>
    </div>
  </div>
</nav>