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
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script></script>

    <script type="text/javascript">
        //search
        $(document).ready(function() {
            // Fungsi untuk tombol Back
            $('#backButtonPd').on('click', function() {
                window.history.back();
            });
            // Pencarian
            $('.form-inline').on('submit', function(event) {
                event.preventDefault(); // Mencegah form untuk submit
                var searchValue = $('.form-control').val().toLowerCase(); // Ambil nilai input dan ubah ke lowercase
                $('.thumb').each(function() {
                    var fileName = $(this).data('name').toLowerCase(); // Ambil nama file dari data-name
                    if (fileName.indexOf(searchValue) !== -1) {
                        $(this).show(); // Tampilkan elemen yang cocok
                    } else {
                        $(this).hide(); // Sembunyikan elemen yang tidak cocok
                    }
                });
            });

            // Menutup navbar saat klik di luar
            $(document).on('click', function(event) {
                var target = $(event.target);
                if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
                    $('.navbar-collapse').collapse('hide'); // Menyembunyikan navbar
                }
            });

            // Fungsi upload file saat tombol diklik
            document.getElementById('uploadBtn').addEventListener('click', function() {
                document.getElementById('uploadFile').click();
            });

            // Tampilkan alert saat file dipilih
            document.getElementById('uploadFile').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    alert('File "' + file.name + '" telah dipilih!');
                }
            });

        });
    </script>

    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Daftar Buku Panduan</title>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="150">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mx-auto d-flex flex-grow-1 justify-content-center align-items-center">
                <form class="form-inline d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search PDF..." aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <!-- Back button outside the center div for proper alignment in desktop view -->
            <button class="btn btn-outline-danger ml-2 my-2 my-sm-0 back-btn" id="backButtonPd">
                <i class="fas fa-arrow-left"></i> Back
            </button>
        </div>
    </nav>
    <!-- End Of Navbar -->


    <br><br><br><br><br>

    <!-- H1 Buku Panduan -->
    <h1 class="text-center mt-8">Daftar Buku Panduan</h1>

    <br><br>

    <!-- PDF HERE -->
    <div class="bookshelf ">
        <div class="covers">
            @foreach ($data as $item)
            <div class="thumb book-3" data-name="{{ $item->nama_buku }}">
                <a href="/BukuPanduan/{{ $item->idbuku }}">
                    <img src="{{ asset('storage/' . $item->image_buku) }}">
                </a>
            </div>
            @endforeach
        </div>
        <img class="shelf-img" src="{{ asset('assets/shelf_wood.png') }}">
    </div>
    <br>

    </div>
    <!-- End Of PDF -->

    <br>

    <!-- Input File dan Button Upload -->
    <a href="UploadPanduan/create" class="btn-upload" id="uploadBtn">
        <i class="fa fa-plus"></i>Upload File
    </a>

    <!-- Bootstrap Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>