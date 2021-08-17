<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Jenis Sparepart</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/TipeSpart/update/' . $TipeSpart['id_jenis_spart'] ?>" method="POST">

                        <div class="form-group">
                            <label for="email">Nama Jenis Sparepart</label>
                            <input type="text" class="form-control" id="nama_jenis_spart" name="nama_jenis_spart" value="<?= $TipeSpart['nama_jenis_spart']; ?>" placeholder="Masukkan nama jenis spart">
                            <div class="validate-alert hide">Message Here</div>
                        </div>

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/TipeSpart/Index' ?>">Kembali</a>
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