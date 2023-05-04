<?= $this->extend('main'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Data Guru</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Form Data Guru</div>
        <div class="card-body">
            <form class="forms-sample" action="/guru/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" autofocus value="<?= old('username'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Email</label>
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" autofocus value="<?= old('email'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="password" name="password" autofocus value="<?= old('password'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Guru</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_guru')) ? 'is-invalid' : ''; ?>" id="nama_guru" placeholder="Nama Guru" name="nama_guru" autofocus value="<?= old('nama_guru'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_guru'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">NIP</label>
                    <input type="text" class="form-control" id="nip" placeholder="Nomor Induk Pegawai" name="nip" autofocus value="<?= old('nip'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nip'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" placeholder="Pendidikan" name="pendidikan" autofocus value="<?= old('pendidikan'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('pendidikan'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <!-- <button class="btn btn-dark">Cancel</button> -->
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>