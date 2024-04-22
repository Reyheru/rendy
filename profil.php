<?php
include "koneksi.php";
session_start();
if (isset($_POST['edit'])) {

    $UserID        = $_SESSION['UserID'];
    $Username       = $_POST["Username"];
    $Password       = md5($_POST["Password"]);
    $Email          = $_POST["Email"];
    $NamaLengkap   = $_POST["NamaLengkap"];
    $Alamat         = $_POST["Alamat"];

    $sqll = mysqli_query($conn, "select * from user where Username='$Username'");
    $data = mysqli_fetch_array($sqll);

    if($Username != $data['Username']){

        $sql = mysqli_query($conn, "update user set Username='$Username', Password='$Password',Email='$Email', NamaLengkap='$NamaLengkap', Alamat='$Alamat' where UserID='$UserID'");
        
        if($sql){
            header("Location: profil.php");
        }else{
            mysqli_error($conn);
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
    <title>Halaman Edit Akun</title>
</head>
<body>
    <ul>
        <li>
            <a href="home.php">home</a>
        </li>
        <li>
            <a href="logout.php">logout</a>
        </li>
    </ul>
    <table>
        <form method="post">
            <tr>
                <h2>Edit Akun</h2>
            </tr>
            <br>
            <?php
            $UserID2 = $_SESSION['UserID'];
            $sql="select * from user where UserID='$UserID2'";
            $hasil=mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td>Username</td>
                <td><input type="text" name="Username" value="<?= $data['Username'];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="Password" placeholder="masukkan password baru" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="Email" value="<?= $data['Email'];?>"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="NamaLengkap" value="<?= $data['NamaLengkap'];?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="Alamat" value="<?= $data['Alamat'];?>"></td>
            </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td><input type="submit" name="edit" value="edit"></td>
            </tr>
        </form>
</table>
</body>
</html>