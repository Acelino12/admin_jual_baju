<?php
    include "db/koneksi.php";
    session_start();

    // jika user belum login maka akan di arahkan ke halaman login.php
    if (!isset($_SESSION['user'])){
        header('location:login.php');
    }
    // untuk menampilkan username yang login
    $namepengguna = $_SESSION['user']['username'];

    // jumlah data user
    $query_user = "SELECT * FROM tb_user;";
    $sql_user = mysqli_query($koneksi,$query_user);
    $row_user = mysqli_num_rows($sql_user);

    // jumlah data product
    $query_product = "SELECT * FROM tb_product";
    $sql_product = mysqli_query($koneksi,$query_product);
    $row_product = mysqli_num_rows($sql_product);

    // jumlah data order
    $query_order = "SELECT * FROM tb_order";
    $sql_order = mysqli_query($koneksi,$query_order);
    $row_order = mysqli_num_rows($sql_order);
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    .bab-container{
        padding: 5px; 
        border-radius: 10px; 
        width: 100%;  
        display: flex;
        background-color: #DADFE0;
    }
    .isi-container{
        flex: 1; 
        background-color: #9BD6D9; 
        height: 120px; 
        margin: 10px; 
        padding: 5px; 
        border-radius: 10px;
        transition: 500ms; 
    }

    .isi-container:hover{
        background-color: #68C0CE;
        transition: 500ms; 
    }

    .isi-container-2{
        flex: 1; 
        background-color: #9BD6D9; 
        height: 300px; 
        margin: 10px; 
        padding: 5px; 
        border-radius: 10px;
        transition: 500ms; 
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
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
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
                <span style="display: inline-block; max-width: 100%; overflow: hidden; white-space: nowrap;"><?php echo $namepengguna; ?></span>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="data_admin/profil.php">Profile</a></li>
                <li><a class="dropdown-item" href="data_admin/setting.php">Settings</a></li>
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

        <div class="mt-3 bab-container">
            <div class="isi-container" >
                <h3>Jumlah User</h3>
                <h3 style=" text-align: center; " ><?php echo $row_user; ?></h3>
                <a href="customer.php" class="align-items-center link-dark text-decoration-none" >
                    <p style="float: right; margin-right: 5px; " >view detail ></p>
                </a>
            </div>
            <div class="isi-container" >
                <h3>Jumlah Product</h3>
                <h3 style=" text-align: center; " ><?php echo $row_product; ?></h3>
                <a href="product.php" class="align-items-center link-dark text-decoration-none" >
                    <p style="float: right; margin-right: 5px; " >view detail ></p>
                </a>
            </div>
            <div class="isi-container" >
                <h3>Jumlah Order</h3>
                <h3 style=" text-align: center; " ><?php echo $row_order; ?></h3>
                <a href="order.php" class="align-items-center link-dark text-decoration-none" >
                    <p style="float: right; margin-right: 5px; " >view detail ></p>
                </a>
            </div>
        </div>

        <div class="mt-2 bab-container" >
            <div class="isi-container-2" >
                <h2 style="text-align: center;" >Chart Order</h2>
                <div style="width: 100%; ">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="isi-container-2" >
                <h2>asdasd</h2>
            </div>
        </div>        
    </div>

    


<?php
    // Contoh data dari PHP
    $data = [10, 20, 30, 40, 50];
?>

<script>
  // Inisialisasi data dari PHP
    var dataFromPHP = <?php echo json_encode($data); ?>;

    // Mengambil elemen canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    // Membuat chart dengan Chart.js
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
        datasets: [{
            label: 'Contoh Data',
            data: dataFromPHP,
            backgroundColor: 'rgb(51, 51, 255, 0.5)',
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>

</body>
</html>