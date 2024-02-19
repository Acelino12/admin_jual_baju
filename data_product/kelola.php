<?php 
    include "../db/koneksi.php";
    session_start();

    if(!isset($_SESSION["log"])){
        header("location:../product.php");
    }

    $name_product = "";
    $harga = "";
    $stok = "";
    $detail = "";

    if(isset($_GET['ubah'])){
        $id_product = $_GET['ubah'];
        $query = "SELECT * FROM tb_product WHERE id_product='$id_product'";
        $sql = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_array($sql);

        $name_product = $row["name_product"];
        $harga = $row["harga"];
        $stok = $row["stok"];
        $detail = $row["detail"];
        $gam1 = $row["gam1"];
        $gam2 = $row["gam2"];
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
    <title>kelola data Produk</title>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Data Produk
            </a>
        </div>
    </nav>

    <div class="container mt-3">
        <!-- enctype agar type foto dapat diproses -->
        <form method="post" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value=" <?php echo $id_product; ?>" name="id_product" >

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Product</label>
                <div class="col-sm-10">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Baju dinas" value="<?php echo $name_product; ?>">
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="foto1" class="col-sm-2 col-form-label ">Foto 1</label>
                <div class="col-sm-4">
                    <input class="form-control" type="file" name="foto1" id="foto1" accept="image/*" <?php if(!isset($_GET['ubah'])){ echo "required" ;} ?> > <!-- accept agar fokus kegambar -->
                </div>  
                <div class="col-sm-4">
                    <img src="img/<?php echo $gam1; ?>" alt="gambar 1" style="width: 150px; height: 150px;" > <!-- accept agar fokus kegambar -->
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="foto2" class="col-sm-2 col-form-label ">Foto 2</label>
                <div class="col-sm-4">
                    <input accept="image/*" name="foto2" type="file" id="foto2" class="form-control" <?php if(!isset($_GET['ubah'])){ echo "required" ;} ?> > <!-- accept agar fokus kegambar -->
                </div>  
                <div class="col-sm-4">
                    <img src="img/<?php echo $gam2; ?>" alt="gambar 2" style="width: 150px; height: 150px; " > <!-- accept agar fokus kegambar -->
                </div>  
            </div>

            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input required type="number" name="harga" class="form-control" id="harga" placeholder="EX: 1.000.000" value="<?php echo $harga ?>" >
                </div> 
            </div>

            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input required type="number" name="stok" class="form-control" id="stok" placeholder="EX: 500" value="<?php echo $stok ?>" >
                </div> 
            </div>

            <div class="mb-3 row">
                <label for="detail" class="col-sm-2 col-form-label ">Dekripsi</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="detail" name="detail" rows="3" ><?php echo $detail; ?></textarea> <!-- required tidak boleh kosong -->
                </div>  
            </div>

            <div class="mb-3 row mt-3">
                <div class="col">
                    <?php
                        if (isset($_GET['ubah'])) {
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
                    <a href="../product.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>