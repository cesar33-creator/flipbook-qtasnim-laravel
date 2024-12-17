<!-- Form Add -->
<div class="form-container">
    <div class="form-header">Add New User</div>
    <form class="p-4" action="/ManagementUsers" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }} <!-- Laravel CSRF token -->

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Nama :</label>
            <div class="col-md-9">
                <input type="text" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name') }}" name="Name" required autofocus>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email Address Input -->
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email :</label>
            <div class="col-md-9">
                <input type="email" class="form-control @error('Email') is-invalid @enderror" value="{{ old('Email') }}" name="Email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Role Input
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
        </div> -->

        <!-- Photo Input
        <div class="form-group row">
            <label for="photo" class="col-md-3 col-form-label">Photo :</label>
            <div class="col-md-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" required>
                    <label class="custom-file-label" for="photo">Choose file</label>
                </div>
            </div>
        </div> -->