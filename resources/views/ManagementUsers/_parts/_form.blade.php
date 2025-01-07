<!-- Form Add -->
<div class="form-container">
    <div class="form-header">Add New User</div>
    <form class="p-3" action="{{ route('ManagementUsers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF token -->

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Nama :</label>
            <div class="col-md-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('name') }}" name="name" required autofocus>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email Address Input -->
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email :</label>
            <div class="col-md-9">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}" name="email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">Password :</label>
            <div class="col-md-9">
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group row">
            <label for="password_confirmation" class="col-md-3 col-form-label">Konfirmasi Password :</label>
            <div class="col-md-9">
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password_confirmation" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Role Input -->
        <div class="form-group row">
            <label for="role" class="col-md-3 col-form-label">Roles :</label>
            <div class="col-md-9">
                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="">Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Photo Input -->
        <div class="form-group row">
            <label for="photo" class="col-md-3 col-form-label">Photo :</label>
            <div class="col-md-9">
                <div class="custom-file">
                    <input class="custom-file-input" type="file" id="photo" name="photo" accept="image/*">
                    <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
        </div>