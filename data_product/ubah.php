<?php 

include "../db/koneksi.php";

function ubahdata($data,$file){

    $id_product= $data['id_product'];
    $name = $data['name'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $detail = $data['detail'];

    $queryfoto = "SELECT * FROM tb_product WHERE id_product='$id_product'";
    $sqlfoto = mysqli_query($GLOBALS['koneksi'],$queryfoto);
    $result = mysqli_fetch_array($sqlfoto);

    if ($_FILES['foto1']['name'] == ""){
        $foto1 = $result['gam1'];
    } else{
        $split1 = explode('.',$file['foto1']['name']);
        $jenisfoto1 = $split1[1] ;

        $foto1 = $result["name_product"]."01".".".$jenisfoto1 ;
        unlink("img/".$result["gam1"]);
        move_uploaded_file($file["foto1"]["tmp_name"],"img/".$foto1);
    }

    if ($_FILES['foto2']['name'] == ""){
        $foto2 = $result['gam2'];
    } else{
        $split2 = explode('.',$file['foto2']['name']);
        $jenisfoto2 = $split2[1] ;

        $foto2 = $result["name_product"]."02".".".$jenisfoto2 ;
        unlink("img/".$result["gam2"]);
        move_uploaded_file($file["foto2"]["tmp_name"],"img/".$foto2);
    }

    $query = "UPDATE tb_product SET name_product='$name', harga='$harga', 
            stok='$stok', detail='$detail', gam1='$foto1',gam2='$foto2' WHERE id_product='$id_product'; ";
    $sql = mysqli_query($GLOBALS['koneksi'], $query) ;

    return true;
}