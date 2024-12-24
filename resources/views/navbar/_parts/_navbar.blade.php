<nav class="navbar navbar-light bg-white fixed-top shadow-sm">
    <!-- Navbar -->
    <div class="navbar container-fluid">
        <div class="d-flex align-items-center justify-content-between w-100">
            <!-- Logo -->
            <a class="navbar-brand position-relative" href="#">
                <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="150">
            </a>

            <!-- Search Form -->
            <form class="form-inline d-flex search-form mx-auto">
                <div class="input-group">
                    <!-- Input field -->
                    <input
                        class="form-control"
                        type="search"
                        placeholder="Search"
                        aria-label="Search">

                    <!-- Button untuk layar besar -->
                    <button
                        class="btn btn-outline-danger search-button"
                        type="submit">
                        Search
                    </button>

                    <!-- Icon untuk layar kecil -->
                    <button
                        class="btn btn-outline-danger search-icon"
                        type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- Dropdown Profile -->
            <div class="dropdown profile-menu">
                <a class="dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/Photo by Dan Cornilov.png') }}" style="width: 40px" alt="Avatar" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header d-flex align-items-center">
                        <img src="{{ asset('assets/Photo by Dan Cornilov.png') }}" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px;">
                        <div class="info ml-3">
                            <span class="username d-block font-weight-bold">Username</span>
                            <span class="role text-muted">Admin</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-header">Account</span>
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="/UserActivity">
                        <i class="fas fa-chart-line"></i> Activity
                    </a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-header">Management Account</span>
                    <a class="dropdown-item" href="/ManagementUsers">
                        <i class="fas fa-users-cog"></i> User
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item logout" href="#">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>