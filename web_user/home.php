
<?php 
    include "../db/koneksi.php";
    session_start();

    $query = "SELECT * FROM tb_product";
    $sql = mysqli_query($koneksi,$query);

    // Fungsi untuk memformat angka menjadi uang Rupiah
    function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    $persen = 50;

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
        }
    </style>
</head>
<body>
    <div style="width: 100%; height: 60px; background-color: aliceblue;  " >

    </div>
    <h1 style="text-align: center;" >cari barang</h1>
    <div class="container" >

        <?php while( $row = mysqli_fetch_array($sql)) { 
        ?>
        <div class="card_container">
            <div style=" width: 90%; height: fit-contain; margin: 0px auto 5px auto; border-radius: 5px;  ">
                <img src="../data_product/img/<?php echo $row['gam1'] ; ?>" alt="gambar" style=" width: 100%; height: 150px; border-radius: 5px;  " >
            </div>
            <div>
                <span><?php echo $row['name_product'] ; ?></span>
            </div>
            <div>
                <span>Harga :</span>
                <span><?php echo formatRupiah($row['harga']) ; ?></span>
            </div>
            <div>
                <span>Stok :</span>
                <span><?php echo $row['sisa'] ; ?></span>
            </div>
            <div>
                <span>terjual :</span>
                <span><?php echo $row['terjual'] ; ?></span>
            </div>
            <div class="progress" style="height: 10px;" >
                <div class="progress-bar" role="progressbar" style="width:<?php echo $persen; ?>%;" aria-valuenow="<?php echo $persen; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $persen; ?>%</div>
            </div>
        </div>
        <?php } ?>
    </div>

</body>
</html>