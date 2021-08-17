<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Hapus Sparepart</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form action="<?= base_url() . '/Spart/deleteconfirmed/' . $Spart['id_spare_part'] ?>" method="POST">

                    <div class="form-group">
                        <label>Jenis Sparepart</label>
                        <p><?= $Spart['id_jenis_spart']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="email">Nama</label>
                        <p><?= $Spart['nama']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="username">Supplier</label>
                        <p><?= $Spart['id_supplier']; ?></p>
                    </div>

                    <div class="form-group" style="margin-top:75px;">
                        <div class="alert alert-warning">
                            Peringatan! Sparepart yang dipilih tidak dapat login kembali setelah dihapus
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    (function($) {
        'use strict';
        $('#btnSave').click(function(event) {
            event.preventDefault();
            var form = $(this).parents('form');
            swal({
                    title: 'Apakah anda yakin ingin menghapus data Sparepart?',
                    text: "Admin bersangkutan tidak dapat mengakses sistem kembali setelah dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        setTimeout(function() {
                            form.submit();
                        }, 500);
                    } else {
                        swal("Hapus dibatalkan");
                    }
                });
        })
    })(jQuery);
</script>

<?= $this->endSection('content'); ?>