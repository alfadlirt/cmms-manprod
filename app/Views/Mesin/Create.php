<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-form">
            <div class="card-header">
                <h4>Tambah Data Mesin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form role="form" action="save" method="post">

                    <div class="form-group">
                        <label for="jenis_mesin">Jenis Mesin</label>
                        <select class="form-control" name="jenis_mesin" id="jenis_mesin">
                            <option value="-1"><span class="text-muted">--Pilih Jenis Mesin--</span></option>
                                        <?php foreach ($tipemesin as $s) : ?>
                                            <option value='<?= $s['id_jenis_mesin']; ?>'><?= $s['nama_jenis_mesin']; ?></option>
                                        <?php endforeach; ?>
                        </select>
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="nama_mesin">Nama</label>
                        <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" placeholder="Masukkan Nama">
                        <div class="validate-alert hide">Message Here</div>
                    </div>      
                     <div class="form-group">
                        <label>Maintenance Selanjutnya</label>
                        <input name="nextmain" id="flatpickrSample01" type="text" class="form-control" placeholder="Flatpickr example" data-toggle="flatpickr" value="today">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function ValidateInput() {
        var validate = [0, 0, 0];

        if ($(jenis_mesin).val() === '') {
            setErrorFor($(jenis_mesin), 'Jenis mesin Tidak Boleh Kosong');
        } else {
            setClearFor($(jenis_mesin));
            validate[0] = 1;
        }

        if ($(nama_mesin).val() === '') {
            setErrorFor($(nama_mesin), 'Nama Mesin Tidak Boleh Kosong');
        } else {
            setClearFor($(nama_mesin));
            validate[1] = 1;
        }
            
        if (validate[0] == 1 && validate[1] == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    function setClearFor(input) {
        var alert = $(input).parent().closest(".form-group").find('.validate-alert');
        $(input).removeClass('input-invalid');
        alert.addClass('hide');
    }

    function setErrorFor(input, message) {
        var alert = $(input).parent().closest(".form-group").find('.validate-alert');
        $(input).addClass('input-invalid');
        alert.removeClass('hide');
        alert.html(message);
    }

    function isChar(textbox) {
        return /^[a-zA-Z]*$/g.test(textbox);
    }

    function Clear(element) {
        if ($(element).hasClass("form-control input-invalid")) {
            setClearFor(element);
        }
    }
    $(document).ready(function() {
        $('select').change(function() {
            Clear(this);
        });
        $('input[type=text],input[type=number]').on('input', function() {
            Clear(this);
        });
        $('textarea').on('input', function() {
            Clear(this);
        });
    });
    $('#btnSave').click(function(event) {
        if (ValidateInput() == true) {

            return true;
        } else {

            return false;
        }
    })
</script>

<?= $this->endSection('content'); ?>