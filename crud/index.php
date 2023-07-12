<?php include "header.php";?>

<h2>DATA KURSUS</h2>
<hr>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahK">
    Tambah Data
</button>
<table class="table table-bordered table-hover" id="kursus">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Judul Kursus</th>
            <th>Deskripsi</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include "koneksi.php";
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM kursus ORDER BY deskripsi DESC");
        while($row = mysqli_fetch_array($query)){
        
    ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$row['judul']; ?></td>
            <td><?=$row['deskripsi']; ?></td>
            <td><?=$row['durasi']; ?> Jam</td>
            <td width="25%" class="text-center">
                <a href="materi.php?id_kursus=<?= $row['id_kursus'];?>" class="btn btn-success"><i class="bi bi-info-circle"></i></a>
                <a href="edit-data-k.php?id_kursus=<?= $row['id_kursus'];?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                <a href="aksi-data-k.php?id_kursus=<?= $row['id_kursus'];?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>

    <!-- Tambah Modal -->
    <div class="modal fade" id="modalTambahK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="aksi-data-k.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Durasi</label>
                            <input type="text" name="durasi" class="form-control" placeholder="Durasi" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</table>
</div>
    <script>
	    new DataTable('#kursus');
    </script>
</body>