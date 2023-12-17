<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Products</h1>
    </div>

    <div class="search-bar  mt-5">
        <form action="/product" method="post" class="d-flex">
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
                        <td><?= number_format(intval($product['product_price']) , 0, '.', ',');?></td> 
                        <td><?= $product['product_qty'] ?></td>
                        <td class="text-center d-flex d-column">
                            <form action="/product/edit/<?= $product['product_id'] ?>" method="get">
                                <button class="btn btn-warning" type="submit">Edit</button>
                            </form>
                            <form action="/product/view/<?= $product['product_id'] ?>" method="get">  
                                <button class="btn btn-success" type="submit">View</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        
        <div>
            <?php echo $pager->links('product', 'product_pagination')?>
        </div>

        <div class="add-product mt-1">
            <a href="/product/add-form" class="btn btn-primary">Add Product</a>
        </div>

        <!-- TODO : CUSTOMIZE THE PAGINATION -->
    </div>

    
</body>
<?= $this->endSection(); ?>