<?php

include '../../PengaduanController.php';

$id_pengaduan = $_GET['id'];
$show = $pengaduan->show($id_pengaduan);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
</head>
<body>
    <center>
    <h2>Keterangan Laporan</h2>
    <p>ID Laporan <?= $show->id_pengaduan ?></p>
    
    <hr>
        <div class="card">
            <td>Tanggal : </td><br>
            <td><input type="date" name="tanggal" value='<?= $show->tgl_pengaduan ?>' disabled></td><br><br>
            <td>NIK : </td><br>
            <td><input type="text" name="nik" value='<?= $show->nik ?>' disabled></td><br><br>
            <td>Status : </td><br>
            <td><input type="text" name="status" value='<?= $show->status ?>' disabled></td><br><br>
            <td>Laporan : </td><br>
            <td><input type="text" name="laporan" value='<?= $show->isi_laporan ?>' disabled></td><br><br>
            <td>Keterangan : </td><br>
            <td><textarea name="keterangan" disabled> <?= $show->keterangan ?></textarea></td><br><br>
            <td>Foto : </td><br>
            <td><img src="../img/<?=$show->foto; ?>" width="100"/></td><br><br>
            <hr>
        </center>
        </div>
        <a href="index.php"><button>Kembali</button></a>
</body>
</html>