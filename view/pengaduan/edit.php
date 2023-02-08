<?php

include '../../PengaduanController.php';

$id_pengaduan = $_GET['id'];
$edit = $pengaduan->edit($id_pengaduan);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit</title>
</head>
<body>
    <center>
    <h2>Mengubah Laporan</h2>
    <p>ID Laporan <?= $edit->id_pengaduan ?></p>
    </center>
    <a href="index.php"><button>Kembali</button></a>
    <center>
    <hr>
        <div class="card">
        <form action="../../PengaduanController.php?id=<?=$edit->id_pengaduan?>" method="POST" ecntype="multipart/form-data">
            <td>Laporan : </td><br>
            <td><input type="text" name="isi_laporan" id="isi_laporan" value="<?= $edit->isi_laporan ?>"></td><br><br>
            <td>Keterangan : </td><br>
            <td><textarea name="keterangan" id="keterangan"><?= $edit->keterangan ?></textarea></td><br><br>
            <td>Foto : </td><br>
            <td><img src="../../img/<?=$edit->foto; ?>" width="100"/></td><br><br>
            <td><input type="file" name="foto" id="foto"></td>
            <hr>
        </center>
        </div>
        <input type="submit" name="update" value="Simpan">
    </form>
    </body>
</html>