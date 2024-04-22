<?php
include "koneksi.php";
if (isset($_POST['register'])) {

    $Username       = $_POST["Username"];
    $Password       = md5($_POST["Password"]);
    $Email          = $_POST["Email"];
    $NamaLengkap    = $_POST["NamaLengkap"];
    $Alamat         = $_POST["Alamat"];

    $sqll = mysqli_query($conn, "select * from user where Username='$Username'");
    $data = mysqli_fetch_array($sqll);

    if($Username != $data['Username']){

        $sql = mysqli_query($conn, "INSERT INTO user VALUES ('','$Username','$Password','$Email','$NamaLengkap','$Alamat')") or die (mysqli_error($conn));
        
        if($sql){
            header("Location: login.php");
        }else{
            header("Location: register.php");
        }
    }else{
        echo "<div class='alert alert-danger'>Username Sudah Ada Coba Username Lain</div>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <h2>Register</h2>
            </tr>

            <tr>
                <td>Username</td>
                <td><input type="text" name="Username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="Password"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="Email"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="NamaLengkap"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="Alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" value="submit"></td>
            </tr>
        </form>  
</table>
sudah punya akun ? login <a href="login.php">disini</a>
</body>
</html>