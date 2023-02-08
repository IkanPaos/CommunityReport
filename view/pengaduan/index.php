<?php
include '../../PengaduanController.php';
$index = $pengaduan->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan</title>
</head>
<style>
    th {
        font-family: Verdana;
        font-size: 16px;
    }
    div.posisi {
        position: relative;
        left: 135px;
    }
</style>
<body>
    <center>
    <h1>List Pengaduan Masyarakat</h1>
    </center>
    <div class="posisi">
        <a href="create.php"><button>+ Laporan</button></a>
    </div><br>
    <center>
    <table width='80%' border=1>
        <tr>
            <th>Tanggal</th>
            <th>NIK</th>
            <th>Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php if (Count($index) > 0) : ?>
        <?php foreach ($index as $data) : ?>
            <?= "<tr>"; ?>
            <?= "<td>" . $data->tgl_pengaduan . "</td>" ?>
            <?= "<td>" . $data->nik . "</td>" ?>
            <?= "<td>" . $data->isi_laporan . "</td>"?>
            <?= "<td align='center'>" . $data->foto . "</td>"?>
            <?= "<td align='center'>" ?>
                <?php if ($data->status == 0) : ?>
                    Menunggu
                    <?php elseif ($data->status == 'proses') : ?>
                        Sedang diproses
                        <?php elseif ($data->status == 'selesai') : ?>
                            Selsai diproses
                            <?= "</td>" ?> <br>
            <?php endif ; ?>
            <?php echo "<td align='center'><a href='show.php?id=$data->id_pengaduan'>Cek</a> | <a href='edit.php?id=$data->id_pengaduan'>Edit</a> | <a href='delete.php?id=$data->id_pengaduan' >Hapus</a></td>"; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <h3>List Pengaduan Masih Kosong</h3>
    <?php endif; ?>
    <?= "</tr>" ?>
    </table>
</center>
<br>
<div class="posisi">
<button>Logout</button>
</div>
</body>
</html>

