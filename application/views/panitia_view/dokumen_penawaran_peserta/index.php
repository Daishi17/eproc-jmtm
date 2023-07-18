<body style="font-size: 13px;">
   <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
      <div id="header" class="container-fluid">
         <div id="headerContent">
            <img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="250px" />
            <img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="250px" />
            <div id="systemMessage"></div>

         </div>

         <h3 class="text-right"> <img src="<?= base_url('assets/img/JASAKU_VENDOR.png') ?>" width="70px" alt=""> <?= $vendor_user['username_vendor'] ?></h3>
      </div>
   </nav>
   <div style="background-color:yellow;height:5px">
   </div>
   <div style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;height:5px">
   </div>
   <div class="preloader">
      <div class="loading">
         <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
      </div>
   </div>
   <div class="container mb-1 mt-1">
      <br><br>
      <center>
         <h3>DATA KUALIFIKASI</h3>
      </center>
      <br><br><br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>IDENTITAS PERUSAHAAN</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <?php foreach ($identitas_perusahaan as $key => $value) { ?>
                     <tr>
                        <th width="400px">Nama Perusahaan</th>
                        <td><?= $value['nama_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <td><?= $value['email_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Alamat</th>
                        <td><?= $value['alamat_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Kode Pos</th>
                        <td><?= $value['kode_pos_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Telepon</th>
                        <td><?= $value['telpon_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Jumlah Kantor Cabang</th>
                        <td><?= $value['kantor_cabang_usaha'] ?></td>
                     </tr>
                     <tr>
                        <th>Bentuk Usaha</th>
                        <td><?= $value['bentuk_usaha'] ?></td>
                     </tr>
                  <?php   } ?>
               </table>
            </div>
         </div>
      </div>
      <br><br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>AKTA PENDIRIAN</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <?php foreach ($akta_pendirian as $key => $value) { ?>
                     <tr>
                        <th width="400px">No. Akta</th>
                        <td><?= $value['no_akta_pendirian'] ?></td>
                     </tr>
                     <tr>
                        <th>Tanggal Surat</th>
                        <td><?= $value['tanggal_surat_akta_pendirian'] ?></td>
                     </tr>
                     <tr>
                        <th>Notaris</th>
                        <td><?= $value['notaris_akta_pendirian'] ?></td>
                     </tr>
                     <tr>
                        <th>Bukti Pendirian</th>
                        <td> <a href="https://vms.jmtm.co.id/file_dokumen_akta_pendirian/<?= $value['file_dokumen_akta_pendirian'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                     </tr>
                  <?php   } ?>
               </table>
            </div>
         </div>
      </div>
      <br><br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>IZIN USAHA</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Ijin Usaha</th>
                        <th>No Ijin Usaha</th>
                        <th>Masa Berlaku</th>
                        <th>Instansi Pemberi</th>
                        <th>Kualifikasi Usaha</th>
                        <th>Dokumen Izin Usaha</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_izin_usaha as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_izin_usaha'] ?></td>
                           <td><?= $value['no_izin_usaha'] ?></td>
                           <td><?= $value['masa_berlaku_izin_usaha'] ?></td>
                           <td><?= $value['intansi_pemberi'] ?></td>
                           <td><?= $value['kualifikasi_izin_usaha'] ?></td>
                           <td> <a href="https://vms.jmtm.co.id/file_dokumen_izin_usaha/<?= $value['dokumen_izin_usaha'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>DUKUNGAN BANK</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Bank</th>
                        <th>No. Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Nilai (Rp)</th>
                        <th>Bukti Dukungan Bank</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_dukungan_bank as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_dukungan_bank'] ?></td>
                           <td><?= $value['nomor_surat_dukungan_bank'] ?></td>
                           <td><?= $value['tangal_dukungan_surat'] ?></td>
                           <td><?= "Rp " . number_format($value['nilai_dukungan_surat'], 2, ',', '.'); ?></td>
                           <td> <a href="https://vms.jmtm.co.id/file_bukti_dukungan_bank/<?= $value['file_bukti_dukungan_bank'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>TENAGA AHLI</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Tenaga Ahli</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Email</th>
                        <th>Profesi</th>
                        <th>Jabatan</th>
                        <th>Kewarganegaraan</th>
                        <th>Pengalaman</th>
                        <th>Status</th>
                        <th>Alamat</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_tenaga_ahli as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><a href="javascript:;" onclick="detail_tenaga_ahli('<?= $value['id_tenaga_ahli'] ?>')"><?= $value['nama_tenaga_ahli'] ?></a> </td>
                           <td><?= $value['tanggal_lahir_tenaga_ahli'] ?></td>
                           <td><?= $value['jenis_kelamin_tenaga_ahli'] ?></td>
                           <td><?= $value['pendidikan_trakhir_tenaga_ahli'] ?></td>
                           <td><?= $value['email_tenaga_ahli'] ?></td>
                           <td><?= $value['profesi_tenaga_ahli'] ?></td>
                           <td><?= $value['jabatan_tenaga_ahli'] ?></td>
                           <td><?= $value['kewarganegaraan_tenaga_ahli'] ?></td>
                           <td><?= $value['pengalaman_tenaga_ahli'] ?></td>
                           <td><?= $value['status_kepegawaian_tenaga_ahli'] ?></td>
                           <td><?= $value['alamat_tenaga_ahli'] ?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br><br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PAJAK</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Pajak</th>
                        <th>Tanggal Pajak</th>
                        <th>Jenis Kelamin</th>
                        <th>File Bukti Pajak</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_pajak as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_pajak_vendor'] ?></td>
                           <td><?= $value['tanggal_pajak_vendor'] ?></td>
                           <td> <a href="https://vms.jmtm.co.id/file_bukti_pajak_vendor/<?= $value['file_bukti_pajak_vendor'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PEMILIK</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Pemilik</th>
                        <th>No. KTP</th>
                        <th>Alamat</th>
                        <th>Saham</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_pemilik as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_pemilik'] ?></td>
                           <td><?= $value['no_ktp_pemilik'] ?></td>
                           <td><?= $value['alamat_pemilik'] ?></td>
                           <td><?= $value['saham_pemilik'] ?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PENGURUS</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Pengurus</th>
                        <th>No. KTP</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Mulai Mengurus</th>
                        <th>Selesai Mengurus</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_pengurus as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_pengurus'] ?></td>
                           <td><?= $value['no_ktp_pengurus'] ?></td>
                           <td><?= $value['alamat_pengurus'] ?></td>
                           <td><?= $value['jabatan_pengurus'] ?></td>
                           <td><?= $value['mulai_pengurus'] ?></td>
                           <td><?= $value['selesai_pengurus'] ?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PERALATAN</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Peralatan</th>
                        <th>Jumlah</th>
                        <th>Kapasitas</th>
                        <th>Merk</th>
                        <th>Kondisi</th>
                        <th>Tahun</th>
                        <th>Lokasi</th>
                        <th>Bukti Kepemilikan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_peralatan as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_peralatan'] ?></td>
                           <td><?= $value['jumlah_peralatan'] ?></td>
                           <td><?= $value['kapasitas_peralatan'] ?></td>
                           <td><?= $value['merk_peralatan'] ?></td>
                           <td><?= $value['kondisi_peralatan'] ?></td>
                           <td><?= $value['tahun_pembuatan_peralatan'] ?></td>
                           <td><?= $value['lokasi_sekarang_peralatan'] ?></td>
                           <td> <a href="https://vms.jmtm.co.id/file_bukti_kepemilikan_peralatan/<?= $value['file_bukti_kepemilikan_peralatan'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PENGALAMAN</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Perngalaman</th>
                        <th>Lokasi</th>
                        <th>Instansi</th>
                        <th>Alamat</th>
                        <th>Mulai Kontrak</th>
                        <th>Selesai Kontrak</th>
                        <th>Bukti Pengalaman</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_pengalaman as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_pekerjaan_pengalaman'] ?></td>
                           <td><?= $value['lokasi_pengalaman'] ?></td>
                           <td><?= $value['instansi_pengalaman'] ?></td>
                           <td><?= $value['alamat_pengalaman'] ?></td>
                           <td><?= $value['tanggal_kontrak'] ?></td>
                           <td><?= $value['selesai_kontrak'] ?></td>
                           <td> <a href="https://vms.jmtm.co.id/bukti_pengalaman/<?= $value['bukti_pengalaman'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
      <div class="card">
         <div class="card-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
            <label for="" class="text-black">
               <h6>PERSYARATAN LAINYA</h6>
            </label>
         </div>
         <div class="card-body">
            <div style="overflow-x:auto;">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Nama Persyaratan</th>
                        <th>Dokumen Persyaratan Lainya</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($penawaran_kualifikasi_persyaratan_lainya as $key => $value) { ?>
                        <tr>
                           <td><?= $i++ ?></td>
                           <td><?= $value['nama_persyaratan_lainya'] ?></td>
                           <td> <a href="https://vms.jmtm.co.id/file_dokumen_persyaratan_lainya/<?= $value['file_dokumen_persyaratan_lainya'] ?>"> <img width="40px" src="<?= base_url('assets/img/pdf.png') ?>" alt=""></a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <br>
      <br>
   </div>

   <!-- Modal Detail Tenaga Ahli-->
   <div class="modal fade" id="modal_detail_tenaga_ahli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header" style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250))!important;">
               <h5 class="modal-title" id="modalTitle">Detail Tenaga Ahli</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="card">
                  <div class="card-header text-white bg-info">
                     Pengalaman
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <tr>
                           <th>Tahun</th>
                           <th>Pengalaman</th>
                        </tr>
                        <tbody id="detail_ahli">

                        </tbody>
                     </table>
                  </div>
               </div>
               <br>
               <br>
               <div class="card">
                  <div class="card-header text-white bg-info">
                     Pendidikan
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <tr>
                           <th>Tahun</th>
                           <th>Uraian</th>
                        </tr>
                        <tbody id="detail_ahli_pendidikan">

                        </tbody>
                     </table>
                  </div>
               </div>
               <br><br>
               <div class="card">
                  <div class="card-header text-white bg-info">
                     Sertifikat
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <tr>
                           <th>Tahun</th>
                           <th>Uraian</th>
                        </tr>
                        <tbody id="detail_ahli_sertifikat">

                        </tbody>
                     </table>
                  </div>
               </div>
               <br><br>
               <div class="card">
                  <div class="card-header text-white bg-info">
                     Bahasa
                  </div>
                  <div class="card-body">
                     <table class="table">
                        <tr>
                           <th>Uraian</th>
                        </tr>
                        <tbody id="detail_ahli_bahasa">

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>