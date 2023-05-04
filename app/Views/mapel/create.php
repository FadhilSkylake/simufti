<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Mata Pelajaran</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Form Tambah Mata Pelajaran</div>
        <div class="card-body">
            <form class="forms-sample" action="/mapel/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_mapel">Mata Pelajaran</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ''; ?>" id="nama_mapel" placeholder="Mata Pelajaran" name="nama_mapel" autofocus value="<?= old('nama_mapel'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_mapel'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <!-- <button class="btn btn-dark">Cancel</button> -->
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>