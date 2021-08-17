<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Supplier</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Supplier/update/' . $Supplier['id_supplier'] ?>" method="POST">

                    <div class="form-group">
                        <label for="nama_supplier">Name</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $Supplier['nama_supplier']; ?>" placeholder="e.g : Habibah Shiba Zahidah">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $Supplier['alamat']; ?>" placeholder="e.g : Jalan Melati NO.12">
                    </div>                    

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/Supplier/Index' ?>">Kembali</a>
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