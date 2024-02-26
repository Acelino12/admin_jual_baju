
<?php 
    include "../db/koneksi.php";
    session_start();

    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM tb_user WHERE email_user='$email' and password='$password' ";
        $sql = mysqli_query($koneksi,$query);
        if (mysqli_num_rows($sql) > 0) {
            $result = mysqli_fetch_array($sql);
            $_SESSION ["login_user"] = $result;
            echo "<script>alert('Selamat Datang ".$result['username']."'); location.href='home.php';</script>" ;
        } else {
            echo "<alert> alert('tidak ada data') </alert>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrep -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js" ></script>
    <title>Login User</title>
</head>
<body>
    <main class="form-signin">
        <form method="post" >
            <h1 class="h3 mb-3 text-center fw-normal">Please sign in User</h1>

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

            <p class="daftar" >belum punya akun ? <a href="register_user.php">daftar sini</a></p>
            <p class="daftar" >kembali > <a href="home.php">Home</a></p>

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