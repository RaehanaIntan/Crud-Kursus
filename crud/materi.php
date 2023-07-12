<?php include "koneksi.php"; 
include "header.php";
$id_kursus = $_GET['id_kursus'];
$sql = "SELECT * FROM kursus WHERE id_kursus='$id_kursus'";
$query= mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
?>
    <h2>Detail Kursus &raquo; <?php echo $row['judul']; ?></h2>
        <hr>
        <table class="table table-striped table-condensed">
            <tr>
                <th widht="20%">Judul Kursus</th>
                <td widht="2%">:</td>
                <td><?php echo $row['judul']; ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>:</td>
                <td><?php echo $row['deskripsi']; ?></td>
            </tr>
            <tr>
                <th>Durasi</th>
                <td>:</td>
                <td><?php echo $row['durasi']; ?> Jam</td>
            </tr>
        </table>
        <h5>Materi yang tersedia pada Kursus ini yaitu : </h5>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahM">
    Tambah Data
</button>
        <table class="table table-bordered table-hover" id="materi">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Judul Materi</th>
                    <th>Deskripsi</th>
                    <th>Link Youtube</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT kursus.id_kursus, materi.* FROM materi INNER JOIN kursus ON materi.id_kursus =kursus.id_kursus WHERE materi.id_kursus='$id_kursus'");
                while($row = mysqli_fetch_assoc($query)){
                    $video = $row['link'];
                    $convert = str_replace('watch?v=', 'embed/', $video);
            echo "
                <tr>
                    <td>$no</td>
                    <td>$row[judul]</td>
                    <td>$row[deskripsi]</td>
                    <td align='center'><iframe frameborder='0' allow='autoplay; encrypted-media' allowfullscreen src='$convert'></iframe></td>
                    <td width='25%' class='text-center'>
                        <a href='edit-data-m.php?id_materi=$row[id_materi]' class='btn btn-primary'><i class='bi bi-pencil-square'></i></a>
                        <a href='aksi-data-m.php?id_materi=$row[id_materi]' class='btn btn-danger'><i class='bi bi-trash3'></i></a>
                    </td>
                </tr>";
                 } ?>
            </tbody>
            <!-- Tambah Modal -->
            <div class="modal fade" id="modalTambahM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kursus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php 
                        $id_kursus = $_GET['id_kursus'];
                        $sql = "SELECT * FROM kursus WHERE id_kursus='$id_kursus'";
                        $result = mysqli_query($koneksi, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <form action="aksi-data-m.php" method="post">
                        <input type="hidden" name="id_kursus" value="<?php echo $id_kursus?>">
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
                                    <label class="form-label">Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="Link" required>
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
            <?php } 
            $no++;?>
        </table>
        </div>
    <script>
	    new DataTable('#materi');
    </script>
</body>