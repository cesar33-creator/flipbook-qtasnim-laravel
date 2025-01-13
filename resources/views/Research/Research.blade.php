<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Rak Buku</title>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<script>
window.onload = function () {
    let shelvesContainer = document.getElementById('shelvesContainer');

    // Periksa apakah perlu menambah rak baru
    function checkAndAddShelf() {
        let lastShelf = shelvesContainer.lastElementChild;
        if (!lastShelf || lastShelf.querySelector('.covers').getElementsByClassName('thumb').length === 6) {
            // Buat rak baru
            let newShelf = document.createElement('div');
            newShelf.classList.add('shelf', 'has-books');
            newShelf.innerHTML = `
                <img src="{{ asset('assets/Rak buku.png') }}" alt="Rak Buku">
                <div class="covers"></div>
            `;
            shelvesContainer.appendChild(newShelf);
        }
    }

    // Tambahkan buku baru ke rak terakhir
    function addBook(newBookData) {
        checkAndAddShelf(); // Pastikan rak baru dibuat jika rak terakhir penuh

        // Temukan rak terakhir
        let lastShelf = shelvesContainer.lastElementChild;
        let coversContainer = lastShelf.querySelector('.covers');

        // Buat elemen buku baru
        let newBook = document.createElement('div');
        newBook.classList.add('thumb', 'book-3');
        newBook.innerHTML = `
            <a href="/Research/${newBookData.id}">
                <img src="${newBookData.image}" alt="New Book">
            </a>
        `;

        // Tambahkan buku ke rak terakhir
        coversContainer.appendChild(newBook);
    }

    // Hapus buku terakhir dari rak terakhir
    function removeBook() {
        let lastShelf = shelvesContainer.lastElementChild;
        if (lastShelf) {
            let coversContainer = lastShelf.querySelector('.covers');
            let books = coversContainer.getElementsByClassName('thumb');

            if (books.length > 0) {
                // Hapus buku terakhir dari rak terakhir
                coversContainer.removeChild(books[books.length - 1]);
            }

            // Hapus rak jika kosong
            if (coversContainer.getElementsByClassName('thumb').length === 0) {
                shelvesContainer.removeChild(lastShelf);
            }
        }
    }

    // Event upload buku
    document.getElementById('uploadBtn').addEventListener('click', function () {
        let newBookData = {
            id: 'NEW_BOOK_ID', 
            image: 'NEW_BOOK_IMAGE_URL'
        };
        addBook(newBookData);
    });

    // Event hapus buku
    document.getElementById('removeBtn').addEventListener('click', function () {
        removeBook();
    });
};


$(document).ready(function () {
    // Tutup navbar jika klik di luar
    $(document).on('click', function (event) {
        var target = $(event.target);
        if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
            $('.navbar-collapse').collapse('hide');
        }
    });

    // Fungsi tombol kembali
    $('#backButton').on('click', function () {
        window.history.back();
    });
});
</script>

<body>

    @include('Navbar._parts._nav_search')

    <button class="btn btn-outline-danger ml-2 my-2 my-sm-0 back-btn" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <h2 class="bookshelf-title">Daftar Buku Research</h2>
    <div class="bookshelf">
        <div class="shelves" id="shelvesContainer">
            <div class="shelf has-books" id="shelf1">
                <img src="{{ asset('assets/Rak buku.png') }}" alt="Rak Buku">
                <div class="covers" id="coversContainer">
                    @foreach ($data as $index => $item)
                    <div class="thumb book-3" data-name="{{ $item->nama_buku }}" data-id="{{ $item->idbuku }}" data-image="{{ asset('storage/' . $item->image_buku) }}">
                        <a href="/Research/{{ $item->idbuku }}">
                            <img src="{{ asset('storage/' . $item->image_buku) }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="UploadResearch/create" class="btn-upload" id="uploadBtn">
            <button class="upload-btn">+ Upload File</button>
        </a>
    </div>

    <!-- JS -->


</body>

</html>