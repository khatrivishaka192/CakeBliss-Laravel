<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Cake Bliss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 style="color:#ff4fa7; font-weight:600; margin-bottom:20px; " class="text-center mb-4">Admin Login</h2>

    <!-- Show login error (wrong email/password) -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any() && old('_token'))
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/login') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
        </div>
        <button type="submit" class="btn"
                style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:8px 15px;">
            Login
        </button>

    </form>
</div>
</body>
</html>
