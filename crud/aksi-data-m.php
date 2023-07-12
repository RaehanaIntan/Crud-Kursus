<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    $id_kursus = $_POST['id_kursus'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $query = "INSERT INTO materi(id_kursus, judul, deskripsi, link) values ('$id_kursus','$judul', '$deskripsi', '$link')";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Disimpan');</script>";
        echo "<meta http-equiv='refresh' content='0;url=materi.php?id_kursus=$id_kursus'>";
    } else{
        echo "Terjadi Kesalahan Pada Simpan Data". mysqli_error($koneksi);
    }
}

if(isset($_POST['ubah'])){
    $id_kursus = $_GET['id_kursus'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $id_materi =$_POST['id_materi'];
    $query = "UPDATE materi SET judul='$judul', deskripsi='$deskripsi', link='$link' WHERE id_materi=$id_materi";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<meta http-equiv='refresh' content='0; materi.php?id_kursus=$id_kursus'>";
    } else{
        echo "Terjadi Kesalahan Pada Ubah Data". mysqli_error($koneksi);
    }
}

$id = $_GET['id_materi'];
if(isset($id)){
    $id_kursus = $_GET['id_kursus'];
    $query = "DELETE FROM materi WHERE id_materi='$id'";
    if(mysqli_query($koneksi, $query)){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<meta http-equiv='refresh' content='0; url=materi.php?id_kursus=$id_kursus'>";
    } else{
        echo "Terjadi Kesalahan Pada Ubah Data". mysqli_error($koneksi);
    }
}
    ?>