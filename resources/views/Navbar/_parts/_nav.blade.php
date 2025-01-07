<head>
    <style>
         /* Navbar Styling */
         .dropdown-menu {
            width: 300px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dropdown-header {
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        .dropdown-header img {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .dropdown-header .info {
            margin-left: 10px;
        }

        .dropdown-header .username {
            font-size: 14px;
            font-weight: bold;
        }

        .dropdown-header .role {
            font-size: 12px;
            color: #6c757d;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            padding: 10px 15px;
        }

        .dropdown-divider {
            margin: 10px 0;
        }

        .dropdown-item.logout {
            color: #dc3545;
            font-weight: bold;
            text-align: center;
        }

        .dropdown-item.logout:hover {
            background-color: #f8d7da;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <a class="navbar-brand position-relative" href="/dashboard">
        <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="150">
    </a>

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
</nav>
</body>