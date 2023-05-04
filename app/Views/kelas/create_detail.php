<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Siswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Form Tambah Siswa Kelas</div>
        <div class="card-body">
            <form class="forms-sample" action="/kelas/save_detail/<?= $id_kelas; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="Nama Siswa">Nama Siswa</label>
                    <select class="form-control" name="nama_siswa" id="id_siswa">
                        <option value="" hidden></option>
                        <?php foreach ($siswa as $row) : ?>
                            <option value="<?= $row['id_siswa']; ?>"><?= $row['nama_siswa']; ?></option>
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