<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Table Siswa Kelas </div>
        <div class="card-body">
            <a href="/kelas/create_detail/<?= $id_kelas; ?>" class=" btn btn-primary mt-1">Tambah Siswa Kelas</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($detail as $d) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d->nama_siswa; ?></td>

                            <td>
                                <a href="/kelas/edit_detail/<?= $d->id_detail; ?>" class="btn btn-warning">Edit</a>
                                <form action="/kelas/delete_detail/<?= $d->id_detail; ?>" method="post" class="d-inline">
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