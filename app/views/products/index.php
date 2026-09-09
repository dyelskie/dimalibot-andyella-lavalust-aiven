<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products | Product Manager</title>

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

    <div class="page-header">

        <div>
            <h1 class="page-title">
                Products
            </h1>

            <p class="subtitle">
                Manage your products
            </p>
        </div>

        <a href="<?= site_url('products/create') ?>"
           class="btn btn-primary">
            Add Product
        </a>

    </div>

    <div class="card">

        <?php if (!empty($products)): ?>

            <div class="product-table-wrapper">

                <table class="product-table">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                        <tbody>

                        <?php foreach ($products as $p): ?>

                            <tr>

                                <td>
                                    <?= html_escape($p['product_name']) ?>
                                </td>

                                <td>
                                    <?= html_escape($p['description']) ?>
                                </td>

                                <td>
                                    ₱<?= number_format((float) $p['price'], 2) ?>
                                </td>

                                <td>
                                    <?= html_escape($p['quantity']) ?>
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="<?= site_url('products/edit/' . $p['id']) ?>"
                                            class="action-link">
                                            Edit
                                        </a>

                                        <a
                                            href="<?= site_url('products/delete/' . $p['id']) ?>"
                                            class="action-link delete"
                                            onclick="return confirm('Delete this product?');">
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="empty-state">

                <p>
                    No products found.
                </p>

                <br>

                <a
                    href="<?= site_url('products/create') ?>"
                    class="btn btn-primary">
                    Add Your First Product
                </a>

            </div>

        <?php endif; ?>

    </div>

</main>

</body>
</html>