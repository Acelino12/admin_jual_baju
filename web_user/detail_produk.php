
<?php 
    include "../db/koneksi.php";
    session_start();

    if(isset($_GET['detail'])){
        $id_product = $_GET['detail'];
        $query = "SELECT * FROM tb_product WHERE id_product='$id_product'";
        $sql = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_array($sql);

        $name_product = $row["name_product"];
        $harga = $row["harga"];
        $stok = $row["stok"];
        $detail = $row["detail"];
        $gam1 = $row["gam1"];
        $gam2 = $row["gam2"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name_product ; ?></title>
</head>
<body>
<div style="width: 90%; background-color: #F6F3F3; border-radius: 10px; margin: 50px auto 0px auto; padding-bottom:10px; height:500px; box-shadow: 0px 0px 10px #2A2424; " >
        <h2 style="text-align: center; padding-top: 15px; " >Detail : <?php echo $name_product ?></h2>
        <hr>
        <div style="width: 100%;" >
            <div style="width: 48%; float: left; margin: 0px 10px 0px 10px; " >
                <div style=" width: 310px; margin: 0px auto 0px auto;" >
                    <div style="width: 150px; height: 150px; border-style: solid; border-width: 2px; float: left; " >
                        <img src="../data_product/img/<?php echo $gam1 ?>" alt="gambar produk" style="width:150px; height: 150px; " >
                    </div>
                    <div style="width: 150px; height: 150px; border-style: solid; border-width: 2px; float: left; " >
                        <img src="../data_product/img/<?php echo $gam2 ?>" alt="gambar produk" style="width:150px; height: 150px; " >
                    </div>
                </div>

                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; padding-top: 10px;" >Nama barang :</td>
                        <td style="width: 70%; padding-bottom: 10px; padding-top: 10px;" ><mark><?php echo $name_product ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; ">Harga barang :</td>
                        <td style="width: 70%; padding-bottom: 10px;" ><mark><?php echo $harga ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; ">Barang tersedia :</td>
                        <td style="width: 70%; padding-bottom: 10px;"><mark><?php echo $stok ?></mark></td>
                    </tr>
                </table>
            </div>
            <div style=" width: 48%; float: right; margin: 0px 10px 0px 10px; " >
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Detail barang :</td>
                        <td style="width: 60%; padding-bottom: 10px;"><mark><?php echo $detail ?></mark></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="width: 100%; float: left; height: 60px; display: flex; align-items: center; justify-content: center; " >
            <a href="home.php" class="btn_back btn btn-danger btn-sm" style="text-align:center;" >back</a>
        </div>
    </div>
</body>
</html>