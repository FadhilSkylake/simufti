<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Siswa Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Siswa Kelas</div>
        <div class="card-body">
            <form action="/kelas/update_detail/<?= $id_detail; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group row">
                    <label for="Jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <option value="" hidden></option>
                            <?php foreach ($siswa as $row) : ?>
                                <option value="<?= (old('id_siswa')) ? old('id_siswa') : $row['id_siswa']; ?>" <?= $row['id_siswa'] == $detail['siswa_id'] ? 'selected' : '' ?>><?= $row['nama_siswa']; ?></option>
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