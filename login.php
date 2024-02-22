
<?php
    include "db/koneksi.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>
    <title>login</title>
</head>

<body>

    <?php 
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE email='$email' and password='$password' ");
            if ( mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['user'] = $data;
                echo "<script>alert('Selamat Datang ".$data['username']."'); location.href='index.php';</script>" ;
            } else{
                echo "<script>alert('tidak ada data')</script>";
            }
        }
    ?>

    <main class="form-signin">
        <form method="post" >
            <h1 class="h3 mb-3 text-center fw-normal">Please sign in</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Email Pengguna</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="admin@mail.com">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>

            <div class="checkbox mb-3">
                <label><input type="checkbox" value="remember-me"> Remember me</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

            <p class="daftar" >belum punya akun ? <a href="register.php">daftar sini</a></p>
            <p class="daftar" >ingin membeli ? <a href="web_user/home.php">cari barang di sini</a></p>

        </form>
    </main>
</body>

<style>
    body{
        width: 35%; 
        margin: 150px auto 20px auto;
    }
    .daftar{
        margin-top: 10px;
        text-align: center;
    }
</style>

</html>