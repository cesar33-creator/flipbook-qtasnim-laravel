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
    window.onload = function() {
        let shelvesContainer = document.getElementById('shelvesContainer');
        let coversContainer = document.getElementById('coversContainer');

        // Function to add new rack after 5 books
        function checkAndAddShelf() {
            let books = coversContainer.getElementsByClassName('thumb');
            if (books.length >= 5) {
                // Create new shelf after 5 books
                let newShelf = document.createElement('div');
                newShelf.classList.add('shelf', 'has-books');
                newShelf.innerHTML = `
                    <img src="{{ asset('assets/Rak buku.png') }}" alt="Rak Buku">
                    <div class="covers"></div>
                `;
                shelvesContainer.appendChild(newShelf);
                coversContainer = newShelf.querySelector('.covers'); // Update coversContainer to new shelf
            }
        }

        // Call this function to check if a new shelf is needed
        checkAndAddShelf();

        // Simulate upload action with JavaScript for book upload handling
        document.getElementById('uploadBtn').addEventListener('click', function() {
            // Here, you can replace this with the actual upload logic
            // For now, we will simulate the new book upload by using placeholder data.

            let newBookData = {
                id: 'NEW_BOOK_ID', // Replace with the actual book ID after upload
                image: 'NEW_BOOK_IMAGE_URL' // Replace with the actual image URL after upload
            };

            // Create new book element
            let newBook = document.createElement('div');
            newBook.classList.add('thumb', 'book-3');
            newBook.innerHTML = `
                    <a href="/General/${newBookData.id}">
                        <img src="${newBookData.image}" alt="New Book">
                    </a>
                `;

            // Add the new book to the current covers container (it will be added to the new shelf if necessary)
            coversContainer.appendChild(newBook);

            // Check if a new shelf is needed after adding a book
            checkAndAddShelf();
        });
    };

    $(document).ready(function() {
        // Menutup navbar saat klik di luar
        $(document).on('click', function(event) {
            var target = $(event.target);
            if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
                $('.navbar-collapse').collapse('hide');
            }
        });

        // Fungsi untuk tombol Back
        $('#backButton').on('click', function() { // Tambahkan `$` di sini
            window.history.back();
        });
    });
</script>

<body>

    @include('Navbar._parts._nav_search')

    <button class="btn btn-outline-danger ml-2 my-2 my-sm-0 back-btn" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <h2 class="bookshelf-title">Daftar Buku General</h2>
    <div class="bookshelf">
        <div class="shelves" id="shelvesContainer">
            <div class="shelf has-books" id="shelf1">
                <img src="{{ asset('assets/Rak buku.png') }}" alt="Rak Buku">
                <div class="covers" id="coversContainer">
                    @foreach ($data as $index => $item)
                    <div class="thumb book-3" data-name="{{ $item->nama_buku }}" data-id="{{ $item->id }}" data-image="{{ asset('storage/' . $item->image_buku) }}">
                        <a href="/General/{{ $item->id }}">
                            <img src="{{ asset('storage/' . $item->image_buku) }}" alt="{{ $item->nama_buku }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="UploadGeneral/create" class="btn-upload" id="uploadBtn">
            <button class="upload-btn">+ Upload File</button>
        </a>
    </div>

    <!-- JS -->


</body>

</html>