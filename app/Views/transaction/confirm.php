<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Transaction</h1>
    </div>

    <div class="tables mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price Each</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <!-- qty -->
                        <td><?= $setID[$product['product_id']] ?></td> 
                        <td><?= intval($product['product_price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="total mt-5">
            <h3>Total : <?= $transaction['total'] ?></h3> 
        </div>
        <div class="add-product mt-5">
            <a href="/#" class="btn btn-primary">Back to Home</a>
        </div>

    </div>

    
</body>
<?= $this->endSection(); ?>