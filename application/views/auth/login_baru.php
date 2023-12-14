<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPROC - JMTM | LOGIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <style>
        body {
            background: #031323;
            overflow: hidden;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(-45deg, #E7CD11, #e73c7e, #052c52, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .box {
            position: relative;
            width: 400px;
        }

        .box .square {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            animation: square 10s linear infinite;
            animation-delay: calc(-1s * var(--i));
        }

        @keyframes square {

            0%,
            100% {
                transform: translateY(-20px);
            }

            50% {
                transform: translateY(20px);
            }
        }

        .box .square:nth-child(1) {
            width: 100px;
            height: 100px;
            top: -15px;
            right: -45px;
        }

        .box .square:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 105px;
            left: -125px;
            z-index: 2;
        }

        .box .square:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 85px;
            right: -45px;
            z-index: 2;
        }

        .box .square:nth-child(4) {
            width: 50px;
            height: 50px;
            bottom: 35px;
            left: -95px;
        }

        .box .square:nth-child(5) {
            width: 50px;
            height: 50px;
            top: -15px;
            left: -25px;
        }

        .box .square:nth-child(6) {
            width: 85px;
            height: 85px;
            top: 165px;
            right: -155px;
            z-index: 2;
        }

        .container {
            position: relative;
            padding: 25px;
            width: 100%;
            min-height: 380px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.5);
        }

        .container::after {
            content: '';
            position: absolute;
            top: 5px;
            right: 5px;
            bottom: 5px;
            left: 5px;
            border-radius: 5px;
            pointer-events: none;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 2%);
        }

        .form {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .form .inputBx {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .form .inputBx input {
            width: 90%;
            outline: none;
            border: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 10px;
            padding-left: 40px;
            border-radius: 15px;
            color: #fff;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .form .inputBx .password-control {
            position: absolute;
            top: 11px;
            right: 10px;
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
            transition: 0.5s;
        }

        .form .inputBx .view {
            background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
            transition: 0.5s;
        }

        .form .inputBx .fas {
            position: absolute;
            top: 13px;
            left: 13px;
        }

        .form .inputBx input[type="submit"] {
            background: #fff;
            color: #111;
            max-width: 100%;
            padding: 8px 10px;
            box-shadow: none;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 1.5s;
        }

        .form .inputBx input[type="submit"]:hover {
            background: linear-gradient(115deg, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.25));
            color: #fff;
            transition: 0.5s;
        }

        .form .inputBx input::placeholder {
            color: #fff;
        }

        .form .inputBx span {
            position: absolute;
            left: 30px;
            padding: 10px;
            display: inline-block;
            color: #fff;
            transition: 0.5s;
            pointer-events: none;
        }

        .form .inputBx input:focus~span,
        .form .inputBx input:valid~span {
            transform: translateX(-30px) translateY(-30px);
            font-size: 12px;
        }

        .form p {
            color: #fff;
            font-size: 15px;
            margin-top: 5px;
        }

        .form p a {
            color: #fff;
        }

        .form p a:hover {
            background-color: #000;
            background-image: linear-gradient(to right, #434343 0%, black 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .remember {
            position: relative;
            display: inline-block;
            color: #fff;
            margin-bottom: 10px;
            cursor: pointer;
        }


        .g-recaptcha div {
            margin: 0 auto;
        }
    </style>
</head>

<body>


    <section>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div>

            <div class="container">
                <div class="form">
                    <?php if ($this->session->flashdata('pesan')) {
                        echo '  <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>';
                        echo  $this->session->flashdata('pesan');
                        echo ' </div>';
                    } ?>

                    <?php if ($this->session->flashdata('salah')) {
                        echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
                        echo  $this->session->flashdata('salah');
                        echo ' </div>';
                    } ?>

                    <?php if ($this->session->flashdata('tidak_aktif')) {
                        echo '  <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf !</h5>';
                        echo  $this->session->flashdata('tidak_aktif');
                        echo ' </div>';
                    } ?>
                    <?php if ($this->session->flashdata('berhasil')) {
                        echo '  <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Berhasil !</h5>';
                        echo  $this->session->flashdata('berhasil');
                        echo ' </div>';
                    } ?>
                    <div class="card-header text-center">
                        <img src="<?= base_url('assets/teamplate_transpo/img/JMTMLOGOKU.png') ?>" width="300px" alt="Logo jmtm" width="50%" class="brand-image" style="opacity: 1.8">
                        <br>
                    </div>
                    <h3 class="text-center text-white my-4">Login - Non Penyedia</h3>
                    <?php if ($this->session->flashdata('notif')) {
                        echo $this->session->flashdata('notif');
                    } ?>
                    <form action="<?= base_url('auth') ?>" method="POST">
                        <div class="inputBx">
                            <input type="text" required="required" name="username">
                            <span>Login</span>
                            <i class="fas fa-user-circle"></i>
                            <small class="text-danger"><?= form_error('username') ?></small>
                        </div>
                        <div class="inputBx password">
                            <input id="password-input" type="password" name="password" required="required">
                            <span>Password</span>
                            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                            <i class="fas fa-key"></i>
                            <small class="text-danger"><?= form_error('password') ?></small>
                        </div>
                        <div class="text-center mb-3">
                            <?= $widget; ?>
                            <?= $script; ?>
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function show_hide_password(target) {
            var input = document.getElementById('password-input');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
    </script>

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>