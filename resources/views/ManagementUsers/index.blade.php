@extends('dashboardadmin')
@section('title','Account-')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./users">Master Data</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="col-12">
            <div class="row">
                <div class="card top-selling overflow-auto">
                    <div class="content mt-3">
                        <div class="animated fadeIn">
                            @if (session('status'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Proses...! </strong> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <div class="card-header">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Data Users</h5>
                                        </td>
                                        <td>
                                            <div align="right">
                                                <a href="{{ url('ManagementUsers/create')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-plus-circle" style="font-size:16px"> New</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-borderless datatable">
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
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{ asset('storage/' . $item->foto) }}" alt="User Photo" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone_number}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->idroles}}</td>
                                            <td>{{$item->gender}}</td>
                                            <td>{{$item->bio}}</td>

                                            <td><a href="{{ url('ManagementUsers/' .$item->name.'/edit')}}" class="btn btn-success btn-sm">
                                                <span class="bi bi-pencil-square" style="font-size:12px"></span></a> </td>
                                            <td>
                                                <form action="{{ url('ManagementUsers/' .$item->name)}}" method="post" class="d-inline delete-form">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-success btn-sm"><span class="bi bi-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/management.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
