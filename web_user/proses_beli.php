<?php

include "../db/koneksi.php";

if(isset($_POST["jumlahbeli"])){
    $total_barang_dibeli = $_POST['jumlahbeli'];

    echo 'jadi '.$total_barang_dibeli.' yang dibeli';
}