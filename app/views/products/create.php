<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Product Manager</title>

    <link rel="stylesheet"
      href="<?= base_url('public/css/style.css') ?>">
</head>

<body>

<nav class="navbar">

    <div class="navbar-inner">

        <a href="<?= site_url('products') ?>"
           class="brand">
            Product Manager
        </a>

        <div class="nav-right">

            <span class="username">
                <?= html_escape($username) ?>
            </span>

            <a href="<?= site_url('auth/logout') ?>"
               class="btn btn-secondary">
                Logout
            </a>

        </div>

    </div>

</nav>

<main class="container">

    <div class="card form-card">

        <h1 class="form-title">
            Add Product
        </h1>

            <form method="post" action="<?= site_url('products/create') ?>">

                <div class="form-group">
                    <label for="product_name">Product Name</label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        class="form-control"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="5"
                        required
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control"
                        step="0.01"
                        min="0"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        class="form-control"
                        min="0"
                        required
                    >
                </div>

                <div class="form-actions">

                    <a
                        href="<?= site_url('products') ?>"
                        class="btn btn-secondary">
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">
                        Create Product
                    </button>

                </div>

            </form>

    </div>

</main>

</body>
</html>