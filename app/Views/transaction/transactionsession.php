<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Transaction</h1>
    </div>

    <div class="search-bar  mt-5">
        <form action="/transaction/<?php echo $transaction_id?>" method="post" class="d-flex">
            <input class="form-control me-2" type="text" name="q" placeholder="Search...">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>

    <div class="tables mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= intval($product['product_price']) ?></td>
                        <td <?php echo ($product['product_qty'] > 0) ? 'class="text-success"' : 'class="text-danger"' ?>>
                            <?php echo ($product['product_qty'] > 0) ? 'In Stock' : 'Out of Stock' ?>
                        </td>
                        <td class="text-center d-flex d-column">
                            <?php if ($product['product_qty'] > 0): ?>
                                <form action="addItem" method="post">  
                                    <input type="number" name="quantity" placeholder="Quantity" required>
                                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                    <input type="hidden" name="transaction_id" value="<?= $transaction_id ?>">
                                    <button class="btn btn-success" type="submit">add</button>
                                </form>
                            <?php else: ?>
                                <p>Out of stock</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- TODO : when click will display the calculated transaksi -->
        <div class="add-product mt-5">
            <form action="/confirm" method="post">
                <input type="hidden" name="transaction_id" value="<?= $transaction_id ?>">
                <button class="btn btn-primary" type="submit">Confirm</button>
            </form>
        </div>

        <!-- TODO : CUSTOMIZE THE PAGINATION -->
        <div>
            <?php echo $pager->links('default')?>
        </div>
    </div>

    
</body>
<?= $this->endSection(); ?>