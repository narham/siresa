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
            <h3 class="box-title"><?= $judul; ?></h3>

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
            <form action="<?= base_url('potensi/pot_kel_proses'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama Potensi</label>
                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId"
                        placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="helpId"
                        placeholder="Alamat">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-md-3">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" name="rt" id="rt" aria-describedby="helpId"
                                placeholder="RT">
                        </div>
                        <div class="col col-md-3">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" name="rw" id="rw" aria-describedby="helpId"
                                placeholder="RT">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="zona">Zona</label>
                    <input type="text" class="form-control" name="zona" id="zona" aria-describedby="helpId"
                        placeholder="Zona">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" aria-describedby="helpId"
                        placeholder="Kelas">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option>Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    Simpan</button>
            </form>
        </div>

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<?= $this->endSection(); ?>