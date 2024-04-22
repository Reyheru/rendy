<?php
    include "koneksi.php";
    session_start();

    $FotoID = $_GET['FotoID'];
    $UserID = $_SESSION['UserID'];
    $TanggalLike = date("Y-m-d");

    $sql = mysqli_query($conn, "select * from likefoto where FotoID='$FotoID' and UserID='$UserID'");
    
    if (mysqli_num_rows($sql) == 1) {
        header("location: home.php");
    }else{
        $sql = mysqli_query($conn, "insert into likefoto values ('','$FotoID','$UserID','$TanggalLike')");
        header("location: home.php");
    }
    ?>