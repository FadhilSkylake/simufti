<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<!-- <div class="main-panel">
    <div class="content-wrapper"> -->

<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="my-3">Form Tambah Data Kegiatan</h2>
                <form action="/kegiatan/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="">
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" id="nama_kegiatan" name="nama_kegiatan" autofocus value="<?= old('nama_kegiatan'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_kegiatan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Desikripsi Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat" name="tempat" value="<?= old('tempat'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_kegiatan" class="col-sm-2 col-form-label">Waktu Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= old('waktu_kegiatan'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_dibuat" class="col-sm-2 col-form-label">Waktu Dibuat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="waktu_dibuat" name="waktu_dibuat" value="<?= old('waktu_dibuat'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dokumentasi" class="col-sm-2 col-form-label">Dokumentasi</label>
                        <div class="col-sm-2">
                            <img src="img/default.svg" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-10">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('dokumentasi')) ? 'is-invalid' : ''; ?>" id="dokumentasi" name="dokumentasi" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('dokumentasi'); ?>
                            </div>
                            <label class="custom-file-label" for="Dokumentasi">Pilih gambar</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const dokumentasi = document.querySelector('#dokumentasi');
        const dokumentasiLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        dokumentasiLabel.textContent = dokumentasi.files[0].name;

        const fileDokumentasi = new FileReader();
        fileDokumentasi.readAsDataURL(dokumentasi.files[0]);

        fileDokumentasi.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>