<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Product Manager</title>

    <link rel="stylesheet"
      href="<?= base_url('public/css/style.css') ?>">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <div class="logo">
            Create Account
        </div>

        <div class="subtitle">
            Create an account to manage your products
        </div>

        <form method="post"
              action="<?= site_url('auth/signup') ?>">

            <div class="form-group">
                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    placeholder="Choose a username"
                    required
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter your email"
                    required
                    autocomplete="email"
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
                    placeholder="Create a password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="form-group">
                <label for="confirm_password">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    class="form-control"
                    placeholder="Repeat your password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <button type="submit"
                    class="btn btn-primary">
                Create Account
            </button>

        </form>

        <div class="auth-footer">
            Already have an account?
            <a href="<?= site_url('auth/login') ?>">
                Sign In
            </a>
        </div>

    </div>

</div>

</body>
</html>