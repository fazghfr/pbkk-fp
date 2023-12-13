<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <br><br><br>
    <div class="container mt-5">
        <div>
            <h1 class="text-center"><?= $product['product_name'] ?></h1>
            <p class="text-center">Edit Page</p>
        </div>
        <hr style="max-width: 300px;">
        <form action="/product/update/<?= $product['product_id'] ?>" method="post" class="text-center">
            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_name">Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="<?= $product['product_name'] ?>">
            </div>

            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_price">Price:</label>
                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="<?= $product['product_price'] ?>">
            </div>

            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_qty">Quantity:</label>
                <input type="number" class="form-control" name="product_qty" id="product_qty" placeholder="<?= $product['product_qty'] ?>">
            </div>

            <button class="btn btn-success mt-3" type="submit">Submit</button>
        </form>
    </div>
</body>

<?= $this->endSection(); ?>
