<!-- FILEPATH: /C:/laragon/www/pbkk-fp/app/Views/layout/template.php -->

<!DOCTYPE html>
<html>
<head>
    <title>TokoKu</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2 sidebar d-flex flex-column bg-light" style="height: 100vh;">
                <!-- Sidebar content goes here -->
                <!-- add if statement, login would be displayed only if the user is not logged in or there is no user authenticated in the current state -->
                <div class="mt-2 mb-5" bis_skin_checked="1">
                    <a href="/#" class="d-flex align-items-center link-dark text-decoration-none" aria-expanded="false">
                        <img src="https://static.vecteezy.com/system/resources/previews/020/765/399/non_2x/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    </a>

                    <p>Hello, <?php echo auth()->user()->username ?></p>
                </div>
 
                
                <div class="mt-5 mb-auto text-left">
                    <div class="rounded-3 mb-1">
                        <a href="/">Home</a>
                    </div>

                    <div class="rounded-3 mb-1">
                        <a href="/product">Product</a>
                    </div>
                    
                    <div class="rounded-3 mb-1">
                        <a href="/home-transaction">Transaction</a>
                    </div>

                    <?php if (auth()->user()->username === 'admin'): ?>
                        <div class="rounded-3 mb-1">
                            <a href="/employees">Employees</a>
                        </div>
                    <?php endif; ?>

                    <div class="rounded-3 mb-1">
                        <a href="/logout">Logout</a>
                    </div>

                </div>

                
            </div>

            <div class="col-md-9 ml-5">
                    <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
