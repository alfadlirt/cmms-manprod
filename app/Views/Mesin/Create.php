<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-form">
            <div class="card-header">
                <h4>Tambah Supplier</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form role="form" action="save" method="post">

                    <div class="form-group">
                        <label for="nama_supplier">Nama</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Nama">
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                        <div class="validate-alert hide">Message Here</div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function ValidateInput() {
        var validate = [0, 0, 0];

        if ($(nama_supplier).val() === '') {
            setErrorFor($(nama_supplier), 'Nama Tidak Boleh Kosong');
        } else {
            setClearFor($(nama_supplier));
            validate[0] = 1;
        }

        if ($(alamat).val() === '') {
            setErrorFor($(alamat), 'Alamat Tidak Boleh Kosong');
        } else {
            setClearFor($(alamat));
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