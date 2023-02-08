<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan</title>
</head>
<body>
    <a href="index.php"><button>Kembali</button></a><br><br>
    <form action="../../PengaduanController.php" method="POST" enctype="multipart/form-data">
        <label for="nik">NIK</label><br>
        <input type="text" name="nik" id="nik" required><br><br>
        <label for="laporan">Laporan</label><br>
        <input type="text" name="laporan" id="laporan" required><br><br>
        <label for="keterangan">Keterangan</label><br>
        <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea><br><br>
        <label for="foto">Foto</label><br>
        <input type="file" name="foto" id="foto"><br><br><br><br>
        <input type="submit" name="store" value="Laporkan"> 
    </form>
</body>
</html>