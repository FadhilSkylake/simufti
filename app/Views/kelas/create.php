<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Data Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Form Data Guru</div>
        <div class="card-body">
            <form class="forms-sample" action="/kelas/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="Nama Kelas">Nama Kelas</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ''; ?>" id="nama_kelas" placeholder="Nama Kelas" name="nama_kelas" autofocus value="<?= old('nama_kelas'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_kelas'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Jurusan">Jurusan</label>
                    <select class="form-control" name="id_jurusan" id="id_jurusan">
                        <option value="" hidden></option>
                        <?php foreach ($jurusan as $row) : ?>
                            <option value="<?= $row['id_jurusan']; ?>"><?= $row['nama_jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Angkatan">Angkatan</label>
                    <input type="month" class="form-control <?= ($validation->hasError('angkatan')) ? 'is-invalid' : ''; ?>" id="angkatan" placeholder="Angkatan" name="angkatan" autofocus value="<?= old('angkatan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('angkatan'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Jurusan">Wali Kelas</label>
                    <select class="form-control" name="id_guru" id="id_guru">
                        <option value="" hidden></option>
                        <?php foreach ($guru as $row) : ?>
                            <option value="<?= $row['id_guru']; ?>"><?= $row['nama_guru']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <!-- <button class="btn btn-dark">Cancel</button> -->
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>