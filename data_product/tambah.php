<?php 

include "../db/koneksi.php";

function tambahdata($data,$file){
    $name = $data['name'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $detail = $data['detail'];

    $split1 = explode('.',$file['foto1']['name']);
    $jenisfile1 = $split1[1];
    $foto1 = $name."01".".".$jenisfile1;

    $split2 = explode('.',$file['foto2']['name']);
    $jenisfile2 = $split2[1];
    $foto2 = $name."02".".".$jenisfile2;

    
    if (move_uploaded_file($file["foto1"]["tmp_name"],"img/".$foto1) && move_uploaded_file($file["foto2"]["tmp_name"],"img/".$foto2)) {
        // Pengunggahan berhasil, lanjutkan ke query SQL
        $query = "INSERT INTO tb_product VALUES (null,'$name', '$harga', '$stok', '$detail', '$foto1', '$foto2')";
    $sql = mysqli_query($GLOBALS['koneksi'], $query);

    if (!$sql) {
        die('Error: ' . mysqli_error($GLOBALS['koneksi']));
    }

    return true;
    } else {
        // Gagal mengunggah satu atau kedua file
        die('Error: Gagal mengunggah file.');
    }

}