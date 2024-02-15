
<?php
    include "db/koneksi.php";

    if(isset($_POST["username"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $passwordcon = md5($_POST["passwordcon"]);

        if($password == $passwordcon){
            $query = "INSERT INTO tb_admin VALUES(null,'$username','$email','$password') ";
            $sql = mysqli_query($koneksi, $query);
            if($sql){
                header("location:login.php");
            }
            else{
                echo $sql;
            }
        } 
        else{
            echo "<script>alert('password tidak sama')</script>";
        }

    }
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

    <main class="form-signin">
        <form method="post" >
            <h1 class="h3 mb-3 text-center fw-normal">Please Register</h1>

            <div class="mb-3">
                <label for="username" class="form-label">Username Pengguna</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="rendi">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Pengguna</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="rendi@mail.com">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>

            <div class="mb-3">
                <label for="passwordcon" class="form-label">Password Confirmasi</label>
                <input type="password" class="form-control" id="passwordcon" name="passwordcon" placeholder="password confirmasi">
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

            <p class="daftar" >sudah punya akun ? <a href="login.php">login disini</a></p>
        </form>
    </main>
</body>

<style>
    body{
        width: 35%; 
        margin: 100px auto 20px auto;
    }
    .daftar{
        margin-top: 10px;
        text-align: center;
    }
</style>

</html>