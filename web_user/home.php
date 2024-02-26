
<?php 
    include "../db/koneksi.php";
    session_start();

    $query = "SELECT * FROM tb_product";
    $sql = mysqli_query($koneksi,$query);

    // Fungsi untuk memformat angka menjadi uang Rupiah
    function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    if (isset($_SESSION['login_user'])){
        $nameuser = $_SESSION['login_user']['username'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js" ></script>

    <title>Home</title>

    <style>
        .container{
            width: 100%; 
            height: 500px; 
            padding: 10px;
        }
        .card_container{
            height: 60%; 
            width: 15%; 
            float: left; 
            margin: 10px; 
            border-radius: 10px; 
            box-shadow: 0px 1px 3px #A8A7A7;
            transition: 0.5s;
            cursor: pointer;
            padding: 5px;
            color: black;
        }

        .link{
            flex-grow: 1; 
            text-decoration: none;
            color: #2A2424; 
        }
    </style>
</head>
<body>
    <!-- header -->
    <div style="width: 100%; height: 60px; background-color: aliceblue; " >

        <!-- kiri -->
        <div style="width: 100px; height: 100%; float: left; margin: 15px 10px 0px 10px ; " >
            <?php if(!isset($_SESSION['login_user'])){ ?>
                <div style=" width: 100px; display: flex; height: 30px; text-align: center; align-items: center;" >
                    <a href="../index.php" class="btn_back btn btn-danger btn-sm" style="text-align:center;" >jadi Admin</a>
                </div>
            <?php } ?>
        </div>

        <!-- kanan -->
        <div style=" display: flex; float: right; width: 250px; height: 100%; text-align: center; align-items: center; " >
            <?php 
                if (isset($_SESSION['login_user'])){
            ?>
                <div>
                    <a href="" class="link">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt=""  width="32" height="32" class="rounded-circle me-2">
                                <span style="display: inline-block; max-width: 100%; overflow: hidden; white-space: nowrap;"><?php echo $nameuser; ?></span>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="data_admin/profil.php">Profile</a></li>
                                <li><a class="dropdown-item" href="data_admin/setting.php">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout_user.php">Sign out</a></li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php 
            } else {
            ?>
                <div style=" margin: auto; width: 60%; display: flex; " >
                    <a href="login_user.php" class="link" >
                        <div style="width: 50px; height:30px; background-color: #09E74F; border-radius: 5px; " >
                            <p>Login</p>
                        </div>
                    </a>
                    <a href="register_user.php" class="link">
                        <div style="width: 70px; height:30px; background-color: #E70909; border-radius: 5px; " >
                            <p >register</p>
                        </div>
                    </a>
                </div>
            <?php 
            }
            ?>
        </div>
    </div>



    <h1 style="text-align: center;" >cari barang</h1>
    <div class="container" >

        <?php while( $row = mysqli_fetch_array($sql)) { 
        ?>
        <a href="detail_produk.php?detail=<?php echo $row["id_product"] ?>">
            <div class="card_container">
                <div style=" width: 90%; height: fit-contain; margin: 0px auto 5px auto; border-radius: 5px;  ">
                    <img src="../data_product/img/<?php echo $row['gam1'] ; ?>" alt="gambar" style=" width: 100%; height: 150px; border-radius: 5px;  " >
                </div>
                <div style="text-align: center;" >
                    <span><?php echo $row['name_product'] ; ?></span>
                </div>
                <div style=" font-weight: bold; " >
                    <span><?php echo formatRupiah($row['harga']) ; ?></span>
                </div>
                <div>
                    <span>Stok :</span>
                    <span><?php echo $row['sisa'] ; ?></span>
                </div>
                <div style=" font-size: small; " >
                    <span><?php echo $row['terjual'] ; ?>+</span>
                    <span>terjual</span>
                </div>
                <?php 
                    $awal_stok = $row['stok'];
                    $sisa_stok = $row['sisa'];
                    $persen = 100-(($sisa_stok/$awal_stok)*100);                 
                ?>
                <div class="progress" style="height: 10px;" >
                    <div class="progress-bar" role="progressbar" style="width:<?php echo floor($persen) ; ?>%;" aria-valuenow="<?php echo floor($persen) ; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo floor($persen) ; ?>%</div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>

</body>
</html>