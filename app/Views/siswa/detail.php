<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Siswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="container-fluid">
    <div class="card">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card-header">Detail Data Siswa</div>
            </div>
        </div>
        <div class="card-body">
            <form action="/siswa/update/<?= $siswa->id_siswa ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $siswa->slug ?>">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 ml-2 col-form-label">Username :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= (old('username')) ? old('username') : $siswa->username ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 ml-2 col-form-label">Email :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= (old('email')) ? old('email') : $siswa->email ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_hash" class="col-sm-2 ml-2 col-form-label">Password :</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('password_hash')) ? 'is-invalid' : ''; ?>" id="password_hash" name="password_hash" autofocus value="<?= (old('password_hash')) ? old('password_hash') : $siswa->password_hash ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password_hash'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 ml-2 col-form-label">Nama Siswa :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ''; ?>" id="nama_siswa" name="nama_siswa" autofocus value="<?= (old('nama_siswa')) ? old('nama_siswa') : $siswa->nama_siswa ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_siswa'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nisn" class="col-sm-2 ml-2 col-form-label">NISN :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" value="<?= (old('nisn')) ? old('nisn') : $siswa->nisn ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nisn'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ttl" class="col-sm-2 ml-2 col-form-label">Tanggal Lahir :</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" id="ttl" name="ttl" value="<?= (old('ttl')) ? old('ttl') : $siswa->ttl ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('ttl'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-2 ml-2 col-form-label">Jenis Kelamin :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : $siswa->jenis_kelamin ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 ml-2 col-form-label">Agama :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama" value="<?= (old('agama')) ? old('agama') : $siswa->agama ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('agama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_kel" class="col-sm-2 ml-2 col-form-label">Status Dalam Keluarga :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('status_kel')) ? 'is-invalid' : ''; ?>" id="status_kel" name="status_kel" value="<?= (old('status_kel')) ? old('status_kel') : $siswa->status_kel ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('status_kel'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_siswa" class="col-sm-2 ml-2 col-form-label">Alamat :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat_siswa')) ? 'is-invalid' : ''; ?>" id="alamat_siswa" name="alamat_siswa" value="<?= (old('alamat_siswa')) ? old('alamat_siswa') : $siswa->alamat_siswa ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat_siswa'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sekolah_asal" class="col-sm-2 ml-2 col-form-label">Sekolah Asal :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('sekolah_asal')) ? 'is-invalid' : ''; ?>" id="sekolah_asal" name="sekolah_asal" value="<?= (old('sekolah_asal')) ? old('sekolah_asal') : $siswa->sekolah_asal ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('sekolah_asal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_diterima" class="col-sm-2 ml-2 col-form-label">Tanggal Diterima :</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_diterima')) ? 'is-invalid' : ''; ?>" id="tgl_diterima" name="tgl_diterima" value="<?= (old('tgl_diterima')) ? old('tgl_diterima') : $siswa->tgl_diterima ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('tgl_diterima'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ayah" class="col-sm-2 ml-2 col-form-label">Nama Ayah :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('ayah')) ? 'is-invalid' : ''; ?>" id="ayah" name="ayah" value="<?= (old('ayah')) ? old('ayah') : $siswa->ayah ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ibu" class="col-sm-2 ml-2 col-form-label">Nama Ibu :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('ibu')) ? 'is-invalid' : ''; ?>" id="ibu" name="ibu" value="<?= (old('ibu')) ? old('ibu') : $siswa->ibu ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_ortu" class="col-sm-2 ml-2 col-form-label">Alamat Orang Tua :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat_ortu')) ? 'is-invalid' : ''; ?>" id="alamat_ortu" name="alamat_ortu" value="<?= (old('alamat_ortu')) ? old('alamat_ortu') : $siswa->alamat_ortu ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat_ortu'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_tel_rumah" class="col-sm-2 ml-2 col-form-label">No Telepon Rumah :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('no_tel_rumah')) ? 'is-invalid' : ''; ?>" id="no_tel_rumah" name="no_tel_rumah" value="<?= (old('no_tel_rumah')) ? old('no_tel_rumah') : $siswa->no_tel_rumah ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_tel_rumah'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ayah" class="col-sm-2 ml-2 col-form-label">Pekerjaan Ayah :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= (old('pekerjaan_ayah')) ? old('pekerjaan_ayah') : $siswa->pekerjaan_ayah ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('pekerjaan_ayah'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_ibu" class="col-sm-2 ml-2 col-form-label">Pekerjaan Ibu :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= (old('pekerjaan_ibu')) ? old('pekerjaan_ibu') : $siswa->pekerjaan_ibu ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('pekerjaan_ibu'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_wali" class="col-sm-2 ml-2 col-form-label">Nama Wali :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_wali')) ? 'is-invalid' : ''; ?>" id="nama_wali" name="nama_wali" value="<?= (old('nama_wali')) ? old('nama_wali') : $siswa->nama_wali ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_wali'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_wali" class="col-sm-2 ml-2 col-form-label">Alamat Wali :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat_wali')) ? 'is-invalid' : ''; ?>" id="alamat_wali" name="alamat_wali" value="<?= (old('alamat_wali')) ? old('alamat_wali') : $siswa->alamat_wali ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat_wali'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_wali" class="col-sm-2 ml-2 col-form-label">No Wali :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('no_wali')) ? 'is-invalid' : ''; ?>" id="no_wali" name="no_wali" value="<?= (old('no_wali')) ? old('no_wali') : $siswa->no_wali ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_wali'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan_wali" class="col-sm-2 ml-2 col-form-label">Pekerjaan Wali :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_wali')) ? 'is-invalid' : ''; ?>" id="pekerjaan_wali" name="pekerjaan_wali" value="<?= (old('pekerjaan_wali')) ? old('pekerjaan_wali') : $siswa->pekerjaan_wali ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('pekerjaan_wali'); ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="fotolama" value="<?= $siswa->foto_siswa ?>">
                <div class="form-group row">
                    <label for="foto_siswa" class="col-sm-2 col-form-label">Foto Siswa</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $siswa->foto_siswa ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-10">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto_siswa')) ? 'is-invalid' : ''; ?>" id="fotosiswa" name="foto_siswa" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto_siswa'); ?>
                        </div>
                        <label class="custom-file-label" for="foto_siswa"></label>
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