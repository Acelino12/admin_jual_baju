<?php 

include "../db/koneksi.php";

function ubah_data($data) {
    $id_user = $data["id_user"];
    $email = $data["email"];
    $name = $data["name"];
    $password = md5($data["password"]);
    $nohp = $data["nohp"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];

    $query = "UPDATE tb_user SET email_user='$email',username='$name',password='$password',
            no_hp='$nohp',jenis_kelamin='$jenis_kelamin',alamat='$alamat' WHERE id_user='$id_user'";
    $sql = mysqli_query($GLOBALS['koneksi'], $query) ; 

    return true;
}