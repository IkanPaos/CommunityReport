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
        // $tgl        = $request['tgl'];
        $nik        = $request['nik'];
        $laporan    = $request['laporan'];
        $foto       = $_FILES['foto']['name'];
        $tmp        = $_FILES['foto']['tmp_name'];
        $keterangan = $request['keterangan'];
        $status     = 0;

        $img = date('dmYHis').$foto;
        $path = "img/".$img;
        if (move_uploaded_file($tmp,$path)) {
        
        $query = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, keterangan, foto, status) VALUES (CURRENT_DATE(), '$nik', '$laporan', '$keterangan', '$img', '$status')";
        $store = $this->pdo->prepare($query);
        $store->execute();

        echo "<script>
            alert('Berhasil mengajukan pengaduan!')
            window.location.href='view/pengaduan/index.php'
            </script>";
        }
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
        // $nik    = $request['nik'];
        $isi    = $request['isi_laporan'];
        $keterangan    = $request['keterangan'];
        $foto   = $_FILES['foto']['name'];
        $tmp   = $_FILES['foto']['tmp_name'];

        $query = "SELECT foto FROM pengaduan WHERE id_pengaduan = $id";
        $index = $this->pdo->prepare($query);
        $index->execute();
        $result = $index->fetch(PDO::FETCH_OBJ);

        if (empty($foto)){
        $query = "UPDATE pengaduan SET isi_laporan = '$isi', keterangan = '$keterangan' WHERE id_pengaduan = $id";
        $update = $this->pdo->prepare($query);
        $update->execute();

        echo "<script>
            alert('Berhasil mengubah pengaduan!')
            window.location.href='view/pengaduan/index.php'
            </script>";
        } else {
            $img = date('dmYHis').$foto;

            $path="img/".$img;
            if (move_uploaded_file($tmp,$path)) {
                $query = "UPDATE pengaduan SET foto = '$img' WHERE id_pengaduan = $id";
                $update = $this->pdo->prepare($query);
                unlink("img/".$result->foto);
                $update->execute();

        echo "<script>
            alert('Berhasil mengubah pengaduan!')
            window.location.href='view/pengaduan/index.php'
            </script>";
            }
        }
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
