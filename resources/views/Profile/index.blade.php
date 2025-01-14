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

    <!-- jQuery, Bootstrap JS and Iconify -->
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
        });

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

        document.addEventListener("DOMContentLoaded", () => {
            const profilePhoto = document.getElementById("profilePhoto");
            const photoInput = document.getElementById("photoInput");
            const changePhotoButton = document.getElementById("changePhotoButton");
            const deletePhotoButton = document.getElementById("deletePhotoButton");

            // Default profile photo URL
            const defaultPhoto = "default-photo.jpeg";

            // Event listener for "Change Photo"
            changePhotoButton.addEventListener("click", () => {
                photoInput.click(); // Trigger file input
            });

            photoInput.addEventListener("change", () => {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();

                    // Display the selected photo
                    reader.onload = (e) => {
                        profilePhoto.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Event listener for "Delete Photo"
            deletePhotoButton.addEventListener("click", () => {
                profilePhoto.src = defaultPhoto; // Reset to default photo
            });
        });
    </script>
</head>

<body>

    @include('Navbar._parts._nav')

    <button class="btn btn-outline-danger back-btn position-absolute" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <div class="container mt-5 pt-5">
        <div class="profile-card position-relative">
            <h3>Profile</h3>
            <div class="position-relative">
                <!-- Profile Picture -->
                <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile Picture" class="profile-picture">

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
                    <h2><i id="genderIcon" class="fas fa-male gender-icon"></i>{{ $user->name }}</h2>
                    <p>{{ $user->role->name}}</p>
                    <div class="info-box">
                        <!-- Left Icon Section -->
                        <div class="icon-section">
                            <span class="iconify" data-icon="material-symbols-light:add-notes-outline"></span>
                        </div>
                        <!-- Right Text Section -->
                        <div class="text-section">
                            {{ $user->bio }}
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
                        <input type="text" id="username" name="username" value="{{ $user->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="role">Role</label>
                        <input type="text" id="roles" name="roles" value="{{ $user->role->name}}" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" value="{{ $user->password }}">
                            <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ $user->phone_number }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="address">Address</label>
                        <textarea id="address" name="address"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio">{{ $user->bio }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</body>

</html>