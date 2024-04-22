<?php
include "koneksi.php";
session_start();
if (isset($_POST['komentar'])) {

    $FotoID            = $_POST['FotoID'];
    $UserID            = $_SESSION["UserID"];
    $IsiKomentar       = $_POST["IsiKomentar"];
    $TanggalKomentar   = date("Y-m-d");

    $sql= "insert into komentarfoto values ('','$FotoID', '$UserID','$IsiKomentar','$TanggalKomentar')";
    $res = mysqli_query($conn,$sql);
    
    if ($res){
        header("Location: komentar.php?FotoID=".$FotoID);
    }else{
        mysqli_error($conn);
    }
}
$FotoID     = $_GET['FotoID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
</head>
<body>
    <ul>
        <li>
            <a href="home.php">home</a>
        </li>
        <li>
            <a href="album.php">album</a>
        </li>
        <li>
            <a href="foto.php">foto</a>
        </li>
        <li>
            <a href="logout.php">logout</a>
        </li>
    </ul>

    <table border="1">
      <tr>
        <th>Judul Foto</th>
        <th>Deksripsi</th>
        <th>Tanggal Unggah</th>
        <th>Lokasi File</th>    
      </tr>
    <?php
        $no = "";
        $sql="SELECT * FROM foto WHERE FotoID='$FotoID'";
        $res = mysqli_query($conn,$sql);  
        while($data=mysqli_fetch_array($res)){
        $no++;
      ?>
      <tr>
        <td><?= $data['JudulFoto'];?></td>
        <td><?= $data['DeskripsiFoto'];?></td>
        <td><?= $data['TanggalUnggah'];?></td>
        <td><img width="100px" src="gambar/<?= $data['LokasiFile'];?>"></td>
      </tr>
      <?php }?>
    </table>

    <table>
        <form method="post">
            <tr>
                <h2>Tambah Komentar</h2>
            </tr>
            <input type="hidden" name="FotoID" value="<?= $FotoID;?>">
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="IsiKomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="komentar" value="komen"></td>
            </tr>
        </form>
    </table>

    <table border="1" width="75%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal Komentar</th>
        </tr>
            <?php
            $no         = "";
            $sql       = mysqli_query($conn,"select * from komentarfoto inner join user on komentarfoto.UserID = user.UserID where FotoID='$FotoID'");
            $data       = mysqli_num_rows($sql);
            while ($data = mysqli_fetch_array($sql)){
            $no++;
            ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $data['NamaLengkap'];?></td>
            <td><?= $data['IsiKomentar'];?></td>
            <td><?= $data['TanggalKomentar'];?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>