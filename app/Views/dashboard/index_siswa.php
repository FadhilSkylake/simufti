<?= $this->extend('main'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Siswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $siswa; ?></h3>

                        <p>Jumlah Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $guru; ?></h3>

                        <p>Jumlah Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jurusan; ?></h3>

                        <p>Jumlah Jurusan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="ml-2">
                <div class="small-box" style="width: 18rem;">
                    <div class="inner">
                        <h5 class="card-title">Cetak Nilai</h5>
                        <p class="card-text">Jika nilai belum bisa di cetak harap hubungi masing - masing wali kelas.</p>
                        <?php
                        $id_siswa = session('id_siswa');
                        $db = db_connect();
                        $query = $db->query("SELECT * FROM nilai where siswa_id = " . session('id_siswa'))->getNumRows();
                        ?>
                        <?php if ($query > 0) { ?>
                            <a href="/nilai/cetak/<?= $id_siswa ?>" class="btn btn-primary">Cetak Nilai</a>
                        <?php } else { ?>
                            <h2> Nilai belum dientry</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
        <div class="col">
            <div class="main-panel">
                <div class="row">
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title mb-1">Informasi Akademik</h4>
                                    <!-- <p class="text-muted mb-1">Your data status</p> -->
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-list">
                                            <?php $i = 1; ?>
                                            <?php foreach ($kegiatan as $k) : ?>
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <img src="/img/<?= $k['dokumentasi']; ?>" width="200" height="200">
                                                            <br>
                                                            <h6 class="preview-subject"><?= $k['nama_kegiatan']; ?></h6>
                                                            <p class="text-muted mb-0"><?= $k['deskripsi']; ?></p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <!-- <p class="text-muted">15 minutes ago</p>
                            <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>