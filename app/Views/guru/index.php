<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Guru</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <?php if (session('pesan')) { ?>
            <div class="alert alert-success" role="alert">
                <?= session('pesan'); ?>
            </div>
        <?php } ?>
        <div class="card-header">Table Data Guru</div>
        <div class="card-body">
            <a href="/guru/create" class=" btn btn-primary mt-1">Tambah Data Guru</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Setting</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $g) : {
                        } ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $g['nama_guru']; ?></td>
                            <td><?= $g['nip']; ?></td>
                            <td><?= $g['pendidikan']; ?></td>
                            <td><?= $g['alamat']; ?></td>
                            <td>
                                <a href="/guru/edit/<?= $g['slug']; ?>" class="btn btn-warning">Edit</a>
                                <form action="/guru/<?= $g['id_guru']; ?>" method="post" class="d-inline">
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