<?= $this->extend('layout/index'); ?>
<?= $this->Section('page'); ?>


<section class="content">
    <!-- Info boxes -->
    <input id="kelurahan_id" type="hidden" name="kelurahan_id" value="<?= session()->get('kelurahan'); ?>">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Potensi</span>
                    <span class="info-box-number"><?= $sumpot; ?><small> Orang</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Aktif</span>
                    <span class="info-box-number"><?= $aktif; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SKRD</span>
                    <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tidak Aktif</span>
                    <span class="info-box-number"><?= $off; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <div class="box-body">
            <?php if (session()->getFlashdata('pesan')) {
                echo '<div class="callout callout-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Zona</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($potensi as $pot) : ?>

                        <tr>
                            <td scope="row"><?= $pot['nama']; ?></td>
                            <td><?= $pot['alamat']; ?></td>
                            <td><?= $pot['rt']; ?></td>
                            <td><?= $pot['rw']; ?></td>
                            <td><?= $pot['zona']; ?></td>
                            <td><?= $pot['kelas']; ?></td>
                            <td><?php if ($pot['status'] == 1) {
                                        echo 'Aktif';
                                    } else {
                                        # code...
                                        echo 'Tidak Aktif';
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="<?= base_url('potensi/pot_ajukan/' . $pot['id_potensi']); ?>"
                                    class="btn btn-success"><i class="fa fa-book" aria-hidden="true"></i>Ajukan</a>
                            </td>

                        </tr>
                        <?php endforeach ?>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
</section>

<?= $this->endSection(); ?>