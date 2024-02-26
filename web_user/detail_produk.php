
<?php 
    include "../db/koneksi.php";
    session_start();

    // membuat format rupiah
    function formatrupiah($rupiah){
        return 'Rp '. number_format($rupiah , 0 , ',' , '.');
    }

    // ambil data produk
    if(isset($_GET['detail'])){
        $id_product = $_GET['detail'];
        $query = "SELECT * FROM tb_product WHERE id_product='$id_product'";
        $sql = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_array($sql);

        $id_product = $row["id_product"];
        $name_product = $row["name_product"];
        $harga = $row["harga"];
        $stok = $row["stok"];
        $stok_sisa = $row["sisa"];
        $terjual = $row["terjual"];
        $detail = $row["detail"];
        $gam1 = $row["gam1"];
        $gam2 = $row["gam2"];

    }

    // ambil data nama user
    if (isset($_SESSION['login_user'])){
        $nameuser = $_SESSION['login_user']['username'];
        $_SESSION['beli'] = $nameuser;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo/wa.png" type="image/icon" >
    <!-- bootstrep -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js" ></script>
    <title>Jual <?php echo $name_product ; ?></title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }

        .btn_back{
            padding: 10px; 
            text-decoration-line: none; 
            color: #F8F8F8; 
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
            border-radius: 10px; 
            transition-duration: 200ms;
        }

        .btn_back:hover{
            text-decoration-line: none; 
            box-shadow: 0px 0px 6px #E70909;
            transition-duration: 200ms;
        }

        .link{
            flex-grow: 1; 
            text-decoration: none;
            color: #2A2424; 
        }
    </style>
