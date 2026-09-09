<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product | Product Manager</title>

    <link rel="stylesheet"
          href="<?= base_url('public/css/style.css') ?>">
</head>

<body>

<nav class="navbar">

    <div class="navbar-inner">

        <a href="<?= site_url('products') ?>" class="brand">
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
            Edit Product
        </h1>

        <form
            method="post"
            action="<?= site_url('products/edit/' . $product['id']) ?>">

            <div class="form-group">

                <label for="product_name">
                    Product Name
                </label>

                <input
                    type="text"
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="<?= html_escape($product['product_name']) ?>"
                    placeholder="Enter product name"
                    required
                >

            </div>

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    rows="5"
                    placeholder="Enter product description"
                    required
                ><?= html_escape($product['description']) ?></textarea>

            </div>

            <div class="form-group">

                <label for="price">
                    Price
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    class="form-control"
                    value="<?= html_escape($product['price']) ?>"
                    placeholder="0.00"
                    step="0.01"
                    min="0"
                    required
                >

            </div>

            <div class="form-group">

                <label for="quantity">
                    Quantity
                </label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    class="form-control"
                    value="<?= html_escape($product['quantity']) ?>"
                    placeholder="0"
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
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</main>

</body>

</html>