<?php 

include "../db/koneksi.php";

function tambahdata($data,$file){
    $name = $data['name'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $detail = $data['detail'];

    $split1 = explode('.',$file['foto1']['name']);
    $split2 = explode('.',$file['foto2']['name']);

    $jenisfile1 = $split1[1];
    $jenisfile2 = $split2[1];

    $foto1 = $name."01".".".$jenisfile1;
    $foto2 = $name."02".".".$jenisfile2;

    $directory = "img/";
    $temfile1 = $file["foto1"]["tmp_name"];
    $temfile2 = $file["foto2"]["tmp_name"];

    move_uploaded_file($temfile1,$directory.$foto1);
    move_uploaded_file($temfile2,$directory.$foto2);


    if (move_uploaded_file($temfile1, $directory.$foto1) && move_uploaded_file($temfile2, $directory.$foto2)) {
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