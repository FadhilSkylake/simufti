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
        <div class="card-header">Table Data Siswa</div>
        <div class="card-body">
            <a href="/siswa/create" class=" btn btn-primary mt-1">Tambah Data Siswa</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $ssw) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $ssw['nama_siswa']; ?></td>
                            <td><?= $ssw['nisn']; ?></td>
                            <td>
                                <a href="/siswa/<?= $ssw['slug']; ?>" class="btn btn-success">Detail</a>
                                <form action="/siswa/<?= $ssw['id_siswa']; ?>" method="post" class="d-inline">
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
</div>
<?= $this->endSection(); ?>