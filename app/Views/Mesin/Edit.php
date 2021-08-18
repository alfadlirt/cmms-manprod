<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Mesin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Mesin/update/' . $Mesin['id_mesin'] ?>" method="POST">
                <div class="form-group">
                        <label for="jenis_mesin">Jenis Mesin</label>
                        <select class="form-control" name="jenis_mesin" id="jenis_mesin">
                            <option value="-1"><span class="text-muted">--Pilih Jenis Mesin--</span></option>
                            <?php foreach ($tipemesin as $s) : ?>
                            <option <?= ($s['id_jenis_mesin'] == $Mesin['id_jenis_mesin']) ? 'selected' : '' ?> value='<?= $s['id_jenis_mesin']; ?>'><?= $s['nama_jenis_mesin']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="validate-alert hide">Message Here</div>
                    </div>
                    <div class="form-group">
                        <label for="nama_Mesin">Name</label>
                        <input type="text" class="form-control" id="nama_Mesin" name="nama_Mesin" value="<?= $Mesin['nama']; ?>" placeholder="e.g : Habibah Shiba Zahidah">
                    </div>                                 

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/Mesin/Index' ?>">Kembali</a>
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