<?php

include '../../PengaduanController.php';
$id_pengaduan = $_GET['id'];
$destroy = $pengaduan->destroy($id_pengaduan);

$sql  = 'DELETE from pengaduan where id_pengaduan="'.$id_pengaduan.'"';
$query = mysqli_query($query,$sql);
header('location: index.php');
?>