</head>
<body>
    <!-- header -->
    <div style="width: 100%; height: 60px; background-color: aliceblue; " >
        <!-- header kiri -->
        <div style="width: 50px; height: 100%; float: left; margin: 15px 10px 0px 10px ; " >
            <div style=" width: 50px; display: flex; height: 30px; text-align: center; align-items: center;" >
                <a href="home.php" class="btn_back btn btn-danger btn-sm" style="text-align:center;" >back</a>
            </div>
        </div>

        <!-- header kanan -->
        <div style=" display: flex; float: right; width: 250px; height: 100%; text-align: center; align-items: center; " >
            <?php 
                if (isset($_SESSION['login_user'])){
            ?>
                <div>
                    <!-- jika user sudah login -->
                    <a href="" class="link">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt=""  width="32" height="32" class="rounded-circle me-2">
                                <span style="display: inline-block; max-width: 100%; overflow: hidden; white-space: nowrap;"><?php echo $nameuser; ?></span>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="data_admin/profil.php">Profile</a></li>
                                <li><a class="dropdown-item" href="data_admin/setting.php">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout_user.php">Sign out</a></li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php 
            } else {
            ?>
                <!-- jika user belum login -->
                <div style=" margin: auto; width: 60%; display: flex; " >
                    <a href="login_user.php" class="link" >
                        <div style="width: 50px; height:30px; background-color: #09E74F; border-radius: 5px; " >
                            <p>Login</p>
                        </div>
                    </a>
                    <a href="register_user.php" class="link">
                        <div style="width: 70px; height:30px; background-color: #E70909; border-radius: 5px; " >
                            <p >register</p>
                        </div>
                    </a>
                </div>
            <?php 
            }
            ?>
        </div>
    </div>

    <!-- isi -->
    <div style="width: 100%; position:absolute; padding-bottom:10px; " >
        <div style="width: 97%; border-radius: 10px; background-color: #F6F3F3; height:fit-content; padding:1px; margin: 10px auto 0px auto; box-shadow: 0px 0px 10px #2A2424; " >
            <h2 style="text-align: center; padding-top: 15px; " >Detail : <?php echo $name_product ?></h2>
            <hr>

            <div style="width: 100%; height: 400px; " >
                <div style="width: 30%; float: left; height: 400px; " >
                    <div style=" width: 30%; position: fixed; " >
                        <div style=" width:250px; margin: 0px auto 0px auto; position:relative;" >
                            <div style="width: 250px; height: 250px; border-style: solid; border-width: 1px; float: left; " >
                                <img src="../data_product/img/<?php echo $gam1 ?>" alt="gambar produk" style="width:250px; height: 250px; " >
                            </div>
                            <div style="width: 50px; height: 50px; border-style: solid; border-width: 1px; float: left; " >
                                <img src="../data_product/img/<?php echo $gam1 ?>" alt="gambar produk" style="width:50px; height: 50px; " >
                            </div>
                            <div style="width: 50px; height: 50px; border-style: solid; border-width: 1px; float: left; " >
                                <img src="../data_product/img/<?php echo $gam2 ?>" alt="gambar produk" style="width:50px; height: 50px; " >
                            </div>
                        </div>
                    </div>
                </div>

                <div style="width: 40%; float: left; height: 400px; padding-top: 5px; " >
                    <div style="width: 99%; margin: auto; " >
                        <div style=" border-radius:10px; box-shadow:0px 0px 2px #2A2424; width: 80%; margin: auto; height: 300px; padding: 5px; " >
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 100%;" ><p style="margin: 0; padding: 0; font-size: 30px; font-weight: bold;"><?php echo $name_product ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;"><p style="margin: 0; padding: 0;" >Terjual <?php echo $terjual; ?>+</p></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;" ><p style="margin: 0; padding: 0; font-weight: bold; font-size: 20px; " ><?php echo formatRupiah($harga) ?></p></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;"><p style="margin: 0; padding: 0;" >Detail: <?php echo $detail ?></p></td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
                <div style=" width: 30%; float: left; height: 400px; " >
                    <div style=" width: 400px; margin: 10px auto 0px auto; position: fixed; " >
                        <div style=" width:300px; margin: 0px auto 0px auto; position:relative; " >
                            <form method="post" action="proses_beli.php">
                                <div style="width: 300px; height: 200px; border-radius: 10px; box-shadow: 0px 0px 3px #2A2424; background-color: #FBFBFB; padding: 3px;">
                                    <p>Atur jumlah pembelian</p>
                                    <input hidden name="id_product" class="" type="text" value="<?php echo $id_product ?>">
                                    <p>Stok: <?php echo $stok_sisa ; ?></p>
                                    <div class="">
                                        <button aria-label="Kurangi 1" class="css-6cobzs" tabindex="-1" onclick="changeQuantity(-1); return false">
                                            <svg class="unf-icon" viewBox="0 0 24 24" width="16px" height="16px" fill="var(--NN500, #BFC9D9)" style="display: inline-block; vertical-align: middle;">
                                                <path d="M20 12.75H4a.75.75 0 110-1.5h16a.75.75 0 110 1.5z"></path>
                                            </svg>
                                        </button>
                                        <input name="jumlahbeli" id="jumlahbeli" aria-valuenow="1" aria-valuemin="1" aria-valuemax="<?php echo $stok_sisa; ?>" class="" data-unify="QuantityEditor" role="spinbutton" type="number" value="1">
                                        
                                        <button aria-label="Tambah 1" class="css-6cobzs" tabindex="-1" onclick="changeQuantity(1); return false">
                                            <svg class="unf-icon" viewBox="0 0 24 24" width="16px" height="16px" fill="var(--GN500, #00AA5B)" style="display: inline-block; vertical-align: middle;">
                                                <path d="M20 11.25h-7.25V4a.75.75 0 10-1.5 0v7.25H4a.75.75 0 100 1.5h7.25V20a.75.75 0 101.5 0v-7.25H20a.75.75 0 100-1.5z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <br>
                                    <div>
                                        <?php 
                                        // jika user sudah login
                                            if(isset($_SESSION['login_user'])){ 
                                        ?>
                                            <button type="submit" >Beli</button>
                                        <?php 
                                            } else { 
                                        ?>
                                            <button onclick="login(); return false" >Beli</button>
                                        <?php 
                                            } 
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            function changeQuantity(value) {
                var qtyInput = document.getElementById("jumlahbeli");
                var currentQty = parseInt(qtyInput.value);
                console.log(currentQty);
                var newQty = currentQty + value;

                // Jangan biarkan kuantitas kurang dari 1
                newQty = Math.max(newQty, 1);

                // Batasi kuantitas ke nilai maksimum tertentu (5000 dalam contoh ini)
                newQty = Math.min(newQty, <?php echo $stok_sisa; ?>);

                qtyInput.value = newQty;
            }

            function login() {
                return alert("login terlebih dahulu !");
            }

        </script>

    <!-- <div style=" background-color: rgba(200, 255, 200, 0.5); position:relative; width: 100%; height: 500px; margin: 0; padding: 0; " >

    </div> -->
</body>
</html>