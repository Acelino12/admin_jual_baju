
<?php
    include "../db/koneksi.php";

    session_start();

    if (!isset($_SESSION['log'])){
        header('location:../customer.php');
    }

    $email_user = "";
    $nama_user = "";
    $jenis_kelamin = "";
    $nohp = "";
    $alamat = "";
    $password = "";


    if(isset($_GET['ubah_user'])){
        $id_user = $_GET['ubah_user'];
        $query = "SELECT * FROM tb_user WHERE id_user='$id_user'";
        $sql = mysqli_query($koneksi, $query);
        $result = mysqli_fetch_array($sql);

        $email_user = $result["email_user"];
        $nama_user = $result["username"];
        $password = md5($result["password"]);
        $jenis_kelamin = $result["jenis_kelamin"];
        $nohp = $result["no_hp"];
        $alamat = $result["alamat"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap 5 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kelola data user</title>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Data User
            </a>
        </div>
    </nav>

    <div class="container mt-3">
        <!-- enctype agar type foto dapat diproses -->
        <form method="post" action="proses_data_user.php" enctype="multipart/form-data">
            <input type="hidden" value=" <?php echo $id_user; ?>" name="id_user" >
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email User</label>
                <div class="col-sm-10">
                    <input required type="email" name="email" class="form-control" id="email" placeholder="Ex: rudi@gmail.com" value="<?php echo $email_user; ?>" >
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-10">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Rudi Tabudi" value="<?php echo $nama_user; ?>">
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select required id="jk" name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option <?php if($jenis_kelamin == "Laki - Laki"){ echo "selected";} ?> value="Laki - Laki">Laki - Laki</option>
                        <option <?php if($jenis_kelamin == "Perempuan"){ echo "selected";} ?> value="Perempuan" >Perempuan</option>
                    </select>
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password User</label>
                <div class="col-sm-10">
                    <input required type="text" name="password" class="form-control" id="password" placeholder="Ex: admin" value="<?php echo $password; ?>">
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="nohp" class="col-sm-2 col-form-label">Nomer Hp</label>
                <div class="col-sm-10">
                    <input required type="number" name="nohp" class="form-control" id="nohp" placeholder="EX: 081258581232" value="<?php echo $nohp ?>" >
                </div> 
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label ">Alamat</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="alamat" name="alamat" rows="3" ><?php echo $alamat; ?></textarea> <!-- required tidak boleh kosong -->
                </div>  
            </div>

            <div class="mb-3 row mt-3">
                <div class="col">
                    <?php
                        if (isset($_GET['ubah_user'])) {
                    ?>
                        <button type="submit" name="aksi" value="ubah" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                        } else{
                    ?>
                        <button type="submit" name="aksi" value="tambah" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambah
                        </button>
                    <?php
                        }
                    ?>

                    <a href="../customer.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>


</body>
</html>