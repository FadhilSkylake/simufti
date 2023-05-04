<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Table Data Kelas</div>
        <div class="card-body">
            <form action="/kelas/update/<?= $kelas->id_kelas; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $kelas->slug; ?>">
                <div class="form-group row">
                    <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ''; ?>" id="nama_kelas" name="nama_kelas" autofocus value="<?= (old('nama_kelas')) ? old('nama_kelas') : $kelas->nama_kelas ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_kelas'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_jurusan" id="id_jurusan">
                            <option value="" hidden></option>
                            <?php foreach ($jurusan as $row) : ?>
                                <option value="<?= (old('id_jurusan')) ? old('id_jurusan') : $row['id_jurusan']; ?>" <?= $row['id_jurusan'] == $kelas->id_jurusan ? 'selected' : '' ?>><?= $row['nama_jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Angkaan" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="month" class="form-control <?= ($validation->hasError('angkatan')) ? 'is-invalid' : ''; ?>" id="angkatan" name="angkatan" autofocus value="<?= (old('angkatan')) ? old('angkatan') : $kelas->angkatan ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('angkatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Wali Kelas" class="col-sm-2 col-form-label">Wali Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_guru" id="id_guru">
                            <option value="" hidden></option>
                            <?php foreach ($guru as $row) : ?>
                                <option value="<?= (old('id_guru')) ? old('id_guru') : $row['id_guru']; ?>" <?= $row['id_guru'] == $kelas->id_guru ? 'selected' : '' ?>><?= $row['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>