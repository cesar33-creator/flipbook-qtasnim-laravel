<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="images/logo-qtasnim-kecil-tp.png">
    <title>Company Profile Qtasnim</title>
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
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Include JS -->
    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#read").flipBook({
                //Layout Setting
                pdfUrl: "{{ asset ('assets/pdf/20241002_Company_Profile_PT_Qtasnim_Digital_Teknologi.pdf') }}",
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
        <button class="btn btn-outline-danger ml-auto" id="btnBack">
            <i class="fas fa-arrow-left"></i> Back
        </button>
    </nav>
    <!-- End Of Navbar -->

    <br><br><br><br><br>

    <!-- PDF INFORMATION -->
    <section class="info" id="info">
        <div class="container">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('assets/book2/CompanyProfileQtasnim.jpg') }}" class="w-100 book-1">
                    </div>
                    <div class="col-md-7 mt-3">
                        <!-- Info -->
                        <h3 id="title">Company Profile Qtasnim</h3>
                        <p id="size"><i class="fas fa-file "></i> File Size <b>7,8MB</b></p>
                        <!-- Button -->
                        <div class="button">
                            <a id="read" class="btn btn-primary mt-2 text-white">Baca PDF <i class="fas fa-book-reader fa-lg"></i></a>
                            <a href="{{ asset('assets/pdf/20241002_Company_Profile_PT_Qtasnim_Digital_Teknologi.pdf') }}" class="btn btn-primary mt-2 text-white" download>Unduh PDF <i class="fas fa-download fa-lg"></i></a>
                        </div>
                        <!-- Description -->
                        <p id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quo velit consequuntur, iste, impedit dignissimos vitae nesciunt et commodi quos quis iusto est iure tenetur eum amet quas temporibus esse praesentium incidunt sequi ratione. Fuga ab quas itaque enim, molestiae, totam, necessitatibus magni dolores eligendi obcaecati libero omnis iste. Facilis.</p>
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