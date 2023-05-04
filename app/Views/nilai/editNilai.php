<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Nilai Siswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card mb-3" style="max-width: 540px;">

    </div>
    <div class="card">
        <div class="card-header">Edit Nilai <?= $id_siswa->nama_siswa; ?></div>
        <div class="card-body">
            <form action="/nilai/update/<?= $id_siswa->id_siswa ?>" method="post">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control">
                                <option value="" selected disabled>- Pilih Siswa -</option>
                                <?php foreach ($siswa as $s) { ?>
                                    <option value="<?= $s['id_siswa'] ?>" <?= $s['id_siswa'] == $id_siswa->id_siswa ? 'selected' : '' ?>><?= $s['nama_siswa']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </div>
                <?php
                $no = 1;
                $no1 = 1;
                $no2 = 1;
                $no3 = 1;
                $no4 = 1;
                foreach ($mapel as $m) {
                    $db = db_connect();
                    $query = $db->query("SELECT * FROM nilai WHERE siswa_id = $id_siswa->id_siswa AND mapel_id = '$m[id_mapel]'");
                    foreach ($query->getResultArray() as $q) {

                ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Mapel</label>
                                    <input type="hidden" name="mapel_id<?= $no++ ?>" value="<?= $m['id_mapel']; ?>">
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $m['nama_mapel']; ?>" aria-describedby="emailHelp" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nilai Absensi</label>
                                    <input type="text" name="absensi<?= $no1++ ?>" value="<?= $q['absensi'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">TUGAS</label>
                                    <input type="text" name="tugas<?= $no2++ ?>" value="<?= $q['tugas'] ?>" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">UTS</label>
                                    <input type="text" name="uts<?= $no3++ ?>" value="<?= $q['uts'] ?>" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">UAS</label>
                                    <input type="text" name="uas<?= $no4++ ?>" value="<?= $q['uas'] ?>" class="form-control" id="exampleCheck1">
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Submit</button>
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