<style>
   #bungkusbeliau {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
   }

   #bungkusbeliau #dikirim_kepanitia {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      font: 14px arial;
   }
</style>
<div id="bungkusbeliau" style="display: none;">
   <div id="dikirim_kepanitia">
      <img src="<?= base_url('assets/img/Selamat.gif') ?>" width="100%">
   </div>
</div>
<?php $total = 0;
foreach ($total_rincian_hps as $key => $value) { ?>
   <?php
   $total +=  ($value['vol_rincian_hps'] * $value['harga_rincian_hps']) * $value['persen_rincian_hps'] / 100;
   ?>
<?php } ?>
<?php if ($total > $total_hps['hps']) { ?>
   <?php redirect(base_url('paket/rincian_hps/' . $angga['id_paket'])) ?>
<?php } else { ?>
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
   <div class="preloader">
      <div class="loading">
         <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
      </div>
   </div>
   <div class="container">
      <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paketkusaja">
      <br>
      <ol class="breadcrumb btn-grad100">
         <li><a style="text-decoration: none; color:white;" href="#">Pelakasanaan Paket Transaksi Langsung</a></li>
      </ol>
      <br>
      <form action="" id="form_data_tender">
         <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
         <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
         <div class="content">
            <div class="content tab-content">
               <div style="overflow-x:auto;">
                  <table class="table table-bordered">
                     <tr>
                        <th class="bgwarning">Rencana Umum Pengadaan</th>
                        <td>
                           <table class="table table-hover">
                              <tr class="btn-grad100">
                                 <th>Kode Rup</th>
                                 <th>Nama Paket</th>
                                 <th>Jenis Pengadaan</th>
                                 <th>Jenis Anggaran</th>
                              </tr>
                              <tr>
                                 <td><?= $angga['kode_jenis_anggaran'] ?><?= $angga['kode_jenis_pengadaan'] ?><?= $angga['kode_metode_pemilihan'] ?><?= $angga['kode_unit_kerja'] ?><?= $angga['kode_produk_dl_negri'] ?></td>
                                 <td><?= $angga['nama_paket'] ?></td>

                                 <td><?= $angga['nama_jenis_pengadaan'] ?></td>
                                 <td width="150px"><?= $angga['nama_tahun_anggaran'] ?>-<?= $angga['nama_jenis_anggaran'] ?>-BUMN</td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Nama Pelaksana / Agency Pelaksana</th>
                        <td><?= $angga['nama_pelaksana'] ?></td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Divisi Pelaksana</th>
                        <td><?= $angga['nama_unit_kerja'] ?></td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Anggaran / Sumber Dana</th>
                        <td class="">
                           <input type="hidden" id="show_id_paket_sumber_dana" value="<?= $angga['id_paket'] ?>">
                           <table id=sumberdana_tbl class="table table-hover">
                              <thead>
                                 <tr class="btn-grad100">
                                    <th width="50">No</th>
                                    <th width="100">Asal Dana</th>
                                    <th width="100">Nilai</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Nilai HPS <span class="warning">*</span></th>
                        <td>
                           <form action="#" id="formDataRincianHps">
                              <?php if ($total_rincian_hps_pdf == null) { ?>
                                 <?php $total = 0;
                                 foreach ($total_rincian_hps as $key => $value) { ?>
                                    <?php
                                    $total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
                                    ?>
                                 <?php } ?>
                                 <?= "Rp " . number_format($total, 2, ',', '.') ?>
                              <?php  } else { ?>
                                 <?= "Rp " . number_format($total_hps_pdf_ada['total_rincian_hps_pdf'], 2, ',', '.')  ?>
                              <?php } ?>
                              <input type="hidden" value="<?= $angga['id_paket'] ?>" id="rincian_hps">
                              <!--sangat Krusial Bansat  -->
                              <a href="#" id="btnSave" onclick="BuatRincianHps()" class="btn btn-grad100 btn-sm"> <i class="fas fa fa-eye"></i> Lihat Rincian Hps</a>
                           </form>
                        </td>
                     </tr>

                     <tr>
                        <th class="bgwarning">Nilai Pagu Paket</th>
                        <td><?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?> </td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Lokasi Pekerjaan</th>
                        <td>
                           <input type="hidden" id="show_id_paket_lokasi_pekerjaan" value="<?= $angga['id_paket'] ?>">
                           <table id=lokasi_kerja class="table table-hover">
                              <thead>
                                 <tr class="btn-grad100">
                                    <th width="50">No</th>
                                    <th width="100">Provinsi</th>
                                    <th width="100">Kabupaten</th>
                                    <th width="100">Detail Lokasi</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <th class="bgwarning">Nama Paket <span class="warning">*</span></th>
                        <td class="">
                           <?php if ($this->session->userdata('id_role') == 6) { ?>
                              <input name="nama_tender" readonly class="form-control form-control-sm " value="<?= $angga['nama_paket'] ?>" />
                              <div class="invalid-feedback"></div>
                           <?php   } else { ?>
                              <input name="nama_tender" class="form-control form-control-sm " value="<?= $angga['nama_paket'] ?>" />
                              <div class="invalid-feedback"></div>
                           <?php } ?>
                        </td>
                     </tr>
                     <!-- <tr>
                        <th class="bgwarning">Pilih Kategori Penyedia</th>
                        <td class="col-md-8">
                           <?php if ($angga['id_panitia'] != null) { ?>
                              <form action="#" id="formDataPilihPanitia">
                                 <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
                                 <a href="#" onclick="PilihPanitia()" class="btn btn-success btn-sm"> <?= $angga['nama_panitia'] ?> <i class="fas fa fa-edit"></i> Ubah Panitia</a>
                              </form>
                           <?php } else { ?>
                              <form action="#" id="formDataPilihPanitia">
                                 <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
                                 <a href="#" onclick="PilihPanitia()" class="btn btn-primary btn-sm"><i class="fas fa fa-edit"></i>Pilih Panitia</a>
                              </form>
                           <?php } ?>
                        </td>
                     </tr> -->
                     <?php if ($angga['id_metode_pemilihan'] == 8 || $angga['id_metode_pemilihan'] == 9 || $angga['id_metode_pemilihan'] == 10) { ?>
                        <tr>
                           <th class="bgwarning"> Kategori Penyedia</th>
                           <td class="col-md-8">
                              <input type="text" readonly class="form-control form-control-sm" value="<?= $angga['kategori_penyedia'] ?>">
                           </td>
                        </tr>
                        <tr>
                           <th class="bgwarning">Penyedia<span class="warning">*</span></th>
                           <td colspan="3">
                              <div style="max-width: 250px;">
                                 <?php if ($this->session->userdata('id_role') == 6) { ?>
                                    <a href="javascript:;" onclick="pilih_penyedia()" class="btn btn-grad100 btn-sm"> <i class="fas fa fa-users"></i> Lihat Penyedia</a>
                                 <?php  } else { ?>
                                    <a href="javascript:;" onclick="pilih_penyedia()" class="btn btn-grad100 btn-sm"> <i class="fas fa fa-users"></i> Pilih Penyedia</a>
                                 <?php } ?>
                              </div>
                           </td>
                        </tr>
                     <?php   } ?>

                     <?php if ($angga['id_metode_pemilihan'] == 8 || $angga['id_metode_pemilihan'] == 9 || $angga['id_metode_pemilihan'] == 10) { ?>
                        <tr>
                           <th class="bgwarning">Upload Dokumen Pengadaan<span class="warning">*</span></th>
                           <td colspan="3">
                              <div class="card">
                                 <div class="card-header btn-grad100">Upload Dokumen Pengadaan</div>
                                 <div class="card-body">
                                    <?php if ($this->session->userdata('id_role') == 6) { ?>

                                    <?php } else { ?>
                                       <center>
                                          <form id="form_dokumen_pengadaan_transaksi_langsung" enctype="multipart/form-data">
                                             <div class="input-group col-md-6">
                                                <div class="input-group-append">
                                                   <button class="input-group-text attach_btn btn-grad100" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                                   <input type="file" style="display:none;" id="file" class="file_dokumen_pengadaan_transaksi_langsung" name="file_dokumen_pengadaan_transaksi_langsung" />
                                                </div>
                                                <input type="text" name="nama_file_dokumen_pengadaan" class="form-control form-control-sm" placeholder="Nama File....">
                                                <div class="input-group-append">
                                                   <button type="submit" id="upload" name="upload" class="input-group-text  btn-grad100"><i class="fas fa-upload"></i></button>
                                                </div>
                                             </div>
                                          </form>
                                          <br>
                                          <div style="display: none;" id="error_file" class="alert alert-danger" role="alert">
                                             ANDA BELUM MENGISI FILE !!!
                                          </div>
                                       </center>
                                    <?php } ?>
                                    <br>
                                    <center>
                                       <div class="form-group col-md-6" id="process" style="display:none;">
                                          <small for="" style="display:none;" id="sedang_dikirim">Sedang Mengupload....</small>
                                          <div class="progress">
                                             <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                                             </div>
                                          </div>
                                       </div>
                                    </center>
                                    <table class="table table-hover" id="table_dokumen_pengadaan_transaksi_langsung">
                                       <thead>
                                          <tr class="btn-grad100">
                                             <th>No</th>
                                             <th>Nama Dokumen</th>
                                             <th>File</th>
                                             <?php if ($this->session->userdata('id_role') == 6) { ?>
                                             <?php } else { ?>
                                                <th>Action</th>
                                             <?php } ?>
                                          </tr>
                                       </thead>
                                       <tbody>

                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     <?php   } ?>
                     <?php if ($angga['id_metode_pemilihan'] == 8 || $angga['id_metode_pemilihan'] == 9 || $angga['id_metode_pemilihan'] == 10) { ?>
                        <tr>
                           <?php if ($this->session->userdata('id_role') == 6) { ?>
                              <th class="bgwarning">Lihat Jadwal<span class="warning">*</span></th>
                              <td colspan="3">
                                 <div style="max-width: 250px;">
                                    <a href="javascript:;" onclick="buat_jadwal_transaksi_langsung()" class="btn btn-grad100 btn-sm"><i class="far fa-calendar-alt"></i> Lihat Jadwal</a>
                                 </div>
                              </td>
                           <?php  } else { ?>
                              <th class="bgwarning">Buat Jadwal<span class="warning">*</span></th>
                              <td colspan="3">
                                 <div style="max-width: 250px;">
                                    <a href="javascript:;" onclick="buat_jadwal_transaksi_langsung()" class="btn btn-grad100 btn-sm"><i class="far fa-calendar-alt"></i> Buat Jadwal</a>
                                 </div>
                              </td>
                           <?php  } ?>
                        </tr>
                     <?php   } ?>
                  </table>
                  <!-- <table class="table table-sm table-bordered">
                     <tr>
                        <th width="30%">No. Surat Rencana Pelaksanaan Pengadaan</th>
                        <td><input type="text" required name="no_surat_rencana_pengadaan" class="form-control form-control-sm" value="<?= $angga['no_surat_rencana_pengadaan'] ?>" placeholder="Nomor Surat Rencana Pelaksanaan Pengadaan" /></td>
                     </tr>
                  </table> -->
               </div>
               <div class="bs-callout btn-grad6">
                  <span>Attention : </span> Setelah manager selesai melakukan crosscheck manager bisa langsung mensetujui paket ini
               </div>
               <div class="form-group row">
                  <div class="col-md-6">
                     <a href="<?= base_url('paket/daftar_paket') ?>" class="btn btn-grad7 btn-sm btn-block"> <i class="fas fa-arrow-left"></i> Kembali</a>
                  </div>
                  <?php if ($angga['status_persetujuan_manager'] == 4 || $angga['status_persetujuan_manager'] == 3) { ?>
                     <div class="col-md-6">
                        <a href="javascript:;" data-toggle="modal" data-target="#exampleModal" class="btn btn-grad100 btn-sm btn-block"><i class="far fa-paper-check"></i> Paket Berhasil Disetujui</a>
                     </div>
                  <?php  } else { ?>
                     <div class="col-md-6">
                        <a href="javascript:;" data-toggle="modal" data-target="#exampleModal" class="btn btn-grad100 btn-sm btn-block"><i class="far fa-paper-plane"></i> Batal Setujui / Revisi Paket & Setujui Paket</a>
                     </div>
                  <?php   } ?>
               </div>
      </form>
   </div>
   </div>
   </div>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="modalDataTambahDokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Tambah Dokumen Pemilihan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="form_dokumen_rencana" enctype="multipart/form-data">
               <input type="hidden" id="id_paket_dokumenadd" name="id_paket" value="<?= $angga['id_paket'] ?>">
               <div class="form-group">
                  <input type="text" name="nama_file_dokumen_rencana" value="" class="form-control" placeholder="Jenis File">
               </div>
               <div class="form-group">
                  <input type="file" name="file_dokumen_persiapan" value="" id="file_dokumen_persiapan" class="form-control">
               </div>
               <div class="form-group">
                  <button class="btn btn-success" id="upload" name="upload" type="submit">Upload</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- modal_pilih_penyedia -->

<!-- Modal -->

<div class="modal fade bd-example" id="modal_pilih_penyedia" tabindex="-1" role="dialog" aria-labelledby="modal_pilih_penyediaLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header btn-grad100">
            <h5 class="modal-title" id="modal_pilih_penyediaLabel">Pilih Penyedia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <ul class="nav nav-tabs mb-3" style="border: none;" id="myTab" role="tablist">
               <li class="nav-item mr-2">
                  <a class="nav-link bg-primary text-white revisi" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pilih Penyedia</a>
               </li>
               <li class="nav-item  mr-2" style="display: none;">
                  <a class="nav-link bg-primary text-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penyedia Terpilih</a>
               </li>
               <li class="nav-item  mr-2">
                  <a class="nav-link bg-primary text-white" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Penyedia Baru</a>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane active fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card">
                     <div class="card-header bg-primary text-white">
                        Pilih Penyedia
                     </div>
                     <div class="card-body">
                        <div style="overflow: auto;">
                           <table class="table table-hover" id="table_pilih_penyedia">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Pilih / Tunjuk</th>
                                    <th>Nama Penyedia</th>
                                    <th>Email Penyedia</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telpon Perusahaan</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card">
                     <div class="card-header bg-primary text-white">
                        Penyedia Terpilih
                     </div>
                     <div class="card-body">
                        <div style="overflow: auto;">
                           <table class="table table-hover" id="table_pilih_penyedia">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Pilih / Tunjuk</th>
                                    <th>Nama Penyedia</th>
                                    <th>Email Penyedia</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telpon Perusahaan</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="card">
                     <div class="card-header btn-grad100">
                        Daftarkan Penyedia Baru
                     </div>
                     <div class="card-body">
                        <form action="" id="tambah_penyedia">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username_vendor" class="form-control form-control-sm">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password_vendor" class="form-control form-control-sm">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Email Penyedia</label>
                                    <input type="text" name="email_vendor" class="form-control form-control-sm">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="">No. KTP</label>
                                    <input type="text" name="no_ktp_vendor" class="form-control form-control-sm">
                                 </div>
                                 <div class="form-group">
                                    <label for="">No Telpon Perusahaan</label>
                                    <input type="text" name="telpon_vendor" class="form-control form-control-sm">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Alamat Penyedia</label>
                                    <textarea name="alamat_vendor" class="form-control form-control-sm"></textarea>
                                 </div>
                              </div>
                           </div>
                           <button class="btn btn-primary">Tambah Penyedia</button>
                        </form>
                     </div>
                  </div>
                  <br><br>
                  <div class="card">
                     <div class="card-header btn-grad100">
                        Penyedia Baru Terdaftar
                     </div>
                     <div class="card-body">
                        <div style="overflow: auto;">
                           <table class="table table-hover" id="table_pilih_penyedia">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Pilih Penyedia</th>
                                    <th>Nama Penyedia</th>
                                    <th>Email Penyedia</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telpon Perusahaan</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="card">
                     <div class="card-header bg-primary text-white">
                        Pilih Penyedia Baru
                     </div>
                     <div class="card-body">
                        <div style="overflow: auto;">
                           <table class="table table-hover" id="table_pilih_penyedia">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Pilih / Tunjuk</th>
                                    <th>Nama Penyedia</th>
                                    <th>Email Penyedia</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telpon Perusahaan</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
            <form id="form_tunjuk_penyedia">
               <input type="hidden" name="paket_vendor" id="paket_vendor" value="<?= $angga['id_paket'] ?>">
               <input type="hidden" name="id_vendor" id="id_vendor">
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Modal Permintaan Persetujuan -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header btn-grad100">
            <h5 class="modal-title" id="exampleModalLabel">Detail Paket Permintaan Persetujuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="card">
               <div class="card-header btn-grad6">
                  Summay Permintaan Persetujuan
               </div>
               <div class="card-body">
                  <div class="card">
                     <div class="card-header btn-grad6">
                        Detail Paket
                     </div>
                     <div class="card-body">
                        <div style="overflow-x: auto;">
                           <table class="table table-hover">
                              <tr>
                                 <th>Nama Paket</th>
                                 <th><?= $angga['nama_paket'] ?></th>
                              </tr>
                              <tr>
                                 <th>Metode Pemilihan</th>
                                 <th><?= $angga['nama_metode_pemilihan'] ?></th>
                              </tr>
                              <tr>
                                 <th>Jenis Pengadaan</th>
                                 <th><?= $angga['nama_jenis_pengadaan'] ?></th>
                              </tr>
                              <tr>
                                 <th>Nama Pelaksanan</th>
                                 <th><?= $this->session->userdata('nama_pegawai') ?></th>
                              </tr>
                              <tr>
                                 <th>Divisi Pelakasana</th>
                                 <th><?= $angga['nama_unit_kerja'] ?></th>
                              </tr>
                              <tr>
                                 <th>Nilai HPS</th>
                                 <th> <?php if ($total_rincian_hps_pdf == null) { ?>
                                       <?php $total = 0;
                                          foreach ($total_rincian_hps as $key => $value) { ?>
                                          <?php
                                             $total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
                                          ?>
                                       <?php } ?>
                                       <?= "Rp " . number_format($total, 2, ',', '.') ?>
                                    <?php  } else { ?>
                                       <?= "Rp " . number_format($total_hps_pdf_ada['total_rincian_hps_pdf'], 2, ',', '.')  ?>
                                    <?php } ?></th>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="card">
                     <div class="card-header btn-grad6">
                        Detail Penyedia
                     </div>
                     <div class="card-body">
                        <table class=" table table-hover">
                           <thead>
                              <tr class="btn-grad6">
                                 <th>No</th>
                                 <th>Nama Penyedia</th>
                                 <th>Email Penyedia</th>
                                 <th>Alamat Perusahaan</th>
                                 <th>No Telpon Perusahaan</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $no = 1;
                              foreach ($vendor_terpilih as  $value2) { ?>
                                 <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value2['username_vendor'] ?></td>
                                    <?php if ($value2['jenis_pemilihan'] == 'vendor baru') { ?>
                                       <td><?= $value2['email_vendor'] ?></td>
                                    <?php  } else { ?>
                                       <td><?= $value2['email_usaha'] ?></td>
                                    <?php  } ?>
                                    <?php if ($value2['jenis_pemilihan'] == 'vendor baru') { ?>
                                       <td><?= $value2['alamat_vendor'] ?></td>
                                    <?php  } else { ?>
                                       <td><?= $value2['alamat_usaha'] ?></td>
                                    <?php  } ?>
                                    <?php if ($value2['jenis_pemilihan'] == 'vendor baru') { ?>
                                       <td><?= $value2['telpon_vendor'] ?></td>
                                    <?php  } else { ?>
                                       <td><?= $value2['telpon_usaha'] ?></td>
                                    <?php  } ?>
                                 </tr>
                              <?php  } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header btn-grad6">
                        Detail Jadwal Transaksi Langsung
                     </div>
                     <div class="card-body">
                        <table class=" table table-hover">
                           <thead>
                              <tr class="btn-grad6">
                                 <th>No</th>
                                 <th>Nama Jadwal</th>
                                 <th>Tanggal & Jam Mulai</th>
                                 <th>Tangga & Jam Selesai</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $no = 1;
                              foreach ($result_data_jadwal_detail as  $value2) { ?>
                                 <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value2['nama_jadwal_transaksi_langsung_detail'] ?></td>
                                    <td><input class="form-control form-control-sm" readonly type="text" value="<?= $value2['tanggal_mulai'] ?>"></td>
                                    <td><input class="form-control form-control-sm" readonly type="text" value="<?= $value2['tanggal_selesai'] ?>"></td>
                                 </tr>
                              <?php  } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php if ($angga['status_persetujuan_manager'] == 4 || $angga['status_persetujuan_manager'] == 3) { ?>
         <?php  } else { ?>
            <div class="row pl-3 pr-3 pb-5">
               <div class="col-md-6">
                  <button type="button" class="btn btn-grad2 btn-block" onclick="revisi_paket_transaksi_langsung()"><i class="fas fa-file-signature"></i> Revisi / Batalkan Paket</button>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-grad3 btn-block" onclick="SetujuiPaketTransaksiLangsung()"><i class="far fa-paper-plane"></i> Setujui Paket</button>
               </div>
            </div>
         <?php   } ?>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_revisi_paket" tabindex="-1" role="dialog" aria-labelledby="modal_revisi_paketLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btn-grad6">
            <h5 class="modal-title" id="modal_revisi_paketLabel">Revisi Paket / Batalkan Paket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" id="form_kirim_alasan_revisi_paket">
               <textarea name="alasan_revisi_paket_atau_batalkan_paket" class="form-control"></textarea>
            </form>
         </div>
         <div class="row pl-3 pr-3 pb-5">
            <div class="col-md-6">
               <button type="button" class="btn btn-grad2 btn-block" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="col-md-6">
               <button type="button" class="btn btn-grad3 btn-block" onclick="kirim_alasan_revisi_paket()"><i class="far fa-paper-plane"></i> Kirim Alasan</button>
            </div>
         </div>
      </div>
   </div>
</div>