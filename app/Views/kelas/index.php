<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Table Data Kelas</div>
        <div class="card-body">
            <a href="/kelas/create" class=" btn btn-primary mt-1">Tambah Data Kelas</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Wali Kelas</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $k) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k->nama_kelas; ?></td>
                            <td><?= $k->nama_jurusan; ?></td>
                            <td><?= $k->angkatan; ?></td>
                            <td><?= $k->nama_guru; ?></td>
                            <td>
                                <a href="/kelas/<?= $k->id_kelas; ?>" class="btn btn-info">Detail</a>
                                <a href="/kelas/edit/<?= $k->slug; ?>" class="btn btn-warning">Edit</a>
                                <form action="/kelas/<?= $k->id_kelas; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                </form>
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