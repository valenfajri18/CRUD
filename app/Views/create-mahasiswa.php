<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
Tambah Data Mahasiswa
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container">
        <p style="text-align: center; font-weight: bold; font-size: 30px">Tambah Data Mahasiswa</p>
        <div class="content">
            <div class="card">
                <div class="card-body" style="color:black">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Periksa kembali isian form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('kelola-data-mahasiswa/store') ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control" id="nrp" name="nrp" value="<?= old('nrp'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= old('telepon') ?>" />
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea style="resize: none;" class="form-control" name="alamat" id="alamat"><?= old('alamat') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= old('jurusan') ?>" />
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-block btn-primary"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
$(".menu li:eq(2)").addClass("active");
<?= $this->endSection() ?>
