<!-- FILEPATH: /C:/laragon/www/pbkk-fp/app/Views/layout/template.php -->

<!DOCTYPE html>
<html>
<head>
    <title>TokoKu</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table {
            border-collapse: collapse; /* This property removes the spacing between table cells */
            width: 100%;
            border: 1px solid #000; /* Add an outline to the table */
            border-radius: 5px; /* Add rounded corners to the table */
        }
        .itemlist {
            padding: 10px;
            background-color: white;
            border-radius: 5px;
        }
        .itemlist:hover {
            background-color: #e6e6e6;
        }
        .itemlist a {
            text-decoration: none;
            color: black;
        }
        .itemlist a:hover  {
            text-decoration: none;
            color: black;
        }

        .logout {
            padding: 10px;
            background-color: white;
            border-radius: 5px;
        }
        .logout:hover {
            background-color: #e6e6e6;
        }
        .logout a:hover  {
            text-decoration: none;
            color: black;
        }
        .logout a:hover  {
            text-decoration: none;
            color: black;
        }

        .sidebar {
                position: sticky;
                top: 0;
                height: 100vh;
                background: linear-gradient(0deg, rgba(236,234,228,1) 0%, rgba(255,255,255,1) 100%);
                background-size: 200% 200%;
                animation: gradient 1s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar d-flex flex-column bg-light">
                <!-- Sidebar content goes here -->
                <!-- add if statement, login would be displayed only if the user is not logged in or there is no user authenticated in the current state -->
                    <div class="mt-5 mb-5 text-center" bis_skin_checked="1">
                        <div class="d-flex justify-content-center">
                            <a href="/#" class="d-flex text-center link-dark text-decoration-none" aria-expanded="false">
                                <img src="https://static.vecteezy.com/system/resources/previews/020/765/399/non_2x/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                            </a>
                        </div>

                        <p>Hello, <?php echo auth()->user()->username ?></p>
                    </div>
                    
                    <div class="mt-5 mb-auto text">
                        <div class="mt-1 itemlist rounded-3 mb-1 text-center">
                            <a href="/">Home</a>
                        </div>

                        <div class="mt-1 itemlist rounded-3 mb-1 text-center">
                            <a href="/product">Product</a>
                        </div>
                        
                        <div class="mt-1 itemlist rounded-3 mb-1 text-center">
                            <a href="/home-transaction">Transaction</a>
                        </div>

                        <?php if (auth()->user()->username === 'admin'): ?>
                            <div class="mt-1 itemlist rounded-3 mb-1 text-center">
                                <a href="/employees">Employees</a>
                            </div>
                        <?php endif; ?>

                        <div class="mt-1 logout rounded-3 mb-1 text-center ">
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
