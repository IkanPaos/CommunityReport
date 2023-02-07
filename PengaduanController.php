<?php

include 'Koneksi.php';

class PengaduanController extends Koneksi {
    public function index()
    {
        $query = "SELECT * FROM pengaduan";
        $index = $this->pdo->prepare($query);
        $index->execute();
        $result = $index->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function create()
    {
        header("Location: view/pengaduan/create.php");
    }
    
    public function store($request)
    {
        $tgl        = $request['tgl'];
        $nik        = $request['nik'];
        $laporan    = $request['laporan'];
        $foto       = $request['foto'];
        $status     = 0;

        $query = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES (CURRENT_DATE(), '$nik', '$laporan', '$foto', '$status')";
        $store = $this->pdo->prepare($query);
        $store->execute();

        echo "<script>
            alert('Berhasil mengajukan pengaduan!')
            window.location.href='view/pengaduan/index.php'
            </script>";
    }

    public function show($id)
    {
        $query = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
        $show = $this->pdo->prepare($query);
        $show->execute();
        $result = $show->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function edit($id)
    {
        $query = "SELECT * FROM pengaduan WHERE id_pengaduan = $id";
        $edit = $this->pdo->prepare($query);
        $edit->execute();
        $result = $edit->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update($request, $id)
    {
        $nik    = $request['nik'];
        $isi    = $request['isi_laporan'];
        $keterangan    = $request['keterangan'];
        $foto   = $request['foto'];

        $query = "UPDATE pengaduan SET nik = '$nik', isi_laporan = '$isi', keterangan = '$keterangan', foto = '$foto' WHERE id_pengaduan = $id";
        $update = $this->pdo->prepare($query);
        $update->execute();

        echo "<script>
            alert('Berhasil mengubah pengaduan!')
            window.location.href='view/pengaduan/index.php'
            </script>";
    }

    public function destroy($id)
    {
        $query = "DELETE FROM pengaduan WHERE id_pengaduan = $id";
        $destroy = $this->pdo->prepare($query);
        $destroy->execute();

        echo "<script>
            alert('Berhasil menghapus pengaduan!')
            window.location.href='index.php'
            </script>";
    }
}

$pengaduan = new PengaduanController();

if (isset($_POST['store'])) {
    $pengaduan->store($_POST);
}

if (isset($_POST['edit'])) {
    $pengaduan->edit($_GET);
}

if (isset($_POST['update'])) {
    $pengaduan->update($_POST, $_GET['id']);
}

if (isset($_POST['destroy'])) {
    $pengaduan->destroy($_GET);
}