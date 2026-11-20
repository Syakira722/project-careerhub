<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — CareerHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4f46e5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 36px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
        }
        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 11px 14px;
            border: 1.5px solid #e2e8f0;
        }
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="text-center mb-4">
        <div class="brand-icon mb-3"><i class="bi bi-rocket-takeoff-fill"></i></div>
        <h4 class="fw-bold mb-1">Selamat Datang Kembali</h4>
        <p class="text-muted small">Masuk ke akun CareerHub kamu</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger py-2 small rounded-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold small">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="nama@email.com" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold small">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Masuk Sekarang</button>
    </form>

    <div class="text-center small text-muted">
        Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Daftar di sini</a>
        <div class="mt-2"><a href="{{ route('home') }}" class="text-secondary text-decoration-none">&larr; Kembali ke Home</a></div>
    </div>
</div>

</body>
</html>
