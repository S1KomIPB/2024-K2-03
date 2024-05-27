<nav class="navbar navbar-dark " style="background-color: #002147;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/logoilkom2.svg')}}" class="me-2" height="50" alt="Logo" loading="lazy"/>
        </a>


        <div class="d-flex align-items-center">

            <!-- Search Bar -->
            <form class="d-flex input-group w-auto" method="GET" action="{{ route('search') }}">
                @csrf
                <input type="search" class="form-control rounded me-3" placeholder="Search Title/Author" 
                    aria-label="Search" aria-describedby="search-addon" name="search" value="{{ request('search') }}"/>
            </form>
            
            @auth
            <!-- Button Upload -->
            <button type="button" class="btn btn-primary rounded" style="background-color: #1481FF; color: white;">
                <a class="nav-link fw-bold" href="/upload"> Upload </a>
            </button>

            <!-- Button Profil -->
            <div class="dropdown">
                <button class="btn dropdown-toggle hidden-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #1481FF">
                    <i class="bi bi-person-circle d-flex" style="color: white; font-size: 32px;"></i>
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="/profile" class="dropdown-item" style="color: black; text-decoration: none;"><i class="bi bi-person-circle me-2"></i>Profile</a>
                    </li>

                    @can('admin')
                        <li>
                            <a href="{{route('products')}}" class="dropdown-item" style="color: black; text-decoration: none;"><i
                                class="bi bi-kanban-fill me-2"></i>Admin Dashboard</a>
                        </li>
                    @endcan

                    <li>
                        <form action="/logout" method="post">
                            @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Sign Out</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <!-- sign in -->
            <button type="button" class="btn btn-primary rounded" style="background-color: #1481FF; color: white;">
                <a class="nav-link fw-bold" href="/sign-in"> Sign In </a>
            </button>
            @endauth
        </div>
    </div>
</nav>
