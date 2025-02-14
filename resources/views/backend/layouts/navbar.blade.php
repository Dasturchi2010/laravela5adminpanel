@role('creator')

<li class=" nav-item">
    <a class="d-flex align-items-center" href="{{route('users.index')}}">
        <i data-feather='users'></i>
        <span class="menu-title text-truncate">Userlar</span>
    </a>
</li>

<li class="nav-item">
    <a class="d-flex align-items-center" href="{{route('services.index')}}">
        <i data-feather='briefcase'></i>
        <span class="menu-title text-truncate">Servicelar</span>
    </a>
</li>

<li class="nav-item">
    <a class="d-flex align-items-center" href="{{route('portifolios.index')}}">
        <i data-feather="user"></i>
        <span class="menu-title text-truncate">Portifolio</span>
    </a>
</li>

<li class="nav-item">
    <a class="d-flex align-items-center" href="{{route('contacts.index')}}">
        <i data-feather="phone-call"></i>
        <span class="menu-title text-truncate">Kantactlar</span>
    </a>
</li>

<li class=" nav-item">
    <a class="d-flex align-items-center" href="{{route('blogs.index')}}">
        <i data-feather='file-text'></i>
        <span class="menu-title text-truncate">Bloglar</span>
    </a>
</li>


<li class=" nav-item">
    <a class="d-flex align-items-center" href="{{route('settings.index')}}">
        <i data-feather='settings'></i>
        <span class="menu-title text-truncate">Sozlamalar</span>
    </a>
</li>

@endrole
