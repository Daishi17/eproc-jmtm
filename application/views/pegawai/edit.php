<form id="form_saya">
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
        </div>
    </div>
    <div class="container">
        <br>
        <br>
        <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
            <li><a style="text-decoration: none; color:white;" href="#">Identitas Pegawai</a></li>
        </ol>
        <div class="content">
            <section class="card" id="cardhide">
                <div class="content tab-content">
                    <input type="hidden" name="id_pegawai" class="form-control" value="<?= $pegawai['id_pegawai'] ?>">
                    <table class="table table-bordered">
                        <tr>
                            <td class="bgwarning" width="350px">Nama Pegawai<span style="color: red;">*</span></td>
                            <td>
                                <input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai['nama_pegawai'] ?>">
                                <p class="nama_pegawai-error text-danger"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">NIP<span style="color: red;">*</span></td>
                            <td>
                                <input type="text" name="nip" class="form-control" value="<?= $pegawai['nip'] ?>">
                                <p class="nip-error text-danger"></p>
                            </td><samp></samp>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">Username<span style="color: red;">*</span></td>
                            <td>
                                <input type="text" name="username" class="form-control" value="<?= $pegawai['username'] ?>">
                                <p class="username-error text-danger"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">Password<span style="color: red;">*</span></td>
                            <td>
                                <a href="<?= base_url('pegawai/gantipassword/' . $pegawai['id_pegawai']) ?>" class="btn btn-sm btn-danger">Ganti Password</a>

                            </td>
                        </tr>

                        <tr>
                            <td class="bgwarning" width="350px">Alamat</td>
                            <td>
                                <textarea name="alamat" id="alamat" class="form-control"><?= $pegawai['alamat'] ?></textarea>
                                <p class="alamat-error text-danger"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">Telepon<span style="color: red;">*</span></td>
                            <td>
                                <input type="text" name="telepon" id="telponku" class="form-control" value="<?= $pegawai['telepon'] ?>">
                                <p class="telepon-error text-danger"></p><small class="text-danger"> <i> <b> Jangan Memasukan Angka (Nol / 0) ex: 08978201075 Pada Awal Nomor, Berpengaruh Pada Notifikasi Whatsaap & Email !!</b></i></small>
                                <br><small class="text-success"> <i> <b> Pengisiaan Yang Tepat : 8978201075 </b></i></small>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">Email<span style="color: red;">*</span></td>
                            <td>
                                <input type="email" name="email" class="form-control" value="<?= $pegawai['email'] ?>">
                                <p class="email-error text-danger"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning">Unit</td>
                            <td>
                                <select name="jabatan" class="form-control form-control-sm" id="jabatan">
                                    <option value="<?= $pegawai['jabatan'] ?>"><?= $pegawai['nama_unit_kerja'] ?></option>
                                    <?php foreach ($unit as $key => $value) { ?>
                                        <option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
                                    <?php } ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning">Status</td>
                            <td>
                                <?php if ($pegawai['status'] == NULL || $pegawai['status'] == 0) { ?>
                                    <label for="">Aktif</label>
                                    <input type="radio" name="status" id="status" value="1">
                                    <label for="" style="margin-left:30px">Tidak Aktif</label>
                                    <input type="radio" name="status" id="status" value="0" checked>
                                <?php } else { ?>
                                    <label for="">Aktif</label>
                                    <input type="radio" name="status" id="status" value="1" checked>
                                    <label for="" style="margin-left:30px">Tidak Aktif</label>
                                    <input type="radio" name="status" id="status" value="0">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>
                                <select name="id_role" id="id_role" class="form-control select2">
                                    <option value="<?= $pegawai['id_role'] ?>"><?= $pegawai['nama_role'] ?></option>
                                    <?php foreach ($role as $key => $value) { ?>
                                        <option value="<?= $value['id_role'] ?>"><?= $value['nama_role'] ?></option>
                                    <?php  } ?>
                                </select>
                                <p class="id_role-error text-danger"></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">No SK</td>
                            <td>
                                <input type="text" name="no_sk" class="form-control" value="<?= $pegawai['no_sk'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="bgwarning" width="350px">Masa Berlaku SK</td>
                            <td>
                                <input type="text" name="masa_berlaku_sk" value="<?= $pegawai['masa_berlaku_sk'] ?>" class="form-control tanggal_mulai_pascakualifikasi">
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= base_url('pegawai') ?>" class="btn btn-danger btn-block text-white">Batal</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>