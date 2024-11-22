@role('creator')

<li class=" nav-item">
    <a class="d-flex align-items-center" href="{{route('users.index')}}">
        <i data-feather='users'></i>
        <span class="menu-title text-truncate">Userlar</span>
    </a>
</li>

<li class=" nav-item">
    <a class="d-flex align-items-center" href="{{route('settings.index')}}">
        <i data-feather='settings'></i>
        <span class="menu-title text-truncate">Sozlamalar</span>
    </a>
</li>

@endrole
