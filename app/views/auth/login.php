<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Product Manager</title>

    <link rel="stylesheet"
      href="<?= base_url('public/css/style.css') ?>">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <div class="logo">
            Product Manager
        </div>

        <div class="subtitle">
            Sign in to manage your products
        </div>

        <form method="post"
              action="<?= site_url('auth/login') ?>">

            <div class="form-group">
                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    placeholder="Enter your username"
                    required
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <button type="submit"
                    class="btn btn-primary">
                Sign In
            </button>

        </form>

        <div class="auth-footer">
            Don't have an account?
            <a href="<?= site_url('auth/signup') ?>">
                Sign Up
            </a>
        </div>

    </div>

</div>

</body>
</html>