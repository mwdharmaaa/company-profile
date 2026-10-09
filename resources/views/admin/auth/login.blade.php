<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authentication - MONOCORP</title>
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body style="background-color: var(--bg-secondary); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px;">

    <div style="width: 100%; max-width: 420px;">
        <div style="text-align: center; margin-bottom: 32px;">
            <div style="display: inline-flex; align-items: center; justify-content: center; width: 44px; height: 44px; background: var(--accent); color: #fff; font-size: 16px; font-weight: 700; border-radius: var(--radius-sm); margin-bottom: 12px;">
                M
            </div>
            <h1 style="font-size: 1.5rem; letter-spacing: -0.02em;">MONOCORP Admin</h1>
            <p style="font-size: 13px; color: var(--text-secondary); margin-top: 4px;">Internal System & Content Portal</p>
        </div>

        <div class="card" style="background: #ffffff; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
            @include('partials.flash')

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Administrator Email</label>
                    <input type="email" id="email" name="email" class="form-input" required autofocus value="{{ old('email', 'admin@monocorp.test') }}">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required value="password123">
                </div>

                <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
                    <label class="form-toggle" style="font-size: 13px; color: var(--text-secondary);">
                        <input type="checkbox" name="remember" value="1" class="checkbox-custom">
                        Remember Session
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 8px;">Authenticate &rarr;</button>
            </form>
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('home') }}" style="font-size: 13px; color: var(--text-secondary);">&larr; Return to Public Site</a>
        </div>
    </div>

</body>
</html>
