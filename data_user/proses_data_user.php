<?php 

include "tambah.php";
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

    }
}

if (isset($_POST["hapus"])) {
    
}