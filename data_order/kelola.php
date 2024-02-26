
<?php
    include "../db/koneksi.php";

    session_start();
    if(!isset($_SESSION["log"])){
        header("location:../order.php");
    }

    if(isset($_GET['ubah'])){
        $id_order = $_GET['ubah'];
        $query = "SELECT * FROM tb_order WHERE id_order='$id_order' ";
        $sql = mysqli_query($koneksi,$query);
        $result = mysqli_fetch_array($sql);

        $name_product = $result['name_product'];
        $name_pembeli = $result['name_pembeli'];
        $harga_awal = $result['harga_awal'];
        $total_harga = $result['total_harga'];
        $total_barang = $result['total_barang'];
        $alamat_pembeli = $result['alamat_pembeli'];
        $gambar = $result['gambar'];
        $status_barang = $result['status_barang'];
        $tanggal_order = $result['tanggal_order'];

        // agar hanya menampilkan waktu tan pa mili/micro second
        $waktu_order = $result['waktu_order'];
        $splitwaktu = explode('.',$waktu_order);
        $datawaktu = $splitwaktu[0];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Order</title>

    <style>
        .btn_back{
            padding: 10px; 
            text-decoration-line: none; 
            color: #F8F8F8; 
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
            border-radius: 10px; 
            transition-duration: 200ms;
        }

        .btn_back:hover{
            text-decoration-line: none; 
            box-shadow: 0px 0px 6px #E70909;
            transition-duration: 200ms;
        }
    </style>
</head>
<body>
    <div style="width: 90%; background-color: #F6F3F3; border-radius: 10px; margin: 50px auto 0px auto; padding-bottom:10px; height:500px; box-shadow: 0px 0px 10px #2A2424; " >
        <h2 style="text-align: center; padding-top: 15px; " >Orderan</h2>
        <hr>
        <div style="width: 100%;" >
            <div style="width: 48%; float: left; margin: 0px 10px 0px 10px; " >
                <div style="width: 150px; height: 150px; border-style: solid; border-width: 2px; margin: 0px auto 0px auto; " >
                    <img src="../data_product/img/<?php echo $gambar ?>" alt="gambar produk" style="width:150px; height: 150px; " >
                </div>

                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; padding-top: 10px;" >Nama barang :</td>
                        <td style="width: 70%; padding-bottom: 10px; padding-top: 10px;" ><mark><?php echo $name_product ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; ">Harga barang :</td>
                        <td style="width: 70%; padding-bottom: 10px;" ><mark><?php echo $harga_awal ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; ">Jumlah barang :</td>
                        <td style="width: 70%; padding-bottom: 10px;"><mark><?php echo $total_barang ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; text-align: right; padding-bottom: 10px; ">Total Harga :</td>
                        <td style="width: 70%; padding-bottom: 10px;"><mark><?php echo $total_harga ?></mark></td>
                    </tr>
                </table>
            </div>
            <div style=" width: 48%; float: right; margin: 0px 10px 0px 10px; " >
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Nama pembelian :</td>
                        <td style="width: 60%; padding-bottom: 10px;"><mark><?php echo $name_pembeli ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Tanggal pembelian :</td>
                        <td style="width: 60%; padding-bottom: 10px;" ><mark><?php echo $tanggal_order ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Waktu pembelian :</td>
                        <td style="width: 60%; padding-bottom: 10px;" ><mark><?php echo $datawaktu ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Alamat pengiriman :</td>
                        <td style="width: 60%; max-width:100px; max-height:500px; padding-bottom: 10px;" ><mark><?php echo $alamat_pembeli ?></mark></td>
                    </tr>
                    <tr>
                        <td style="width: 40%; text-align: right; padding-bottom: 10px; ">Status barang :</td>
                        <td style="width: 60%; max-width:90px; max-height:500px; padding-bottom: 10px;" >
                        <select id="jk" name="status_barang" class="form-select" aria-label="Default select example">
                            <option <?php if($status_barang == "Sedang diproses"){ echo "selected";} ?> value="Sedang diproses">Sedang diproses</option>
                            <option <?php if($status_barang == "Dalam pengiriman"){ echo "selected";} ?> value="Dalam pengiriman" >Dalam pengiriman</option>
                            <option <?php if($status_barang == "Telah sampai"){ echo "selected";} ?> value="Telah sampai" >Telah sampai</option>
                        </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="width: 100%; float: left; height: 60px; display: flex; align-items: center; justify-content: center; " >
            <a href="../order.php" class="btn_back btn btn-danger btn-sm" style="text-align:center;" >back</a>
        </div>
    </div>
</body>
</html>