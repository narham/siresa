<?= $this->extend('layout/index'); ?>
<?= $this->Section('page'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php } ?>


            <form action="<?= base_url('user/proses'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama"
                        placeholder="Masukkan Nama">
                    <small id="nama" class="form-text text-muted">Masukkan Nama Anda</small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="email"
                        placeholder="Email">
                    <small id="email" class="form-text text-muted">Masukkan Email</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="hp">No. HP</label>
                    <input type="text" class="form-control" name="hp" id="hp" aria-describedby="helpId"
                        placeholder="hp">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select id="kelurahan" class="form-control" name="kelurahan">
                        <option>Pilih Kelurahan</option>
                        <?php foreach ($kelurahan as $key) : ?>
                        <option value="<?= $key['id_kelurahan']; ?>"><?= $key['nama_kelurahan']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Level Akses</label>
                    <select id="level" class="form-control" name="level">
                        <option>Pilih Level Akses</option>
                        <option value="2">Pendata</option>
                        <option value="3">Kolektor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option>pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="2">Non Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" name="foto" id="foto" placeholder="fotoo"
                        aria-describedby="fileHelpId">
                    <small id="fileHelpId" class="form-text text-muted">Help text</small>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    Simpan</button>
            </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<?= $this->endSection(); ?>