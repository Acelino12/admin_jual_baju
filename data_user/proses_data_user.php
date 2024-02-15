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

if (isset($_POST["hapus"])) {
    
}