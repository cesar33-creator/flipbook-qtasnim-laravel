<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!-- Costume CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Dashboard.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // Pencarian
            $('.form-inline').on('submit', function (event) {
                event.preventDefault();
                var searchValue = $('.form-control').val().toLowerCase();
                $('.thumb').each(function () {
                    var fileName = $(this).data('name').toLowerCase();
                    if (fileName.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Menutup navbar saat klik di luar
            $(document).on('click', function (event) {
                if (!$(event.target).closest('.navbar').length &&
                    !$(event.target).closest('.form-inline').length) {
                    $('.navbar-collapse').collapse('hide');
                }
            });

            // Tombol Back
            $('#backButton').on('click', function () {
                console.log('Back button clicked!');
                if (history.length > 1) {
                    history.back(); // Kembali ke halaman sebelumnya
                } else {
                    alert('Tidak ada halaman sebelumnya.');
                }
            });
        });
    </script>

    <!-- Logo icon qtasnim -->
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Qtasnim</title>

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
            <!-- Centered Search Form -->
            <div class="mx-auto d-flex flex-grow-1 justify-content-center align-items-center">
                <form class="form-inline d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search PDF..." aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <!-- Right-aligned Buttons: Back and Logout -->
            <div class="d-flex align-items-center ml-auto">
                <!-- Back Button -->
                <button class="btn btn-outline-danger ml-2 my-2 my-sm-0" id="backButton">
                    <i class="fas fa-arrow-left"></i> Back
                </button>

                <!-- Logout Form -->
                <form method="POST" action="/logout" class="ml-2">
                    @csrf
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Of Navbar -->

    <br><br><br><br><br>

    <!-- H1 Dashboard -->
    <h1 class="text-center mt-8">Dashboard</h1>

    <br><br>

    <!-- PDF HERE -->
    <div class="bookshelf ">
        <div class="covers">
            <div class="thumb book-1" data-name="Buku Khusus">
                <a href="{{ url('BukuKhusus') }}">
                    <img src="{{ asset ('assets/bukuKhusus.png') }}">
                </a>
            </div>
            <div class="thumb book-2" data-name="Buku Panduan">
                <a href="{{ url('BukuPanduan') }}">
                    <img src="{{ asset('assets/bukuPanduan.png') }}">
                </a>
            </div>
            <div class="thumb book-3" data-name="Buku Karyawan">
                <a href="{{ url('BukuKaryawan') }}">
                    <img src="{{ asset('assets/BukuKaryawan.png') }}">
                </a>
            </div>
        </div>
        <img class="shelf-img" src="{{ asset('assets/shelf_wood.png') }}">
    </div>
    <br>

    </div>
    <!-- End Of PDF -->

    <br><br><br>

    <!-- Bootstrap Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>