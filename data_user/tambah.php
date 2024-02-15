<?php 

include "../db/koneksi.php";

function tambah_data ($data){
    $email = $data["email"];
    $name = $data["name"];
    $password = md5($data["password"]);
    $nohp = $data["nohp"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];

    $query = "INSERT INTO tb_user VALUES(null, '$email', '$name','$password', '$nohp','$jenis_kelamin','$alamat')";

    // ($conn, $query) di ubah ($GLOBALS['conn'], $query) karena fariable conn ada di global
    $sql = mysqli_query($GLOBALS['koneksi'], $query) ; 

    // agar mengembalikan ke dalam proses
    return true;
}