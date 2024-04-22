<?php
    include "koneksi.php";
    $FotoID = $_GET['FotoID'];

    $sqql = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$FotoID'");

    $sql = mysqli_query($conn, "DELETE FROM foto WHERE FotoID='$FotoID'");

    $data = mysqli_fetch_array($sqql);
    
    if ($sql){
        if(unlink("gambar/". $data['LokasiFile']) ){
            header("Location: foto.php");
        }
    }else{
        mysqli_error($conn);
    }
?>