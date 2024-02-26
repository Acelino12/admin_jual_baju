<?php

include "../db/koneksi.php";
session_start();


if (isset($_SESSION['beli'])){
    $nameuser = $_SESSION['beli'];
    if(isset($_POST["jumlahbeli"])){
        $total_barang_dibeli = $_POST['jumlahbeli'];
        $id_product = $_POST['id_product'];

        $query_product = "SELECT * FROM tb_product WHERE id_product='$id_product' ";
        $sql_product = mysqli_query($koneksi,$query_product);
        $result_product = mysqli_fetch_array($sql_product);
        $name_product = $result_product["name_product"];
        $harga = $result_product["harga"];
        $stok = $result_product["stok"];
        $sisa_awal = $result_product["sisa"];
        $gambar = $result_product["gam1"];
        $terjual = $result_product["terjual"];

        $total_harga = $total_barang_dibeli * $harga;
        $stok_baru = $sisa_awal - $total_barang_dibeli;
        $terjual_baru = $terjual + $total_barang_dibeli;

        $query_user = "SELECT * FROM tb_user WHERE username='$nameuser'";
        $sql_user = mysqli_query($koneksi, $query_user);
        $result_user = mysqli_fetch_array($sql_user);
        $username = $result_user["username"];
        $email = $result_user["email_user"];
        $alamat = $result_user["alamat"];
        $no_hp_user = $result_user["no_hp"];

        $tanggal_order = date("Y-m-d");
        $waktu_order = date("H:i:s");

        $status_barang = "Sedang diproses";

        $query_beli = "INSERT INTO tb_order VALUES (null,'$name_product','$username','$harga','$total_harga','$total_barang_dibeli',
        '$alamat','$gambar','$tanggal_order','$waktu_order','$status_barang','$no_hp_user','$email') ";
        $sql_beli = mysqli_query($koneksi, $query_beli);

        if ($sql_beli){
            $query_update_product = "UPDATE tb_product SET sisa='$stok_baru' , terjual='$terjual_baru' WHERE id_product='$id_product' ";
            $sql_update_product = mysqli_query($koneksi,$query_update_product);
            if($sql_update_product){
                header("location:home.php");
            } else{
                echo $sql_update_product;
            }    
        } else {
            echo $sql_beli;
        }
    }
}

