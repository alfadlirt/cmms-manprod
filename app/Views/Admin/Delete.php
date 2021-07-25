<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Hapus Admin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Admin/deleteconfirmed/' . $Admin['id_admin'] ?>" method="POST">

                    <div class="form-group">
                        <label for="nama_admin">Nama</label>
                        <p><?= $Admin['nama_admin']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p><?= $Admin['email_admin']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <p><?= $Admin['username']; ?></p>
                    </div>

                    <div class="form-group" style="margin-top:75px;">
                        <div class="alert alert-warning">
                            Peringatan! Admin yang dipilih tidak dapat login kembali setelah dihapus
                        </div>
                    </div>
                    <div style="margin-top:10px;float:left">
                        <a href="<?= base_url() . '/Admin/Index' ?>">Kembali</a>
                    </div>
                    <div style="margin-top:10px;float:right">
                        <button type="submit" id="btnSave" class="btn btn-danger m-b3">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    (function($) {
        'use strict';
        $('#btnSave').click(function(event) {
            event.preventDefault();
            console.log('adad');
            var form = $(this).parents('form');
            swal({
                title: 'Apakah anda yakin ingin menghapus data admin?',
                text: "Admin bersangkutan tidak dapat mengakses sistem kembali setelah dihapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Hapus!',
                closeOnConfirm: false
            }, function() {
                setTimeout(function() {
                    form.submit();
                }, 500);
            });
        })
    })(jQuery);
</script>

<?= $this->endSection('content'); ?>