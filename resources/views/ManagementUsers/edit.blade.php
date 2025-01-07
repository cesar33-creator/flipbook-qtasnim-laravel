@extends('dashboardadmin')
@section('title','Data Users-')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./anggotas">Master Data</a></li>
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
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="card-header">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Ubah Data User</h5>
                                        </td>
                                        <td>
                                            <div align="right"><a href="{{ url('./ManagementUsers')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="col-12">
                                    <div class="card recent-sales overflow-auto">
                                        <div class="card-body">
                                            <form action="{{ url('ManagementUsers/' .$user->name) }}" method="post" enctype="multipart/form-data">
                                                @method('put')
                                                {{ csrf_field() }}

                                                <!-- Foto -->
                                                <div class="row mb-3">
                                                    <label for="foto" class="col-sm-2 col-form-label">Photo</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" value="{{ old('foto', $user->foto) }}" name="foto" required>
                                                    </div>
                                                </div>

                                                <!-- Name -->
                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" name="name" required>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="row mb-3">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" name="email" required>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Password -->
                                                <div class="row mb-3">
                                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Role -->
                                                <div class="row mb-3">
                                                    <label for="idroles" class="col-sm-2 col-form-label">Role</label>
                                                    <div class="col-sm-10">
                                                        <select name="idroles" class="form-control @error('idroles') is-invalid @enderror" required>
                                                            <option value="" disabled selected>Pilih Role</option>
                                                            @foreach($roles as $item)
                                                                <option value="{{ $item->id }}" {{ old('idroles', $user->idroles) == $item->id ? 'selected' : '' }}>{{ $item->roles }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('idroles')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Gender -->
                                                <div class="row mb-3">
                                                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                                            <option value="" disabled selected>Pilih Gender</option>
                                                            <option value="Pria" {{ old('gender', $user->gender) == 'Pria' ? 'selected' : '' }}>Pria</option>
                                                            <option value="Wanita" {{ old('gender', $user->gender) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Phone Number -->
                                                <div class="row mb-3">
                                                    <label for="phone_number" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $user->phone_number) }}" name="phone_number" required>
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Bio -->
                                                <div class="row mb-3">
                                                    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('bio') is-invalid @enderror" value="{{ old('bio', $user->bio) }}" name="bio" required>
                                                        @error('bio')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-success" style="font-size:16px">
                                                    <span class="bi bi-pencil-square green-color"> Update </span>
                                                </button>

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
    </section>
</main>
@endsection
