<?php
    include "db/koneksi.php";
    session_start();

    // jika user belum login maka akan di arahkan ke halaman login.php
    if (!isset($_SESSION['user'])){
        header('location:login.php');
    }
    // untuk menampilkan username yang login
    $namepengguna = $_SESSION['user']['username'];
    // agar halaman kelola tidak dapat dimasuki jika admin belum melakukan login
    $_SESSION['log'] = $namepengguna;


    $query = "SELECT * FROM tb_user;";
    $sql = mysqli_query($koneksi, $query);
    $no = 0;
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

    <title>Data User</title>

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
                <p>Data Customers</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Creat Read Update Delete</cite>
            </figcaption>
        </figure>
        
        <!-- button tambah data -->
        <a href="data_user/kelola_data_user.php" type="button" class="btn btn-primary mb-3" >
            <i class="fa fa-plus" aria-hidden="true"></i>
            Tambah Data
        </a>

        <!-- jika ada session maka alert akan tampil -->
        <?php
            if (isset($_SESSION['eksekusi'])) :
        ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>
                    <?php
                        echo $_SESSION['eksekusi'];
                    ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['eksekusi']); // menghapus session
            endif;
        ?>

        <!-- tabel data -->
        <div class="table-responsive">
            <table id="datatable" class="table align-middle table-bordered table-hover">
                <thead> <!-- judul tabel -->
                    <tr>
                        <th><center>No.</center></th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Jenis Kelamin</th>
                        <th>nohp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <!-- untuk menampilkan semua data dengan while -->
                    <?php
                        while( $result = mysqli_fetch_assoc($sql) ){
                    ?>
                        <tr>
                            <td><center>
                                <?php echo ++$no; ?>
                            </center></td>
                            <td>
                                <?php echo $result["email_user"]; ?>
                            </td>
                            <td>
                                <?php echo $result["username"]; ?>
                            </td>
                            <td>
                                <?php echo $result["jenis_kelamin"]; ?>
                            </td>
                            <td>
                                <?php echo $result["no_hp"]; ?>
                            </td>
                            <td>
                                <?php echo $result["alamat"]; ?>
                            </td>
                            <td>
                                <a href="data_user/kelola_data_user.php?ubah_user=<?php echo $result["id_user"]; ?>" type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Ubah
                                </a>
                                <a href="data_user/proses_data_user.php?hapus__user=<?php echo $result["id_user"]; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>