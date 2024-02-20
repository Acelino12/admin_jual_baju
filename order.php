<?php
    include "db/koneksi.php";
    session_start();

    if (!isset($_SESSION['user'])){
        header('location:login.php');
    }

    // mengambil username admin yang login
    $namepengguna = $_SESSION['user']['username'];

    // agar halaman tambah/edit data produk tidak dapat dimasuki jika admin belum melakukan login
    $_SESSION['log'] = $namepengguna;

    $query = "SELECT * FROM tb_order";
    $sql = mysqli_query($koneksi,$query);
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

    <title>Data Orderan</title>

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
                <img src="https://github.com/mdo.png" alt=""  width="32" height="32" class="rounded-circle me-2">
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
                <p>Data Order masuk</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Data Orderan</cite>
            </figcaption>
        </figure>
        
        <!-- button tambah data -->
        <a href="data_order/kelola.php" type="button" class="btn btn-primary mb-3" >
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
                        <th>Nama Produk</th>
                        <th>Nama Pembeli</th>
                        <th>Harga barang</th>
                        <th>Total barang</th>
                        <th>Tanggal Pembelian</th>
                        <th>Status Pembelian</th>
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
                                <?php echo $result["name_product"]; ?>
                            </td>
                            <td>
                                <?php echo $result["name_pembeli"]; ?>
                            </td>
                            <td>
                                <?php echo $result["total_harga"]; ?>
                            </td>
                            <td>
                                <?php echo $result["total_barang"]; ?>
                            </td>
                            <td>
                                <?php echo $result["tanggal_order"]; ?>
                            </td>
                            <td>
                                <?php echo $result["status_barang"]; ?>
                            </td>
                            <td>
                                <a href="data_order/kelola.php?ubah=<?php echo $result["id_order"]; ?>" type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Ubah
                                </a>
                                <a href="data_order/proses.php?hapus=<?php echo $result["id_order"]; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')" >
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