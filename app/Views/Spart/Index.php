<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Kelola Sparepart</h4>
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
                </div>
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Sparepart</th>
                                <th>Nama</th>
                                <th>Supplier</th>
                                <th>Tanggal Dibuat</th>
                                <th>Terakhir Diubah</th>
                                <th>Status</th>
                                <th>Admin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($Spart as $s) : ?>
                                <?php if ($s['status'] == 1) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $s['id_jenis_spart']; ?></td>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['id_supplier']; ?></td>
                                        <td><?= $s['tanggal_dibuat']; ?></td>
                                        <td><?= $s['terakhir_diubah']; ?></td>
                                        <td>
                                            <?php if ($s['status'] == 1) : ?>
                                                Tersedia
                                            <?php else : ?>
                                                Habis
                                            <?php endif; ?>
                                        </td>  
                                        <td>
                                            <?php if ($s['id_admin'] == 0) : ?>
                                                SYSTEM
                                            <?php else : ?>
                                                SUPERADMIN
                                            <?php endif; ?>
                                        </td>                                   
                                            <td>
                                                <a href="Ubah/<?= $s['id_spare_part']; ?>" class="btn btn-success">Ubah</a>
                                                <a href="Hapus/<?= $s['id_spare_part']; ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                            <td>
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