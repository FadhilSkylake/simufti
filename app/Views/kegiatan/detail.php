<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col">
        <div class="page-header">
            <h3 class="page-title"> Detail Kegiatan</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <h2 class="mt-2"></h2>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $kegiatan['dokumentasi']; ?>" class="card-img" alt="...">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-text">Nama Kegiatan : <?= $kegiatan['nama_kegiatan']; ?></p>
                <p class="card-text">Deskripsi Kegiatan : <?= $kegiatan['deskripsi']; ?></p>
                <p class="card-text">Tempat Kegiatan : <?= $kegiatan['tempat']; ?></p>
                <p class="card-text">Waktu Kegiatan : <?= $kegiatan['waktu_kegiatan']; ?></p>
                <p class="card-text">Waktu Dibuat : <?= $kegiatan['waktu_dibuat']; ?></p>
                <p class="card-text">Dokumentasi : <?= $kegiatan['dokumentasi']; ?></p>


                <a href="/kegiatan/edit/<?= $kegiatan['slug']; ?>" class="btn btn-warning">Edit</a>

                <form action="/kegiatan/<?= $kegiatan['id_kegiatan']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                </form>

                <br><br>
                <a href="/kegiatan">Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>