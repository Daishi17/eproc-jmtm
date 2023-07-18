<script>
    window.print();
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report Progres></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" media="all">
    <!-- custom -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/kintek.css" type="text/css" media="all">
    <!-- Sweetalert-->
    <link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"> -->
    <link href="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.min.css" rel="stylesheet" media="all">
    <script src="<?= base_url('assets/'); ?>js/sweetalert.min.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/jquery.min.js"></script>
    <style>
        .btn-grad100 {
            background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
        }

        .btn-grad100 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad100:hover {
            background-position: right center;
            color: #fff;
            box-shadow: 0 0 30px #ee0979;
            text-decoration: none;
        }

        .btn-grad101 {
            background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
        }

        .btn-grad7 {
            background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
        }

        .btn-grad7 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad7:hover {
            background-position: right center;
            /* change tde direction of tde change here */
            color: #00d2ff;
            text-decoration: none;
            box-shadow: 0 0 40px #00d2ff;
        }


        .btn-grad101 {
            width: 30px;
            height: 30px;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 5px;
            display: block;
            border: none;
        }

        .btn-grad101:hover {
            background-position: right center;
            color: #fff;
            box-shadow: 0 0 30px #ee0979;
            text-decoration: none;
        }
    </style>
</head>

<body style="font-size: 13px;">
    <div class="container">
        <div class="container-fluid">
            <img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
            <img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
        </div>
        <BR><BR></BR></BR>
        <div class="text-center">
            <h3>TIME LINE PENGIRIMAN LAPORAN PENGERJAAN</h3>
        </div>
        <BR></BR>
        <table class="table">
            <?php foreach ($report_progres as $key => $value) { ?>
                <tr>
                    <th class="bg-success text-white"> <label for="">Tanggal Pengiriman Laporan : <?= $value['waktu_kirim_progres'] ?></label></th>
                    <th class="bg-success text-white"></th>
                </tr>
                <tr>
                    <th>Nama Pengerjaan</th>
                    <th><?= $value['judul_progres'] ?></th>
                </tr>
                <tr>
                    <th>Nama Vendor</th>
                    <th><?= $value['nama_vendor_progres'] ?></th>
                </tr>
                <tr>
                    <th>Waktu Kirim</th>
                    <th><?= $value['waktu_kirim_progres'] ?></th>
                </tr>
                <tr>
                    <th>Persen Progres(%)</th>
                    <th><?= $value['persen_progres'] ?>%</th>
                </tr>
                <tr>
                    <th>Komentar Progres Dari Agency</th>
                    <th><?= $value['alasan_progres'] ?></th>
                </tr>
            <?php  } ?>
        </table>
    </div>
    <!-- Jquery -->
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js"></script>

    <!-- datepicker -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>

</body>

</html>