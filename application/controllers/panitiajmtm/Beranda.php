<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
require 'vendor/autoload.php';
error_reporting(0);
class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
        $this->load->model('Panitia/Evaluasi_model', 'Evaluasi_model');
        $this->load->model('Panitia/Evaluasi_administrasi_model', 'Evaluasi_administrasi_model');
        $this->load->model('Panitia/Evaluasi_teknis_model', 'Evaluasi_teknis_model');
        $this->load->model('Rup/Rup_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Beranda/Chat_model');
        $this->load->model('Panitia/Penawaran_peserta_model', 'Penawaran_peserta_model');
        $role = $this->session->userdata('id_role');
        if (!$role) {
            redirect('auth');
        } else { }
    }

    public function index()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/index', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }
    public function get_panitia_beranda()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
            } else {
                $row[] = $panitia->kode_tender;
            }

            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;

            if ($panitia->status_pembatalan_atau_pengulangan == 1) {
                $row[] = '<label class="badge badge-warning"> Tender Mengalami Pengulangan </label>';
            } else if ($panitia->status_pembatalan_atau_pengulangan == 2) {
                $row[] = '<label class="badge badge-warning"> Tender Pembatalan </label>';
            } else {
                if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                    $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                } else {
                    if ($panitia->selesai_semua_tender == null) {
                        $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                    } else {
                        if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else {
                            $row[] = '<label class="badge badge-success"> Tender Telah Selesai </label>';
                        }
                    }
                }
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button disabled class="btn btn-primary btn-sm" disabled><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</button>';
            } else {
                $row[] = '<a href="javascipt:;" class="btn btn-sm btn-primary" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tahap_tender'" . ')"><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</a>';
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
            } else {
                if ($panitia->selesai_semua_tender == null) {
                    $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
                } else {
                    if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-eye"></i> Lihat Tender</a>';
                    }
                }
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data($role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    // INI UNTUK PENUNJUKAN LANSGUNG
    public function get_panitia_beranda_penunjukan_langsung()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable2($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
            } else {
                $row[] = $panitia->kode_tender;
            }
            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;

            if ($panitia->status_pembatalan_atau_pengulangan == 1) {
                $row[] = '<label class="badge badge-warning"> Tender Mengalami Pengulangan </label>';
            } else if ($panitia->status_pembatalan_atau_pengulangan == 2) {
                $row[] = '<label class="badge badge-warning"> Tender Pembatalan </label>';
            } else {
                if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                    $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                } else {
                    if ($panitia->selesai_semua_tender == null) {
                        $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                    } else {
                        if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else {
                            $row[] = '<label class="badge badge-success"> Tender Telah Selesai </label>';
                        }
                    }
                }
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button disabled class="btn btn-primary btn-sm" disabled><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</button>';
            } else {
                $row[] = '<a href="javascipt:;" class="btn btn-sm btn-primary" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tahap_tender'" . ')"><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</a>';
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
            } else {
                if ($panitia->selesai_semua_tender == null) {
                    $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
                } else {
                    if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-eye"></i> Lihat Tender</a>';
                    }
                }
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data($role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // LIHAT TAHAP DI DI BAGIAN TENDER

    public function lihat_tahap_tender_di_beranda($id_paket)
    {
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $result = $this->Rolepanitia_model->getdatatable_lihat_tahap_tender($id_paket, $id_kualifikasi);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            $row[] = $panitia->nama_jadwal_tender;
            $row[] = $panitia->tanggal_mulai_jadwal;
            $row[] = $panitia->tanggal_selesai_jadwal;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_lihat_tahap_tender(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_lihat_tahap_tender($id_paket, $id_kualifikasi),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // tender terbatas
    public function get_panitia_beranda_tender_terbatas()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable3($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
            } else {
                $row[] = $panitia->kode_tender;
            }
            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;

            if ($panitia->status_pembatalan_atau_pengulangan == 1) {
                $row[] = '<label class="badge badge-warning"> Tender Mengalami Pengulangan </label>';
            } else if ($panitia->status_pembatalan_atau_pengulangan == 2) {
                $row[] = '<label class="badge badge-warning"> Tender Pembatalan </label>';
            } else {
                if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                    $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                } else {
                    if ($panitia->selesai_semua_tender == null) {
                        $row[] = '<label class="badge badge-info"> Dalam Proses Pembuatan Paket </label>';
                    } else {
                        if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                            $row[] = '<label class="badge badge-danger"> Tender Sedang Berlangsung </label>';
                        } else {
                            $row[] = '<label class="badge badge-success"> Tender Telah Selesai </label>';
                        }
                    }
                }
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button disabled class="btn btn-primary btn-sm" disabled><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</button>';
            } else {
                $row[] = '<a href="javascipt:;" class="btn btn-sm btn-primary" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tahap_tender'" . ')"><img src="' . base_url('assets/img/icon-jadwal.png') . '" width="25px" alt=""> Detail Jadwal</a>';
            }
            if ($panitia->status_tahap_tender == 1 && $panitia->status_paket_tender == 1) {
                $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
            } else {
                if ($panitia->selesai_semua_tender == null) {
                    $row[] = '<button class="btn btn-success btn-sm" disabled><i class="fas fa-edit"></i> Lihat Tender</button>';
                } else {
                    if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-eye"></i> Lihat Tender</a>';
                    }
                }
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data3(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data3($role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_by_id($id_pegawai)
    {
        $get_pegawai = $this->Rolepanitia_model->getById($id_pegawai);
        $output = [
            "get_pegawai" => $get_pegawai
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // infirmasi tender
    public function informasitender($id_paket)
    {
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['get_tahap_id_11_7_17'] = $this->Rolepanitia_model->get_tahap_dokumen30($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_pemilihan'] = $this->Rolepanitia_model->get_tahap_dokumen_pemilihan($id_paket, $id_kualifikasi);
        $paket['get_tahap_syarat_tambahan'] = $this->Rolepanitia_model->get_tahap_dokumen_syarat_tambahan($id_paket, $id_kualifikasi);
        $paket['get_tahap_pembuktian_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_pembuktian_kualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_peringkat_teknis'] = $this->Rolepanitia_model->get_tahap_dokumen_peringkat_teknis($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // ini untuk pascakualifikasi
        $data['get_tahap_dokumen_penetapan_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_penetapan_kualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_keluar_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_tahap_keluar_dokumen_kualifikasi($id_paket, $id_kualifikasi);
        //berita
        $paket['pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);
        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);
        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);


        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $paket['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $paket['Evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->Evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);


        $paket['evaluasi_dokumen_prakualifiaksi_2_file'] = $this->Rolepanitia_model->evaluasi_dokumen_prakualifiaksi_2_file($id_paket, $id_kualifikasi);
        // END PRAKUALIFIKASI 2 FILE
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);

        $paket['cek_vendor_mengikuti_tender'] = $this->db->query("SELECT id_mengikuti_paket FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_paket_vendor = $id_paket")->row_array();

        $paket['vendor_mengikuti'] = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket")->result_array();
        // 6 juli 2022
        $paket['get_vendor'] = $this->Rolepanitia_model->get_username($id_paket);

        // INI UNTUK TAHAPAN EAUCTIUON
        $data['get_tahap_download_dokumen_pengadaan_eauction'] = $this->Rolepanitia_model->get_tahap_download_dokumen_pengadaan_eauction($id_paket, $id_kualifikasi);
        $data['upload_dokumen_eauction'] = $this->Rolepanitia_model->upload_dokumen_eauction($id_paket, $id_kualifikasi);
        $data['tahap_jadwal_binding'] = $this->Rolepanitia_model->tahap_jadwal_binding($id_paket, $id_kualifikasi);
        $data['tahap_evaluasi_eauction'] = $this->Rolepanitia_model->tahap_evaluasi_eauction($id_paket, $id_kualifikasi);
        $data['penjelasan_tender_eauction'] = $this->Rolepanitia_model->penjelasan_tender_eauction($id_paket, $id_kualifikasi);
        $data['tahap_penetapan_pemenang_eauction'] = $this->Rolepanitia_model->tahap_penetapan_pemenang_eauction($id_paket, $id_kualifikasi);
        $data['tahap_pengumuman_pemenang_eauction'] = $this->Rolepanitia_model->tahap_pengumuman_pemenang_eauction($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/informasitender', $paket);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax', $paket);
    }

    public function paktaintegritas_panitia($id_paket)
    {
        $paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);
        $paket['nama_paket'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        $paket['tgl_pakta'] = $this->db->query("SELECT * FROM tbl_status_persetujuan_tender WHERE id_paket = $id_paket")->row_array();
        $this->load->view('panitia_view/beranda/paktaintegritas_panitia', $paket);
    }

    public function paktaintegritas_vendor($id_paket)
    {
        $id_paket = $this->uri->segment(4);
        $id_vendor = $this->uri->segment(5);
        $paket['nama_paket'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        $paket['vendor'] =  $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor
		WHERE id_mengikuti_vendor = $id_vendor")->row_array();
        $this->load->view('panitia_view/beranda/paktaintegritas_vendor', $paket);
    }

    public function by_id_lihat_dokumen_tambahan($id_vendor)
    {
        $id_paket = $this->uri->segment(5);
        $row_dokumen_persyaratan_tambahan = $this->Rolepanitia_model->get_by_id_dokumen_persyaratan_vendor_row($id_vendor, $id_paket);
        $dokumen_persyaratan_tambahan = $this->Rolepanitia_model->get_by_id_dokumen_persyaratan_vendor($id_vendor, $id_paket);
        $output = [
            "dokumen_persyaratan_tambahan" => $dokumen_persyaratan_tambahan,
            "row_dokumen_persyaratan_tambahan" => $row_dokumen_persyaratan_tambahan,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_by_id_dokumen_persyaratan_vendor_baris($id_persyaratan_tambahan)
    {
        $ambil_id_detail_persyaratan_tambahan_vendor = $this->Rolepanitia_model->get_by_id_dokumen_persyaratan_vendor_row_ajah($id_persyaratan_tambahan);
        $output = [
            "ambil_id_detail_persyaratan_tambahan_vendor" => $ambil_id_detail_persyaratan_tambahan_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function flaging_tidak_lulus($id_paket)
    {
        $id = $this->input->post('id_persyaratan_tambahan_lulus');
        $data = [
            // 'alasan_tidak_lulus' => $alasan_tidak_lulus,
            'status_lengkap' => 'tidak lulus',
            'user_created' => $this->session->userdata('nama_pegawai'),

        ];
        $this->Rolepanitia_model->update_dokumen_persyaratan_tambahan(array('id_persyaratan_tambahan' => $id, 'id_paket' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function flaging_lulus($id_paket)
    {
        $id = $this->input->post('id_persyaratan_tambahan_lulus');
        $data = [
            // 'alasan_tidak_lulus' => $alasan_tidak_lulus,
            'status_lengkap' => 'lulus',
            'user_created' => $this->session->userdata('nama_pegawai'),

        ];
        $this->Rolepanitia_model->update_dokumen_persyaratan_tambahan(array('id_persyaratan_tambahan' => $id, 'id_paket' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    // Update Tahap tender Saat Ini
    public function update_tahap_tender($id_paket)
    {
        $status_tahap_tender = $this->input->post('status_tahap_tender');
        $data = [
            'id_paket' => $id_paket,
            'status_tahap_tender' => $status_tahap_tender,
        ];
        $this->Rolepanitia_model->update_tahap_tender(array('id_paket' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function detail_chat_pertanyaantender($id_chat_di_pilih)
    {
        $id_penerima = $id_chat_di_pilih;
        $id_pengirim = $this->session->userdata('id_pegawai');
        $data = [
            'id_penerima' => $id_penerima,
            'id_pengirim' => $id_pengirim
        ];
        $this->Chat_model->insert_data_chat_by_pemilih($data);
        redirect('panitiajmtm/beranda/pertanyaantender');
    }

    // BAGIAN PENAWARAN PESERTA
    public function penawaranpesertatender($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['vendor'] = $this->Rolepanitia_model->get_vendor($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/penawaranpesertatender', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_penawaran_peserta');
    }

    public function getdata_vendor_mengikuti_paket($id_paket)
    {
        $resultss = $this->Penawaran_peserta_model->getdatatable_vendor_mengikuti_paket($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->username_vendor;
            $row[] = $angga->tanggal_mendaftar;

            $row[] = '<a href="#" class="btn btn-sm btn-warning btn-block" onClick="byid(' . "'" . $angga->id_mengikuti_paket . "','dokumen_surat_penawaran_vendor'" . ')"><i class="fas fa-envelope-open-text"></i> Detail Surat Penawaran</a>';
            $row[] = '<a href="#" class="btn btn-sm btn-info btn-block" onClick="byid(' . "'" . $angga->id_mengikuti_paket . "','dokumen_administrasi_teknis_vendor'" . ')"><i class="fas fa-file-contract"></i> Detail Administrasi & Teknis</a>';
            $row[] = '<a href="#" class="btn btn-sm btn-info btn-block" onClick="byid(' . "'" . $angga->id_mengikuti_paket . "','dokumen_harga_penawaran_vendor'" . ')"><i class="fas fa-file-contract"></i> Detail Harga Penawaran</a>';
            $row[] = $angga->tanggal_mendaftar;
            $row[] = $angga->tanggal_mendaftar;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penawaran_peserta_model->count_all_data_vendor_mengikuti_paket(),
            "recordsFiltered" => $this->Penawaran_peserta_model->count_filtered_data_vendor_mengikuti_paket($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getbyid_penawaran_peserta($id_mengikuti_paket)
    {

        $dapetin_paket_dan_vendornya = $this->Penawaran_peserta_model->get_byid_paket_diikuti_vendor($id_mengikuti_paket);
        $output = [
            "dapetin_paket_dan_vendornya" => $dapetin_paket_dan_vendornya,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function add()
    {
        $this->form_validation->set_rules('nama_unit_kerja', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
        $this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'nama_unit_kerja' => form_error('nama_unit_kerja'),
                'kode_unit_kerja' => form_error('kode_unit_kerja'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'nama_unit_kerja' => htmlspecialchars($this->input->post('nama_unit_kerja')),
                'kode_unit_kerja' => htmlspecialchars($this->input->post('kode_unit_kerja')),
            ];
            $this->Penawaran_peserta_model->create($data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }


    public function update()
    {
        $this->form_validation->set_rules('nama_unit_kerja', 'Nama Unit Kerja', 'required|trim', ['required' => 'Nama Unit Kerja Wajib Diisi!']);
        $this->form_validation->set_rules('kode_unit_kerja', 'Kode Unit Kerja', 'required|trim', ['required' => 'Kode Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data = [
                'nama_unit_kerja' => form_error('nama_unit_kerja'),
                'kode_unit_kerja' => form_error('kode_unit_kerja'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = [
                'nama_unit_kerja' => htmlspecialchars($this->input->post('nama_unit_kerja')),
                'kode_unit_kerja' => htmlspecialchars($this->input->post('kode_unit_kerja')),
            ];
            $this->Penawaran_peserta_model->update(array('id_unit_kerja' => $this->input->post('id_unit_kerja')), $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }
    public function delete($id_unit_kerja)
    {
        $this->Penawaran_peserta_model->delete($id_unit_kerja);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    // END BAGIAN PENAWARAN PESERTA


    // INI BAGIAN EVALUASI TENDER
    public function evaluasitender($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['ketika_kosong_vendor_dievaluasi'] = $this->Rolepanitia_model->ketika_kosong_vendor_dievaluasi($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);

        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/evaluasi', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }


    public function getdata_evaluasi($id_paket)
    {
        $paket = $this->Rolepanitia_model->get_id_kualifikasi_nilai($id_paket);

        if ($paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 7 || $paket['id_kualifikasi'] == 6 || $paket['id_kualifikasi'] == 4 || $paket['id_kualifikasi'] == 10 || $paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 17 || $paket['id_kualifikasi'] == 23) {
            $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
            $get_vendor_by_id_dapet_id_result = $this->Rolepanitia_model->get_vendor_by_id_dapet_id_result($id_paket);
            $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
            $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender($id_mengikuti_paket_vendor);
            $data = [];
            $no = $_POST['start'];
            $total_vendor = 0;
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                if ($paket['id_kualifikasi'] == 23) {
                    $row[] = '<a href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','evaluasi_nilai'" . ')"> ' . $angga->username_vendor . '</a>';
                } else {
                    if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
                        $row[] = '<a href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','evaluasi_nilai'" . ')"> ' . $angga->username_vendor . '</a>';
                    } else {
                        $row[] = '<p> ' . $angga->username_vendor . '</p>';
                    }
                }



                $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                if ($angga->status_evaluasi_syarat_tambahan == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                }


                if ($angga->nilai_prakualifikasi == null) {
                    if ($angga->status_evaluasi_syarat_tambahan == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_prakualifikasi . '</a>';
                }

                if ($angga->nilai_prakualifikasi <= 60) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->nilai_teknis == null) {
                        if ($angga->status_evaluasi_syarat_tambahan == null) {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                            $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        }
                    } else if ($angga->nilai_teknis == 0) {
                        $row[] = '<a href="javascript:;" onClick="cek_dokumen_nilai(' . "'" . $angga->id_mengikuti_vendor . "','lihat_evaluasi_administrasi'" . ')" class="badge badge-sm badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" onClick="cek_dokumen_nilai(' . "'" . $angga->id_mengikuti_vendor . "','lihat_evaluasi_administrasi'" . ')" class="btn btn-sm btn-primary">' . $angga->nilai_teknis . '</a>';
                    }
                }


                if ($angga->nilai_teknis <= 60 && $angga->nilai_prakualifikasi <= 60) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->nilai_penawaran == null) {
                        if ($angga->status_evaluasi_syarat_tambahan == null) {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                            $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Tidak Ada Penawaran</a>';
                        }
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = "Rp " . number_format($angga->nilai_penawaran, 2, ',', '.');
                    }
                }


                if ($angga->nilai_teknis <= 60 && $angga->nilai_prakualifikasi <= 60 && $angga->nilai_penawaran == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->nilai_terkoreksi == null) {
                        if ($angga->status_evaluasi_syarat_tambahan == null) {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                            $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Tidak Ada Penawaran</a>';
                        }
                    } else {
                        if ($angga->nilai_terkoreksi) {
                            $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        }
                    }
                }



                if ($angga->nilai_teknis <= 60 && $angga->nilai_prakualifikasi <= 60 && $angga->nilai_penawaran == null && $angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->negosiasi == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Tidak Di Negosiasi</a>';
                    } else if ($angga->negosiasi == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Tidak Di Negosiasi</a>';
                    } else {
                        $row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
                    }
                }

                if ($angga->nilai_teknis <= 60 && $angga->nilai_prakualifikasi <= 60 && $angga->nilai_penawaran == null && $angga->nilai_terkoreksi == null && $angga->negosiasi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->nilai_pringkat_teknis == null) {
                        if ($angga->status_evaluasi_syarat_tambahan == null) {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                            $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        }
                    } else if ($angga->nilai_pringkat_teknis == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-sm badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_pringkat_teknis . '</a>';
                    }
                }


                if ($angga->nilai_teknis <= 60 && $angga->nilai_prakualifikasi <= 60 && $angga->nilai_penawaran == null && $angga->nilai_terkoreksi == null && $angga->negosiasi == null && $angga->nilai_pringkat_teknis == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    if ($angga->nilai_akhir == null) {
                        if ($angga->status_evaluasi_syarat_tambahan == null) {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                            $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                        } else {
                            $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                        }
                    } else {
                        $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_akhir . '</a>';
                    }
                }




                $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_prakualifiaksi'" . ')"><i class="far fa-eye"></i> Lihat</a>';

                $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_sangahan_akhir'" . ')"><i class="far fa-eye"></i> Lihat</a>';

                if ($angga->pemenang_tender == 1) {
                    $row[] = '<i class="fas fa-star text-warning"></i>';
                } else {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                }

                // $row[] = '<a href="" class="badge badge-warning">Verifikasi</a>';
                if ($angga->alasan_mengundurkan_diri == null) {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                } else {
                    $row[] = '<a href="https://vms.jmtm.co.id/file_mengundurkan_diri/' . $angga->file_mengundurkan_diri . '"><img width="20px" src="' . base_url('assets/img/pdfku.png') . '" alt=""></a>';
                }

                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender($id_paket),
                "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender($id_paket),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else if ($paket['id_kualifikasi'] == 8) {
            $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
            $get_vendor_by_id_dapet_id_result = $this->Rolepanitia_model->get_vendor_by_id_dapet_id_result($id_paket);
            $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
            $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender($id_mengikuti_paket_vendor);
            $data = [];
            $no = $_POST['start'];
            $total_vendor = 0;
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
                    $row[] = '<a href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','evaluasi_nilai'" . ')"> ' . $angga->username_vendor . '</a>';
                } else {
                    $row[] = '<p> ' . $angga->username_vendor . '</p>';
                }
                if ($angga->nilai_penawaran == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_penawaran, 2, ',', '.');
                }
                if ($angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                }
                if ($angga->negosiasi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
                }
                $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                if ($angga->nilai_teknis == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning"> Belum Di Evaluasi </a>';
                } else {
                    $row[] = '<a href="javascript:;" onClick="cek_dokumen_nilai(' . "'" . $angga->id_mengikuti_vendor . "','lihat_evaluasi_administrasi'" . ')" class="btn btn-sm btn-primary">' . $angga->nilai_teknis . '</a>';
                }

                if ($angga->nilai_prakualifikasi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_prakualifikasi . '</a>';
                }
                if ($angga->nilai_pringkat_teknis == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_pringkat_teknis . '</a>';
                }
                if ($angga->nilai_akhir == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_akhir . '</a>';
                }
                if ($angga->pemenang_tender == 1) {
                    $row[] = '<i class="fas fa-star text-warning"></i>';
                } else {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                }
                // $row[] = '<a href="" class="badge badge-warning">Verifikasi</a>';
                if ($angga->alasan_mengundurkan_diri == null) {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                } else {
                    $row[] = '<a href="https://vms.jmtm.co.id/file_mengundurkan_diri/' . $angga->file_mengundurkan_diri . '"><img width="20px" src="' . base_url('assets/img/pdfku.png') . '" alt=""></a>';
                }

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender($id_paket),
                "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender($id_paket),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 18  || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 20) {
            $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
            $get_vendor_by_id_dapet_id_result = $this->Rolepanitia_model->get_vendor_by_id_dapet_id_result($id_paket);
            $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];

            $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender($id_mengikuti_paket_vendor);
            $data = [];
            $no = $_POST['start'];
            $total_vendor = 0;
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;

                if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
                    $row[] = '<a href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','evaluasi_nilai'" . ')"> ' . $angga->username_vendor . '</a>';
                } else {
                    $row[] = '<p> ' . $angga->username_vendor . '</p>';
                }
                $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                if ($angga->status_evaluasi_syarat_tambahan == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                }
                if ($angga->nilai_penawaran == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Tidak Ada Penawaran</a>';
                } else if ($angga->nilai_penawaran == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_penawaran, 2, ',', '.');
                }
                if ($angga->nilai_terkoreksi == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else {
                    if ($angga->nilai_terkoreksi) {
                        $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                }
                if ($angga->negosiasi == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else if ($angga->negosiasi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Rp. 0</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
                }


                if ($angga->nilai_teknis == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else {
                    $row[] = '<a href="javascript:;" onClick="cek_dokumen_nilai(' . "'" . $angga->id_mengikuti_vendor . "','lihat_evaluasi_administrasi'" . ')" class="btn btn-sm btn-primary">' . $angga->nilai_teknis . '</a>';
                }
                if ($angga->nilai_pringkat_teknis == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_pringkat_teknis . '</a>';
                }
                if ($angga->nilai_akhir == null) {
                    if ($angga->nilai_penawaran == null) {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    } else if ($angga->nilai_penawaran == 0) {
                        $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                    } else {
                        $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                    }
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_akhir . '</a>';
                }

                $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_sangahan_akhir'" . ')"><i class="far fa-eye"></i> Lihat</a>';

                if ($angga->pemenang_tender == 1) {
                    $row[] = '<i class="fas fa-star text-warning"></i>';
                } else {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                }

                // $row[] = '<a href="" class="badge badge-warning">Verifikasi</a>';
                if ($angga->alasan_mengundurkan_diri == null) {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                } else {
                    $row[] = '<a href="https://vms.jmtm.co.id/file_mengundurkan_diri/' . $angga->file_mengundurkan_diri . '"><img width="20px" src="' . base_url('assets/img/pdfku.png') . '" alt=""></a>';
                }

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender($id_paket),
                "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender($id_paket),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else {
            $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
            $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
            $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender($id_mengikuti_paket_vendor);
            $data = [];
            $no = $_POST['start'];
            $total_vendor = 0;
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
                    $row[] = '<a href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','evaluasi_nilai'" . ')"> ' . $angga->username_vendor . '</a>';
                } else {
                    $row[] = '<p> ' . $angga->username_vendor . '</p>';
                }

                $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                if ($angga->status_evaluasi_syarat_tambahan == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                }

                if ($angga->nilai_prakualifikasi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_prakualifikasi . '</a>';
                }

                if ($angga->nilai_teknis == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning"> Belum Di Evaluasi </a>';
                } else {
                    $row[] = '<a href="javascript:;" onClick="cek_dokumen_nilai(' . "'" . $angga->id_mengikuti_vendor . "','lihat_evaluasi_administrasi'" . ')" class="btn btn-sm btn-primary">' . $angga->nilai_teknis . '</a>';
                }


                if ($angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else if ($angga->nilai_terkoreksi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_penawaran, 2, ',', '.');
                }

                if ($angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else if ($angga->nilai_terkoreksi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                }


                if ($angga->negosiasi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else if ($angga->negosiasi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Rp. 0</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->negosiasi, 2, ',', '.');
                }


                if ($angga->nilai_pringkat_teknis == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_pringkat_teknis . '</a>';
                }

                if ($angga->nilai_akhir == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Belum Di Evaluasi</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="btn btn-sm btn-primary">' . $angga->nilai_akhir . '</a>';
                }


                $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_prakualifiaksi'" . ')"><i class="far fa-eye"></i> Lihat</a>';

                $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid_evaluasi_tender(' . "'" . $angga->id_mengikuti_vendor . "','lihat_sangahan_akhir'" . ')"><i class="far fa-eye"></i> Lihat</a>';

                if ($angga->pemenang_tender == 1) {
                    $row[] = '<i class="fas fa-star text-warning"></i>';
                } else {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                }

                // $row[] = '<a href="" class="badge badge-warning">Verifikasi</a>';
                if ($angga->alasan_mengundurkan_diri == null) {
                    $row[] = '<i class="fas fa-times text-danger"></i>';
                } else {
                    $row[] = '<a href="https://vms.jmtm.co.id/file_mengundurkan_diri/' . $angga->file_mengundurkan_diri . '"><img width="20px" src="' . base_url('assets/img/pdfku.png') . '" alt=""></a>';
                }

                $data[] = $row;
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender($id_paket),
                "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender($id_paket),
                "data" => $data
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }


    public function byid_evaluasi_tender($id_vendor)
    {
        $id_paket =  $this->uri->segment(5);
        $get_vendor =  $this->Rolepanitia_model->get_vendor_by_id($id_vendor, $id_paket);
        $get_sanggahan_pra = $this->Rolepanitia_model->getFileSanggahan_evaluasi($id_paket, $id_vendor);
        $sanggahan_akhir = $this->Rolepanitia_model->getFileSanggahan_akhir_evaluasi($id_paket, $id_vendor);
        $output = [
            "vendor" => $get_vendor,
            "pra_sanggah" => $get_sanggahan_pra,
            "sanggahan_akhir" => $sanggahan_akhir,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function lihat_nilai_administrasi($id_vendor)
    {
        $id_paket =  $this->uri->segment(5);
        $lihat_nilai_administrasi =  $this->Evaluasi_administrasi_model->lihat_nilai_administarsi($id_vendor, $id_paket);
        $output = [
            "lihat_nilai_administrasi" => $lihat_nilai_administrasi,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function table_lihat_nilai_administarsi($id_vendor)
    {
        $id_paket =  $this->uri->segment(5);
        $resultss =  $this->Evaluasi_administrasi_model->getdatatable_table_lihat_nilai_administrasi($id_vendor, $id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->jenis_klarifikasi;
            $row[] =  $angga->file_administrasi;
            $row[] =  $angga->alasan_klarifikasi;
            $row[] =  '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_administrasi_model->count_all_data_table_lihat_nilai_administrasi(),
            "recordsFiltered" => $this->Evaluasi_administrasi_model->count_filtered_table_lihat_nilai_administrasi($id_vendor, $id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // END EVALUASI TENDER

    public function evaluasidetail($id_paket)
    {
        $no =  $this->uri->segment(5);
        $id_paket_segment = $this->uri->segment(4);
        // var_dump($no, $id_paket_segment);
        // die;
        $data['get_all_undangan'] = $this->Rolepanitia_model->get_all_data_undangan_by_id_paket($id_paket_segment);
        $ambil_id_paket = $this->Rolepanitia_model->get_paket_by_id_vendor($no);
        $id_paket = $ambil_id_paket['id_mengikuti_paket_vendor'];
        $data['vendor'] =  $this->Rolepanitia_model->get_vendor_by_id($no, $id_paket_segment);
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket_segment);
        $paket2 = $this->Rolepanitia_model->getById($id_paket_segment);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['evaluasi_administrasi'] = $this->Rolepanitia_model->get_evaluasi_administrasi($id_paket_segment);
        $data['evaluasi_teknis'] = $this->Rolepanitia_model->get_evaluasi_teknis($id_paket_segment);
        $data['persyaratan_kualifikasi'] = $this->Rolepanitia_model->get_persyaratan_kualifikasi_beranda($no, $id_paket_segment);
        $data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result_vendor($id_paket_segment);
        $data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat_vendor($id_paket_segment);
        $data['cek_dokumen_tambahan'] = $this->Rolepanitia_model->cek_dokumen_tambahan($no, $id_paket_segment);

        $data['total_rincian_hps_pdf_ada_vendor'] = $this->Paket_model->getdata_skidawww($id_paket_segment, $no);
        $get_rincian_paket = $this->Enkrip_model->totalRincianHps_vendor($no, $id_paket_segment);
        $total = 0;
        foreach ($get_rincian_paket as $key => $value) {
            $total +=  $value['vol_rincian_hps_vendor'] * $value['harga_rincian_hps_vendor'] + ($value['persen_rincian_hps_vendor'] / 100) * $value['vol_rincian_hps_vendor'] * $value['harga_rincian_hps_vendor'];
        }
        $data['total_hps_vendor'] = $total;
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        // ini tahap jadwal
        $data['get_tahap_syarat_tambahan'] = $this->Rolepanitia_model->get_tahap_dokumen_syarat_tambahan($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_keluar_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_tahap_keluar_dokumen_kualifikasi($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket_segment, $id_kualifikasi);
        $data['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_penetapan_pemenang'] = $this->Rolepanitia_model->get_tahap_penetapan_pemenang($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_id_11_7_17'] = $this->Rolepanitia_model->get_tahap_dokumen30($id_paket_segment, $id_kualifikasi);
        $data['get_tahap_dokumen_penetapan_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_penetapan_kualifikasi($id_paket_segment, $id_kualifikasi);
        $data['get_penetapan_hasil_prakualifkasi'] = $this->Rolepanitia_model->get_penetapan_hasil_prakualifkasi($id_paket_segment, $id_kualifikasi);
        $data['get_untuk_tahap_peringkat_teknisku'] = $this->Rolepanitia_model->get_untuk_tahap_peringkat_teknisku($id_paket_segment, $id_kualifikasi);

        $data['get_untuk_tahap_penetapan_peringkat_teknisku_seleksi'] = $this->Rolepanitia_model->get_untuk_tahap_penetapan_peringkat_teknisku_seleksi($id_paket_segment, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket_segment, $id_kualifikasi);
        $data['evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->evaluasi_penawaran_satu_file_prakualfikasi($id_paket_segment, $id_kualifikasi);

        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/evaluasidetail', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_evaluasi_detail', $data);
    }


    public function simpan_undangan()
    {
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_mulai');
        $tempat = $this->input->post('tempat');
        $yang_harus_dibawa = $this->input->post('yang_harus_dibawa');
        $yang_harus_hadir = $this->input->post('yang_harus_hadir');

        $data = [
            'id_paket' => $id_paket,
            'id_vendor' => $id_vendor,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'tempat' => $tempat,
            'yang_harus_dibawa' => $yang_harus_dibawa,
            'yang_harus_hadir' => $yang_harus_hadir
        ];
        // var_dump($data);
        // die;
        $this->Rolepanitia_model->save_undangan($data);
        redirect('panitiajmtm/beranda/evaluasidetail/' . $id_paket . '/' . $id_vendor);
    }

    // Bagian EVALUASI ADMINISTRASI ========================================================================================================
    public function getdata_evaluasi_administrasi($id_paket)
    {
        $resultss = $this->Evaluasi_administrasi_model->getdatatable_evaluasi_administrasi($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = 'Dokumen Sesuai Vms/Dokumen Lengkap';
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-success"> <i class="fas fa fa-check"></i> ' . $angga->nama_persyaratan . '</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_administrasi_model->count_all_data_evaluasi_tender($id_paket),
            "recordsFiltered" => $this->Evaluasi_administrasi_model->count_filtered_data_evaluasi_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function dokumen_klarifikasi_administrasi_vendor($id_penawaran_teknis)
    {
        $id_vendor =  $this->uri->segment(5);
        $id_paket =  $this->uri->segment(6);
        $resultss =  $this->Evaluasi_administrasi_model->getdatatable_evaluasi_klarifikasi_administrasi($id_penawaran_teknis, $id_vendor, $id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->jenis_klarifikasi;
            $row[] =  $angga->file_administrasi;
            $row[] =  $angga->alasan_klarifikasi;
            $row[] =  '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_administrasi_model->count_all_data_klarifikasi_administrasi_vendor(),
            "recordsFiltered" => $this->Evaluasi_administrasi_model->count_filtered__klarifikasi_administrasi_vendor($id_penawaran_teknis, $id_vendor, $id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function byid_klarifikasi($id_penawaran_teknis)
    {
        $id_vendor =  $this->uri->segment(5);
        $id_paket =  $this->uri->segment(6);
        $administrasi =  $this->Evaluasi_administrasi_model->get_penawaran_administrasi_by_id($id_penawaran_teknis, $id_paket);
        $administrasi_klarifikasi =  $this->Evaluasi_administrasi_model->get_penawaran_administrasi_klarifikasi_by_id($id_penawaran_teknis, $id_vendor, $id_paket);
        $table_kosong =  $this->Evaluasi_administrasi_model->get_penawaran_administrasi_klarifikasi_table_kosong($id_penawaran_teknis, $id_vendor, $id_paket);
        $output = [
            "administrasi" => $administrasi,
            "administrasi_klarifikasi" => $administrasi_klarifikasi,
            "table_kosong" => $table_kosong
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function setujui_persyaratan_administrasi()
    {
        $data = [
            'jenis_klarifikasi' => htmlspecialchars($this->input->post('nama_penawaran_teknis')),
            'id_penawaran_teknis_administrasi' =>  htmlspecialchars($this->input->post('id_penawaran_teknis')),
            'id_pengirim' => $this->session->userdata('id_pegawai'),
            'id_penerima' => htmlspecialchars($this->input->post('id_vendor')),
            'id_paket_klarifikasi' => htmlspecialchars($this->input->post('id_paket')),
            'id_vendor_klarifikasi' => htmlspecialchars($this->input->post('id_vendor')),
            'status_klarifikasi' => 1,
            'status_kelulusan' => 1,
            'file_administrasi' => "<i class='fa fa-check text-success'> Sudah Memenuhi Persyaratan</i>",
            'alasan_klarifikasi' => "<i class='fa fa-check text-success'> Lulus</i>",
        ];
        $this->Evaluasi_administrasi_model->setujui_persyaratan_administrasi($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function kirim_persyaratan_administrasi_tambah()
    {
        $data = [
            'jenis_klarifikasi' => htmlspecialchars($this->input->post('nama_penawaran_teknis')),
            'id_penawaran_teknis_administrasi' =>  htmlspecialchars($this->input->post('id_penawaran_teknis')),
            'id_pengirim' => $this->session->userdata('id_pegawai'),
            'id_penerima' => htmlspecialchars($this->input->post('id_vendor')),
            'id_paket_klarifikasi' => htmlspecialchars($this->input->post('id_paket')),
            'id_vendor_klarifikasi' => htmlspecialchars($this->input->post('id_vendor')),
            'alasan_klarifikasi' => htmlspecialchars($this->input->post('alasan_klarifikasi')),
            'file_administrasi' => "<i class='fa fa-times text-ban text-danger'> Belum Memenuhi Persyaratan (Revisi)</i>",
            'status_klarifikasi' => 1,
            'status_kelulusan' => 0,
        ];
        $this->Evaluasi_administrasi_model->setujui_persyaratan_administrasi($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_setujui_persyaratan_administrasi()
    {
        $id_penawaran_teknis_administrasi = htmlspecialchars($this->input->post('id_penawaran_teknis'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'file_administrasi' => "<i class='fa fa-check text-success'> Sudah Memenuhi Persyaratan</i>",
            'jenis_klarifikasi' => htmlspecialchars($this->input->post('nama_penawaran_teknis')),
            'alasan_klarifikasi' => "<i class='fa fa-check text-success'> Lulus</i>",
            'status_klarifikasi' => 1,
            'status_kelulusan' => 1,
        ];
        $this->Evaluasi_administrasi_model->update_setujui_persyaratan_administrasi(array('id_penawaran_teknis_administrasi' => $id_penawaran_teknis_administrasi, 'id_vendor_klarifikasi' => $id_vendor, 'id_paket_klarifikasi' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function kirim_klarifikasi_update()
    {
        $id_penawaran_teknis_administrasi = htmlspecialchars($this->input->post('id_penawaran_teknis'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'file_administrasi' => "<i class='fa fa-times text-ban text-danger'> Belum Memenuhi Persyaratan (Revisi)</i>",
            'alasan_klarifikasi' => htmlspecialchars($this->input->post('alasan_klarifikasi')),
            'status_klarifikasi' => 1,
            'status_kelulusan' => 0,
        ];
        $this->Evaluasi_administrasi_model->update_setujui_persyaratan_administrasi(array('id_penawaran_teknis_administrasi' => $id_penawaran_teknis_administrasi, 'id_vendor_klarifikasi' => $id_vendor, 'id_paket_klarifikasi' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function simpan_evaluasi_administrasi()
    {
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $administrasi_klarifikasi =  $this->Evaluasi_administrasi_model->hitung_seluruh_nilai_administrasi($id_vendor, $id_paket);
        $total_rows_penawaran =  $this->Evaluasi_administrasi_model->hitung_seluruh_persyaratan_administrasi($id_paket);
        $data = [
            'nilai_administrasi' => $administrasi_klarifikasi . "/" . $total_rows_penawaran
        ];
        $this->Evaluasi_administrasi_model->update_vendor_mengikuti_paket(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // END Bagian EVALUASI ADMINSTRASI ========================================================================================================

    // Bagian EVALUASI TEKNIS ========================================================================================================
    public function getdata_evaluasi_teknis($id_paket)
    {
        $resultss = $this->Evaluasi_teknis_model->getdatatable_evaluasi_teknis($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_penawaran_teknis;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-info" onClick="byid_teknis(' . "'" . $angga->id_penawaran_teknis . "','teknis'" . ')"> Penilaian</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_teknis_model->count_all_data_evaluasi_teknis($id_paket),
            "recordsFiltered" => $this->Evaluasi_teknis_model->count_filtered_data_evaluasi_teknis($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function byid_teknis($id_penawaran_teknis)
    {
        $id_vendor =  $this->uri->segment(5);
        $id_paket =  $this->uri->segment(6);
        $data_penawaran_teknis =  $this->Evaluasi_teknis_model->get_penawaran_teknis_by_id($id_penawaran_teknis, $id_paket);
        $data_tbl_teknis_penilain =  $this->Evaluasi_teknis_model->get_penawaran_teknis_penilaian_by_id($id_penawaran_teknis, $id_vendor, $id_paket);
        $output = [
            "data_penawaran_teknis" => $data_penawaran_teknis,
            "data_tbl_teknis_penilain" => $data_tbl_teknis_penilain,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function add_nilai_teknis()
    {
        $data = [
            'nilai_teknis' => htmlspecialchars($this->input->post('nilai_teknis')),
            'jenis_penilaian_teknis' => htmlspecialchars($this->input->post('nama_penawaran_teknis_teknis')),
            'id_penawaran_teknis_penilaian' =>  htmlspecialchars($this->input->post('id_penawaran_teknis_teknis')),
            'id_pengirim' => $this->session->userdata('id_pegawai'),
            'id_penerima' => htmlspecialchars($this->input->post('id_vendor')),
            'id_paket_teknis_penilaian' => htmlspecialchars($this->input->post('id_paket')),
            'id_vendor_teknis_penilaian' => htmlspecialchars($this->input->post('id_vendor')),
            'alasan_tidak_lulus' => htmlspecialchars($this->input->post('alasan_tidak_lulus')),
            'keterangan_teknis' => "<i class='fa fa-check text-success'> Sudah Memenuhi Persyaratan</i>",
            'status_teknis' => 1,
            'status_kelulusan' => 1,
        ];
        $this->Evaluasi_teknis_model->setujui_persyaratan_teknis($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_nilai_teknis()
    {
        $id_penawaran_teknis_penilaian = htmlspecialchars($this->input->post('id_penawaran_teknis_teknis'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_teknis' => htmlspecialchars($this->input->post('nilai_teknis')),
            'keterangan_teknis' => "<i class='fa fa-times text-ban text-danger'> Belum Memenuhi Persyaratan</i>",
            'alasan_tidak_lulus' => htmlspecialchars($this->input->post('alasan_tidak_lulus')),
            'status_teknis' => 1,
            'status_kelulusan' => 0,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis(array('id_penawaran_teknis_penilaian' => $id_penawaran_teknis_penilaian, 'id_vendor_teknis_penilaian' => $id_vendor, 'id_paket_teknis_penilaian' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function update_nilai_teknis_hanya_nilai()
    {
        $nilai_teknis = htmlspecialchars($this->input->post('nilai_teknis_vendor'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_teknis' => $nilai_teknis,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_nilai_metodelogi()
    {
        $nilai_teknis = htmlspecialchars($this->input->post('nilai_metodelogi'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_metodelogi' => $nilai_teknis,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_nilai_akhir()
    {
        $nilai_akhir = htmlspecialchars($this->input->post('nilai_akhir'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_akhir' => $nilai_akhir,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_nilai_prakualifikasi()
    {
        $nilai_prakualifikasi = htmlspecialchars($this->input->post('nilai_prakualifikasi'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_prakualifikasi' => $nilai_prakualifikasi,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // END BAGIAN EVALUASI TEKNIS ====================================================================================================


    public function penetapanpemenangtender($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['vendor'] = $this->Rolepanitia_model->get_vendor($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);

        $data['evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/penetapanpemenangtender', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_penetapan_pemenang');
    }

    public function table_penetapan_pemenanag($id_paket)
    {
        $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
        $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
        $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender($id_mengikuti_paket_vendor);
        $rowdata = $this->Evaluasi_model->get_row_data($id_paket);
        $data = [];
        $no = $_POST['start'];
        if ($rowdata == true) {
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                $row[] = '<b>' . $angga->username_vendor . '</b>';
                if ($angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Gugur</a>';
                } else if ($angga->nilai_terkoreksi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                }
                if ($angga->status_evaluasi_syarat_tambahan == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Gugur</a>';
                } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                }
                if ($angga->pemenang_tender == 1 && $angga->id_mengikuti_paket_vendor == $id_paket) {
                    $row[] = '<a class="btn btn-sm btn-success" href="javascript:;" onClick="byid_batal_1evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','batal_menangakan'" . ')"> Batalkan Pemenang  <span class="text-warning"><i class="fa fa-star"></i></span></a>';
                } else {
                    $row[] = '<button disabled class="btn btn-sm btn-danger" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Pilih Sebagai Pemenang <span class="text-warning"><i class="fa fa-star"></i></span></button>';
                }
                $row[] = $angga->alasan_pembatalan_pemanang;
                $data[] = $row;
            }
        } else {
            foreach ($resultss as $angga) {
                $row = array();
                $row[] = ++$no;
                $row[] = '<b>' . $angga->username_vendor . '</b>';
                if ($angga->nilai_terkoreksi == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Gugur</a>';
                } else if ($angga->nilai_terkoreksi == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = "Rp " . number_format($angga->nilai_terkoreksi, 2, ',', '.');
                }
                if ($angga->status_evaluasi_syarat_tambahan == null) {
                    $row[] = '<a href="javascript:;" class="badge badge-warning">Gugur</a>';
                } else if ($angga->status_evaluasi_syarat_tambahan == 0) {
                    $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
                } else {
                    $row[] = '<a href="javascript:;" class="badge badge-success"><i class="fas fa fa-check"></i> Dokumen Lengkap</a>';
                }
                if ($angga->pemenang_tender == 1 && $angga->id_mengikuti_paket_vendor == $id_paket) {
                    $row[] = '<a class="btn btn-sm btn-success" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Batalkan Pemenang  <span class="text-warning"><i class="fa fa-star"></i></span></a>';
                } else {
                    if ($angga->nilai_terkoreksi == null || $angga->status_evaluasi_syarat_tambahan == null) {
                        $row[] = '<button disabled class="btn btn-sm btn-danger" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Pilih Sebagai Pemenang <span class="text-warning"><i class="fa fa-star"></i></span></button>';
                    } else if ($angga->nilai_terkoreksi == 0 || $angga->status_evaluasi_syarat_tambahan == 0) {
                        $row[] = '<button disabled class="btn btn-sm btn-danger" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Pilih Sebagai Pemenang <span class="text-warning"><i class="fa fa-star"></i></span></button>';
                    } else {
                        $row[] = '<a class="btn btn-sm btn-danger" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Pilih Sebagai Pemenang <span class="text-warning"><i class="fa fa-star"></i></span></a>';
                    }
                }
                $row[] = $angga->alasan_pembatalan_pemanang;
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender($id_paket),
            "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function ambil_id_mengikuti_paket_vendor($id_mengikuti_paket)
    {
        $get_vendor = $this->Evaluasi_model->get_vendor_mengikuti_paket($id_mengikuti_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function menangakan($id_mengikuti_paket)
    {
        $get_vendor = $this->Evaluasi_model->get_vendor_mengikuti_paket($id_mengikuti_paket);
        $data = [
            'pemenang_tender' => 1,
        ];
        $data_update_ke_paket = [
            'penetapan_pemenang' => 1
        ];
        $where = [
            'id_paket' => $get_vendor['id_mengikuti_paket_vendor']
        ];
        $this->Evaluasi_teknis_model->penetapan_pemenang(array('id_mengikuti_paket' => $id_mengikuti_paket), $data);
        $this->Evaluasi_teknis_model->penetapan_pemenang_by_paket($where, $data_update_ke_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function gugurkan_pemenang_tender()
    {
        $id_paketnya_diambil = $this->input->post('ambil_id_paket');
        $data = [
            'nilai_akhir' => 0,
        ];
        $this->Evaluasi_teknis_model->penetapan_pemenang(array('id_mengikuti_paket_vendor' => $id_paketnya_diambil, 'pemenang_tender' => 0), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function batal_menangakan()
    {
        $id_mengikuti_paket = $this->input->post('saya_ambil_id_mengikuti_paket');
        $alasanbatalkan = $this->input->post('alasan_saya_batalkan_tender');
        $get_vendor = $this->Evaluasi_model->get_vendor_mengikuti_paket($id_mengikuti_paket);
        $data = [
            'pemenang_tender' => 0,
            'alasan_pembatalan_pemanang' => $alasanbatalkan
        ];
        $data_update_ke_paket = [
            'penetapan_pemenang' => 0
        ];
        $where = [
            'id_paket' => $get_vendor['id_mengikuti_paket_vendor']
        ];
        $this->Evaluasi_teknis_model->penetapan_pemenang(array('id_mengikuti_paket' => $id_mengikuti_paket), $data);
        $this->Evaluasi_teknis_model->penetapan_pemenang_by_paket($where, $data_update_ke_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function persetujuantender($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['vendor'] = $this->Rolepanitia_model->get_vendor($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/persetujuantender', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }

    public function undangantender()
    {
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/beranda/undangantender');
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }


    public function pengumumanpemenangtender($id_paket)
    {
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['id_vendor'] = $this->Rolepanitia_model->getVendorByPaket($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        // var_dump($paket['id_vendor']);
        // die;
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/pengumumanpemenangtender', $paket);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }

    public function kirim_pengumuman_pememang($id_paket)
    {

        $ambil_telpondan_email = $this->Rolepanitia_model->ambil_telpon_email($id_paket);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmtm.co.id',
            'smtp_port' => 465,
            'smtp_user' => 'eproc@jmtm.co.id',
            'smtp_pass' => '@dminJMTM!',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        // Email penerima

        $kirim_email = $this->Rolepanitia_model->kirim_email_pemenang($id_paket);
        $paket_pemenang = $this->Rolepanitia_model->name_paket($id_paket);
        $id_paket_pemenang = $paket_pemenang['nama_paket'];
        $id_paketku = $paket_pemenang['id_paket'];
        if ($ambil_telpondan_email['status_vendor_baru'] == 1) {
            $this->email->from('eproc@jmtm.co.id', 'JMTM');

            // Email penerima
            $this->email->to($ambil_telpondan_email['email_vendor']); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('E-Procurement JMTM');

            // Isi email
            $this->email->message("Pemenang Sudah Di Umumkan!! Klik Untuk Lihat Pemenang pada Paket $id_paket_pemenang https://vms.jmtm.co.id/beranda/pengumuman_pemenang/$id_paketku");

            $this->email->send();
        } else {
            foreach ($kirim_email as $value) {
                // Email dan nama pengirim
                $this->email->from('eproc@jmtm.co.id', 'JMTM');

                // Email penerima
                $this->email->to($value['email_usaha']); // Ganti dengan email tujuan

                // Subject email
                $this->email->subject('E-Procurement JMTM');

                // Isi email
                $this->email->message("Pemenang Sudah Di Umumkan!! Klik Untuk Lihat Pemenang pada Paket $id_paket_pemenang https://vms.jmtm.co.id/beranda/pengumuman_pemenang/$id_paketku");

                $this->email->send();
            }
        }

        redirect('panitiajmtm/beranda/pengumumanpemenangtender/' . $id_paket);
    }



    // get data Chat Penerima
    public function getdata_chat_penerima()
    {
        $id_role = $this->session->userdata('id_pegawai');
        $resultss = $this->Chat_model->getdatatable_chat_penerima($id_role);
        $data = [];
        foreach ($resultss as $pasca) {
            $row = array();
            $row[] = $pasca->pesan . '<a href="" class="badge badge-success" data-toggle="modal" data-target="#pilih_chating">Jawab</a><br><small><i class="fas fa-clock"></i> 26 Maret 2020 09:31</small>';
            $row[] = '<span class="badge badge-primary">R</span>&ensp; asda' . $pasca->nama_pengirim;
            $row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pasca->id_chat . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $pasca->id_chat . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Chat_model->count_all_data(),
            "recordsFiltered" => $this->Chat_model->count_filtered_data($id_role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    // get data Pengirim
    public function getdata_chat_pengirim()
    {
        $id_role = $this->session->userdata('id_pegawai');
        $resultss = $this->Chat_model->getdatatable_chat_penerima($id_role);
        $data = [];
        foreach ($resultss as $pasca) {
            $row = array();
            $row[] = $pasca->pesan . '<a href="" class="badge badge-success" data-toggle="modal" data-target="#pilih_chating">Jawab</a><br><small><i class="fas fa-clock"></i> 26 Maret 2020 09:31</small>';
            $row[] = '<span class="badge badge-primary">R</span>&ensp; asda' . $pasca->nama_pengirim;
            $row[] = '<a href="#" class="btn btn-success btn-sm" onClick="byid(' . "'" . $pasca->id_chat . "','edit'" . ')"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $pasca->id_chat . "','hapus'" . ')">  <i class="fas fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Chat_model->count_all_data(),
            "recordsFiltered" => $this->Chat_model->count_filtered_data($id_role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function kirim_pesan()
    {
        $id_pengirim = $this->session->userdata('id_pegawai');
        $data = array(
            'id_pengirim' => $id_pengirim,
            'id_penerima' => $this->input->post('id_penerima'),
            'pesan' => $this->input->post('pesan')
        );
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '9bd692abd567cb77b94c',
            '5ad0de8638cc033cf4ac',
            '1234503',
            $options
        );
        if ($this->db->insert('tbl_chat', $data)) {
            $dataku = $this->Chat_model->getChatPenerima2();
            foreach ($dataku as $angga) {
                $data_pusher[] = $angga;
            }
            $pusher->trigger('my-channel', 'my-event', $data_pusher);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }
    public function by_id_new_chat($id_pegawai)
    {
        $data = $this->Chat_model->get_by_id_new_chat_from_pegawai($id_pegawai);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function update_status_tender()
    {
        $id_paket = $this->input->post('id_paket');
        $status_tahap_tender = $this->input->post('status_tahap_tender');

        $data = [
            'status_tahap_tender' => $status_tahap_tender,
            'id_paket' => $id_paket
        ];
        $this->Rolepanitia_model->update_status_tender($id_paket, $data);
        $this->session->set_flashdata('status_tahap_tender', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
    }

    // FILE ADENDUM
    public function add_dokumen_kualifikasi_pdf_lelang()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen_lelang = $this->input->post('nama_dokumen_lelang');
        $config['upload_path'] = './file_dokumen_lelang/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen_lelang')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'status_file_lelang' => 1,
                'nama_dokumen_lelang' => $nama_dokumen_lelang . ' - Adendum',
                'file_dokumen_lelang' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->create_pdf_dokumen_kualifikasi_lelang($upload);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Pdf Berhasil Di Upload');
            redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_dokumen_kualifikasi_lelang($id_dokumen_lelang_pdf)
    {
        $id_paket = $this->Rolepanitia_model->get_by_dokumen_kualifikasi_pdf_lelang($id_dokumen_lelang_pdf);
        $this->Rolepanitia_model->deletedata_dokumen_kualifikasi_pdf_lelang($id_dokumen_lelang_pdf);
        $this->session->set_flashdata('pesan_pdf', 'Berhasil Di Delete');
        redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket['id_paket']));
    }

    //berita acara

    //berita acara evaluasi hasil penawaran
    public function berita_acara_hasil_penawaran()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './berita_acara_penawaran/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berita_acara_penawaran')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'nama_file' => $nama_dokumen,
                'file_berita_acara_penawaran' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_berita_acara_penawaran($upload);
            $this->session->set_flashdata('berita_acara_penawaran', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Hasil Penawaran Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_berita_acara_hasil_penawaran($id_berita_acara_penawaran)
    {
        $id_paket = $this->Rolepanitia_model->get_id_berita_acara_penawaran($id_berita_acara_penawaran);
        $this->Rolepanitia_model->delete_berita_acara_penawaran($id_berita_acara_penawaran);
        $this->session->set_flashdata('berita_acara_penawaran', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Hasil Penawaran Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket['id_paket']));
    }

    //end berita acara evaluasi hasil penawaran


    // berita acara evaluasi hasil tender
    public function berita_acara_tender()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './berita_acara_tender/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berita_acara_tender')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'nama_file' => $nama_dokumen,
                'file_berita_acara_tender' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_berita_acara_tender($upload);
            $this->session->set_flashdata('berita_acara_tender', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Hasil Tender Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_berita_acara_hasil_tender($id_berita_acara_penawaran)
    {
        $id_paket = $this->Rolepanitia_model->get_id_berita_acara_tender($id_berita_acara_penawaran);
        $this->Rolepanitia_model->delete_berita_acara_tender($id_berita_acara_penawaran);
        $this->session->set_flashdata('berita_acara_tender', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Hasil Tender Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket['id_paket']));
    }

    //end berita acara evaluasi hasil tender


    // berita acara evaluasi hasil peringkat teknis
    public function berita_acara_peringkat()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './berita_acara_tender/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berita_acara_peringkat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'nama_file' => $nama_dokumen,
                'file_berita_acara_peringkat' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_berita_acara_peringkat($upload);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function upload_undangan_pembuktian()
    {
        $id_paket = $this->input->post('id_paket');
        // $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './file_undangan_pembuktian/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_undangan_pembuktian')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'dokumen_undangan_pembuktian' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_undangan_pembuktian2($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }
    public function kirim_surat_penunjukan()
    {
        $id_paket = $this->input->post('id_paket');
        // $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './file_surat_penunjukan/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('surat_penunjukan')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'surat_penunjukan' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_undangan_pembuktian2($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }


    public function upload_pengumuman_prakualifikasi()
    {
        $id_paket = $this->input->post('id_paket');
        // $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './file_pengumuman_prakualifikasi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_pengumuman_hasil_prakualifikasi')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'dokumen_pengumuman_hasil_prakualifikasi' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_pengumuman_prakualifikasi($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_berita_acara_hasil_peringkat($id_berita_acara_peringkat)
    {
        $id_paket = $this->Rolepanitia_model->get_id_berita_acara_peringkat($id_berita_acara_peringkat);
        $this->Rolepanitia_model->delete_berita_acara_peringkat($id_berita_acara_peringkat);
        $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket['id_paket']));
    }

    //end berita acara evaluasi hasil peringkat teknis

    // berita acara evaluasi lainnya
    public function berita_acara_lainnya()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './berita_acara_lainnya/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berita_acara_lainnya')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'nama_file' => $nama_dokumen,
                'file_berita_acara_lainnya' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_berita_acara_lainnya($upload);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Informasi Lainnya Berhasil Diupload
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_berita_acara_hasil_lainnya($id_berita_acara_lainnya)
    {
        $id_paket = $this->Rolepanitia_model->get_id_berita_acara_lainnya($id_berita_acara_lainnya);
        $this->Rolepanitia_model->delete_berita_acara_lainnya($id_berita_acara_lainnya);
        $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Informasi Lainnya Berhasil Di Hapus
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('panitiajmtm/beranda/informasitender/' . $id_paket['id_paket']));
    }

    //end berita acara evaluasi lainnya

    //end berita acara


    public function pertanyaantender($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $no =  $this->uri->segment(5);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $data['get_tahap'] = $this->Rolepanitia_model->get_tahap_penjelasan($id_paket, $id_kualifikasi);
        $data['tahap_dokumen_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // seleksi umum tahap
        $data['get_tahap_penjelasan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);

        // INI UNTUK TAHAPAN EAUCTIUON
        $data['get_tahap_download_dokumen_pengadaan_eauction'] = $this->Rolepanitia_model->get_tahap_download_dokumen_pengadaan_eauction($id_paket, $id_kualifikasi);
        $data['upload_dokumen_eauction'] = $this->Rolepanitia_model->upload_dokumen_eauction($id_paket, $id_kualifikasi);
        $data['tahap_jadwal_binding'] = $this->Rolepanitia_model->tahap_jadwal_binding($id_paket, $id_kualifikasi);
        $data['tahap_evaluasi_eauction'] = $this->Rolepanitia_model->tahap_evaluasi_eauction($id_paket, $id_kualifikasi);
        $data['penjelasan_tender_eauction'] = $this->Rolepanitia_model->penjelasan_tender_eauction($id_paket, $id_kualifikasi);
        $data['tahap_penetapan_pemenang_eauction'] = $this->Rolepanitia_model->tahap_penetapan_pemenang_eauction($id_paket, $id_kualifikasi);
        $data['tahap_pengumuman_pemenang_eauction'] = $this->Rolepanitia_model->tahap_pengumuman_pemenang_eauction($id_paket, $id_kualifikasi);

        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/pertanyaantender', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/chat_ajax');
    }



    public function GetAllVendor($id_paket)
    {
        $get_vendor = $this->Chat_model->GetAllVendor($id_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function GetAllVendor_pesan_baru($id_paket)
    {
        $get_vendor = $this->Chat_model->GetAllVendor_pesan_baru($id_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function ngeload_chatnya($id_paket)
    {
        $data = $this->Chat_model->getPesan($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya($id_paket)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_paket = $this->input->post('id_paket');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $config['max_size'] = 204800;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->Chat_model->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->Chat_model->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
            ];
            $this->Chat_model->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }

    // ini untuk notifikasi
    public function ngeload_notif($id_paket)
    {
        $data = $this->Chat_model->total_notif($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }
    // sudah di baca
    // public function sudah_dibaca($id_paket)
    // {
    // 	$id_penerima = $this->session->userdata('id_pegawai');
    // 	$no =  $this->uri->segment(5);
    // 	$data = [
    // 		'is_read' => 0,
    // 		'id_paket' => $id_paket
    // 	];
    // 	$data = $this->Chat_model->update_sudah_dibaca(array('id_pengirim' => $no, 'id_paket' => $id_paket, 'id_penerima' => $id_penerima), $data);
    // 	echo json_encode(array(
    // 		'data' => $data
    // 	));
    // }

    public function sudah_dibaca2($id_paket)
    {
        $data = [
            'is_read' => 0,
            'id_paket' => $id_paket
        ];
        $data = $this->Chat_model->update_sudah_dibaca2(array('id_paket' => $id_paket, 'is_read' => 1), $data);
        echo json_encode(array(
            'data' => $data
        ));
    }
    // END FITUR CHAT PERTANYAAN

    // Fitur Chat sangahan
    public function sanggah_prakualifikasi($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $no =  $this->uri->segment(5);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_file_sanggah'] = $this->Rolepanitia_model->getFileSanggahan($id_paket);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/sanggah_prakualifikasi', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }





    public function sanggahantender($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $no =  $this->uri->segment(5);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['get_file_sanggah'] = $this->Rolepanitia_model->getFileSanggahan2($id_paket);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);


        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/sanggahan_akhir', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax');
    }

    public function update_nilai_terkoreksi()
    {
        $nilai_terkoreksi = htmlspecialchars($this->input->post('nilai_terkoreksi'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_terkoreksi' => $nilai_terkoreksi,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function update_nilai_negosiasi()
    {
        $negosiasi = htmlspecialchars($this->input->post('negosiasi'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'negosiasi' => $negosiasi,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_nilai_pringkat_teknis()
    {
        $nilai_pringkat_teknis = htmlspecialchars($this->input->post('nilai_pringkat_teknis'));
        $id_vendor = htmlspecialchars($this->input->post('id_vendor'));
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $data = [
            'nilai_pringkat_teknis' => $nilai_pringkat_teknis,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function summary_tender($id_paket)
    {
        $paket['data2'] = $this->Chat_model->getDataById($id_paket);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['angga'] = $this->Paket_model->getByid($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);
        $paket['peserta_tender'] = $this->Rolepanitia_model->peserta_tender($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        //berita
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);

        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);

        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);
        $paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);

        $paket['row_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        // var_dump($paket['get_tahap']);
        // die;
        $paket['chat_penjelasan'] = $this->Rolepanitia_model->ambil_semua_chat($id_paket);

        $paket['evaluasi'] = $this->Rolepanitia_model->ambil_semua_evaluasi($id_paket);

        $paket['sanggahan'] = $this->Rolepanitia_model->ambil_sanggahan($id_paket);

        $paket['jenis_kontrak'] = $this->Rolepanitia_model->ambil_jenis_kontrak($id_paket);

        $paket['lokasi_pekerjaan'] = $this->Rolepanitia_model->ambil_lokasi_kerja($id_paket);

        $paket['sumber_dana'] = $this->Rolepanitia_model->ambil_sumber_dana($id_paket);

        // $this->load->view('template_panitia/header');
        // $this->load->view('template/navlogin');
        $this->load->view('panitia_view/beranda/summary_tender', $paket);
        // $this->load->view('template_panitia/footer');
        // $this->load->view('panitia_view/beranda/ajax', $paket);
    }
    // INI UNTUK NEGOSIASI TENDER
    public function negosiasi($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $no =  $this->uri->segment(5);
        $data['data2'] = $this->Chat_model->getDataById_negosiasi_tender($id_paket);
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia_negosiasi_tender($id_paket, $id_pegawai);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_penetapan_pemenang'] = $this->Rolepanitia_model->get_tahap_penetapan_pemenang($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        $data['get_tahap_negosiasi_seleksi'] = $this->Rolepanitia_model->get_tahap_negosiasi_seleksi($id_paket, $id_kualifikasi);
        // seleksi
        $data['negosiasi_seleksi'] = $this->Rolepanitia_model->get_tahap_negosiasi_seleksi($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/negosiasi', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/chat_ajax_negosiasi');
    }

    public function GetAllVendor_negosiasi_tender($id_paket)
    {
        $get_vendor = $this->Chat_model->GetAllVendor_negosiasi_tender($id_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function GetAllVendor_pesan_baru_negosiasi_tender($id_paket)
    {
        $get_vendor = $this->Chat_model->GetAllVendor_pesan_baru_negosiasi_tender($id_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function ngeload_chatnya_negosiasi_tender($id_paket)
    {
        $data = $this->Chat_model->getPesan_negosiasi_tender($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya_negosiasi_tender($id_paket)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_paket = $this->input->post('id_paket');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $config['max_size'] = 204800;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->Chat_model->tambah_chat_negosiasi_tender($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->Chat_model->tambah_chat_negosiasi_tender($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'id_paket' => $id_paket,
            ];
            $this->Chat_model->tambah_chat_negosiasi_tender($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }

    // END FITUR CHAT NEGOSIASI HARGA TENDER

    // menisi rincian hps untuk penunjukan langsung

    // INI BAGIAN UNTUK BATALKAN TENDER

    public function bataltender($id_paket)
    {
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data_vendor['vendor'] = $this->Rolepanitia_model->ambil_telpon_email($id_paket);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/bataltender', $paket);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_tender_ulang');
    }

    // UNTUK TENDER ULANG
    public function tender_ulang()
    {
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $alasan_pengulanagan_tender = htmlspecialchars($this->input->post('alasan_pengulanagan_tender'));
        $data_vendor = $this->Rolepanitia_model->ambil_vendor($id_paket);
        $id_paketku = $this->Rolepanitia_model->getById($id_paket);
        $nama_paket = $id_paketku['nama_paket'];
        $dokumen_pembatalan = 'https://eproc.jmtm.co.id/file_dokumen_pembatalan/' . $id_paketku['dokumen_pembatalan'];
        $where = [
            'id_mengikuti_paket_vendor' => $id_paket,
        ];
        $where_paket = [
            'id_paket' => $id_paket,
        ];
        $data_mengikuti_vendor = [
            'nilai_teknis' => null,
            'nilai_penawaran' => null,
            'nilai_terkoreksi' => null,
            'nilai_pringkat_teknis' => null,
            'pemenang_tender' => null,
            'nilai_akhir' => null,
            'nilai_prakualifikasi' => null,
            'negosiasi' => null,
            'status_evaluasi_syarat_tambahan' => null,
            'nama_file_mengundurkan_diri' => null,
            'file_mengundurkan_diri' => null,
            'alasan_mengundurkan_diri' => null,
            'status_evaluasi_syarat_tambahan' => null,
            'alasan_pembatalan_pemanang' => null,

        ];
        $data_paket = [
            'status_paket_tender' => 1,
            'status_tahap_tender' => 1,
            'surat_penunjukan' => null,
            'dokumen_pengumuman_hasil_prakualifikasi' => null,
            'status_persetujuan_manager' => null,
            'dokumen_undangan_pembuktian' => null,
            // 'batas_pendaftaran' => null,
            'status_pembatalan_atau_pengulangan' => 1,
            'selesai_semua_tender' => null,
            'alasan_tender_pengulanagan' => $alasan_pengulanagan_tender
        ];
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmtm.co.id',
            'smtp_port' => 465,
            'smtp_user' => 'eproc@jmtm.co.id',
            'smtp_pass' => '@dminJMTM!',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        foreach ($data_vendor as $key => $value) {
            // Email dan nama pengirim
            $this->email->from('eproc@jmtm.co.id', 'JMTM');
            // Email penerima

            $this->email->to($value->email_usaha); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('E-PROCUREMENT JMTM :  TENDER MENGALAMI PENGULANAGAN');

            // Isi email
            $this->email->message("PAKET TENDER MENGALAMI PENGULANGAN , DENGAN ALASAN PENGULANGAN TENDER : $alasan_pengulanagan_tender ANDA MASIH MENGIKUTI TENDER :  $nama_paket , ANDA AKAN MENGIKUTI PENGULANGAN TENDER KEMBALI DAN TENDER AKAN DI MULAI KEMBALI KETIKA JADWAL SUDAH DI BUAT ULANG , DAN ANDA AKAN OTOMATIS DAPAT MENGIKUTI PAKET TENDER YANG SUDAH DI BUATKAN JADWAL KEMBALI, BERIKUT LAMPIRAN DARI KAMI : $dokumen_pembatalan");

            $this->email->send();
        }
        // ini delete mengikuti paket
        $this->Evaluasi_teknis_model->ulang_tender_update_vendor_mengikuti_paket($data_mengikuti_vendor, $where);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_penawaran($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_lainnya($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_peringkat($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_tender($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_kualifikasi_pdf($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_sanggahan_akhir($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_sanggahan_prakualfikasi($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_rincian_hps_vendor($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_rincian_hps_pdf_vendor($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_jadwal_tender_detail($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_vendor_persyaratan_tambahan($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_negosiasi_tender($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_pesan($where_paket);
        // ini update ke panitia statusnya
        $this->Evaluasi_teknis_model->update_ke_paket($where_paket, $data_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    // UNTUK TENDER ULANG
    public function batal_ulang()
    {
        $id_paket = htmlspecialchars($this->input->post('id_paket'));
        $alasan_pengulanagan_tender = htmlspecialchars($this->input->post('alasan_pengulanagan_tender'));
        $data_vendor = $this->Rolepanitia_model->ambil_vendor($id_paket);
        $where = [
            'id_mengikuti_paket_vendor' => $id_paket,
        ];
        $where_paket = [
            'id_paket' => $id_paket,
        ];

        $id_paketku = $this->Rolepanitia_model->getById($id_paket);

        $dokumen_pembatalan = 'https://eproc.jmtm.co.id/file_dokumen_pembatalan/' . $id_paketku['dokumen_pembatalan'];

        $data_paket = [
            'status_paket_tender' => null,
            'status_tahap_tender' => null,
            'surat_penunjukan' => null,
            'dokumen_pengumuman_hasil_prakualifikasi' => null,
            'status_persetujuan_manager' => null,
            'dokumen_undangan_pembuktian' => null,
            'batas_pendaftaran' => null,
            'selesai_semua_tender' => null,
            'status_pembatalan_atau_pengulangan' => 2,
            'alasan_tender_pengulanagan' => $alasan_pengulanagan_tender
        ];

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmtm.co.id',
            'smtp_port' => 465,
            'smtp_user' => 'eproc@jmtm.co.id',
            'smtp_pass' => '@dminJMTM!',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        foreach ($data_vendor as $key => $value) {
            // Email dan nama pengirim
            $this->email->from('eproc@jmtm.co.id', 'JMTM');

            // Email penerima

            $this->email->to($value->email_usaha); // Ganti dengan email tujuan

            // Subject email
            $this->email->subject('E-PROCUREMENT JMTM :  TENDER MENGALAMI PEMBATALAN');

            // Isi email
            $this->email->message("ALASAN PEMBATALAN TENDER : $alasan_pengulanagan_tender , BERIKUT LAMPIRAN DARI KAMI : $dokumen_pembatalan");

            $this->email->send();
        }

        //$this->Rolepanitia_model->panitia_batal_mengikuti_pakat($id_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_penawaran($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_lainnya($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_peringkat($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_berita_acara_tender($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_kualifikasi_pdf($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_sanggahan_akhir($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_dokumen_sanggahan_prakualfikasi($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_rincian_hps_vendor($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_rincian_hps_pdf_vendor($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_jadwal_tender_detail($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_vendor_persyaratan_tambahan($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_negosiasi_tender($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_tbl_pesan($where_paket);
        $this->Evaluasi_teknis_model->ulang_tender_detele_vendor_mengikuti_paket($where);
        $this->Evaluasi_teknis_model->update_ke_paket($where_paket, $data_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }




    // notif Sanggahn Prakualifikasi

    public function ngeload_notif_sanggahan_prakualifikasi($id_paket)
    {
        $data = $this->Chat_model->total_notif_sanggahan_prakualifikasi($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }
    public function sudah_dibaca_sanggahan_prakualifiaksi($id_paket)
    {
        $data = [
            'is_read' => 0,
            'id_paket' => $id_paket
        ];
        $data = $this->Chat_model->update_sudah_dibaca_sanggahan_prakuaifikasi(array('id_paket' => $id_paket, 'is_read' => 1), $data);
        echo json_encode(array(
            'data' => $data
        ));
    }

    // notif Sanggahn Akhir

    public function ngeload_notif_sanggahan_akhir($id_paket)
    {
        $data = $this->Chat_model->total_notif_sanggahan_akhir($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }
    public function sudah_dibaca_sanggahan_akhir($id_paket)
    {
        $data = [
            'is_read' => 0,
            'id_paket' => $id_paket
        ];
        $data = $this->Chat_model->update_sudah_dibaca_sanggahan_akhir(array('id_paket' => $id_paket, 'is_read' => 1), $data);
        echo json_encode(array(
            'data' => $data
        ));
    }


    // notif Negosiasi Tender

    public function ngeload_notif_negosiasi_tender($id_paket)
    {
        $data = $this->Chat_model->total_notif_negosiasi_tender($id_paket);
        echo json_encode(array(
            'data' => $data
        ));
    }
    public function sudah_dibaca_negosiasi_tender($id_paket)
    {
        $data = [
            'is_read' => 0,
            'id_paket' => $id_paket
        ];
        $data = $this->Chat_model->update_sudah_dibaca2_negosiasi_tender(array('id_paket' => $id_paket, 'is_read' => 1), $data);
        echo json_encode(array(
            'data' => $data
        ));
    }

    // Nilai Persyaratn tamabahan
    public function tidak_lulus_kualifikasi_evaluasi()
    {
        $id_vendor = htmlspecialchars($this->input->post('vendor_id'));
        $id_paket = htmlspecialchars($this->input->post('paket_id'));
        $data = [
            'status_evaluasi_syarat_tambahan' => 0,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function lulus_kualifikasi_evaluasi()
    {
        $id_vendor = htmlspecialchars($this->input->post('vendor_id'));
        $id_paket = htmlspecialchars($this->input->post('paket_id'));
        $data = [
            'status_evaluasi_syarat_tambahan' => 1,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function batal_dievaluasi_kualifikasi_dan_batal()
    {
        $id_vendor = htmlspecialchars($this->input->post('vendor_id'));
        $id_paket = htmlspecialchars($this->input->post('paket_id'));
        $data = [
            'status_evaluasi_syarat_tambahan' => null,
        ];
        $this->Evaluasi_teknis_model->update_setujui_persyaratan_teknis_vendor(array('id_mengikuti_vendor' => $id_vendor, 'id_mengikuti_paket_vendor' => $id_paket), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function by_id_lihat_vendor($id_paket)
    {
        $get_vendor = $this->Rolepanitia_model->ambil_vendor($id_paket);
        $get_vendor1 = $this->Chat_model->ambil_vendor1($id_paket);
        $get_vendor2 = $this->Chat_model->ambil_vendor2($id_paket);
        $get_vendor3 = $this->Chat_model->ambil_vendor3($id_paket);
        $priceprod = array();
        $priceprod2 = array();
        $priceprod3 = array();
        foreach ($get_vendor1 as $g => $value) {
            // use the key $g in the $priceprod array
            $priceprod[$g] = $value->harga_penawaran_binding_1;
        }
        foreach ($get_vendor2 as $g => $value) {
            $priceprod2[$g] = $value->harga_penawaran_binding_2;
        }
        foreach ($get_vendor3 as $g => $value) {
            $priceprod3[$g] = $value->harga_penawaran_binding_3;
        }
        // get the highest price
        $min_binding_1 = min($priceprod);
        $min_binding_2 = min($priceprod2);
        $min_binding_3 = min($priceprod3);
        $output = [
            "vendor" => $get_vendor,
            "vendor1" => $get_vendor1,
            "vendor2" => $get_vendor2,
            "vendor3" => $get_vendor3,
            "min_binding_1" => $min_binding_1,
            "min_binding_2" => $min_binding_2,
            "min_binding_3" => $min_binding_3,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function tenaga_ahli_vendor($id_vendor)
    {
        $vendor_tenaga_ahli_row = $this->Rolepanitia_model->vendor_tenaga_ahli_row($id_vendor);
        $output = [
            "vendor_tenaga_ahli_row" => $vendor_tenaga_ahli_row
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function tenaga_ahli_vendor_table($id_vendor)
    {
        $resultss = $this->Rolepanitia_model->datatable_tenaga_ahli($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_tenaga_ahli;
            $row[] = $angga->tanggal_lahir_tenaga_ahli;
            $row[] = $angga->prodi_tenaga_ahli;
            $row[] = $angga->pendidikan_trakhir_tenaga_ahli;
            $row[] = $angga->tahun_lulus_tenaga_ahli;
            // $row[] = '<a target="_blank" href=' . base_url('/file_bukti_tenaga_ahli' . '/' . $angga->file_bukti_pendidikan) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
            $row[] = $angga->sertifikasi_tenaga_ahli;
            $row[] = $angga->kualifikasi_keahlian_tenaga_ahli;
            $row[] = $angga->tanggal_masa_berlaku_sertifikasi;
            // $row[] = '<a target="_blank" href=' . base_url('/file_bukti_tenaga_ahli' . '/' . $angga->file_bukti_sertifikat_tenaga_ahli) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
            $row[] = $angga->pengalaman_tenaga_ahli;
            $row[] = $angga->jabatan_tenaga_ahli;
            $row[] = $angga->rencana_jabatan_tenaga_ahli;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_tenaga_ahli($id_vendor),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_tenaga_ahli($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function vendor_pengalaman_row($id_vendor)
    {
        $vendor_pengalaman_row = $this->Rolepanitia_model->vendor_pengalaman_row($id_vendor);
        $output = [
            "vendor_pengalaman_row" => $vendor_pengalaman_row
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function pengalaman_vendor_table($id_vendor)
    {
        $resultss = $this->Rolepanitia_model->datatable_pengalaman_vendor($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_pekerjaan_pengalaman;
            $row[] = $angga->instansi_pengalaman;
            $row[] = $angga->nomor_dan_tanggal_kontrak;
            $row[] =  "Rp " . number_format($angga->nilai_kontrak, 2, ',', '.');
            $row[] =  "Rp " . number_format($angga->nilai_sharing, 2, ',', '.');
            $row[] = $angga->tanggal_kontrak;
            $row[] = $angga->selesai_kontrak;
            $row[] = $angga->referensi_kontrak;
            // $row[] = '<a target="_blank" href="https://vms.jmtm.co.id/bukti_pengalaman/' . $angga->bukti_pengalaman . '"><img src="' . base_url('assets/img/file-icon.png') . '"  style="width: 35px;" alt=""></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_pengalaman($id_vendor),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_pengalaman($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function vendor_neraca_keuangan($id_vendor)
    {
        $vendor_neraca_keuangan = $this->Rolepanitia_model->vendor_neraca_keuangan($id_vendor);
        $output = [
            "vendor_neraca_keuangan_row" => $vendor_neraca_keuangan
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function neraca_keuangan_vendor_table($id_vendor)
    {
        $resultss = $this->Rolepanitia_model->datatable_neraca_keuangan_vendor($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->status_audit;
            $row[] = '<a target="_blank" href="https://vms.jmtm.co.id/file_bukti_keuangan/' . $angga->bukti . '"><img src="' . base_url('assets/img/file-icon.png') . '"  style="width: 35px;" alt=""></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_neraca_keuangan($id_vendor),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_neraca_keuangan($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    //balasan sanggahan akhir
    public function balas_sanggahan_akhir($id_paket)
    {
        $config['upload_path'] = './file_dokumen_sanggahan_akhir/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $id_dokumen_sanggahan_akhir = $this->input->post('id_dokumen_sanggahan_akhir');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('balasan_sanggahan_panitia')) {

            $fileData = $this->upload->data();

            $upload = [
                'keterangan_panitia' => $this->input->post('keterangan_panitia'),
                'balasan_sanggahan_panitia' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->update_dokumen_sanggahan_akhir($upload, $id_dokumen_sanggahan_akhir);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Pdf Berhasil Di Upload');
            redirect(base_url('panitiajmtm/beranda/sanggahantender/' . $id_paket));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('panitiajmtm/beranda/sanggahantender/' . $id_paket));
        }
    }

    //balasan sanggahan prakualifikasi
    public function balas_sanggahan_prakualifikasi($id_paket)
    {
        $config['upload_path'] = './file_dokumen_sanggahan_prakualifikasi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $id_dokumen_sanggahan_akhir = $this->input->post('id_dokumen_sanggahan_prakualifikasi');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('balasan_sanggahan_panitia')) {

            $fileData = $this->upload->data();

            $upload = [
                'keterangan_panitia' => $this->input->post('keterangan_panitia'),
                'balasan_sanggahan_panitia' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->update_dokumen_sanggahan_prakualifikasi($upload, $id_dokumen_sanggahan_akhir);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Pdf Berhasil Di Upload');
            redirect(base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $id_paket));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $id_paket));
        }
    }

    // 30 juni 2022

    public function peralatan_tender_vendor($id_vendor)
    {
        $vendor_peralatan_tender_row = $this->Rolepanitia_model->vendor_peralatan_tender_row($id_vendor);
        $output = [
            "vendor_peralatan_tender_row" => $vendor_peralatan_tender_row
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_peralatan_tender($id_vendor)
    {
        $id_paket = $this->input->post('id_paket');

        $prams = $this->Rolepanitia_model->get_peralatan_tender($id_vendor, $id_paket);
        // $this->db->join('tbl_jadwal_kualifikasi', 'tbl_jadwal_kualifikasi.id_kualifikasi = tbl_paket.id_kualifikasi', 'left');
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($prams as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->jenis_peralatan;
            $row[] = $angga->merk_dan_tipe;
            $row[] = $angga->jumlah_peralatan;
            $row[] = $angga->kapasitas_produksi;
            $row[] = $angga->satuan_volume;
            $row[] = $angga->tahun_pembuatan;
            $row[] = $angga->kepemilikan;
            $row[] = $angga->data_dukung_kepemilikan;
            $row[] = $angga->lokasi_saat_ini;
            $row[] = $angga->jarak_lokasi;
            $row[] =  '<a target="_blank" href="https://vms.jmtm.co.id/file_peralatan_paket/' . $angga->bukti_kepemilikan . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';

            // if (date('Y-m-d H:i', strtotime($angga->selesai_semua_tender)) > date('Y-m-d H:i')) {
            // 	$row[] = '<a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_peralatan_tender(' . "'" . $angga->id_peralatan_tender . "','hapus_peralatan_tender'" . ')"><i class="fas fa-ban"></i> Hapus</a>';
            // } else {
            // 	$row[] = '<a href="javascript:;" class="btn btn-danger btn-sm">Tender Selesai</a>';
            // }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_peralatan_tender($id_vendor, $id_paket),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_peralatan_tender($id_vendor, $id_paket),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function tenaga_ahli_tender_row($id_vendor)
    {
        $vendor_tenaga_ahli_tender_row = $this->Rolepanitia_model->vendor_tenaga_ahli_tender_row($id_vendor);
        $output = [
            "row_tenaga_ahli_tender" => $vendor_tenaga_ahli_tender_row
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_tenaga_ahli_tender($id_vendor)
    {
        $id_paket = $this->input->post('id_paket');
        $prams = $this->Rolepanitia_model->get_tenaga_ahli_tender($id_vendor, $id_paket);
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($prams as $angga) {
            $count_tahun = $this->db->query("SELECT SUM(total_tahun) AS total_tahun FROM tbl_detail_tenaga_ahli_tender WHERE id_tenaga_ahli_tender = $angga->id_tenaga_ahli_tender")->row();
            $jabatan_tertinggi = $this->db->query("SELECT * FROM tbl_detail_tenaga_ahli_tender WHERE id_tenaga_ahli_tender = $angga->id_tenaga_ahli_tender ORDER BY id_detail_tenaga_ahli_tender DESC")->row();
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->nama_tenaga_ahli;
            $row[] = $angga->jabatan;
            $row[] = $angga->tanggal_lahir;
            $row[] = $angga->program_studi;
            $row[] = $angga->pendidikan;
            $row[] = $angga->tahun_lulus;
            $row[] = $angga->badan_sertifikat_keahlian;
            $row[] = $angga->kualifikasi_keahlian;
            $row[] = $angga->tanggal_masa_berlaku;
            $row[] = $count_tahun->total_tahun;
            $row[] = $jabatan_tertinggi->posisi_pekerjaan;
            $row[] = '<a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_tenaga_ahli_tender(' . "'" . $angga->id_tenaga_ahli_tender . "','detail'" . ')"><i class="fas fa-book"></i> Riwayat Pekerjaan</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_tenaga_ahli_tender($id_vendor, $id_paket),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_tenaga_ahli_tender($id_vendor, $id_paket),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function by_id_tenaga_ahli_tender($id_tenaga_ahli_tender)
    {
        $id_tenaga_ahli_tender = $this->Rolepanitia_model->get_by_id_tenaga_ahli($id_tenaga_ahli_tender);
        $output = [
            "row_tenaga_ahli" => $id_tenaga_ahli_tender,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_riwayat_tenaga_ahli_tender()
    {
        $id_tenaga_ahli_tender = $this->input->post('id_tenaga_ahli_tender');
        $prams = $this->Rolepanitia_model->get_riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender);
        $no = $_POST['start'];
        // $total = 0;
        $data = [];
        foreach ($prams as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = $angga->tahun_detail_pekerjaan;
            $row[] = $angga->nama_proyek;
            $row[] = $angga->posisi_pekerjaan;
            $row[] =  '<a target="_blank" href="https://vms.jmtm.co.id/file_bukti_pekerjaan/' . $angga->bukti_kerja . '">' . '<img width="30px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data__riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered__riwayat_tenaga_ahli_tender($id_tenaga_ahli_tender),
            "data" => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function replaychat()
    {

        $pengirim = $this->input->post('id_pengirim');
        $isi = $this->input->post('isi');
        $username = $this->input->post('username');

        $data = [
            'pengirim_replay' => $pengirim,
            'isi_replay' => $isi,
            'username_replay' => $username
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // 8 september
    public function upload_undangan_penawaran()
    {
        $id_paket = $this->input->post('id_paket');
        // $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './file_undangan_penawaran/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('undangan_penawaran')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'undangan_penawaran' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_undangan_penawaran($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Berita Acara Evaluasi Peringkat Teknis Berhasil Diupload
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    // 20 september 2022
    public function upload_dokumen_pembatalan()
    {
        $id_paket = $this->input->post('id_paket');
        // $nama_dokumen = $this->input->post('nama_file');
        $config['upload_path'] = './file_pembatalan_tender/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_pembatalan')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'dokumen_pembatalan' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_undangan_penawaran($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_peringkat', '<div class="alert alert-success alert-dismissible">Dokumen Pembatalan Berhasil Di Upload!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }




    function berita_acara($id_paket)
    {
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['get_tahap_id_11_7_17'] = $this->Rolepanitia_model->get_tahap_dokumen30($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_pemilihan'] = $this->Rolepanitia_model->get_tahap_dokumen_pemilihan($id_paket, $id_kualifikasi);
        $paket['get_tahap_syarat_tambahan'] = $this->Rolepanitia_model->get_tahap_dokumen_syarat_tambahan($id_paket, $id_kualifikasi);
        $paket['get_tahap_pembuktian_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_pembuktian_kualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_peringkat_teknis'] = $this->Rolepanitia_model->get_tahap_dokumen_peringkat_teknis($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $paket['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // ini untuk pascakualifikasi
        $data['get_tahap_dokumen_penetapan_kualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_penetapan_kualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_keluar_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_tahap_keluar_dokumen_kualifikasi($id_paket, $id_kualifikasi);
        //berita
        $paket['pengumuman_hasil_prakualifikasi'] = $this->Rolepanitia_model->pengumuman_hasil_prakualifikasi($id_paket, $id_kualifikasi);
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);
        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);
        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);


        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $paket['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $paket['Evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->Evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);


        $paket['evaluasi_dokumen_prakualifiaksi_2_file'] = $this->Rolepanitia_model->evaluasi_dokumen_prakualifiaksi_2_file($id_paket, $id_kualifikasi);
        // END PRAKUALIFIKASI 2 FILE
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);

        $paket['cek_vendor_mengikuti_tender'] = $this->db->query("SELECT id_mengikuti_paket FROM tbl_vendor_mengikuti_paket WHERE id_mengikuti_paket_vendor = $id_paket")->row_array();

        $paket['vendor_mengikuti'] = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket")->result_array();
        // 6 juli 2022
        $paket['get_vendor'] = $this->Rolepanitia_model->get_username($id_paket);

        // sumary
        $paket['data2'] = $this->Chat_model->getDataById($id_paket);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['angga'] = $this->Paket_model->getByid($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);
        $paket['peserta_tender'] = $this->Rolepanitia_model->peserta_tender($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        //berita
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);

        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);

        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);
        $paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);

        $paket['row_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        // var_dump($paket['get_tahap']);
        // die;
        $paket['chat_penjelasan'] = $this->Rolepanitia_model->ambil_semua_chat($id_paket);

        $paket['evaluasi'] = $this->Rolepanitia_model->ambil_semua_evaluasi($id_paket);

        $paket['sanggahan'] = $this->Rolepanitia_model->ambil_sanggahan($id_paket);

        $paket['jenis_kontrak'] = $this->Rolepanitia_model->ambil_jenis_kontrak($id_paket);

        $paket['lokasi_pekerjaan'] = $this->Rolepanitia_model->ambil_lokasi_kerja($id_paket);

        $paket['sumber_dana'] = $this->Rolepanitia_model->ambil_sumber_dana($id_paket);

        // berita acara update 2023
        $paket['data_ba_1'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_1 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_2'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_2 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_3'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_3 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_4'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_4 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_5'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_5 WHERE id_paket = $id_paket")->row_array();


        $paket['data_ba_pasca1'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_1 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_pasca2'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_2 WHERE id_paket = $id_paket")->row_array();

        $paket['data_ba_pasca3'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_3 WHERE id_paket = $id_paket")->row_array();


        $paket['data_ba_pasca4'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_4 WHERE id_paket = $id_paket")->row_array();


        $paket['data_ba_pasca5'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_5 WHERE id_paket = $id_paket")->row_array();
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/berita_acara', $paket);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax', $paket);
    }
    // BA PRA 1
    public function simpan_ba_pra_1($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_1 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'jml_peserta_lulus' => $this->input->post('jml_peserta_lulus'),
                'jml_peserta_tdk_lulus' => $this->input->post('jml_peserta_tdk_lulus'),
                'kb' => $this->input->post('kb'),
                'skk' => $this->input->post('skk'),
                'der' => $this->input->post('der'),
                'kd' => $this->input->post('kd'),
                'npt' => $this->input->post('npt'),
                'tgl' => $this->input->post('tgl'),
                'ekk1' => $this->input->post('ekk1'),
                'ekk2' => $this->input->post('ekk2'),
                'ekt1' => $this->input->post('ekt1'),
                'ekt2' => $this->input->post('ekt2'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_prakualifikasi_1', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'jml_peserta_lulus' => $this->input->post('jml_peserta_lulus'),
                'jml_peserta_tdk_lulus' => $this->input->post('jml_peserta_tdk_lulus'),
                'kb' => $this->input->post('kb'),
                'skk' => $this->input->post('skk'),
                'der' => $this->input->post('der'),
                'kd' => $this->input->post('kd'),
                'npt' => $this->input->post('npt'),
                'tgl' => $this->input->post('tgl'),
                'ekk1' => $this->input->post('ekk1'),
                'ekk2' => $this->input->post('ekk2'),
                'ekt1' => $this->input->post('ekt1'),
                'ekt2' => $this->input->post('ekt2'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_prakualifikasi_1', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hasil_ba_pra_1($id_paket)
    {
        $paket['data_ba_1'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_1 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pra/hasil_1', $paket);
    }

    public function get_vendor_ba1($id_paket)
    {
        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket")->result_array();
        echo json_encode($vendor_mengikuti);
    }

    public function get_panitia_ba1($id_paket)
    {
        $query_panitia = $this->db->query("SELECT * FROM tbl_paket LEFT JOIN tbl_panitia ON tbl_paket.id_panitia = tbl_panitia.id_panitia
                                                LEFT JOIN tbl_detail_panitia ON tbl_panitia.id_panitia = tbl_detail_panitia.id_panitia
                                                LEFT JOIN tbl_pegawai ON tbl_detail_panitia.id_pegawai2 = tbl_pegawai.id_pegawai
                                                LEFT JOIN tbl_role_panitia ON tbl_detail_panitia.id_role_panitia = tbl_role_panitia.id_role_panitia
                                                WHERE tbl_paket.id_paket = $id_paket ORDER BY tbl_detail_panitia.id_role_panitia ASC")->result_array();
        echo json_encode($query_panitia);
    }

    function get_vendor_ba1_row()
    {

        $id_vendor = $this->input->post('id_vendor');
        $id_paket = $this->input->post('id_paket');

        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket AND id_mengikuti_vendor = $id_vendor")->row();
        echo json_encode($vendor_mengikuti);
    }

    function get_vendor_ba2_row()
    {

        $id_vendor = $this->input->post('id_vendor');
        $id_paket = $this->input->post('id_paket');

        $vendor_mengikuti  = $this->db->query("SELECT * FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_vendor ON tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor LEFT JOIN tbl_vendor_identitas_prusahaan ON tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor WHERE id_mengikuti_paket_vendor = $id_paket AND id_mengikuti_vendor = $id_vendor")->row();
        echo json_encode($vendor_mengikuti);
    }

    function save_pra_1_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket')
        ];
        $data = [
            'ev_admin_pra1' => $this->input->post('ev_admin_pra1'),
            'ev_keuangan_pra1' => $this->input->post('ev_keuangan_pra1'),
            'ev_teknis_pra1' => $this->input->post('ev_teknis_pra1'),
            'ket_pra1' => $this->input->post('ket_pra1'),
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // END BA PRA 1


    // BA PRA 2
    public function simpan_ba_pra_2($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_2 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdk' => $this->input->post('ymdk'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_prakualifikasi_2', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdk' => $this->input->post('ymdk'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_prakualifikasi_2', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }


    function save_pra_2_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket')
        ];
        $data = [
            'ev_admin_pra2' => $this->input->post('ev_admin_pra2'),
            'ev_keuangan_pra2' => $this->input->post('ev_keuangan_pra2'),
            'ev_teknis_pra2' => $this->input->post('ev_teknis_pra2'),
            'ket_pra2' => $this->input->post('ket_pra2'),
            'peringkat_pra2' => $this->input->post('peringkat_pra2')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function hasil_ba_pra_2($id_paket)
    {
        $paket['data_ba_2'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_2 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pra/hasil_2', $paket);
    }
    // END BA PRA 2


    // BA PRA 3
    public function save_ba_pra3($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_3 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdk' => $this->input->post('ymdk'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'hpyds' => $this->input->post('hpyds'),
                'hpydg' => $this->input->post('hpydg'),
                'ket_harga' => $this->input->post('ket_harga'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_prakualifikasi_3', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdk' => $this->input->post('ymdk'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'hpyds' => $this->input->post('hpyds'),
                'hpydg' => $this->input->post('hpydg'),
                'ket_harga' => $this->input->post('ket_harga'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_prakualifikasi_3', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    function save_pra_3_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket')
        ];
        $data = [
            'sp_pra3' => $this->input->post('sp_pra3'),
            'rdkh_pra3' => $this->input->post('rdkh_pra3'),
            'dkh_pra3' => $this->input->post('dkh_pra3'),
            'hps_pra3_1' => $this->input->post('hps_pra3_1'),
            'ket_pra3' => $this->input->post('ket_pra3_1')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    function save_pra_3_vendor2()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket3_2')
        ];

        $data = [
            'hps_pra3_2' => $this->input->post('hps_pra3_2'),
            'nhp_pra3' => $this->input->post('nhp_pra3'),
            'peringkat_pra3' => $this->input->post('peringkat_pra3'),
            'ket_pra3_2' => $this->input->post('ket_pra3_2')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function hasil_ba_pra_3($id_paket)
    {
        $paket['data_ba_3'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_3 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pra/hasil_3', $paket);
    }
    // END BA PRA 3


    // BA PRA 4
    public function save_ba_pra4($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_4 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_prakualifikasi_4', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_prakualifikasi_4', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    function save_pra_4_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket4')
        ];
        $data = [
            'hps_pra4' => $this->input->post('hps_pra4'),
            'nhp_pra4' => $this->input->post('nhp_pra4'),
            'peringkat_pra4' => $this->input->post('peringkat_pra4'),
            'ket_pra4' => $this->input->post('ket_pra4')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function hasil_ba_pra_4($id_paket)
    {
        $paket['data_ba_4'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_4 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pra/hasil_4', $paket);
    }
    // END BA PRA 4

    // BA PRA 5
    public function save_ba_pra5($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_5 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_prakualifikasi_5', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_prakualifikasi_5', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hasil_ba_pra_5($id_paket)
    {
        $paket['data2'] = $this->Chat_model->getDataById($id_paket);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['angga'] = $this->Paket_model->getByid($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);
        $paket['peserta_tender'] = $this->Rolepanitia_model->peserta_tender($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        //berita
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);

        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);

        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);
        $paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);

        $paket['row_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        // var_dump($paket['get_tahap']);
        // die;
        $paket['chat_penjelasan'] = $this->Rolepanitia_model->ambil_semua_chat($id_paket);

        $paket['evaluasi'] = $this->Rolepanitia_model->ambil_semua_evaluasi($id_paket);

        $paket['sanggahan'] = $this->Rolepanitia_model->ambil_sanggahan($id_paket);

        $paket['jenis_kontrak'] = $this->Rolepanitia_model->ambil_jenis_kontrak($id_paket);

        $paket['lokasi_pekerjaan'] = $this->Rolepanitia_model->ambil_lokasi_kerja($id_paket);

        $paket['sumber_dana'] = $this->Rolepanitia_model->ambil_sumber_dana($id_paket);
        $paket['data_ba_5'] = $this->db->query("SELECT * FROM tbl_ba_prakualifikasi_5 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pra/hasil_5', $paket);
    }
    // END BA PRA 5

    // BERITA ACARA PASCA 2023
    // BA PASCA 1
    public function save_ba_pasca1($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_1 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'ymdp' => $this->input->post('ymdp'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_pascakualifikasi_1', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'ymdp' => $this->input->post('ymdp'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_pascakualifikasi_1', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hasil_ba_pasca_1($id_paket)
    {
        $paket['data_ba_pasca1'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_1 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pasca/hasil_1', $paket);
    }

    // END BA PASCA 1

    // PASCA 2

    public function simpan_unsur($id_paket)
    {
        $data = [
            'nama_unsur' => $this->input->post('nama_unsur'),
            'id_paket' => $id_paket,
            'id_pegawai' => $this->session->userdata('id_pegawai')
        ];
        $this->db->insert('tbl_ba_unsur_pasca2', $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_unsur($id_paket)
    {
        $data = $this->db->query("SELECT * FROM tbl_ba_unsur_pasca2 WHERE id_paket = $id_paket")->result_array();
        echo json_encode($data);
    }

    public function get_unsur2($id_paket)
    {
        $data = $this->db->query("SELECT * FROM tb_ba_unsur_dtl_pasca2 WHERE id_ba_unsur_pasca2 = $id_paket")->result_array();
        echo json_encode($data);
    }

    public function simpan_unsur2()
    {
        $data = [
            'nama_unsur2' => $this->input->post('nama_unsur2'),
            'id_ba_unsur_pasca2' => $this->input->post('id_ba_unsur_pasca2'),
            'id_paket' => $this->input->post('id_paket_unsur2')
        ];
        $this->db->insert('tb_ba_unsur_dtl_pasca2', $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    function save_pasca_2_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket')
        ];
        $data = [
            'ev_admin_pasca2' => $this->input->post('ev_admin_pasca2'),
            'ev_keuangan_pasca2' => $this->input->post('ev_keuangan_pasca2'),
            'ev_teknis_pasca2' => $this->input->post('ev_teknis_pasca2'),
            'ket_pasca2' => $this->input->post('ket_pasca2'),
            'peringkat_pasca2' => $this->input->post('peringkat_pasca2')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function save_ba_pasca2($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_2 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'tgl' => $this->input->post('tgl'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'jml_lulus' => $this->input->post('jml_lulus'),
                'jml_tdk_lulus' => $this->input->post('jml_tdk_lulus'),
                'kemampuan_teknis' => $this->input->post('kemampuan_teknis'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_pascakualifikasi_2', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'tgl' => $this->input->post('tgl'),
                'jml_peserta' => $this->input->post('jml_peserta'),
                'jml_lulus' => $this->input->post('jml_lulus'),
                'jml_tdk_lulus' => $this->input->post('jml_tdk_lulus'),
                'kemampuan_teknis' => $this->input->post('kemampuan_teknis'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_pascakualifikasi_2', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hasil_ba_pasca_2($id_paket)
    {
        $paket['data_ba_pasca2'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_2 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pasca/hasil_2', $paket);
    }

    // END BA PASCA 2

    // BA PASCA 3
    public function save_ba_pasca3($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_3 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdp' => $this->input->post('ymdp'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'hpyds' => $this->input->post('hpyds'),
                'hpydg' => $this->input->post('hpydg'),
                'ket_harga' => $this->input->post('ket_harga'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_pascakualifikasi_3', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'ymdp' => $this->input->post('ymdp'),
                'tmdp' => $this->input->post('tmdp'),
                'ket_penyampaian' => $this->input->post('ket_penyampaian'),
                'dpyds' => $this->input->post('dpyds'),
                'dpydg' => $this->input->post('dpydg'),
                'ket_pembukaan' => $this->input->post('ket_pembukaan'),
                'hpyds' => $this->input->post('hpyds'),
                'hpydg' => $this->input->post('hpydg'),
                'ket_harga' => $this->input->post('ket_harga'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_pascakualifikasi_3', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    function save_pasca_3_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket')
        ];
        $data = [
            'sp_pasca3' => $this->input->post('sp_pasca3'),
            'rdkh_pasca3' => $this->input->post('rdkh_pasca3'),
            'dkh_pasca3' => $this->input->post('dkh_pasca3'),
            'hps_pasca3_1' => $this->input->post('hps_pasca3_1'),
            'ket_pasca3_1' => $this->input->post('ket_pasca3_1')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    function save_pasca_3_vendor2()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket3_2')
        ];

        $data = [
            'hps_pasca3_2' => $this->input->post('hps_pasca3_2'),
            'nhp_pasca3' => $this->input->post('nhp_pasca3'),
            'peringkat_pasca3' => $this->input->post('peringkat_pasca3'),
            'ket_pasca3_2' => $this->input->post('ket_pasca3_2')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function hasil_ba_pasca_3($id_paket)
    {
        $paket['data_ba_pasca3'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_3 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pasca/hasil_3', $paket);
    }



    // END BA PASCA 3

    // PASCA 4

    function save_pasca_4_vendor()
    {
        $where = [
            'id_mengikuti_paket' => $this->input->post('id_mengikuti_paket4')
        ];
        $data = [
            'hps_pasca4' => $this->input->post('hps_pasca4'),
            'nhp_pasca4' => $this->input->post('nhp_pasca4'),
            'peringkat_pasca4' => $this->input->post('peringkat_pasca4'),
            'ket_pasca4' => $this->input->post('ket_pasca4')
        ];
        $this->Evaluasi_model->update_vendor_mengikuti_paket($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function save_ba_pasca4($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_4 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'sts_perlu' => $this->input->post('sts_perlu'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_pascakualifikasi_4', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'sts_perlu' => $this->input->post('sts_perlu'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_pascakualifikasi_4', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hasil_ba_pasca_4($id_paket)
    {
        $paket['data_ba_pasca4'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_3 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pasca/hasil_4', $paket);
    }
    // END BA PASCA 4

    // BA PASCA 5

    public function save_ba_pasca5($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_5 WHERE id_paket = $id_paket")->row_array();
        $sess_pegawai = $this->session->userdata('id_pegawai');
        if ($query) {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->where('id_paket', $id_paket);
            $this->db->update('tbl_ba_pascakualifikasi_5', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'nomor' => $this->input->post('nomor'),
                'tanggal' => $this->input->post('tanggal'),
                'hari_terbilang' => $this->input->post('hari_terbilang'),
                'tgl_terbilang' => $this->input->post('tgl_terbilang'),
                'bulan_terbilang' => $this->input->post('bulan_terbilang'),
                'tahun_terbilang' => $this->input->post('tahun_terbilang'),
                'tgl' => $this->input->post('tgl'),
                'id_paket' => $id_paket,
                'id_pegawai' =>  $sess_pegawai
            ];
            $this->db->insert('tbl_ba_pascakualifikasi_5', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }
    public function hasil_ba_pasca_5($id_paket)
    {
        $paket['data2'] = $this->Chat_model->getDataById($id_paket);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $paket['jadwal_tahap1'] = $this->Rolepanitia_model->get_all_detail_jadwal_row($id_kualifikasi, $id_paket);
        $paket['jumlah_peserta'] = $this->Rolepanitia_model->hitung_peserta($id_paket);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['angga'] = $this->Paket_model->getByid($id_paket);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['cek_waktu1'] = $this->Rolepanitia_model->cek_waktu($id_paket, $id_kualifikasi);

        $paket['cek_waktu2'] = $this->Rolepanitia_model->cek_waktu2($id_paket, $id_kualifikasi);

        // dokumen persyaratan tambahan
        $paket['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);
        $paket['peserta_tender'] = $this->Rolepanitia_model->peserta_tender($id_paket);


        //berita acara
        $paket['get_berita_acara_penawaran'] = $this->Rolepanitia_model->get_berita_acara_penawaran($id_paket);
        $paket['get_berita_acara_tender'] = $this->Rolepanitia_model->get_berita_acara_tender($id_paket);
        $paket['get_berita_acara_peringkat'] = $this->Rolepanitia_model->get_berita_acara_peringkat($id_paket);
        $paket['get_berita_acara_lainnya'] = $this->Rolepanitia_model->get_berita_acara_lainnya($id_paket);

        //tahap tahap
        $paket['get_tahap'] = $this->Rolepanitia_model->get_tahap_dokumen1($id_paket, $id_kualifikasi);
        $paket['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        //berita
        $paket['get_tahap2'] = $this->Rolepanitia_model->get_tahap_berita($id_paket, $id_kualifikasi);

        //ambil dokumen persyaratan tambahan yang dari vendor
        $paket['get_dokumen_vendor_persyaratan_tambahan'] = $this->Rolepanitia_model->get_dokumen_persyaratan_vendor($id_paket);

        $paket['vendor_mengikuti_paket'] = $this->Rolepanitia_model->get_vendor_mengikuti_paket($id_paket);
        $paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $paket['ambil_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender($id_paket);

        $paket['row_panitia'] = $this->Rolepanitia_model->ambil_panitia_tender_row($id_paket);
        // var_dump($paket['get_tahap']);
        // die;
        $paket['chat_penjelasan'] = $this->Rolepanitia_model->ambil_semua_chat($id_paket);

        $paket['evaluasi'] = $this->Rolepanitia_model->ambil_semua_evaluasi($id_paket);

        $paket['sanggahan'] = $this->Rolepanitia_model->ambil_sanggahan($id_paket);

        $paket['jenis_kontrak'] = $this->Rolepanitia_model->ambil_jenis_kontrak($id_paket);

        $paket['lokasi_pekerjaan'] = $this->Rolepanitia_model->ambil_lokasi_kerja($id_paket);

        $paket['sumber_dana'] = $this->Rolepanitia_model->ambil_sumber_dana($id_paket);
        $paket['data_ba_5'] = $this->db->query("SELECT * FROM tbl_ba_pascakualifikasi_5 WHERE id_paket = $id_paket")->row_array();
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $this->load->view('ba_tender/pasca/hasil_5', $paket);
    }
    // END BA PASCA 5


    // upload dokumen prakualifikasi dan pascakualifikasi
    public function get_paket($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tbl_paket WHERE id_paket = $id_paket")->row();
        echo json_encode($query);
    }


    public function add_dokumen_prakualifikasi()
    {
        $no_ba = $this->input->post('no_ba');
        $id_paket =  $this->input->post('id_paket');

        if ($no_ba == 1) {
            $config['upload_path'] = './file_berita_acara/ba_prakualifikasi/pra1/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pra')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pra1' => $fileData['file_name'],
                    'ba_pra1_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 2) {
            $config['upload_path'] = './file_berita_acara/ba_prakualifikasi/pra2/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pra')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pra2' => $fileData['file_name'],
                    'ba_pra2_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 3) {
            $config['upload_path'] = './file_berita_acara/ba_prakualifikasi/pra3/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pra')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pra3' => $fileData['file_name'],
                    'ba_pra3_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 4) {
            $config['upload_path'] = './file_berita_acara/ba_prakualifikasi/pra4/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pra')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pra4' => $fileData['file_name'],
                    'ba_pra4_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 5) {
            $config['upload_path'] = './file_berita_acara/ba_prakualifikasi/pra5/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pra')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pra5' => $fileData['file_name'],
                    'ba_pra5_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        }
    }


    public function add_dokumen_pascakualifikasi()
    {
        $no_ba = $this->input->post('no_ba');
        $id_paket =  $this->input->post('id_paket');

        if ($no_ba == 1) {
            $config['upload_path'] = './file_berita_acara/ba_pascakualifikasi/pasca1/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pasca')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pasca1' => $fileData['file_name'],
                    'ba_pasca1_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 2) {
            $config['upload_path'] = './file_berita_acara/ba_pascakualifikasi/pasca2/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pasca')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pasca2' => $fileData['file_name'],
                    'ba_pasca2_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 3) {
            $config['upload_path'] = './file_berita_acara/ba_pascakualifikasi/pasca3/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pasca')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pasca3' => $fileData['file_name'],
                    'ba_pasca3_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 4) {
            $config['upload_path'] = './file_berita_acara/ba_pascakualifikasi/pasca4/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pasca')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pasca4' => $fileData['file_name'],
                    'ba_pasca4_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        } else if ($no_ba == 5) {
            $config['upload_path'] = './file_berita_acara/ba_pascakualifikasi/pasca5/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('ba_pasca')) {

                $fileData = $this->upload->data();

                $upload = [
                    'ba_pasca5' => $fileData['file_name'],
                    'ba_pasca5_date' => date('Y-m-d')
                ];
                $this->Rolepanitia_model->upload_ba_prakualifikasi($upload, $id_paket);
                $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            }
        }
    }

    // end upload dokumen prakualifikasi dan pascakualifikasi
    public function reverseauctiontender_binding($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $data['get_tahap'] = $this->Rolepanitia_model->get_tahap_penjelasan($id_paket, $id_kualifikasi);
        $data['tahap_dokumen_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // seleksi umum tahap
        $data['get_tahap_penjelasan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);

        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/reverse_auction_binding', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_reverse_auction', $data);
    }

    public function reverseauctiontender($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $data['get_tahap'] = $this->Rolepanitia_model->get_tahap_penjelasan($id_paket, $id_kualifikasi);
        $data['tahap_dokumen_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // seleksi umum tahap
        $data['get_tahap_penjelasan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);

        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/reverse', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/chat_ajax_auction');
    }

    public function chat_auction_detail()
    {
        $id_paket =  $this->uri->segment(4);
        $id_vendor =  $this->uri->segment(5);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $data['get_tahap'] = $this->Rolepanitia_model->get_tahap_penjelasan($id_paket, $id_kualifikasi);
        $data['tahap_dokumen_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['data2'] = $this->Chat_model->getDataById($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['ambil_paket']  = $this->Chat_model->get_byid_panitia($id_paket, $id_pegawai);
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        // seleksi umum tahap
        $data['get_tahap_penjelasan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_penjelasan_prakualifikasi($id_paket, $id_kualifikasi);

        // NEW TAHAP UNTUK PRAKUALIFKASI 1 FILE
        $data['get_tahap_prakualfiikasi_satu_file_penetapan'] = $this->Rolepanitia_model->get_tahap_prakualfiikasi_satu_file_penetapan($id_paket, $id_kualifikasi);
        $data['vendor'] = $this->Chat_model->GetRowVendorAuction($id_vendor, $id_paket);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/chat_auction_menu', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/chat_ajax_auction', $data);
    }

    public function kirim_pesanya_auction()
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $id_paket = $this->input->post('id_paket');
        $tahap_binding_chat = $this->input->post('tahap_binding_chat');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlss|docx';
        $config['max_size'] = 204800;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {
            $fileData = $this->upload->data();
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_paket' => $id_paket,
                'id_penerima' => $id_penerima,
                'tahap_binding' => $tahap_binding_chat,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->Chat_model->tambah_chat_auction($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {
            $fileData2 = $this->upload->data();
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_paket' => $id_paket,
                'id_penerima' => $id_penerima,
                'tahap_binding' => $tahap_binding_chat,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->Chat_model->tambah_chat_auction($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_paket' => $id_paket,
                'id_penerima' => $id_penerima,
                'tahap_binding' => $tahap_binding_chat,
            ];
            $this->Chat_model->tambah_chat_auction($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }


    // CHAT AUCTION

    public function GetAllVendorAuction($id_paket)
    {
        $get_vendor = $this->Chat_model->GetAllVendorAuction($id_paket);
        $output = [
            "vendor" => $get_vendor,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function ngeload_chatnya_auction($id_paket)
    {

        $row_paket = $this->Chat_model->row_paket($id_paket);
        $id_pegawai = $this->input->post('id_pengirim');
        $id_vendor = $this->input->post('id_penerima');
        $tahap_binding = $row_paket['tahap_binding'];
        $data = $this->Chat_model->getPesanAuction($id_pegawai, $id_vendor, $id_paket, $tahap_binding);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function replaychat_auction()
    {

        $pengirim = $this->input->post('id_pengirim');
        $isi = $this->input->post('isi');
        $username = $this->input->post('username');
        $data = [
            'pengirim_replay' => $pengirim,
            'isi_replay' => $isi,
            'username_replay' => $username
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function simpan_harga_penawaran_binding()
    {
        $id_vendor = $this->input->post('id_vendor');
        $id_paket = $this->input->post('id_paket');
        $tahap_binding = $this->input->post('tahap_binding');
        $penawaran_binding = $this->input->post('penawaran_binding');
        $where = [
            'id_mengikuti_vendor' => $id_vendor,
            'id_mengikuti_paket_vendor' => $id_paket
        ];
        if ($tahap_binding == 1) {
            $data = [
                'harga_penawaran_binding_1' => $penawaran_binding,
            ];
        } else if ($tahap_binding == 2) {
            $data = [
                'harga_penawaran_binding_2' => $penawaran_binding,
            ];
        } else {
            $data = [
                'harga_penawaran_binding_3' => $penawaran_binding,
            ];
        }
        $this->Chat_model->update_binding_vendor($where, $data);
        $response = [
            'success' => 'berhasil'
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function next_tahap_binding()
    {
        $id_paket = $this->input->post('id_paket');
        $tahap_binding_next = $this->input->post('tahap_binding_next');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'tahap_binding' => $tahap_binding_next,
            'start_time_binding' => date('d-m-Y H:i'),
        ];
        $this->Chat_model->update_paket($where, $data);
        $response = [
            'success' => 'berhasil'
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }



    // INI BAGIAN EVALUASI TENDER
    public function penetapan_pemenang_auction($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['vendor'] = $this->Rolepanitia_model->get_vendor($id_paket);
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket2 = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $paket2['id_kualifikasi'];
        $data['get_tahap_dokumen_sangahan_prakualifikasi'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_prakualifikasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_negosiasi'] = $this->Rolepanitia_model->get_tahap_dokumen_negosiasi($id_paket, $id_kualifikasi);
        $data['get_tahap_dokumen_sangahan_akhir'] = $this->Rolepanitia_model->get_tahap_dokumen_sangahan_akhir($id_paket, $id_kualifikasi);
        $data['evaluasi_penawaran_satu_file_prakualfikasi'] = $this->Rolepanitia_model->evaluasi_penawaran_satu_file_prakualfikasi($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/beranda/penetapan_pemenang_auction', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/beranda/ajax_penetapan_pemenang_auction');
    }


    public function tbl_penetapan_pemenang_auction($id_paket)
    {
        $ambil_id_vendor_dan_paket = $this->Rolepanitia_model->get_vendor_by_id_dapet_id($id_paket);
        $id_mengikuti_paket_vendor = $ambil_id_vendor_dan_paket['id_mengikuti_paket_vendor'];
        $resultss = $this->Evaluasi_model->getdatatable_evaluasi_tender_auction($id_mengikuti_paket_vendor);
        $get_vendor3 = $this->Chat_model->ambil_vendor3($id_paket);
        $priceprod3 = array();
        foreach ($get_vendor3 as $g => $value) {
            $priceprod3[$g] = $value->harga_penawaran_binding_3;
        }
        $min_binding_3 = min($priceprod3);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<b>' . $angga->username_vendor . '</b>';
            if ($angga->harga_penawaran_binding_3 == $min_binding_3) {
                $row[] = "Rp " . number_format($angga->harga_penawaran_binding_3, 2, ',', '.') . ' <i style="font-size:20px" class="fa fa-flag-checkered" aria-hidden="true"></i>';
            } else {
                $row[] = "Rp " . number_format($angga->harga_penawaran_binding_3, 2, ',', '.');
            }

            if ($angga->harga_penawaran_binding_3 == $min_binding_3) {
                $row[] = '<a href="javascript:;" class="badge badge-success">Pemenang</a>';
            } else {
                $row[] = '<a href="javascript:;" class="badge badge-danger">Gugur</a>';
            }
            if ($angga->pemenang_tender == 1 && $angga->id_mengikuti_paket_vendor == $id_paket) {
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:;" onClick="byid_batal_1evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','batal_menangakan'" . ')"> Batalkan Pemenang  <span class="text-warning"><i class="fa fa-star"></i></span></a>';
            } else {
                $row[] = '<button class="btn btn-sm btn-danger" href="javascript:;" onClick="byid_evaluasi_tender_ku(' . "'" . $angga->id_mengikuti_paket . "','menangakan'" . ')"> Pilih Sebagai Pemenang <span class="text-warning"><i class="fa fa-star"></i></span></button>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Evaluasi_model->count_all_data_evaluasi_tender_auction($id_paket),
            "recordsFiltered" => $this->Evaluasi_model->count_filtered_data_evaluasi_tender_auction($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    // 8 september
    public function upload_ba_negosiasi_auction()
    {
        $id_paket = $this->input->post('id_paket');
        $config['upload_path'] = './file_undangan_penawaran/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ba_negosiasi_auction')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'ba_negosiasi_auction' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->upload_undangan_penawaran($upload, $id_paket);
            $this->session->set_flashdata('berita_acara_negosiasi', '<div class="alert alert-success alert-dismissible">Berita Acara Negosiasi Berhasil Diupload
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('panitiajmtm/beranda/informasitender/' . $id_paket);
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function ngeload_chatnya_auction_binding_1($id_paket)
    {
        $id_pegawai = $this->input->post('id_pengirim');
        $id_vendor = $this->input->post('id_penerima');
        $tahap_binding = 1;
        $data = $this->Chat_model->getPesanAuction($id_pegawai, $id_vendor, $id_paket, $tahap_binding);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function ngeload_chatnya_auction_binding_2($id_paket)
    {
        $id_pegawai = $this->input->post('id_pengirim');
        $id_vendor = $this->input->post('id_penerima');
        $tahap_binding = 2;
        $data = $this->Chat_model->getPesanAuction($id_pegawai, $id_vendor, $id_paket, $tahap_binding);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function ngeload_chatnya_auction_binding_3($id_paket)
    {
        $id_pegawai = $this->input->post('id_pengirim');
        $id_vendor = $this->input->post('id_penerima');
        $tahap_binding = 3;
        $data = $this->Chat_model->getPesanAuction($id_pegawai, $id_vendor, $id_paket, $tahap_binding);
        echo json_encode(array(
            'data' => $data
        ));
    }

    // public function GetAllVendor_pesan_baru($id_paket)
    // {
    //     $get_vendor = $this->Chat_model->GetAllVendor_pesan_baru($id_paket);
    //     $output = [
    //         "vendor" => $get_vendor,
    //     ];
    //     $this->output->set_content_type('application/json')->set_output(json_encode($output));
    // }


    // public function ngeload_chatnya($id_paket)
    // {
    //     $data = $this->Chat_model->getPesan($id_paket);
    //     echo json_encode(array(
    //         'data' => $data
    //     ));
    // }

    // public function kirim_pesanya($id_paket)
    // {
    //     $isi = $this->input->post('isi');
    //     $id_pengirim = $this->input->post('id_pengirim');
    //     $id_penerima = $this->input->post('id_penerima');
    //     $id_paket = $this->input->post('id_paket');
    //     $config['upload_path'] = './file_chat/';
    //     $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
    //     $config['max_size'] = 204800;

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('dokumen_chat')) {

    //         $fileData = $this->upload->data();

    //         $upload = [
    //             'id_pengirim' => $id_pengirim,
    //             'isi' => $isi,
    //             'id_penerima' => $id_penerima,
    //             'id_paket' => $id_paket,
    //             'dokumen_chat' => $fileData['file_name'],
    //         ];
    //         $this->Chat_model->tambah_chat($upload);
    //         $log = array('status' => true);
    //         echo json_encode($log);
    //         return true;
    //     } else if ($this->upload->do_upload('img_chat')) {

    //         $fileData2 = $this->upload->data();

    //         $upload = [
    //             'id_pengirim' => $id_pengirim,
    //             'isi' => $isi,
    //             'id_penerima' => $id_penerima,
    //             'id_paket' => $id_paket,
    //             'img_chat' => $fileData2['file_name'],
    //         ];
    //         $this->Chat_model->tambah_chat($upload);
    //         $log = array('status' => true);
    //         echo json_encode($log);
    //         return true;
    //     } else {
    //         $upload = [
    //             'id_pengirim' => $id_pengirim,
    //             'isi' => $isi,
    //             'id_penerima' => $id_penerima,
    //             'id_paket' => $id_paket,
    //         ];
    //         $this->Chat_model->tambah_chat($upload);
    //         $log = array('status' => true);
    //         echo json_encode($log);
    //         return true;
    //     }
    // }

}
