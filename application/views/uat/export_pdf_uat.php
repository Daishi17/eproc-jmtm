<style>
    .btn-grad {
        background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%)
    }

    .btn-grad {
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px white;
    }

    .btn-grad:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        box-shadow: 0 0 20px yellow;
        text-decoration: none;
    }
</style>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header btn-grad">
            Laporan UAT
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="btn-grad">
                        <th>NO</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Nama Penguji</th>
                        <th>Divisi</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1;
                    foreach ($uat as $key => $value) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['deskripsi'] ?></td>
                            <?php if ($value['status_uat'] == 1) { ?>
                                <td><i class="fas fa-check text-success"></i> Berhasil</td>
                            <?php } else if ($value['status_uat'] == 2) { ?>
                                <td><i class="fas fa-times text-danger"></i> Gagal</td>
                            <?php  } else { ?>
                                <td></td>
                            <?php } ?>
                            <td><?= $value['nama_penguji'] ?></td>
                            <td><?= $value['divisi'] ?></td>
                            <td><?= $value['catatan'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    window.print();
</script>