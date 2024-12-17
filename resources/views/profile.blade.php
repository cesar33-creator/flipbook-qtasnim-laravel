<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit Page</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        $(document).ready(function() {
            // Update the gender icon based on the selected gender
            $('#gender').on('change', function() {
                var gender = $(this).val();
                var genderIcon = $('#genderIcon');

                // Update icon based on gender selection
                if (gender === 'Male') {
                    genderIcon.removeClass('fa-female').addClass('fa-male');
                    genderIcon[0].style.color = '#007bff'; // Menetapkan warna biru untuk Male
                } else if (gender === 'Female') {
                    genderIcon.removeClass('fa-male').addClass('fa-female');
                    genderIcon[0].style.color = '#ff69b4'; // Menetapkan warna pink untuk Female
                }
            });

            // Trigger the change event to set the initial icon
            $('#gender').trigger('change');
        });
    </script>
</head>
<body>
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
                    <a class="dropdown-item" href="{{ route('profile') }}">
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

    <button class="btn btn-outline-danger back-btn position-absolute" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <div class="container mt-5 pt-5">
        <div class="profile-card position-relative">
            <h3>Profile</h3>
            <div class="position-relative">
                <!-- Profile Picture -->
                <img src="{{ asset('assets/Photo by Dan Cornilov.png') }}" alt="Profile Picture" class="profile-picture">
                
                <!-- Dropdown for camera icon -->
                <div class="dropdown profile-camera-dropdown">
                    <i class="fas fa-camera profile-camera-icon" id="cameraDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="cameraDropdown">
                        <div class="dropdown-item-delete" id="deletePhotoButton">
                            <i class="fas fa-trash-alt"></i> Delete Photo
                        </div>
                        <div class="dropdown-item-change" id="changePhotoButton">
                            <i class="fas fa-upload"></i> Change Photo
                        </div>
                    </div>
                    <h2><i id="genderIcon" class="fas fa-male"></i> Kevin George</h2>
                    <p>Admin</p>
                    <div class="info-box">
                        <!-- Left Icon Section -->
                        <div class="icon-section">
                          <span class="iconify" data-icon="material-symbols-light:add-notes-outline"></span>
                        </div>
                        <!-- Right Text Section -->
                        <div class="text-section">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Animi quo velit consequuntur, iste.
                        </div>
                      </div>
                </div>
            </div>            
        </div>

        <div class="edit-profile">
            <h3>Edit Profile</h3>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="Kevin George">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="User987@gmail.com" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="role">Role</label>
                    <input type="text" id="role" name="role" value="Admin" disabled>
                    </div>

                    <div class="col-md-6">
                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" id="password" name="password" value="password123">
                        <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>

                    <div class="col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="+628887689">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <label for="address">Address</label>
                    <textarea id="address" name="address"></textarea>
                    </div>

                    <div class="col-md-6">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
