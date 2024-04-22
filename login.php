<?php
include "koneksi.php";
session_start();
if (isset($_POST['login'])) {
    $Username= $_POST["Username"];
    $Password= md5($_POST["Password"]);

    $sql = "SELECT * FROM user WHERE Username = '$Username' AND Password = '$Password'";
    $res = mysqli_query($conn,$sql);
    $hasil = mysqli_num_rows($res);
    
    if ($hasil>0){
        $row = mysqli_fetch_assoc($res);

        $_SESSION["UserID"]         = $row["UserID"];
        $_SESSION["Username"]       = $row["Username"];
        $_SESSION["Password"]       = $row["Password"];
        $_SESSION["Email"]          = $row["Email"];
        $_SESSION["NamaLengkap"]    = $row["NamaLengkap"];
        $_SESSION["Alamat"]         = $row["Alamat"];
        
        header("Location: home.php");
    }else {
        mysqli_error($conn);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <table>
        <form method="post">
            <tr>
                <h2>Login</h2>
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
                <td></td>
                <td><input type="submit" name="login" value="submit"></td>
            </tr>
        </form>
    </table>
    anda belum punya akun ? register <a href="register.php">disini</a>
</body>
</html>