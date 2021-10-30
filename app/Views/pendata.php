<?= $this->extend('layout/index'); ?>
<?= $this->Section('page'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $titel; ?>
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
                <a href="<?= base_url('user/add'); ?>" class="btn btn-primary"><i class="fa fa-plus-square-o"
                        aria-hidden="true"></i> Tambah</a>
            </div>
        </div>

        <div class="box-body">
            <?php if (session()->getFlashdata('pesan')) {
                echo '<div class="callout callout-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelurahan</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Level</th>
                    </tr>
                    <?php foreach ($pendata as $key) : ?>
                    <tr>
                        <td><?= $key['id_user']; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= $key['nama_kelurahan']; ?></td>
                        <td><?= $key['email']; ?></td>
                        <td><?php if ($key['status'] == 1) {
                                    echo '<span class="label label-success">Aktif</span>';
                                } else {
                                    echo '<span class="label label-danger">Non Aktif</span>';
                                    # code...
                                } ?>

                        </td>
                        <td><?php if ($key['level'] == 1) {
                                    echo '<span class="label label-success">Pendata</span>';
                                } elseif ($key['level'] == 2) {
                                    echo '<span class="label label-success">Kolektor</span>';
                                } else {

                                    echo '<span class="label label-danger">Belum Terdaftar</span>';
                                }
                                ?></td>
                    </tr>
                    <?php endforeach ?>

                </table>
            </div>
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