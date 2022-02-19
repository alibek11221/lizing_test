<nav class="navbar navbar-expand justify-content-center navbar-dark bg-dark">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ (request()->route()->getName() === 'index') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('index')}}">Главная</a>
            </li>
            <li class="nav-item {{ (request()->route()->getName() === 'posts.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('posts.index')}}">Статьи</a>
            </li>
        </ul>
    </div>
</nav>
