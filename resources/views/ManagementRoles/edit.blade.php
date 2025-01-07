@extends('dashboardadmin')
@section('title','Data Roles-')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./anggotas">Master Data</a></li>
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
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="card-header">
                                <table width="100%" class="fa fa-text-height" aria-hidden="true" border="0" cellpadding="0" cellspacing="0" class="fa fa-align-center">
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Ubah Data Roles</span></h5>
                                        </td>
                                        <td>
                                            <div align="right"><a href="{{ url('./ManagementRoles')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="col-12">
                                    <div class="card recent-sales overflow-auto">
                                        <div class="card-body">
                                            <form action="{{ url('ManagementRoles/' .$roles->id) }}" method="post" enctype="multipart/form-data">

                                                @method('put')
                                                {{ csrf_field() }}
                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">ID</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ old('id',$roles->id) }}" name="id" required autofocus>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik" class="col-sm-2 col-form-label">Nama Roles</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{ old('roles',$roles->roles) }}" name="roles" required autofocus>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-success" style="font-size:16px"><span class="bi bi-pencil-square green-color"> Update </span></button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection