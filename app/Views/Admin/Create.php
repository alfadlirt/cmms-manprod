<?= $this->extend('Layout/_Layout2') ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-form">
            <div class="card-header">
                <h4>Tambah Admin</h4>
            </div>

            <div class="col-lg-12 card-body card-form__body">
                <form role="form" action="save" method="post">

                    <div class="form-group">
                        <label for="nama_admin">Nama</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama">
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                        <div class="validate-alert hide">Message Here</div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <p>password awal : <i><strong>polman123</strong></i></p>
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