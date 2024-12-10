<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Qtasnim</title>

    <!-- jQuery & jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

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

            // Pencarian PDF
            $('.form-inline').on('submit', function(event) {
                event.preventDefault();
                var searchValue = $('.form-control').val().toLowerCase();
                $('.thumb').each(function() {
                    var fileName = $(this).data('name').toLowerCase();
                    $(this).toggle(fileName.indexOf(searchValue) !== -1);
                });
            });

            // Menutup navbar saat klik di luar
            $(document).on('click', function(event) {
                var target = $(event.target);
                if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
                    $('.navbar-collapse').collapse('hide');
                }
            });

            // Event untuk klik Buku Khusus
            $('.book-1 a').on('click', function(event) {
                event.preventDefault(); // Cegah navigasi

                Swal.fire({
                    icon: "error",
                    title: "Maaf Anda Harus Login",
                    allowOutsideClick: true, // Cegah penutupan alert dengan klik di luar
                    confirmButtonText: "OK" // Tombol untuk melanjutkan
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman login setelah klik OK
                        window.location.href = "{{ url('login') }}";
                    }
                });
            });


        });
    </script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="150">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mx-auto d-flex flex-grow-1 justify-content-center align-items-center">
                <form class="form-inline d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search PDF..." aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <button class="btn btn-outline-danger ml-2 my-2 my-sm-0" id="backButton">
                <i class="fas fa-arrow-left"></i> Back
            </button>
        </div>
    </nav>
    <!-- End Of Navbar -->

    <br><br><br><br><br>

    <!-- H1 Dashboard -->
    <h1 class="text-center mt-8">Dashboard</h1>

    <br><br>

    <!-- PDF Section -->
    <div class="bookshelf">
        <div class="covers">
            <div class="thumb book-1" data-name="Buku Khusus">
                <a href="{{ url('BukuKhusus') }}">
                    <img src="{{ asset('assets/bukuKhusus.png') }}" alt="Buku Khusus">
                </a>
            </div>
            <div class="thumb book-2" data-name="Buku Panduan">
                <a href="{{ url('BukuPanduan') }}">
                    <img src="{{ asset('assets/bukuPanduan.png') }}" alt="Buku Panduan">
                </a>
            </div>
            <div class="thumb book-3" data-name="Buku Karyawan">
                <a href="{{ url('BukuKaryawan') }}">
                    <img src="{{ asset('assets/BukuKaryawan.png') }}" alt="Buku Karyawan">
                </a>
            </div>
        </div>
        <img class="shelf-img" src="{{ asset('assets/shelf_wood.png') }}" alt="Shelf">
    </div>

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