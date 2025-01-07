<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>Management User - Qtasnim</title>

    <!-- jQuery & jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-dyBbyVBKdqErH0P5E9t2FytSBuwjAPTk1XBpk68e5U9A3PSVblQxr4N6RTl9+0I3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flipbook.style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/managementusers.css') }}">

    <script src="{{ asset('assets/js/flipbook.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {


            // Menutup navbar saat klik di luar
            $(document).on('click', function(event) {
                var target = $(event.target);
                if (!target.closest('.navbar').length && !target.closest('.form-inline').length) {
                    $('.navbar-collapse').collapse('hide');
                }
            });
        });

        //filter button
        $(document).ready(function() {

            // Ambil URL saat ini
            const currentURL = window.location.href;

            // Tentukan tab aktif berdasarkan URL
            $(".filter-tabs a").each(function() {
                const href = $(this).attr("href");
                if (currentURL.includes(href)) {
                    $(".filter-tabs .btn").removeClass("active");
                    $(this).addClass("active");
                }
            });

        });
    </script>
</head>

<body>

    <!-- Navbar -->
    @include('ManagementUsers._parts._navbar')
    <!-- End Navbar -->

    <br><br><br><br>

    <!-- H2 Dashboard -->


    <!-- Buttons -->
    <div class="top-buttons">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <a href="{{ url('ManagementUsers') }}" class="btn active">Users</a>
            <a href="{{ url('ManagementRoles') }}" class="btn">Roles</a>
        </div>

        <!-- Back Button -->
        <a href="{{ url('dashboard') }}" class="btn btn-outline-danger" id="backButton">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="action-bar">


        <h3 class="text-center mt-8 h3"> </h3>

        <!-- <div class="mx-auto d-flex flex-grow-1 justify-content-center align-items-center"> -->
        <form class="form-inline d-flex">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Users" aria-label="Search">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!-- </div> -->
    </div>

    <!-- Tables -->
    <div class="table-wrapper">
        <div class="datatable-wrapper">
            <table class="table table-borderd datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Bio</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$loop -> iteration}}</td>
                        <td>{{$item -> foto}}</td>
                        <td>{{$item -> name}}</td>
                        <td>{{$item -> phone_number}}</td>
                        <td>{{$item -> email}}</td>
                        <td>{{$item -> gender}}</td>
                        <td>{{$item -> bio}}</td>

                        <td><a href="{{ url('ManagementUsers/' .$item->name.'/edit')}}" class="btn btn-success btn-sm">
                                <span class="bi bi-pencil-square" style="font-size:12px"></span></a> </td>
                        <td>
                            <form action="{{ url('ManagementUsers/' .$item->name)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-success btn-sm"><span class="bi bi-trash"></span></button>
                        </td>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Tables -->

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