<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Jurusan</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Table Data Jurusan</div>
        <div class="card-body">
            <a href="/jurusan/create" class=" btn btn-primary mt-1">Tambah Data Jurusan</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jurusan / Paket Keahlian</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($jurusan as $j) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['nama_jurusan']; ?></td>
                            <td>
                                <a href="/jurusan/edit/<?= $j['slug']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/jurusan/<?= $j['id_jurusan']; ?>" method="post" class="d-inline">
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