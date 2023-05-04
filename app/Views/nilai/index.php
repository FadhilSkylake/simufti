<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nilai</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <?php if (session('message')) { ?>
            <div class="alert alert-success" role="alert">
                <?= session('message'); ?>
            </div>
        <?php } ?>
        <?php if (session('error')) { ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error'); ?>
            </div>
        <?php } ?>
        <div class="card-header">Table Daftar Nilai</div>
        <div class="card-body">
            <a href="/nilai/create" class=" btn btn-primary mt-1">Tambah Nilai</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <!-- <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Absensi</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">UTS</th>
                        <th scope="col">UAS</th> -->
                        <th scope="col">Settings</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $n) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $n['nama_siswa']; ?></td>
                            <td>
                                <a href="/nilai/cetak/<?= $n['id_siswa']; ?>" class="btn btn-info">Cetak Nilai</a>
                                <a href="/nilai/editNilai/<?= $n['id_siswa']; ?>" class="btn btn-warning">Edit Nilai</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>