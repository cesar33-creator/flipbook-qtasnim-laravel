<!-- Form Add -->
<div class="form-container">
    <div class="form-header">Add New Roles</div>
    <form class="p-3" action="{{ route('ManagementRoles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF token -->

        <!-- ID -->
        <div class="form-group row">
            <label for="id" class="col-md-3 col-form-label">ID :</label>
            <div class="col-md-9">
                <input type="text" class="form-control @error('id') is-invalid @enderror" placeholder="Masukkan ID Role" value="{{ old('id') }}" name="id" required autofocus>
                @error('id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Name Roles Input -->
        <div class="form-group row">
            <label for="roles" class="col-md-3 col-form-label">Name Roles :</label>
            <div class="col-md-9">
                <input type="roles" class="form-control @error('roles') is-invalid @enderror" placeholder="Masukkan Name Roles" value="{{ old('roles') }}" name="roles" required>
                @error('roles')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

