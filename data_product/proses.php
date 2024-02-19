<?php 

include "../db/koneksi.php";
include "tambah.php";
include "ubah.php";
session_start();

if (isset($_POST["aksi"])) {
    if ($_POST["aksi"] == "tambah") {
        
        $berhasil = tambahdata($_POST,$_FILES);
        if ($berhasil) {
            $_SESSION['eksekusi'] = "berhasil tambah data";
            header("location:../product.php");
        } 
        else {
            echo $berhasil;
        }
    }
    if ($_POST["aksi"] == "ubah") {
        $berhasil = ubahdata($_POST,$_FILES);
        if ($berhasil) {
            $_SESSION["eksekusi"] = "Berhasil ubah data";
            header("location:../product.php");
        } 
        else {
            echo $berhasil;
        }
    }
}

if (isset($_GET['hapus'])){
    $id_product = $_GET['hapus'];

    $queryfoto = "SELECT * FROM tb_product WHERE id_product='$id_product'";
    $resultfoto = mysqli_query($koneksi,$queryfoto);
    $row = mysqli_fetch_array($resultfoto);

    unlink("img/".$row['gam1']);
    unlink("img/".$row['gam2']);

    $query = "DELETE FROM tb_product WHERE id_product='$id_product' ";
    $sql = mysqli_query($koneksi,$query);

    if($sql){
        $_SESSION['eksekusi'] = 'Berhasil terhapus';
        header("location:../product.php");
    } else {
        echo $sql;
    }
}