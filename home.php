<?php 
  include "koneksi.php";
  session_start();
  if (!$_SESSION["UserID"]){
        header("Location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
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
            <a href="profil.php">profil</a>
        </li>
        <li>
            <a href="logout.php">logout</a>
        </li>
    </ul>

    <table border="1">
      <tr>
        <th>No</th>
        <th>Judul Foto</th>
        <th>Deksripsi</th>
        <th>Tanggal Unggah</th>
        <th>Lokasi File</th>
        <th>Aksi</th>
      </tr>
    <?php
        $no = ""; 
        $sql="SELECT * FROM foto WHERE FotoID";
        $res = mysqli_query($conn,$sql);  
        while($data=mysqli_fetch_array($res)){
        $no++;
      ?>
      <tr>
        <td><?= $no;?></td>
        <td><?= $data['JudulFoto'];?></td>
        <td><?= $data['DeskripsiFoto'];?></td>
        <td><?= $data['TanggalUnggah'];?></td>
        <td><img width="100px" src="gambar/<?= $data['LokasiFile'];?>"></td>
        <td>
            <?php $FotoID = $data['FotoID'];
                  $sqql = mysqli_query($conn, "select * from likefoto where FotoID='$FotoID'"); 
                  $row = mysqli_num_rows($sqql);?>
            <a href="like.php?FotoID=<?= $data['FotoID'];?>">Like <?php if($row > 0){ echo $row; } ?></a>
            <a href="komentar.php?FotoID=<?= $data['FotoID'];?>">Komentar</a>
        </td>
      </tr>
      <?php }?>
    </table>
</body>
</html>