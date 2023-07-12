<?php 
include "koneksi.php"; 
include "header.php";
$id_materi = $_GET['id_materi'];
$sql = "SELECT * FROM materi WHERE id_materi='$id_materi'";
$query= mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
?>
        <div class="row">
            <div class="col-6">
            <h2>Data Materi &raquo; Edit Data</h2>
            <hr>
            <form action="aksi-data-m.php" method="post">
                <input type="hidden" name="id_materi" value="<?=$row['id_materi']?>">
                <div class="mb-3">
                    <label  class="form-label">Judul</label>
                    <input type="text" name="judul" value="<?=$row['judul'];?>" class="form-control" placeholder="Judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi"><?=$row['deskripsi'];?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link Youtube</label>
                    <input type="text" name="link" value="<?= $row['link'];?>" class="form-control" placeholder="Link">
                </div>
                <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                <a href="materi.php?id_kursus=<?= $row['id_kursus'];?>" class="btn btn-secondary">Keluar</a>
            </form>
            </div>
        </div>
    </div>
</body>