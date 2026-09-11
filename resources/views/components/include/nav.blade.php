<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            
            <!-- Left Side: Public Links (Visible to Everyone) -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="{{ route('posts-web.index') }}">All Posts</a>
                </li>
            </ul>

            <!-- Right Side: Dynamic Role-Based Links -->
            <ul class="navbar-nav ms-auto align-items-center">
                
    

                {{-- 2. CUSTOMER / AUTHENTICATED PAGES (Dashboard & Profile) --}}
                @auth
                    <!-- Customer Only Link -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">Customer Dashboard</a>
                    </li>

                    <!-- User Dropdown Menu -->
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle text-white border rounded px-3 py-1 mt-2 mt-lg-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li><a class="dropdown-menu-item px-3 text-dark text-decoration-none d-block py-1" href="{{ url('/profile') }}">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <!-- Standard Post Request Logout for Security -->
                                <form action="{{ /* route('logout') */ }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
