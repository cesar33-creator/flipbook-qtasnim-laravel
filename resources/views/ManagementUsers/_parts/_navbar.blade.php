<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <a class="navbar-brand position-relative" href="#">
            <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Profile Dropdown -->
            <div class="dropdown ml-auto">
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
                    <a class="dropdown-item" href="">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-chart-line"></i> Activity
                    </a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-header">Management Account</span>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-users-cog"></i> User
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item logout" href="#">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>