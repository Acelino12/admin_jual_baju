
<?php 
    include "../db/koneksi.php";

    session_start();

    if (!isset($_SESSION['user'])){
        header('location:../login.php');
    }

    $username = $_SESSION['user']['username'];

    $query = "SELECT * FROM tb_admin WHERE username='$username' ";
    $sql = mysqli_query($koneksi,$query);
    $result = mysqli_fetch_array($sql);
    $email = $result['email'];
    $password = $result['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Profil Admin</title>
</head>
<body>
<div id="app" style="width: 90%; background-color: #F6F3F3; border-radius: 10px; margin: 50px auto 0px auto; padding-bottom:10px; height:500px; box-shadow: 0px 0px 10px #2A2424; " >
        <h2 style="text-align: center; padding-top: 15px; " >Orderan</h2>
        <hr>
        <label for="name">Username :</label>
        <input type="text" readonly value="<?php echo $username; ?>" >
        <br>
        <label for="name">Email :</label>
        <input type="text" readonly value="<?php echo $email; ?>" >
        <br>
        <label for="name">Password :</label>
        <input type="text" readonly value="<?php echo $password; ?>" >
        <a href="../index.php">back</a>
    </div>

</body>
</html>