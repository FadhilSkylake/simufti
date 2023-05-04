<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Table Data Kegiatan</div>
        <div class="card-body">
            <a href="/kegiatan/create" class=" btn btn-primary mt-1">Tambah Data Kegiatan</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Deskripsi Kegiatan</th>
                        <th scope="col">Tempat Kegiatan</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($kegiatan as $k) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['nama_kegiatan']; ?></td>
                            <td><?= $k['deskripsi']; ?></td>
                            <td><?= $k['tempat']; ?></td>
                            <td>
                                <a href="/kegiatan/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="card">
        <div class="card-header">Data Personal</div>
        <div class="card-body"></div>
    </div> -->
</div>
<?= $this->endSection(); ?>