<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Add User - Qtasnim</title>

    <!-- jQuery & jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-dyBbyVBKdqErH0P5E9t2FytSBuwjAPTk1XBpk68e5U9A3PSVblQxr4N6RTl9+0I3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/create_management.css') }}">

    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
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

            // Update label dengan nama file
            document.querySelector('.custom-file-input').addEventListener('change', function(e) {
                let fileName = e.target.files[0].name;
                let label = e.target.nextElementSibling;
                label.textContent = fileName;
            });
        });
    </script>
</head>

<body>

    <!-- Navbar -->
    @include('ManagementUsers._parts._navbar')
    <!-- End Of Navbar -->

    <br><br><br><br>

    <!-- Buttons -->
    <div class="top-buttons d-flex justify-content-end">
        <!-- Back Button -->
        <button class="btn btn-outline-danger" id="backButton">
            <i class="fas fa-arrow-left"></i> Back
        </button>
    </div>

    <!-- form add -->
    @include('ManagementUsers._parts._form')
    <!-- end from add -->

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit" class="btn btn-save">Save</button>
    </div>


    <!-- End Form Add -->

    <br><br><br>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>