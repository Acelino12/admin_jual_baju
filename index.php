<?php
    include "db/koneksi.php";
    session_start();

    // jika user belum login maka akan di arahkan ke halaman login.php
    if (!isset($_SESSION['user'])){
        header('location:login.php');
    }
    // untuk menampilkan username yang login
    $namepengguna = $_SESSION['user']['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <!-- data tables -->
    <link href="datatables/datatables.css" rel="stylesheet">
    <script src="datatables/datatables.js"></script>

    <title>Home Admin</title>

    <style>
    .hoverlink:hover {
        background-color: #8DAFF3;
        color: #FBFCFF;
    }

    body{
        width: full;
        height: 100%;
        background-color: #f2f2f2;
    }

    </style>

</head>

<script type="text/javascript">
    $("document").ready(function(){
        $('#datatable').DataTable();
    })
</script>

<body>
    <!-- navbar -->
    <nav class="bg-light" style="position:fixed; padding: 10px; float: left; width: 15%; height: 100vh;" >
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="logo/wa.png" alt="logo" style="width: 40px; margin: auto;" >
        </a> 

        <hr>

        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="index.php" class="nav-link link-dark hoverlink" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
                </a>
            </li>
            <li class="">
                <a href="dashboard.php" class="nav-link link-dark hoverlink">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Dashboard
                </a>
            </li>
            <li>
                <a href="order.php" class="nav-link link-dark hoverlink">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Orders
                </a>
            </li>
            <li>
                <a href="product.php" class="nav-link link-dark hoverlink">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Products
                </a>
            </li>
            <li>
                <a href="customer.php" class="nav-link link-dark hoverlink">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Customers
                </a>
            </li>
        </ul> 
        
        <hr>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php echo $namepengguna; ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul>
        </div>
    </nav>

    <!-- main -->
    <div class="mb-3" style="padding: 10px; float: right; width: 85%; min-height: 100vh; height:fit-content;">
        <figure class="mt-3">
            <blockquote class="blockquote">
                <strong><p>Home Admin</p></strong>
            </blockquote>
            <figcaption class="blockquote-footer">
                welcome, <?php echo $namepengguna ; ?>
            </figcaption>
        </figure>
    </div>

</body>
</html>