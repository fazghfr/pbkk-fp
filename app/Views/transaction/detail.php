<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Detail Transaction</h1>
        <hr>
        <p>Employee : <?php echo $username?></p>
    </div>

    <div class="tables mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>QTY</th>
                    <th>Price Each</th>
                    <th>subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <!-- qty -->
                        <td><?= $setID[$product['product_id']] ?></td> 
                        <td><?= number_format(intval($product['product_price'])  , 0, '.', ',');?></td>
                        <td><?= number_format(intval($product['product_price']) * $setID[$product['product_id']]  , 0, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="total mt-5">
            <h3>Total : <?= number_format($total  , 0, '.', ',');?></h3> 
        </div>
        <div class="add-product mt-5">
            <a href="/home-transaction" class="btn btn-primary">Back to Home</a>
        </div>

    </div>

    
</body>
<?= $this->endSection(); ?>