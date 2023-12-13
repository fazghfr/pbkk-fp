<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <br><br><br>
    <div class="container mt-5">
        <div>
            <h1 class="text-center">Insert Data Product</h1>
            <p class="text-center">Add a new Product</p>
        </div>
        <hr style="max-width: 300px;">
        <form action="/product/add" method="post" class="text-center">
            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_name">Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="name of the product">
            </div>

            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_price">Price:</label>
                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="price of the product each">
            </div>

            <div class="form-group mx-auto" style="max-width: 300px;">
                <label for="product_qty">Quantity:</label>
                <input type="number" class="form-control" name="product_qty" id="product_qty" placeholder="the quantity amount of the product">
            </div>

            <button class="btn btn-success mt-3" type="submit">Submit</button>
        </form>
    </div>
</body>

<?= $this->endSection(); ?>
