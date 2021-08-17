<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Kelola Jenis Mesin</h4>
            </div>
        </div>
    
        <div class="card-block" style="padding-left:25px;padding-right:25px;">
            <?php
                $session = session();
                $confirm = $session->getFlashdata('result');
            ?>

            <div class="row">
                    <?php if ($confirm == 'create') : ?>
                        <div class="col-md-12 col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data Berhasil Ditambah!
                            </div>
                        </div>
                    <?php elseif ($confirm == 'edit') : ?>
                        <div class="col-md-12 col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data Berhasil Diubah!
                            </div>
                        </div>
                    <?php elseif ($confirm == 'delete') : ?>
                        <div class="col-md-12 col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data Berhasil Dihapus!
                            </div>
                        </div>
                    <?php endif; ?>


                <div class="col-md-4" style="padding-bottom:10px;padding-top:30px">
                        <a href="Tambah" class="btn btn-primary">+ Tambah</a>
                </div>
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-stripped b-t b-b">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($JenisMesin as $j) : ?>
                                <?php if ($j['status'] == 1) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $j['nama_jenis_mesin']; ?></td>                            
                                        <td><?= (($j['status'] == 1) ? 'Aktif' : 'Tidak Aktif'); ?><td>                                    
                                        <td>
                                            <a href="Ubah/<?= $j['id_jenis_mesin']; ?>" class="btn btn-success">Ubah</a>
                                            <a href="Hapus/<?= $j['id_jenis_mesin']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>