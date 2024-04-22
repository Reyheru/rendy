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
    <title>Halaman Album</title>
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
    </ul>

    <table>
        <form action="tambahalbum.php" method="post">
            <tr>
                <h2>Tambah Album</h2>
            </tr>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="NamaAlbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="Deskripsi"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="TanggalDibuat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tambah" value="tambah"></td>
            </tr>
        </form>
    </table>

    <table border="1">
      <tr>
        <th>No</th>
        <th>Nama Album</th>
        <th>Deksripsi</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    <?php
        $no = "";
        $UserID = $_SESSION['UserID'];
        $sql="select * from album where UserID='$UserID'";
        $hasil=mysqli_query($conn,$sql);
        while ($data = mysqli_fetch_array($hasil)){
        $no++;
      ?>
      <tr>
        <td><?= $no;?></td>
        <td><?= $data['NamaAlbum'];?></td>
        <td><?= $data['Deskripsi'];?></td>
        <td><?= $data['TanggalDibuat'];?></td>
        <td>
            <a href="editalbum.php?AlbumID=<?= $data['AlbumID'];?>">edit</a>
            <a href="hapusalbum.php?AlbumID=<?= $data['AlbumID'];?>">hapus</a>
        </td>
      </tr>
      <?php }?>
    </table>
</body>
</html>