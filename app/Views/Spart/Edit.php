<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Sparepart</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Spart/update/' . $Spart['id_jenis_spart'] ?>" method="POST">

                        <div class="form-group">
                            <label>Jenis SparePart</label>
                            <select  class="form-control" name="id_jenis_spart" id="id_jenis_spart">
                                <?php foreach ($tipeSpart as $t) : ?>
                            <option <?= ($t['id_jenis_spart'] == $t['id_jenis_spart']) ? 'selected' : '' ?> value='<?= $t['id_jenis_spart']; ?>'><?= $t['nama_jenis_spart']; ?></option>
                            <?php endforeach; ?>
                                <!-- <option class="form-control" value="1">Mesin</option>
                                <option class="form-control" value="2">Roda</option>
                                <option class="form-control" value="3">Oli</option>
                                <option class="form-control" value="4">Bagian Dalam</option> -->
                            </select>
                            <div class="validate-alert hide">Message Here</div>
                        </div>

                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $Spart['nama']; ?>" placeholder="Masukkan nama">
                            <div class="validate-alert hide">Message Here</div>
                        </div>

                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-control" name="id_supplier" id="id_supplier">
                                <option class="form-control" value="-1">Pilih Item</option>  
                                <?php foreach ($supplier as $s) : ?>
                                <option <?= ($s['id_supplier'] == $s['id_supplier']) ? 'selected' : '' ?> value='<?= $s['id_supplier']; ?>'><?= $s['nama_supplier']; ?></option>
                                <?php endforeach; ?>
                                <!-- <option class="form-control" value="1">Karya Mitra Usaha</option>
                                <option class="form-control" value="2">Sumber Djaja Indah</option>
                                <option class="form-control" value="3">Toko Sinar Tiga</option>
                                <option class="form-control" value="4">Gunung Sibayak</option> -->
                            </select>
                            <div class="validate-alert hide">Message Here</div>
                        </div>               

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/Sparepart/Index' ?>">Kembali</a>
                    </div>
                    <div style="margin-top:50px;float:right">
                        <button type="submit" id="btnSave" class="btn btn-primary m-b3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>