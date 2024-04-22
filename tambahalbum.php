<?php
include "koneksi.php";
session_start();
if (isset($_POST['tambah'])) {

    $NamaAlbum        = $_POST["NamaAlbum"];
    $Deskripsi        = $_POST["Deskripsi"];
    $TanggalDibuat    = $_POST["TanggalDibuat"];
    $UserID           = $_SESSION["UserID"];

    $sql= "INSERT INTO album VALUES ('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($res){
        header("Location: album.php");
    }else{
        mysqli_error($conn);
    }
}
?>