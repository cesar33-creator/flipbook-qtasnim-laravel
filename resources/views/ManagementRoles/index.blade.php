@extends('dashboardadmin')
@section('title','Roles-')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./roles">Master Data</a></li>
                <li class="breadcrumb-item active">Data Roles</li>
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
                                            <h5 class="card-title">Data Roles</span></h5>
                                        </td>
                                        <td>
                                            <div align="right">
                                                <a href="{{ url('ManagementRoles/create')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-plus-circle" style="font-size:16px"> New</span></a>
                                            </div>

                                    </tr>
                                </table>

                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Nama Roles</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $item)
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$item -> id}}</td>
                                            <td>{{$item -> roles}}</td>

                                            <td><a href="{{ url('ManagementRoles/' .$item->id.'/edit')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-pencil-square" style="font-size:12px"></span></a> </td>
                                            <td>
                                                <form action="{{ url('ManagementRoles/' .$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
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