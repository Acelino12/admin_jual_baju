
<?php 
    include "../db/koneksi.php";
    session_start();

    $query = "SELECT * FROM tb_product";
    $sql = mysqli_query($koneksi,$query);

    // Fungsi untuk memformat angka menjadi uang Rupiah
    function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
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
    </style>
</head>
<body>
    <div style="width: 100%; height: 60px; background-color: aliceblue;  " >
        <div>
            <a href="../login.php">jadi admin</a>
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