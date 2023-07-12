<?php 
include "koneksi.php"; 
include "header.php";
$id_kursus = $_GET['id_kursus'];
$sql = "SELECT * FROM kursus WHERE id_kursus='$id_kursus'";
$query= mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
?>
        <div class="row">
            <div class="col-6">
            <h2>Data Kursus &raquo; Edit Data</h2>
        <hr>
            <form action="aksi-data-k.php" method="post">
                <input type="hidden" name="id_kursus" value="<?=$row['id_kursus']?>">
                <div class="mb-3">
                    <label  class="form-label">Judul</label>
                    <input type="text" name="judul" value="<?=$row['judul'];?>" class="form-control" placeholder="Judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi"><?=$row['deskripsi'];?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Durasi</label>
                    <input type="text" name="durasi" value="<?= $row['durasi'];?>" class="form-control" placeholder="Durasi">
                </div>
                <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Keluar</a>
            </form>
            </div>
        </div>
    </div>
</body>