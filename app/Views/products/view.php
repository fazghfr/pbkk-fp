<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="mt-5 text-center">
        <br><br><br>
        <br><br><br>
        <h1><?= $product['product_name'] ?></h1>
        <br>
    </div>

    <div class="table-responsive text-center mt-5">
        <!-- Add the table-responsive class for smaller screens -->
        <table class="table ">
            <tr>
                <th>Product Price</th>
                <th>Product Quantity</th>
            </tr>
            <tr>
                <td><?= number_format($product['product_price'] , 0, '.', ','); ?></td>
                <td><?= $product['product_qty'] ?></td>
            </tr>
        </table>

        <div>
            <a href="/product" class="btn btn-primary">Back</a>
            <a href="/product/edit/<?= $product['product_id'] ?>" class="btn btn-warning">Edit</a>
            <a href="/product/delete/<?= $product['product_id'] ?>" class="btn btn-danger">delete</a>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>
