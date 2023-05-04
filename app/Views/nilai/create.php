<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Entry Nilai Siswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">Input Nilai</div>
        <div class="card-body">

            <form action="/nilai/save" method="post">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control">
                                <option value="" selected disabled>- Pilih Siswa -</option>
                                <?php foreach ($siswa as $s) { ?>
                                    <option value="<?= $s['id_siswa'] ?>"><?= $s['nama_siswa']; ?></option>
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
                foreach ($mapel as $m) { ?>
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
                                <input type="text" name="absensi<?= $no1++ ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">TUGAS</label>
                                <input type="text" name="tugas<?= $no2++ ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">UTS</label>
                                <input type="text" name="uts<?= $no3++ ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">UAS</label>
                                <input type="text" name="uas<?= $no4++ ?>" class="form-control" id="exampleCheck1">
                            </div>
                        </div>
                    </div>
                <?php } ?>
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