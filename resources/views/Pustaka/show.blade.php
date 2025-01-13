<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>{{ $data->nama_buku }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!-- costume css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Include JS -->
    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#read").flipBook({
                //Layout Setting
                pdfUrl: "{{ asset('storage/' . $data->file_buku) }}",
                lightBox: true,
                layout: 3,
                currentPage: {
                    vAlign: "bottom",
                    hAlign: "left"
                },
                // BTN SETTING
                btnShare: {
                    enabled: false
                },
                btnPrint: {
                    hideOnMobile: true
                },
                btnColor: 'rgb(255,120,60)',
                sideBtnColor: 'rgb(255,120,60)',
                sideBtnSize: 60,
                sideBtnBackground: "rgba(0,0,0,.7)",
                sideBtnRadius: 60,
                btnBookmark: {
                    enabled: false
                }, // Pastikan ini ditambahkan
                btnSound: {
                    vAlign: "top",
                    hAlign: "left"
                },
                btnAutoplay: {
                    vAlign: "top",
                    hAlign: "left"
                },
            });

            $('#btnBack').on('click', function() {
                window.history.back();
            });

            //Alert Delete
            document.getElementById('btnDeleteKr').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the form from submitting immediately

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if confirmed
                        document.getElementById('deleteForm').submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelled',
                            text: 'Your file is safe :)',
                            icon: 'error'
                        });
                    }
                });
            });

            //Share File
            document.getElementById('btnShare').addEventListener('click', function() {
                const fileUrl = "{{ Storage::url($data->file_buku) }}"; // URL publik dari storage Laravel
                const fileName = "{{ $data->nama_buku }}"; // Nama file buku

                // Tampilkan dialog SweetAlert dengan opsi berbagi
                Swal.fire({
                    title: 'Bagikan File',
                    text: 'Salin tautan file ini untuk dibagikan:',
                    input: 'text',
                    inputValue: fileUrl,
                    showCancelButton: true,
                    confirmButtonText: 'Salin Tautan',
                    cancelButtonText: 'Tutup',
                    inputAttributes: {
                        readonly: true
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Salin tautan ke clipboard
                        navigator.clipboard.writeText(fileUrl).then(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Tautan berhasil disalin!',
                                text: 'Anda dapat membagikan tautan ini sekarang.',
                            });
                        }).catch((error) => {
                            console.error('Gagal menyalin tautan:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal menyalin tautan!',
                                text: 'Silakan coba lagi.',
                            });
                        });
                    }
                });
            });

        });
    </script>

    <style>
        body {
            background-color: #f6f6f6;
        }

        #author {
            font-size: 15px;
            font-weight: bold;
            color: #0186c9;
        }

        #date {
            margin-left: 10px;
            font-size: 15px;
            color: #819196;
        }

        #size {
            font-size: 15px;
            color: #819196;
        }

        #description {
            margin-top: 20px;
            font-weight: lighter;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim Logo" width="150">
        </a>

        <div class="ml-auto d-flex align-items-center">
            <!-- Button Back -->
            <button class="btn btn-outline-danger mr-2" id="btnBack">
                <i class="fas fa-arrow-left"></i> Back
            </button>

            <!-- Button Delete -->
            <form action="/UploadPustaka/{{ $data->idbuku }}" method="post" id="deleteForm" class="p-0 m-0">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-outline-danger" id="btnDeleteKr">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </form>
        </div>
    </nav>
    <!-- End Of Navbar -->


    <br><br><br><br><br>

    <!-- PDF INFORMATION -->
    <section class="info" id="info">
        <div class="container">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/' . $data->image_buku) }}" class="w-100 book-1">
                    </div>
                    <div class="col-md-7 mt-3">
                        <!-- Info -->
                        <h3 id="title">{{ $data->nama_buku }}</h3>
                        <p id="size"><i class="fas fa-file "></i> File Size <b>{{ $fileSize }}</b></p>
                        <!-- Button -->
                        <div class="button">
                            <a id="read" class="btn btn-primary mt-2 text-white">Baca PDF <i class="fas fa-book-reader fa-lg"></i></a>
                            <a href="{{ asset('storage/' . $data->file_buku) }}" class="btn btn-primary mt-2 text-white" download>Unduh PDF <i class="fas fa-download fa-lg"></i></a>
                            <a id="btnShare" class="btn btn-primary mt-2 text-white">Bagikan File <i class="fas fa-share-alt fa-lg"></i></a>
                        </div>
                        <!-- Description -->
                        <p id="description">{{ $data->deskripsi_buku }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF PDF INFORMATION -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>