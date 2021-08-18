<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Konfirmasi Maintenance</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">            
                <form action="<?= base_url() . '/Maintenance/confirmed/' . $Maintenance['id_mesin'] ?>" method="POST">
                <div class="form-group">
                        <label for="nama_maintenance">Tipe Mesin</label>
                        <p><?= $Maintenance['id_jenis_mesin']; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="nama_maintenance">Nama Mesin</label>
                        <p><?= $Maintenance['nama']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="almat">Terakhir Maintenance</label>
                        <p><?= $Maintenance['tanggal_diubah']; ?></p>
                    </div>                   

                    <div class="form-group" style="margin-top:75px;">
                        <div class="alert alert-warning">
                        Tanggal maintenance mesin akan terupdate setelah dikonfirmasi
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Maintenance Selanjutnya</label>
                        <input name="nextmain" id="flatpickrSample01" type="text" class="form-control" placeholder="Flatpickr example" data-toggle="flatpickr" value="today">
                    </div>      
                    <div style="margin-top:10px;float:left">
                        <a href="<?= base_url() . '/Maintenance/Index' ?>">Kembali</a>
                    </div>
                    <div style="margin-top:10px;float:right">
                        <button type="submit" id="btnSave" class="btn btn-danger m-b3">Konfirmasi Maintenance</button>
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
                    title: 'Apakah anda yakin ingin mengonfirmasi maintenance?',
                    text: "Tanggal maintenance mesin akan terupdate",
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
                        swal("Konfirmasi dibatalkan");
                    }
                });
        })
    })(jQuery);
</script>

<?= $this->endSection('content'); ?>