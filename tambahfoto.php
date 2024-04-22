<?php
include "koneksi.php";
session_start();
if (isset($_POST['tambah'])) {

    $JudulFoto       = $_POST["JudulFoto"];
    $DeskripsiFoto   = $_POST["DeskripsiFoto"];
    $AlbumID         = $_POST['AlbumID'];
    $TanggalUnggah   = $_POST['TanggalUnggah'];
    $UserID          = $_SESSION["UserID"];

    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['LokasiFile']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(in_array($ext,$ekstensi) ) {
        move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'gambar/'.$filename);
        mysqli_query($conn, "INSERT INTO foto VALUES(NULL,'$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$filename','$AlbumID','$UserID')");
        header("location: foto.php");
    }else{	
        mysqli_error($conn);
    }
}
?>