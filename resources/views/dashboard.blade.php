<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Dashboard - Qtasnim</title>

    <!-- CSS -->
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        // Event untuk tombol back
        $('#backButton').on('click', function() {
            console.log('Back button clicked!');
            if (window.history.length > 1) {
                window.history.back();
            } else {
                alert('Tidak ada halaman sebelumnya.');
            }
        });

        // Menutup navbar saat klik di luar
        $(document).on('click', function(event) {
            var target = $(event.target);
            if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
                $('.navbar-collapse').collapse('hide');
            }
        });

        // Event untuk setiap kategori
        $('.category-card').on('click', function() {
            const categoryName = $(this).find('.overlay-text p').text().trim();
            Swal.fire({
                title: `${categoryName}`,
                text: 'Maaf, Anda Tidak Punya Akses Loker Ini!',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    });
</script>


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

    <button class="btn btn-outline-danger back-btn position-absolute" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <!-- Dashboard Title -->
    <div class="container mt-5 pt-5 text-center">
        <h1 class="my-5">Dashboard</h1>
    </div>

    <div class="container text-center">
        <div class="row no-gutters"> <!-- Menambahkan kelas no-gutters -->
            <div class="col">
                <a href="{{ url('General') }}">
                    <div class="category-card-general">
                        <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                        <div class="overlay-text">
                            <p>General</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
            <a href="{{ url('Pustaka') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Pustaka</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
            <a href="{{ url('HRGA') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>HRGA</p>
                    </div>
                </div>
            </a>
            </div>
        </div>

        <div class="row no-gutters"> <!-- Menambahkan kelas no-gutters -->
            <div class="col">
            <a href="{{ url('Finance') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Finance</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
            <a href="{{ url('ProjectServices') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Project & Services</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
            <a href="{{ url('SystemDesign') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>System & Design Analyst</p>
                    </div>
                </div>
            </a>
            </div>
        </div>

        <div class="row no-gutters"> <!-- Menambahkan kelas no-gutters -->
            <div class="col">
            <a href="{{ url('Business') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Bussiness Development</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
            <a href="{{ url('Public') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Public Relation & Partnership</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
            <a href="{{ url('Research') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Research & Technical Solution</p>
                    </div>
                </div>
            </a>
            </div>
        </div>

        <div class="row no-gutters"> <!-- Menambahkan kelas no-gutters -->
            <div class="col">
            <a href="{{ url('Health') }}">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="overlay-text">
                        <p>Health Care Solution</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        {{-- <i class="fas fa-lock"></i> --}}
                    </div>
                    <div class="overlay-text">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="category-card">
                    <img src="{{ asset('assets/laci.png') }}" alt="Folder" class="folder-img">
                    <div class="overlay-icon">
                        {{-- <i class="fas fa-lock"></i> --}}
                    </div>
                    <div class="overlay-text">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>