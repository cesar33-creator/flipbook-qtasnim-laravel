<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/logo-qtasnim-kecil-tp.png') }}">
    <title>User Activity</title>

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

    <style>
        body {
            padding-top: 80px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Tabel tanpa border di kolom */
        .table {
        font-size: 14px;
        text-align: center;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #dee2e6; /* Border hanya di luar tabel */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan hitam */
}


        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px;
            border: none; /* Menghilangkan border di setiap kolom */
        }

        .table th {
            background-color: #f8f9fa;
            border-bottom: none !important
        }

        .badge {
            font-size: 12px;
            padding: 5px 10px;
        }

        #searchInput {
            width: 50%;
            max-width: 400px;
        }

        .form-inline {
            margin-bottom: 20px;
        }

        #backButton {
            margin-bottom: 20px;
        }

        .profile-dropdown {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .profile-dropdown .dropdown-menu {
            right: 0;
            left: auto;
        }

        .badge-upload {
            background-color: #007bff;
            color: white;
        }

        .badge-read {
            background-color: #28a745;
            color: white;
        }

        .badge-delete {
            background-color: #dc3545;
            color: white;
        }

        .badge-download {
            background-color: #6f42c1;
            color: white;
        }

        .badge-share {
            background-color: #ffc107; /* Warna kuning */
            color: white;
        }

        /* Styling untuk pagination */
        .pagination {
            display: flex;
            justify-content: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            color: #6c757d; /* Ubah warna ke abu-abu */
            border: 1px solid #6c757d;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #6c757d;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #6c757d;
            color: white;
            border-color: #6c757d;
        }

        .pagination .page-item.disabled .page-link {
            color: #dee2e6;
            border-color: #dee2e6;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <a class="navbar-brand position-relative" href="#">
            <img src="{{ asset('assets/Logo-Qtasnim-Digital-Teknologi.png') }}" alt="Qtasnim LOGO" width="110">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown ml-auto">
            <a class="dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/profile.jpg') }}" style="width: 40px" alt="Avatar" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">
                    <img src="{{ asset('assets/profile.jpg') }}" alt="Avatar">
                </div>
            </div>
        </div>
    </nav>

    <button class="btn btn-outline-danger ml-2 my-2 my-sm-0" id="backButton">
        <i class="fas fa-arrow-left"></i> Back
    </button>

    <h1 class="text-center mt-4">User Activity</h1>
    <br>
    <div class="mx-auto d-flex flex-grow-1 justify-content-center align-items-center">
        <form class="form-inline d-flex">
            <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search Activity..." aria-label="Search" style="width: 250px;">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date & Time</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>Document Name</th>
                    <th>Division</th>
                </tr>
            </thead>
            <tbody id="activityTable">
                @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity['no'] }}</td>
                    <td>{{ $activity['date_time'] }}</td>
                    <td>{{ $activity['username'] }}</td>
                    <td>
                        @if(strtolower($activity['action']) == 'upload')
                        <span class="badge badge-upload">{{ $activity['action'] }}</span>
                        @elseif(strtolower($activity['action']) == 'read')
                        <span class="badge badge-read">{{ $activity['action'] }}</span>
                        @elseif(strtolower($activity['action']) == 'delete')
                        <span class="badge badge-delete">{{ $activity['action'] }}</span>
                        @elseif(strtolower($activity['action']) == 'download')
                        <span class="badge badge-download">{{ $activity['action'] }}</span>
                        @elseif(strtolower($activity['action']) == 'share')
                        <span class="badge badge-share">{{ $activity['action'] }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $activity['action'] }}</span>
                        @endif
                    </td>
                    <td>{{ $activity['document_name'] }}</td>
                    <td>{{ $activity['division'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination">
                <li class="page-item" id="prevPage">
                    <a class="page-link" href="#" onclick="changePage(currentPage - 1)" aria-label="Previous">
                        <span aria-hidden="true">&lt;</span>
                    </a>
                </li>
                <li class="page-item" id="nextPage">
                    <a class="page-link" href="#" onclick="changePage(currentPage + 1)" aria-label="Next">
                        <span aria-hidden="true">&gt;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        const rowsPerPage = 5;
    let currentPage = 1;

function renderPagination(totalRows) {
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    pagination.innerHTML += `
    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="javascript:void(0)" onclick="changePage(currentPage - 1)" aria-label="Previous">
            <span aria-hidden="true">&lt;</span>
        </a>
    </li>
`;

for (let i = 1; i <= totalPages; i++) {
    pagination.innerHTML += `
        <li class="page-item ${i === currentPage ? 'active' : ''}">
            <a class="page-link" href="javascript:void(0)" onclick="changePage(${i})">${i}</a>
        </li>
    `;
}

pagination.innerHTML += `
    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="javascript:void(0)" onclick="changePage(currentPage + 1)" aria-label="Next">
            <span aria-hidden="true">&gt;</span>
        </a>
    </li>
`;

}

function renderTable(page = 1) {
    const start = (page - 1) * rowsPerPage;
    const rows = document.querySelectorAll('#activityTable tr');

    rows.forEach((row, index) => {
        row.style.display = (index >= start && index < start + rowsPerPage) ? '' : 'none';
    });
}

function changePage(page) {
    currentPage = page;
    renderTable(page);
    renderPagination(document.querySelectorAll('#activityTable tr').length);
}

document.addEventListener('DOMContentLoaded', () => {
    const totalRows = document.querySelectorAll('#activityTable tr').length;
    renderPagination(totalRows);
    renderTable();
});

function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#activityTable tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? '' : 'none';
    });

    renderPagination(document.querySelectorAll('#activityTable tr').length);
}

document.getElementById('searchInput').addEventListener('input', filterTable);

// Fungsi untuk tombol Back
document.getElementById('backButton').addEventListener('click', function (event) {
    event.preventDefault(); // Mencegah perilaku default dari tombol

    if (currentPage > 1) {
        // Kurangi halaman saat ini dan render ulang
        currentPage -= 1;
        renderTable(currentPage); // Render tabel untuk halaman sebelumnya
        renderPagination(document.querySelectorAll('#activityTable tr').length); // Render ulang pagination
    } else {
        // Jika sudah di halaman pertama, kembali ke riwayat sebelumnya (opsional)
        window.history.back();
    }
});



</script>

        
</body>