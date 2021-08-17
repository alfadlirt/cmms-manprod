<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Kelola Maintenance</h4>
            </div>


            <div class="card-block" style="padding-left:25px;padding-right:25px;">
                <?php
                 $session = session();
                 $confirm = $session->getFlashdata('result');
                ?>

                <div class="row" style="padding-top:25px">
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
                                Data Berhasil Dikonfirmasi!
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
                        
                    </div>
                </div>
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Mesin</th>
                                <th>Tipe Mesin</th>
                                <th>Nama Mesin</th>
                                <th>Tanggal Maintenance</th>                                                                
                                <th>Terakhir Diperbaharui</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($Maintenance as $s) : ?>
                                <?php if ($s['status'] == 1) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><b>#<?= $s['id_mesin']; ?></b></td>
                                        <td><?= $s['id_jenis_mesin']; ?></td>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= date_format(date_create($s['tanggal_maintenance']),"d-M-Y"); ?></td>
                                        <td><?= date_format(date_create($s['tanggal_diubah']),"d-M-Y"); ?></td>
                                        <?php if (date_create()->format('Y-m-d')==date_format(date_create($s['tanggal_maintenance']),"Y-m-d")) : ?>
                                            <td><span class="badge badge-pill badge-soft-danger">Tenggat Maintenance</span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-pill badge-soft-secondary">Belum Tenggat</span></td>
                                        <?php endif; ?>     

                                        <?php if (date_create()->format('Y-m-d')==date_format(date_create($s['tanggal_maintenance']),"Y-m-d")) : ?>
                                            <td>
                                            <a href="Konfirmasi/<?= $s['id_mesin']; ?>" class="btn btn-danger">Konfirmasi</a>
                                            </td>  
                                        <?php else : ?>
                                            <td>
                                            
                                            </td>  
                                        <?php endif; ?> 
                                                                              

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