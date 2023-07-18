<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div class="container">
   <br>
   <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
      <li><a style="text-decoration: none; color:white;" href="#">Setting Jadwal</a></li>

   </ol>

   <div class="content">
      <button type="button" class="float-right btn btn-success mt-3 mb-2 btn-sm" onclick="add_alter_jadwal_tender()">
         <i class="fa fa fa-plus"></i> Tambah Jadwal
      </button>
      <!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
      <table class="table table-striped table-bordered">
         <tr>
            <?php
            $i = 1;
            $i++;
            ?>
            <th>Tahap Jadwal</th>
            <th><input type="text" class="form-control form-control-sm" value="<?= $get_row_jadwal['nama_jadwal_tender'] ?>"></th>
         </tr>
      </table>
      <br>
   </div>
</div>