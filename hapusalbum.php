<?php
    include "koneksi.php";
    $AlbumID = $_GET['AlbumID'];

    $sql = mysqli_query($conn, "DELETE foto,album FROM foto INNER JOIN album ON foto.AlbumID=album.AlbumID WHERE foto.AlbumID = '$AlbumID'");

    $sql = mysqli_query($conn, "DELETE FROM album WHERE AlbumID='$AlbumID'");

    if($sql){
        header("Location: album.php");
    }
?>