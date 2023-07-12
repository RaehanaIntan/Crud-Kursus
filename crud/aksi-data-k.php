<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $query = "INSERT INTO kursus(judul, deskripsi, durasi) values ('$judul', '$deskripsi', '$durasi')";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else{
        echo "Terjadi Kesalahan Pada Simpan Data". mysqli_error($koneksi);
    }
}

if(isset($_POST['ubah'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $id_kursus =$_POST['id_kursus'];
    $query = "UPDATE kursus SET judul='$judul', deskripsi='$deskripsi', durasi='$durasi' WHERE id_kursus=$id_kursus";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else{
        echo "Terjadi Kesalahan Pada Simpan Data". mysqli_error($koneksi);
    }
}

$id = $_GET['id_kursus'];
if(isset($id)){
    $query = "DELETE FROM kursus WHERE id_kursus='$id'";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else{
        echo "Terjadi Kesalahan Pada Hapus Data". mysqli_error($koneksi);
    }
}

?>