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

        .search-button{
            display: block !important;
            border-radius: 0 5px 5px 0 !important;
        }

        .search-icon{
            display: none !important;
        }

        @media (max-width: 768px) {
            .search-button{
                display: none !important;
            }

            .search-icon{
                display: block !important;
                border-radius: 0 5px 5px 0 !important;
            }
        }
    </style>
</head>
<body>
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
</body>