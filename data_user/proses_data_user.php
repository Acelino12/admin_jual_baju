<?php 

include "tambah.php";
include "ubah.php";
include "../db/koneksi.php";
session_start();

if (isset($_POST["aksi"])) {
    if ($_POST["aksi"] == "tambah") {
        $berhasil = tambah_data($_POST);

        if ($berhasil) {
            $_SESSION["eksekusi"] = "data berhasil ditambahkan";
            header("location:../customer.php");
        } 
        else {
            echo $berhasil;
        }
    }
    else if ($_POST["aksi"] == "ubah") {
        $berhasil = ubah_data($_POST);

        if ($berhasil) {
            $_SESSION["eksekusi"] = "data berhasil edit";
            header("location:../customer.php");
        }
        else {
            var_dump($berhasil);
        }
    }
}

if (isset($_GET["hapus_user"])) {
    $id_user = $_GET['hapus_user'];
    
    // menghapus table data
    $query = "DELETE FROM tb_user WHERE id_user= '$id_user' ";
    $sql = mysqli_query($GLOBALS['koneksi'], $query);

    if ($sql) {
        $_SESSION["eksekusi"] = "data berhasil dihapus";
        header("location:../customer.php");
    } else {
        echo $sql;
    }
}