<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Admin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Admin/update/' . $Admin['id_admin'] ?>" method="POST">

                    <div class="form-group">
                        <label for="nama_admin">Name</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $Admin['nama_admin']; ?>" placeholder="e.g : Habibah Shiba Zahidah">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $Admin['email_admin']; ?>" placeholder="e.g : habibahshiba@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input disabled type="text" class="form-control" id="username" name="username" value="<?= $Admin['username']; ?>" placeholder="e.g : habibah123">
                    </div>

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/Admin/Index' ?>">Kembali</a>
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