<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-form">
            <div class="card-header">
                <h4>Hapus Jenis Mesin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form role="form" action="<?= base_url() . '/JenisMesin/deleteConfirmed/' . $JenisMesin['id_jenis_mesin'] ?>" method="post">
                    <div class="form-group">
                        <label for="nama_jenis_mesin">Nama</label>
                        <p><?= $JenisMesin['nama_jenis_mesin']; ?></p>                    
                    </div>

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/JenisMesin/Index' ?>">Kembali</a>
                    </div>
                    <div style="margin-top:50px;float:right">
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
                    title: 'Apakah anda yakin ingin menghapus data admin?',
                    text: "Admin bersangkutan tidak dapat mengakses sistem kembali setelah dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttonText: 'Hapus',
                    
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