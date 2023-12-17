<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Transaction</h1>
        <hr>
    </div>

    <div>
        <p>By clicking the button below, you will start the transaction session. 
            This session allows you to perform various actions such as adding items and completing the checkout process. You will have access to a wide range of products and services, 
            ensuring a seamless and convenient shopping experience. 
            Take advantage of our secure payment options and enjoy the benefits of hassle-free transactions. 
            Start your session now by clicking the button below</p>
    </div>
    <div class="text-center mt-5">
        <form action="/startsession" method="get" class="d-flex">
            <button class="btn btn-outline-primary" type="submit">Add a transaction</button>
        </form>
    </div>

    <div class="title mt-5">
        <hr>
        <h2>Past Transactions</h2>
    </div>

    <div class="tables mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $data): ?>
                    <tr>
                        <td><?= $data['username'] ?></td>
                        <td><?= number_format($data['total'] , 0, '.', ',');?></td>
                        <td><?= $data['date_added'] ?></td>
                        <td class="text-center d-flex d-column">
                            <form action='/transaction/detail/<?php echo $data['transaction_id']?>' method="post">
                                <button class="btn btn-info" type="submit">View</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div>
            <?php echo $pager->links('transaction', 'transaction_pagination')?>
        </div>
    </div>

    
</body>
<?= $this->endSection(); ?>