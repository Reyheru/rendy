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
    <title>Halaman Foto</title>
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
    </ul>

    <table>
        <form action="tambahfoto.php" method="post" enctype="multipart/form-data">
            <tr>
                <h2>Tambah Foto</h2>
            </tr>
            <tr>
                <td>Judul Foto</td>
                <td><input type="text" name="JudulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="TanggalUnggah"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="LokasiFile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="AlbumID">
                        <option>pilih</option>
                    <?php
                        $UserID = $_SESSION["UserID"];
                        $sql = mysqli_query($conn,"select * from album where UserID='$UserID'");
                        while($data = mysqli_fetch_array($sql)){
                    ?>
                        <option value="<?=$data['AlbumID'];?>"><?= $data['NamaAlbum'];?></option>
                        
                    <?php }
                    ?>
                    </select>
                </td>
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
        <th>Judul Foto</th>
        <th>Deksripsi</th>
        <th>Tanggal Unggah</th>
        <th>Lokasi File</th>
        <th>Album</th>
        <th>Aksi</th>
      </tr>
    <?php
        $no = "";
        $UserID = $_SESSION['UserID'];
        $sql="SELECT * FROM foto INNER JOIN album ON foto.AlbumID = album.AlbumID WHERE foto.UserID = '$UserID'";
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
        <td><?= $data['NamaAlbum'];?></td>
        <td>
            <a href="editfoto.php?FotoID=<?= $data['FotoID'];?>">Edit</a>
            <a href="hapusfoto.php?FotoID=<?= $data['FotoID'];?>">Hapus</a>
        </td>
      </tr>
      <?php }?>
    </table>
</body>
</html>