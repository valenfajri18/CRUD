<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
Kelola Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<style>
    img{
        display: block;
        margin: auto;
    }
    table, td{
        margin-top: 20px;
        color: black;
        width: 100%;
        border-collapse: collapse;
        table-layout:fixed;
        width: 100%;
    }
    h1{
        text-align: center;
        background-color: rgb(0, 0, 128);
        color: white;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container">
        <p style="text-align: center; font-weight: bold; font-size: 30px">Kelola Data Mahasiswa</p>
        <div class="content">
            <div class="card">
                <div class="card-body" style="color:black">
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <a href="/kelola-data-mahasiswa/create" class="btn btn-primary" style="float:right;margin-bottom:10px;">Tambah Mahasiswa</a>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($mhs as $row) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nrp'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['telepon'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal-<?= $row['id'] ?>">Edit</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Data Mahasiswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('kelola-data-mahasiswa/update') ?>" method="POST" class="form-edit">
                                                        <input hidden id="mhs_id" name="mhs_id" value="<?= $row['id'] ?>"">
                                                        <div class="form-group">
                                                            <label for="nrp">NRP</label>
                                                            <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $row['nrp'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="telepon">Nomor Telepon</label>
                                                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea style="resize: none;" class="form-control" name="alamat" id="alamat"><?= $row['alamat'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jurusan">Jurusan</label>
                                                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $row['jurusan'] ?>" />
                                                        </div>
                                                        <div style="text-align: center; margin-top: 40px; float: right">
                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary update-submit" id="submit-edit-<?= $row['id'] ?>">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <!-- Button trigger modal -->
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal-<?= $row['id'] ?>">Hapus</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Mahasiswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="text-align: center; font-weight: bold; font-size: 17px">Apakah anda yakin menghapus data mahasiswa ini?</p>
                                                    <form action="<?= base_url('kelola-data-mahasiswa/delete') ?>" method="POST" class="form-delete">
                                                        <input hidden id="mhs_id" name="mhs_id" value="<?= $row['id'] ?>"">
                                                        <div style="text-align: center; margin-top: 40px; float: right">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                                            <button type="submit" class="btn btn-success delete-submit" id="submit-delete-<?= $row['id'] ?>">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
$(".menu li:eq(2)").addClass("active");
<?= $this->endSection() ?>