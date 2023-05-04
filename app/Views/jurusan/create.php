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
        <div class="card-header">Tambah Data Jurusan</div>
        <div class="card-body">
            <form class="forms-sample" action="/jurusan/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Jurusan</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_jurusan')) ? 'is-invalid' : ''; ?>" id="nama_jurusan" placeholder="Nama jurusan" name="nama_jurusan" autofocus value="<?= old('nama_jurusan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_jurusan'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <!-- <button class="btn btn-dark">Cancel</button> -->
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>