<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Jurusan</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Edit Data Jurusan</div>
        <div class="card-body">
            <form action="/jurusan/update/<?= $jurusan['id_jurusan']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $jurusan['slug']; ?>">
                <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_jurusan')) ? 'is-invalid' : ''; ?>" id="nama_jurusan" name="nama_jurusan" autofocus value="<?= (old('nama_jurusan')) ? old('nama_jurusan') : $jurusan['nama_jurusan'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_jurusan'); ?>
                        </div>
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