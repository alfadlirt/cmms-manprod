<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-form">
            <div class="card-header">
                <h4>Tambah SparePart</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form role="form" action="save" method="post">

                    <div class="form-group">
                        <label>Jenis SparePart</label>
                        <select class="form-control" name="id_jenis_spart" id="id_jenis_spart">
                            <option class="form-control" value="1">Mesin</option>
                            <option class="form-control" value="2">Roda</option>
                            <option class="form-control"value="3">Oli</option>
                            <option class="form-control" value="4">Bagian Dalam</option>
                        </select>
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="email">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control" name="id_supplier" id="id_supplier">
                            <option class="form-control" value="1">Karya Mitra Usaha</option>
                            <option class="form-control" value="2">Sumber Djaja Indah</option>
                            <option class="form-control" value="3">Toko Sinar Tiga</option>
                            <option class="form-control" value="4">Gunung Sibayak</option>
                        </select>
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div style="margin-top:50px;float:left">
                        <a href="<?= base_url() . '/Spart/Index' ?>">Kembali</a>
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

        if ($(nama_admin).val() === '') {
            setErrorFor($(nama_admin), 'Nama Tidak Boleh Kosong');
        } else {
            setClearFor($(nama_admin));
            validate[0] = 1;
        }

        if ($(email).val() === '') {
            setErrorFor($(email), 'Email Tidak Boleh Kosong');
        } else {
            setClearFor($(email));
            validate[1] = 1;
        }

        if ($(username).val() === '') {
            setErrorFor($(username), 'Username Tidak Boleh Kosong');
        } else {
            if ($(username).val().length < 8) {
                setErrorFor($(username), 'Username Tidak Boleh Kurang Dari 8');
            } else {
                setClearFor($(username));
                validate[2] = 1;
            }
        }



        if (validate[0] == 1 && validate[1] == 1 && validate[2] == 1) {
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