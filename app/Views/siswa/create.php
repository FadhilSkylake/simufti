<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<!-- <div class="main-panel">
    <div class="content-wrapper"> -->

<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="my-3">Form Tambah Data Siswa</h2>
                <form action="/siswa/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="">
                    <h5 class="my-3">Untuk Login</h5>
                    <div class="form-row">
                        <div class="col">
                            <label for="username" class="col-sm-10 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="username" class="col-sm-10 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="username" class="col-sm-10 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" autofocus value="<?= old('password'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="dropdown-divider"></div>

                    <h5 class="my-3">Data Siswa</h5>

                    <div class="form-row">
                        <div class="col">
                            <label for="nama_siswa" class="col-sm-10 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ''; ?>" id="nama_siswa" name="nama_siswa" value="<?= old('nama_siswa'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_siswa'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nisn" class="col-sm-10 col-form-label">NISN (Nomor Induk Siswa Nasional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" value="<?= old('nisn'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nisn'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="ttl" class="col-sm-10 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="ttl" name="ttl" value="<?= old('ttl'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('ttl'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="jenis_kelamin" class="col-sm-10 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin">
                                    <option selected value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="agama" class="col-sm-10 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama" value="<?= old('agama'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('agama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="status_kel" class="col-sm-10 col-form-label">Status Dalam Keluarga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('status_kel')) ? 'is-invalid' : ''; ?>" id="status_kel" name="status_kel" value="<?= old('status_kel'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('status_kel'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="alamat_siswa" class="col-sm-10 col-form-label">Alamat Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat_siswa')) ? 'is-invalid' : ''; ?>" id="alamat_siswa" name="alamat_siswa" value="<?= old('alamat_siswa'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('alamat_siswa'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="sekolah_asal" class="col-sm-10 col-form-label">Sekolah Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('sekolah_asal')) ? 'is-invalid' : ''; ?>" id="sekolah_asal" name="sekolah_asal" value="<?= old('sekolah_asal'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('sekolah_asal'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="tgl_diterima" class="col-sm-10 col-form-label">Tanggal Diterima Di Sekolah</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>" id="tgl_diterima" name="tgl_diterima" value="<?= old('tgl_diterima'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tgl_diterima'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="dropdown-divider"></div>

                    <h5 class="my-3">Data Orang tua dan Wali</h5>
                    <div class="form-row">
                        <div class="col">
                            <label for="ayah" class="col-sm-10 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('ayah')) ? 'is-invalid' : ''; ?>" id="ayah" name="ayah" value="<?= old('ayah'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('ayah'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="ibu" class="col-sm-10 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('ibu')) ? 'is-invalid' : ''; ?>" id="ibu" name="ibu" value="<?= old('ibu'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('ibu'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="alamat_ortu" class="col-sm-10 col-form-label">Alamat Orang Tua</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat_ortu')) ? 'is-invalid' : ''; ?>" id="alamat_ortu" name="alamat_ortu" value="<?= old('alamat_ortu'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('alamat_ortu'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="no_tel_rumah" class="col-sm-10 col-form-label">No Telepon Rumah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('no_tel_rumah')) ? 'is-invalid' : ''; ?>" id="no_tel_rumah" name="no_tel_rumah" value="<?= old('no_tel_rumah'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('no_tel_rumah'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="pekerjaan_ayah" class="col-sm-10 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= old('pekerjaan_ayah'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan_ayah'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="pekerjaan_ibu" class="col-sm-10 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= old('pekerjaan_ibu'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan_ibu'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="nama_wali" class="col-sm-10 col-form-label">Nama Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_wali')) ? 'is-invalid' : ''; ?>" id="nama_wali" name="nama_wali" value="<?= old('nama_wali'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_wali'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="alamat_wali" class="col-sm-10 col-form-label">Alamat Wal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat_wali')) ? 'is-invalid' : ''; ?>" id="alamat_wali" name="alamat_wali" value="<?= old('alamat_wali'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('alamat_wali'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="no_wali" class="col-sm-10 col-form-label">No Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('no_wali')) ? 'is-invalid' : ''; ?>" id="no_wali" name="no_wali" value="<?= old('no_wali'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('no_wali'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="pekerjaan_wali" class="col-sm-10 col-form-label">Pekerjaan Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_wali')) ? 'is-invalid' : ''; ?>" id="pekerjaan_wali" name="pekerjaan_wali" value="<?= old('pekerjaan_wali'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan_wali'); ?>
                                </div>
                            </div>
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
<div class="col">
    <label for="foto_siswa" class="col-sm-10 col-form-label">Foto Siswa</label>
    <div class="col-sm-2 mb-2">
        <img src="../img/default/default.svg" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-10">
        <input type="file" class="custom-file-input <?= ($validation->hasError('foto_siswa')) ? 'is-invalid' : ''; ?>" id="fotosiswa" name="foto_siswa" onchange="previewImg()">
        <div class="invalid-feedback">
            <?= $validation->getError('foto_siswa'); ?>
        </div>
        <label class="custom-file-label" for="foto_siswa">Pilih gambar</label>
    </div>
</div>
<script>
    function previewImg() {
        const fotosiswa = document.querySelector('#fotosiswa');
        const fotoLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = fotosiswa.files[0].name;

        const fileDok = new FileReader();
        fileDok.readAsDataURL(fotosiswa.files[0]);

        fileDok.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>