<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="title mt-5">
        <h1>Transaction</h1>
        <hr>
    </div>

    <div>
        <p>By clicking the button below, you will start the transaction session. 
            This session allows you to perform various actions such as adding items to your cart, 
            updating quantities, and completing the checkout process. You will have access to a wide range of products and services, 
            ensuring a seamless and convenient shopping experience. 
            Take advantage of our secure payment options and enjoy the benefits of hassle-free transactions. 
            Start your session now by clicking the button below</p>
    </div>
    <div class="text-center mt-5">
        <form action="/startsession" method="get" class="d-flex">
            <button class="btn btn-outline-primary" type="submit">Start session</button>
        </form>
    </div>

    
</body>
<?= $this->endSection(); ?>