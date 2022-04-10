<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a
                        href="{{ url('/') }}"
                        class="nav-link px-2 {{ (request()->is('/')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Home
                    </a>
                </li>

                <li>
                    <a
                        href="{{ url('/user') }}"
                        class="nav-link px-2 {{ (request()->is('users')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Users list
                    </a>
                </li>

                @auth
                <li>
                    <a
                        href="{{ url('/logout') }}"
                        class="nav-link px-2 {{ (request()->is('logout')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Logout
                    </a>
                </li>

                <li>
                    <a
                        href="{{ url('/users/1') }}"
                        class="nav-link px-2 {{ (request()->is('user/*')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Profile
                    </a>
                </li>

                <li>
                    <a
                        href="{{ url('/users/roles/create') }}"
                        class="nav-link px-2 {{ (request()->is('users/roles/create')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Create role
                    </a>
                </li>

                @else
                <li>
                    <a
                        href="{{ url('/login') }}"
                        class="nav-link px-2 {{ (request()->is('login')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Login
                    </a>
                </li>

                <li>
                    <a
                        href="{{ url('/registration') }}"
                        class="nav-link px-2 {{ (request()->is('registration')) ? 'text-white' : 'text-secondary' }}"
                    >
                        Registration
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
