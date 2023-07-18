<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
// error_reporting(0);
class Daftarpaket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->library(['form_validation']);
        $this->load->model('Panitia/Rolepanitia_model', 'Rolepanitia_model');
        $this->load->model('Panitia/Non_tender_model', 'Non_tender_model');
        $this->load->model('Rup/Rup_model');
        $this->load->model('Paket/Paket_model');
        $this->load->model('Kualifikasi/Kualifikasi_model');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('Panitia/Panitia_model');
        $this->load->model('Chat_negosiasi/Chat_negosiasi_model');
        $role = $this->session->userdata('id_role');
        if (!$role) {
            redirect('auth');
        } else {
        }
    }

    public function index()
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['status_penunjukan_langsung_panitia'] = $this->Rolepanitia_model->cek_role_penunjukan_langsung($id_pegawai);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/daftarpaket/index', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax');
    }

    //get data Panitia serverside
    public function get_panitia()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;
            if ($panitia->status_paket_tender == 1) {
                $row[] = '<label class="badge badge-primary"> Draft </label>';
            } else if ($panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 12 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 9 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 14) {
                $row[] = '<label class="badge badge-primary"> Pascakualifikasi </label>';
            } else {
                $row[] = '<label class="badge badge-warning"> Prakualifikasi </label>';
            }
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
            } else {
                $row[] = $panitia->tanggal_buat_paket_tender;
            }
            $row[] = $panitia->nama_unit_kerja;
            if ($panitia->selesai_semua_tender == null) {
                if ($panitia->status_paket_tender == 0) {
                    $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                } else {
                    if ($panitia->status_paket_tender  == 2) {
                        $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                    }
                    if ($panitia->status_paket_tender  == 1) {
                        $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                    }
                }
            } else {
                if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else {
                    $row[] = '<button disabled class="btn btn-info btn-sm"><i class="fas fa-time"></i> Tender Telah Selesai</button>';
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

    public function get_panitia2()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable2($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;
            if ($panitia->status_paket_tender == 1) {
                $row[] = '<label class="badge badge-primary"> Draft </label>';
            } else if ($panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 12 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 9 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 14) {
                $row[] = '<label class="badge badge-primary"> Pascakualifikasi </label>';
            } else {
                $row[] = '<label class="badge badge-warning"> Prakualifikasi </label>';
            }
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
            } else {
                $row[] = $panitia->tanggal_buat_paket_tender;
            }
            $row[] = $panitia->nama_unit_kerja;
            if ($panitia->selesai_semua_tender == null) {
                if ($panitia->status_paket_tender == 0) {
                    $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                } else {
                    if ($panitia->status_paket_tender  == 2) {
                        $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                    }
                    if ($panitia->status_paket_tender  == 1) {
                        $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                    }
                }
            } else {
                if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else {
                    $row[] = '<button disabled class="btn btn-info btn-sm"><i class="fas fa-time"></i> Tender Telah Selesai</button>';
                }
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data2(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data2($role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_panitia3()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable3($role);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            $row[] = $panitia->nama_paket;
            $row[] = $panitia->nama_jenis_pengadaan;
            $row[] = $panitia->nama_metode_pemilihan;
            if ($panitia->status_paket_tender == 1) {
                $row[] = '<label class="badge badge-primary"> Draft </label>';
            } else if ($panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 12 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 9 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 14 || $panitia->status_paket_tender == 2 && $panitia->id_kualifikasi == 21) {
                $row[] = '<label class="badge badge-primary"> Pascakualifikasi </label>';
            } else {
                $row[] = '<label class="badge badge-warning"> Prakualifikasi </label>';
            }
            if ($panitia->status_paket_tender == 0) {
                $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
            } else {
                $row[] = $panitia->tanggal_buat_paket_tender;
            }
            $row[] = $panitia->nama_unit_kerja;
            if ($panitia->selesai_semua_tender == null) {
                if ($panitia->status_paket_tender == 0) {
                    $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                } else {
                    if ($panitia->status_paket_tender  == 2) {
                        $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                    }
                    if ($panitia->status_paket_tender  == 1) {
                        $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                    }
                }
            } else {
                if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else if (date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender)) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($panitia->selesai_semua_tender))  == date('Y-m-d H:i')) {
                    if ($panitia->status_paket_tender == 0) {
                        $row[] = '<label class="badge badge-warning"> Paket Belum Di Buat </label>';
                    } else {
                        if ($panitia->status_paket_tender  == 2) {
                            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i> Detail Paket Tender</a>';
                        }
                        if ($panitia->status_paket_tender  == 1) {
                            $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','buatpaket'" . ')"><i class="fas fa-edit"></i>Buat Paket</a>';
                        }
                    }
                } else {
                    $row[] = '<button disabled class="btn btn-info btn-sm"><i class="fas fa-time"></i> Tender Telah Selesai</button>';
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

    // GET PAKET BERANDA PNITIA JMTM
    //get data Panitia serverside
    public function get_panitia_beranda()
    {
        $role = $this->session->userdata('id_pegawai');
        $result = $this->Rolepanitia_model->getdatatable($role);
        $paket = $this->Rolepanitia_model->getById_GET();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $panitia) {
            $row = array();
            $row[] = ++$no;
            $row[] = $panitia->kode_tender;
            $row[] = $panitia->nama_paket;
            if ($paket['status_paket_tender'] == 1) {
                $row[] = '<label class="badge badge-primary"> Draft </label>';
            }
            if ($paket['status_paket_tender'] == 2 && $paket['id_kualifikasi'] == 3) {
                $row[] = '<label class="badge badge-primary">Pengumuman Pascakualifikasi</label>';
            }
            if ($paket['status_paket_tender'] == 2 && $paket['id_kualifikasi'] == 2) {
                $row[] = '<label class="badge badge-primary">Pengumuman Prakualifikasi</label>';
            }
            $row[] = '5 peserta';
            $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $panitia->id_paket . "','lihat_tender'" . ')"><i class="fas fa-edit"></i> Lihat Tender</a>';
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



    public function get_by_id($id_pegawai)
    {
        $get_pegawai = $this->Rolepanitia_model->getById($id_pegawai);
        $output = [
            "get_pegawai" => $get_pegawai
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function tender($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $paket['get_pdf_dokumen_kualifikasi_lelang'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi_lelang($id_paket);
        $paket['get_pdf_dokumen_kualifikasi'] = $this->Rolepanitia_model->get_pdf_dokumen_kualifikasi($id_paket);
        $paket['dokumen_pemilihan'] = $this->Rolepanitia_model->getDokumenRencana($id_paket);
        $paket['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $paket['id_role_panitia'] = $this->Rolepanitia_model->getById_GET_role_panitia($id_paket);
        $paket['total_hps'] = $this->Rup_model->totalhps($id_paket);
        $paket['cek_jadwal'] = $this->Rolepanitia_model->cek_jadwal($id_paket);
        $paket['cek_jadwal2'] = $this->Rolepanitia_model->cek_jadwal2();
        $paket['rancangan_kontrak'] = $this->Rolepanitia_model->rancangan_kontrak($id_paket);
        $paket['status_persetujuan'] = $this->Rolepanitia_model->getstatus_persetujuan($id_paket);
        $paket['cek_status_persetjuan2'] = $this->Rolepanitia_model->cek_status_ada($id_paket);
        $paket['cek_status_persetjuan'] = $this->Rolepanitia_model->cek_status();
        $paket['jenis_kontrak'] = $this->Rolepanitia_model->get_jenis_kontrak($id_paket);
        $id_kualifikasi = $this->Rolepanitia_model->get_id_kualifikasi($id_paket);
        $paket['id_kualifikasi'] = $this->Rolepanitia_model->get_jadwal_kualifikasi($id_kualifikasi['id_kualifikasi']);
        $paket['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $paket['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $paket['total_rincian_hps'] = $this->Paket_model->get_by_rincian_hps_sudah_dibuat($id_paket);
        $data['vendor_terpilih'] = $this->Paket_model->vendor_terpilih($id_paket);
        $data['result_data_jadwal_detail'] = $this->Paket_model->result_data_jadwal_detail_penunjukan_langsung($id_paket);
        $data['total_rincian_hps_pdf'] = $this->Paket_model->get_by_rincian_hps_pdf_result($id_paket);
        $data['total_hps_pdf_ada'] = $this->Paket_model->get_by_rincian_hps_pdf_sudah_dibuat($id_paket);
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['total_hps']  = $this->Paket_model->totalhps($id_paket);
        $data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
        $data['sbu'] = $this->Paket_model->get_sbu();
        $paket['cek_pakta_integritas'] = $this->Rolepanitia_model->status_pakta_integritas($id_paket);

   	// desember 2022
        $paket['sum_rincian_hps'] = $this->Paket_model->sum_rincian_hps($id_paket);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/daftarpaket/tender', $paket);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax', $paket);
    }

    public function rincianhps($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['pdf_rincian_hps']  = $this->Rolepanitia_model->get_by_rincian_hps_pdf($id_paket);
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['total_hps']  = $this->Paket_model->totalhps($id_paket);
        $data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
        $data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
        $data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
        $data['angga'] = $this->Paket_model->getByid($id_paket);
        $this->load->view('template_panitia/header', $data);
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/daftarpaket/rincianhps', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax');
    }

    public function update_nib($id_paket)
    {
        $nib_terselek = $this->input->post('nib_terselek');

        $data = [
            'id_paket' => $id_paket,
            'nomor_nib_undangan' => $nib_terselek
        ];
        $this->db->insert('tbl_nib_undangan', $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function delete_nib($id_nib_undangan)
    {
        $where = [
            'id_nib_undangan' => $id_nib_undangan
        ];
        $this->db->delete('tbl_nib_undangan', $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_kualifikasi($id_paket)
    {
        $update_kualifikasi = $this->input->post('id_kualifikasi_usaha_terselek');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'kualifikasi_usaha' => $update_kualifikasi
        ];
        $this->Rolepanitia_model->update_kategori_penyedia($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_audit($id_paket)
    {
        $keteranagan = $this->input->post('tahun_audit_terselek');
        // var_dump($keteranagan);
        // die;
        $where = [
            'nama_persyaratan' => "Audit",
            'id_paket' => $id_paket
        ];
        $data = [
            'keterangan' => $keteranagan
        ];
        $this->Rolepanitia_model->update_persyaratan_tender_audit($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function update_bobot_teknis($id_paket)
    {
        $update_teknis = $this->input->post('bobot_teknis_form_new');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'bobot_teknis' => $update_teknis
        ];
        $this->Rolepanitia_model->update_kategori_penyedia($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_bobot_biaya($id_paket)
    {
        $update_biaya = $this->input->post('bobot_biaya_form_new');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'bobot_biaya' => $update_biaya
        ];
        $this->Rolepanitia_model->update_kategori_penyedia($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_kategoti_penyedia_penunjukan($id_paket)
    {
        $kategori_penyedia = $this->input->post('kategori_penyedia_terselek');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'kategori_penyedia_penunjukan_langsung' => $kategori_penyedia
        ];
        $this->Rolepanitia_model->update_kategori_penyedia($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function update_alasan_penunjukan_langsung($id_paket)
    {
        $alasan_penunjukan_langsung = $this->input->post('alasan_penunjukan_langsung_save');
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'alasan_penunjukan_langsung' => $alasan_penunjukan_langsung
        ];
        $this->Rolepanitia_model->update_kategori_penyedia($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function dataKualifikasi($id_kualifikasi)
    {
        $data = $this->Kualifikasi_model->getKualifikasi($id_kualifikasi);
        echo '<option class="d-none" value="' . $data['id_kualifikasi'] . '">' . $data['nama_kualifikasi'] . '</option>';
    }

    public function jenispengadaan($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['paket2'] = $this->Rolepanitia_model->getById($id_paket);
        $data['pemilihan'] = $this->Rolepanitia_model->get_metode_pemilihan();
        $data['get_pengadaan'] = $this->Rolepanitia_model->get_jenis_pengadaan();
        $data['kualifikasi'] = $this->Rolepanitia_model->get_kualifikasi();
        $data['metode_dokumen'] = $this->Rolepanitia_model->get_metode_dokumen();
        $data['metode_evaluasi'] = $this->Rolepanitia_model->get_metode_evaluasi();
        $data['seleksi_terbatas'] = $this->Rolepanitia_model->get_seleksi_terbatas();
        $data['tender_terbatas'] = $this->Rolepanitia_model->get_tender_terbatas();
        $this->load->view('template_panitia/header', $data);
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/daftarpaket/jenispengadaan', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax');
    }

    public function updatejenispengadaan()
    {
        $id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan');
        $id_metode_pemilihan = $this->input->post('id_metode_pemilihan');
        $id_kualifikasi = $this->input->post('id_kualifikasi');
        $id_metode_dokumen = $this->input->post('id_metode_dokumen');
        $id_metode_evaluasi = $this->input->post('id_metode_evaluasi');
        $id_paket = $this->input->post('id_paket');


        $data = [
            'id_paket' => $id_paket
        ];
        $data2 = [
            'id_paket' => $id_paket,
            'id_jenis_pengadaan' => $id_jenis_pengadaan,
            'id_metode_pemilihan' => $id_metode_pemilihan,
            'id_kualifikasi' => $id_kualifikasi,
            'id_metode_dokumen' => $id_metode_dokumen,
            'id_metode_evaluasi' => $id_metode_evaluasi
        ];
        // var_dump($data, $data2);
        // die;
        $tanggal_sekarang = date('Y-m-d');
        $this->Rolepanitia_model->updatejenis_pengadaan2(array('id_paket' => $this->input->post('id_paket')), $data2, $id_kualifikasi);
        $this->Rolepanitia_model->updatejenis_pengadaan($id_paket, $data, $id_kualifikasi, $tanggal_sekarang);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jenispengadaan/' . $this->input->post('id_paket'));
    }

    public function jadwaltender($id_paket)
    {
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $data['paket2'] = $this->Rolepanitia_model->getById($id_paket);
        $ambil_kualifikasi = $this->Rolepanitia_model->getById($id_paket);
        $id_kualifikasi = $ambil_kualifikasi['id_kualifikasi'];
        $data['id_role_panitia'] = $this->Rolepanitia_model->getById_GET_role_panitia2($id_paket);
        $data['jadwal_prakualifikasi'] = $this->Rolepanitia_model->get_prakualifikasi($id_paket, $id_kualifikasi);
        $data['jadwal_pascakualifikasi'] = $this->Rolepanitia_model->get_pascakualifikasi($id_paket, $id_kualifikasi);
        $this->load->view('template_panitia/header', $data);
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/daftarpaket/jadwaltender', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax');
        $this->load->view('panitia_view/daftarpaket/ajax_jadwal');
    }

    public function simpanjadwal($id_paket)
    {
        $id_jadwal_tender = $this->input->post('id_jadwal_tender[]');
        $tanggal_mulai_jadwal = $this->input->post('tanggal_mulai_jadwal[]');
        $tanggal_selesai_jadwal = $this->input->post('tanggal_selesai_jadwal[]');
        // $time_mulai = $this->input->post('time_mulai[]');
        // $time_selesai = $this->input->post('time_selesai[]');
        $id_kualifikasi = $this->input->post('id_kualifikasi');
        $jadwal1 = $tanggal_mulai_jadwal[1];
        $jadwal2 = $tanggal_selesai_jadwal[1];
        $jadwal3 = $tanggal_mulai_jadwal[2];
        $jadwal4 = $tanggal_selesai_jadwal[2];
        $jadwal5 = $tanggal_mulai_jadwal[3];
        $jadwal6 = $tanggal_selesai_jadwal[3];
        $jadwal7 = $tanggal_mulai_jadwal[4];
        $jadwal8 = $tanggal_selesai_jadwal[4];
        $jadwal9 = $tanggal_mulai_jadwal[5];
        $jadwal10 = $tanggal_selesai_jadwal[5];
        $jadwal11 = $tanggal_mulai_jadwal[6];
        $jadwal12 = $tanggal_selesai_jadwal[6];
        $jadwal13 = $tanggal_mulai_jadwal[7];
        $jadwal14 = $tanggal_selesai_jadwal[7];
        $jadwal15 = $tanggal_mulai_jadwal[8];
        $jadwal16 = $tanggal_selesai_jadwal[8];
        $jadwal17 = $tanggal_mulai_jadwal[9];
        $jadwal18 = $tanggal_selesai_jadwal[9];
        $jadwal19 = $tanggal_mulai_jadwal[10];
        $jadwal20 = $tanggal_selesai_jadwal[10];
        $jadwal21 = $tanggal_mulai_jadwal[11];
        $jadwal22 = $tanggal_selesai_jadwal[11];
        $jadwal23 = $tanggal_mulai_jadwal[12];
        $jadwal24 = $tanggal_selesai_jadwal[12];
        $jadwal25 = $tanggal_mulai_jadwal[13];
        $jadwal26 = $tanggal_selesai_jadwal[13];
        $jadwal27 = $tanggal_mulai_jadwal[14];
        $jadwal28 = $tanggal_selesai_jadwal[14];
        $jadwal29 = $tanggal_mulai_jadwal[15];
        $jadwal30 = $tanggal_selesai_jadwal[15];


        //row pertama
        if (date('Y-m-d H:i', strtotime($jadwal1)) > date('Y-m-d H:i', strtotime($jadwal2))) {
            $this->session->set_flashdata('jadwal_salah1', '<label id="validasi_c1" class="text-danger"></label>');
        } else {
            $where = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[1]
            ];
            $data = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[1],
                // 'jam_mulai' => $time_mulai[1],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[1],
                // 'jam_selesai' => $time_selesai[1],
            ];
            $data99 = [
                'batas_pendaftaran' => $tanggal_selesai_jadwal[1],
            ];
            $this->Rolepanitia_model->update_jadwal($data, $where);
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
        }

        //row kedua
        if (date('Y-m-d H:i', strtotime($jadwal3)) > date('Y-m-d H:i', strtotime($jadwal4))) {
            $this->session->set_flashdata('jadwal_salah2', '<label id="validasi_c2" class="text-danger"></label>');
        } else {
            $where2 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[2]
            ];
            $data2 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[2],
                // 'jam_mulai' => $time_mulai[2],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[2],
                // 'jam_selesai' => $time_selesai[2],
            ];
            $this->Rolepanitia_model->update_jadwal($data2, $where2);
        }

        //row ketiga
        if (date('Y-m-d H:i', strtotime($jadwal5)) < date('Y-m-d H:i', strtotime($jadwal4)) || date('Y-m-d H:i', strtotime($jadwal5)) > date('Y-m-d H:i', strtotime($jadwal6))) {
            $this->session->set_flashdata('jadwal_salah3', '<label  id="validasi_c3" class="text-danger"></label>');
        } else {
            $where3 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[3]
            ];
            $data3 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[3],
                // 'jam_mulai' => $time_mulai[3],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[3],
                // 'jam_selesai' => $time_selesai[3],
            ];

            $this->Rolepanitia_model->update_jadwal($data3, $where3);
        }

        //row keempat
        if (date('Y-m-d H:i', strtotime($jadwal7)) < date('Y-m-d H:i', strtotime($jadwal6)) || date('Y-m-d H:i', strtotime($jadwal7)) > date('Y-m-d H:i', strtotime($jadwal8))) {
            $this->session->set_flashdata('jadwal_salah4', '<label  id="validasi_c4" class="text-danger"></label>');
        } else {
            $where4 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[4]
            ];
            $data4 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[4],
                // 'jam_mulai' => $time_mulai[4],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[4],
                // 'jam_selesai' => $time_selesai[4],
            ];

            $this->Rolepanitia_model->update_jadwal($data4, $where4);
        }

        //row kelima
        if (date('Y-m-d H:i', strtotime($jadwal9)) < date('Y-m-d H:i', strtotime($jadwal8)) || date('Y-m-d H:i', strtotime($jadwal9)) > date('Y-m-d H:i', strtotime($jadwal10))) {
            $this->session->set_flashdata('jadwal_salah5', '<label id="validasi_c5" class="text-danger"></label>');
        } else {
            $where5 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[5]
            ];
            $data5 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[5],
                // 'jam_mulai' => $time_mulai[5],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[5],
                // 'jam_selesai' => $time_selesai[5],
            ];

            $this->Rolepanitia_model->update_jadwal($data5, $where5);
        }

        //row keenam
        if (date('Y-m-d H:i', strtotime($jadwal11)) < date('Y-m-d H:i', strtotime($jadwal10)) || date('Y-m-d H:i', strtotime($jadwal11)) > date('Y-m-d H:i', strtotime($jadwal12))) {
            $this->session->set_flashdata('jadwal_salah6', '<label  id="validasi_c6" class="text-danger"></label>');
        } else {
            $where6 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[6]
            ];
            $data6 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[6],
                // 'jam_mulai' => $time_mulai[6],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[6],
                // 'jam_selesai' => $time_selesai[6],
            ];

            $this->Rolepanitia_model->update_jadwal($data6, $where6);
        }

        //row ketujuh
        if (date('Y-m-d H:i', strtotime($jadwal13)) < date('Y-m-d H:i', strtotime($jadwal12)) || date('Y-m-d H:i', strtotime($jadwal13)) > date('Y-m-d H:i', strtotime($jadwal14))) {
            $this->session->set_flashdata('jadwal_salah7', '<label  id="validasi_c7" class="text-danger"></label>');
        } else {
            $where7 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[7]
            ];
            $data7 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[7],
                // 'jam_mulai' => $time_mulai[7],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[7],
                // 'jam_selesai' => $time_selesai[7],
            ];

            $this->Rolepanitia_model->update_jadwal($data7, $where7);
        }

        //row kelapan
        if (date('Y-m-d H:i', strtotime($jadwal15)) < date('Y-m-d H:i', strtotime($jadwal14)) || date('Y-m-d H:i', strtotime($jadwal15)) > date('Y-m-d H:i', strtotime($jadwal16))) {
            $this->session->set_flashdata('jadwal_salah8', '<label  id="validasi_c8" class="text-danger"></label>');
        } else {
            $where8 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[8]
            ];
            $data8 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[8],
                // 'jam_mulai' => $time_mulai[8],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[8],
                // 'jam_selesai' => $time_selesai[8],
            ];

            $this->Rolepanitia_model->update_jadwal($data8, $where8);
        }

        //row sembilan
        if (date('Y-m-d H:i', strtotime($jadwal17)) < date('Y-m-d H:i', strtotime($jadwal16)) || date('Y-m-d H:i', strtotime($jadwal17)) > date('Y-m-d H:i', strtotime($jadwal18))) {
            $this->session->set_flashdata('jadwal_salah9', '<label  id="validasi_c9" class="text-danger"></label>');
        } else {
            $where9 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[9]
            ];
            $data9 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[9],
                // 'jam_mulai' => $time_mulai[9],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[9],
                // 'jam_selesai' => $time_selesai[9],
            ];

            $this->Rolepanitia_model->update_jadwal($data9, $where9);
        }

        //row sepuluh
        if (date('Y-m-d H:i', strtotime($jadwal19)) < date('Y-m-d H:i', strtotime($jadwal18)) || date('Y-m-d H:i', strtotime($jadwal19)) > date('Y-m-d H:i', strtotime($jadwal20))) {
            $this->session->set_flashdata('jadwal_salah10', '<label  id="validasi_c10" class="text-danger"></label>');
        } else {
            $where10 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[10]
            ];
            $data10 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[10],
                // 'jam_mulai' => $time_mulai[10],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[10],
                // 'jam_selesai' => $time_selesai[10],
            ];

            $this->Rolepanitia_model->update_jadwal($data10, $where10);
        }

        //row sebelas
        if (date('Y-m-d H:i', strtotime($jadwal21)) < date('Y-m-d H:i', strtotime($jadwal20)) || date('Y-m-d H:i', strtotime($jadwal21)) > date('Y-m-d H:i', strtotime($jadwal22))) {
            $this->session->set_flashdata('jadwal_salah11', '<label  id="validasi_c11" class="text-danger"></label>');
        } else {
            $where11 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[11]
            ];
            $data11 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[11],
                // 'jam_mulai' => $time_mulai[11],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[11],
                // 'jam_selesai' => $time_selesai[11],
            ];

            $this->Rolepanitia_model->update_jadwal($data11, $where11);
        }

        //row duabelas
        if (date('Y-m-d H:i', strtotime($jadwal23)) < date('Y-m-d H:i', strtotime($jadwal22)) || date('Y-m-d H:i', strtotime($jadwal23)) > date('Y-m-d H:i', strtotime($jadwal24))) {
            $this->session->set_flashdata('jadwal_salah12', '<label  id="validasi_c12" class="text-danger"></label>');
        } else {
            $where12 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[12]
            ];
            $data12 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[12],
                // 'jam_mulai' => $time_mulai[12],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[12],
                // 'jam_selesai' => $time_selesai[12],
            ];

            $this->Rolepanitia_model->update_jadwal($data12, $where12);
        }

        //row tigabelas
        if (date('Y-m-d H:i', strtotime($jadwal25)) < date('Y-m-d H:i', strtotime($jadwal24)) || date('Y-m-d H:i', strtotime($jadwal25)) > date('Y-m-d H:i', strtotime($jadwal26))) {
            $this->session->set_flashdata('jadwal_salah13', '<label  id="validasi_c13" class="text-danger"></label>');
        } else {
            $where13 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[13]
            ];
            $data13 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[13],
                // 'jam_mulai' => $time_mulai[13],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[13],
                // 'jam_selesai' => $time_selesai[13],
            ];

            $this->Rolepanitia_model->update_jadwal($data13, $where13);
        }

        //row empatbelas
        if (date('Y-m-d H:i', strtotime($jadwal27)) < date('Y-m-d H:i', strtotime($jadwal26)) || date('Y-m-d H:i', strtotime($jadwal27)) > date('Y-m-d H:i', strtotime($jadwal28))) {
            $this->session->set_flashdata('jadwal_salah14', '<label  id="validasi_c14" class="text-danger"></label>');
        } else {
            $where14 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[14]
            ];
            $data14 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[14],
                // 'jam_mulai' => $time_mulai[14],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[14],
                // 'jam_selesai' => $time_selesai[14],
            ];

            $this->Rolepanitia_model->update_jadwal($data14, $where14);
        }

        //row limabelas
        if (date('Y-m-d H:i', strtotime($jadwal29)) < date('Y-m-d H:i', strtotime($jadwal28)) || date('Y-m-d H:i', strtotime($jadwal29)) > date('Y-m-d H:i', strtotime($jadwal30))) {
            $this->session->set_flashdata('jadwal_salah15', '<label  id="validasi_c15" class="text-danger"></label>');
        } else {
            $where15 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[15]
            ];
            $data15 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[15],
                // 'jam_mulai' => $time_mulai[15],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[15],
                // 'jam_selesai' => $time_selesai[15],
            ];
            $data99 = [
                'selesai_semua_tender' => $tanggal_selesai_jadwal[15],
            ];
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);

            $this->Rolepanitia_model->update_jadwal($data15, $where15);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    public function simpanjadwal2($id_paket)
    {
        $id_jadwal_tender = $this->input->post('id_jadwal_tender[]');
        $tanggal_mulai_jadwal = $this->input->post('tanggal_mulai_jadwal[]');
        $tanggal_selesai_jadwal = $this->input->post('tanggal_selesai_jadwal[]');
        // $time_mulai = $this->input->post('time_mulai[]');
        // $time_selesai = $this->input->post('time_selesai[]');
        $id_kualifikasi = $this->input->post('id_kualifikasi');
        $jadwal1 = $tanggal_mulai_jadwal[1];
        $jadwal2 = $tanggal_selesai_jadwal[1];
        $jadwal3 = $tanggal_mulai_jadwal[2];
        $jadwal4 = $tanggal_selesai_jadwal[2];
        $jadwal5 = $tanggal_mulai_jadwal[3];
        $jadwal6 = $tanggal_selesai_jadwal[3];
        $jadwal7 = $tanggal_mulai_jadwal[4];
        $jadwal8 = $tanggal_selesai_jadwal[4];
        $jadwal9 = $tanggal_mulai_jadwal[5];
        $jadwal10 = $tanggal_selesai_jadwal[5];
        $jadwal11 = $tanggal_mulai_jadwal[6];
        $jadwal12 = $tanggal_selesai_jadwal[6];
        $jadwal13 = $tanggal_mulai_jadwal[7];
        $jadwal14 = $tanggal_selesai_jadwal[7];
        $jadwal15 = $tanggal_mulai_jadwal[8];
        $jadwal16 = $tanggal_selesai_jadwal[8];
        $jadwal17 = $tanggal_mulai_jadwal[9];
        $jadwal18 = $tanggal_selesai_jadwal[9];
        $jadwal19 = $tanggal_mulai_jadwal[10];
        $jadwal20 = $tanggal_selesai_jadwal[10];
        $jadwal21 = $tanggal_mulai_jadwal[11];
        $jadwal22 = $tanggal_selesai_jadwal[11];
        $jadwal23 = $tanggal_mulai_jadwal[12];
        $jadwal24 = $tanggal_selesai_jadwal[12];
        $jadwal25 = $tanggal_mulai_jadwal[13];
        $jadwal26 = $tanggal_selesai_jadwal[13];
        $jadwal27 = $tanggal_mulai_jadwal[14];
        $jadwal28 = $tanggal_selesai_jadwal[14];
        $jadwal29 = $tanggal_mulai_jadwal[15];
        $jadwal30 = $tanggal_selesai_jadwal[15];
        $jadwal31 = $tanggal_mulai_jadwal[16];
        $jadwal32 = $tanggal_selesai_jadwal[16];
        $jadwal33 = $tanggal_mulai_jadwal[17];
        $jadwal34 = $tanggal_selesai_jadwal[17];
        $jadwal35 = $tanggal_mulai_jadwal[18];
        $jadwal36 = $tanggal_selesai_jadwal[18];
        $jadwal37 = $tanggal_mulai_jadwal[19];
        $jadwal38 = $tanggal_selesai_jadwal[19];


        //row pertama
        if (date('Y-m-d H:i', strtotime($jadwal1)) > date('Y-m-d H:i', strtotime($jadwal2))) {
            $this->session->set_flashdata('jadwal_salah1', '<label id="validasi_c1" class="text-danger"></label>');
        } else {
            $where = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[1]
            ];
            $data = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[1],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[1]
            ];
            $data99 = [
                'batas_pendaftaran' => $tanggal_selesai_jadwal[1],
            ];
            $this->Rolepanitia_model->update_jadwal($data, $where);
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
        }

        //row kedua
        if (date('Y-m-d H:i', strtotime($jadwal3)) > date('Y-m-d H:i', strtotime($jadwal4))) {
            $this->session->set_flashdata('jadwal_salah2', '<label id="validasi_c2" class="text-danger"></label>');
        } else {
            $where2 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[2]
            ];
            $data2 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[2],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[2]
            ];
            $this->Rolepanitia_model->update_jadwal($data2, $where2);
        }

        //row ketiga
        if (date('Y-m-d H:i', strtotime($jadwal5)) < date('Y-m-d H:i', strtotime($jadwal4)) || date('Y-m-d H:i', strtotime($jadwal5)) > date('Y-m-d H:i', strtotime($jadwal6))) {
            $this->session->set_flashdata('jadwal_salah3', '<label  id="validasi_c3" class="text-danger"></label>');
        } else {
            $where3 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[3]
            ];
            $data3 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[3],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[3]
            ];

            $this->Rolepanitia_model->update_jadwal($data3, $where3);
        }

        //row keempat
        if (date('Y-m-d H:i', strtotime($jadwal7)) < date('Y-m-d H:i', strtotime($jadwal6)) || date('Y-m-d H:i', strtotime($jadwal7)) > date('Y-m-d H:i', strtotime($jadwal8))) {
            $this->session->set_flashdata('jadwal_salah4', '<label  id="validasi_c4" class="text-danger"></label>');
        } else {
            $where4 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[4]
            ];
            $data4 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[4],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[4]
            ];

            $this->Rolepanitia_model->update_jadwal($data4, $where4);
        }

        //row kelima
        if (date('Y-m-d H:i', strtotime($jadwal9)) < date('Y-m-d H:i', strtotime($jadwal8)) || date('Y-m-d H:i', strtotime($jadwal9)) > date('Y-m-d H:i', strtotime($jadwal10))) {
            $this->session->set_flashdata('jadwal_salah5', '<label id="validasi_c5" class="text-danger"></label>');
        } else {
            $where5 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[5]
            ];
            $data5 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[5],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[5]
            ];

            $this->Rolepanitia_model->update_jadwal($data5, $where5);
        }

        //row keenam
        if (date('Y-m-d H:i', strtotime($jadwal11)) < date('Y-m-d H:i', strtotime($jadwal10)) || date('Y-m-d H:i', strtotime($jadwal11)) > date('Y-m-d H:i', strtotime($jadwal12))) {
            $this->session->set_flashdata('jadwal_salah6', '<label  id="validasi_c6" class="text-danger"></label>');
        } else {
            $where6 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[6]
            ];
            $data6 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[6],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[6],
            ];

            $this->Rolepanitia_model->update_jadwal($data6, $where6);
        }

        //row ketujuh
        if (date('Y-m-d H:i', strtotime($jadwal13)) < date('Y-m-d H:i', strtotime($jadwal12)) || date('Y-m-d H:i', strtotime($jadwal13)) > date('Y-m-d H:i', strtotime($jadwal14))) {
            $this->session->set_flashdata('jadwal_salah7', '<label  id="validasi_c7" class="text-danger"></label>');
        } else {
            $where7 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[7]
            ];
            $data7 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[7],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[7],
            ];

            $this->Rolepanitia_model->update_jadwal($data7, $where7);
        }

        //row kelapan
        if (date('Y-m-d H:i', strtotime($jadwal15)) < date('Y-m-d H:i', strtotime($jadwal14)) || date('Y-m-d H:i', strtotime($jadwal15)) > date('Y-m-d H:i', strtotime($jadwal16))) {
            $this->session->set_flashdata('jadwal_salah8', '<label  id="validasi_c8" class="text-danger"></label>');
        } else {
            $where8 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[8]
            ];
            $data8 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[8],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[8]
            ];

            $this->Rolepanitia_model->update_jadwal($data8, $where8);
        }

        //row sembilan
        if (date('Y-m-d H:i', strtotime($jadwal17)) < date('Y-m-d H:i', strtotime($jadwal16)) || date('Y-m-d H:i', strtotime($jadwal17)) > date('Y-m-d H:i', strtotime($jadwal18))) {
            $this->session->set_flashdata('jadwal_salah9', '<label  id="validasi_c9" class="text-danger"></label>');
        } else {
            $where9 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[9]
            ];
            $data9 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[9],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[9]
            ];

            $this->Rolepanitia_model->update_jadwal($data9, $where9);
        }

        //row sepuluh
        if (date('Y-m-d H:i', strtotime($jadwal19)) < date('Y-m-d H:i', strtotime($jadwal18)) || date('Y-m-d H:i', strtotime($jadwal19)) > date('Y-m-d H:i', strtotime($jadwal20))) {
            $this->session->set_flashdata('jadwal_salah10', '<label  id="validasi_c10" class="text-danger"></label>');
        } else {
            $where10 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[10]
            ];
            $data10 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[10],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[10],
            ];

            $this->Rolepanitia_model->update_jadwal($data10, $where10);
        }

        //row sebelas
        if (date('Y-m-d H:i', strtotime($jadwal21)) < date('Y-m-d H:i', strtotime($jadwal20)) || date('Y-m-d H:i', strtotime($jadwal21)) > date('Y-m-d H:i', strtotime($jadwal22))) {
            $this->session->set_flashdata('jadwal_salah11', '<label  id="validasi_c11" class="text-danger"></label>');
        } else {
            $where11 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[11]
            ];
            $data11 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[11],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[11]
            ];

            $this->Rolepanitia_model->update_jadwal($data11, $where11);
        }

        //row duabelas
        if (date('Y-m-d H:i', strtotime($jadwal23)) < date('Y-m-d H:i', strtotime($jadwal22)) || date('Y-m-d H:i', strtotime($jadwal23)) > date('Y-m-d H:i', strtotime($jadwal24))) {
            $this->session->set_flashdata('jadwal_salah12', '<label  id="validasi_c12" class="text-danger"></label>');
        } else {
            $where12 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[12]
            ];
            $data12 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[12],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[12]
            ];

            $this->Rolepanitia_model->update_jadwal($data12, $where12);
        }

        //row tigabelas
        if (date('Y-m-d H:i', strtotime($jadwal25)) < date('Y-m-d H:i', strtotime($jadwal24)) || date('Y-m-d H:i', strtotime($jadwal25)) > date('Y-m-d H:i', strtotime($jadwal26))) {
            $this->session->set_flashdata('jadwal_salah13', '<label  id="validasi_c13" class="text-danger"></label>');
        } else {
            $where13 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[13]
            ];
            $data13 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[13],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[13]
            ];

            $this->Rolepanitia_model->update_jadwal($data13, $where13);
        }

        //row empatbelas
        if (date('Y-m-d H:i', strtotime($jadwal27)) < date('Y-m-d H:i', strtotime($jadwal26)) || date('Y-m-d H:i', strtotime($jadwal27)) > date('Y-m-d H:i', strtotime($jadwal28))) {
            $this->session->set_flashdata('jadwal_salah14', '<label  id="validasi_c14" class="text-danger"></label>');
        } else {
            $where14 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[14]
            ];
            $data14 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[14],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[14]
            ];

            $this->Rolepanitia_model->update_jadwal($data14, $where14);
        }

        //row limabelas
        if (date('Y-m-d H:i', strtotime($jadwal29)) < date('Y-m-d H:i', strtotime($jadwal28)) || date('Y-m-d H:i', strtotime($jadwal29)) > date('Y-m-d H:i', strtotime($jadwal30))) {
            $this->session->set_flashdata('jadwal_salah15', '<label  id="validasi_c15" class="text-danger"></label>');
        } else {
            $where15 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[15]
            ];
            $data15 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[15],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[15]
            ];

            $this->Rolepanitia_model->update_jadwal($data15, $where15);
        }

        //row enambelas
        if (date('Y-m-d H:i', strtotime($jadwal31)) < date('Y-m-d H:i', strtotime($jadwal30)) || date('Y-m-d H:i', strtotime($jadwal31)) > date('Y-m-d H:i', strtotime($jadwal32))) {
            $this->session->set_flashdata('jadwal_salah16', '<label  id="validasi_c16" class="text-danger"></label>');
        } else {
            $where16 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[16]
            ];
            $data16 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[16],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[16]
            ];

            $this->Rolepanitia_model->update_jadwal($data16, $where16);
        }

        //tujuhbelas
        if (date('Y-m-d H:i', strtotime($jadwal33)) < date('Y-m-d H:i', strtotime($jadwal32)) || date('Y-m-d H:i', strtotime($jadwal33)) > date('Y-m-d H:i', strtotime($jadwal34))) {
            $this->session->set_flashdata('jadwal_salah17', '<label  id="validasi_c17" class="text-danger"></label>');
        } else {
            $where17 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[17]
            ];
            $data17 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[17],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[17]
            ];

            $this->Rolepanitia_model->update_jadwal($data17, $where17);
        }


        //delapan belas
        if (date('Y-m-d H:i', strtotime($jadwal35)) < date('Y-m-d H:i', strtotime($jadwal34)) || date('Y-m-d H:i', strtotime($jadwal35)) > date('Y-m-d H:i', strtotime($jadwal36))) {
            $this->session->set_flashdata('jadwal_salah18', '<label  id="validasi_c18" class="text-danger"></label>');
        } else {
            $where18 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[18]
            ];
            $data18 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[18],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[18]
            ];

            $this->Rolepanitia_model->update_jadwal($data18, $where18);
        }

        //sembilan belas
        if (date('Y-m-d H:i', strtotime($jadwal37)) < date('Y-m-d H:i', strtotime($jadwal36)) || date('Y-m-d H:i', strtotime($jadwal37)) > date('Y-m-d H:i', strtotime($jadwal38))) {
            $this->session->set_flashdata('jadwal_salah19', '<label  id="validasi_c19" class="text-danger"></label>');
        } else {
            $where19 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[19]
            ];
            $data19 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[19],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[19]
            ];
            $data99 = [
                'selesai_semua_tender' => $tanggal_selesai_jadwal[19],
            ];
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);

            $this->Rolepanitia_model->update_jadwal($data19, $where19);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    public function simpanjadwal3($id_paket)
    {
        $id_jadwal_tender = $this->input->post('id_jadwal_tender[]');
        $tanggal_mulai_jadwal = $this->input->post('tanggal_mulai_jadwal[]');
        $tanggal_selesai_jadwal = $this->input->post('tanggal_selesai_jadwal[]');
        // $time_mulai = $this->input->post('time_mulai[]');
        // $time_selesai = $this->input->post('time_selesai[]');
        $id_kualifikasi = $this->input->post('id_kualifikasi');
        $jadwal1 = $tanggal_mulai_jadwal[1];
        $jadwal2 = $tanggal_selesai_jadwal[1];
        $jadwal3 = $tanggal_mulai_jadwal[2];
        $jadwal4 = $tanggal_selesai_jadwal[2];
        $jadwal5 = $tanggal_mulai_jadwal[3];
        $jadwal6 = $tanggal_selesai_jadwal[3];
        $jadwal7 = $tanggal_mulai_jadwal[4];
        $jadwal8 = $tanggal_selesai_jadwal[4];
        $jadwal9 = $tanggal_mulai_jadwal[5];
        $jadwal10 = $tanggal_selesai_jadwal[5];
        $jadwal11 = $tanggal_mulai_jadwal[6];
        $jadwal12 = $tanggal_selesai_jadwal[6];
        $jadwal13 = $tanggal_mulai_jadwal[7];
        $jadwal14 = $tanggal_selesai_jadwal[7];
        $jadwal15 = $tanggal_mulai_jadwal[8];
        $jadwal16 = $tanggal_selesai_jadwal[8];
        $jadwal17 = $tanggal_mulai_jadwal[9];
        $jadwal18 = $tanggal_selesai_jadwal[9];
        $jadwal19 = $tanggal_mulai_jadwal[10];
        $jadwal20 = $tanggal_selesai_jadwal[10];
        $jadwal21 = $tanggal_mulai_jadwal[11];
        $jadwal22 = $tanggal_selesai_jadwal[11];
        $jadwal23 = $tanggal_mulai_jadwal[12];
        $jadwal24 = $tanggal_selesai_jadwal[12];
        $jadwal25 = $tanggal_mulai_jadwal[13];
        $jadwal26 = $tanggal_selesai_jadwal[13];
        $jadwal27 = $tanggal_mulai_jadwal[14];
        $jadwal28 = $tanggal_selesai_jadwal[14];
        $jadwal29 = $tanggal_mulai_jadwal[15];
        $jadwal30 = $tanggal_selesai_jadwal[15];
        $jadwal31 = $tanggal_mulai_jadwal[16];
        $jadwal32 = $tanggal_selesai_jadwal[16];
        $jadwal33 = $tanggal_mulai_jadwal[17];
        $jadwal34 = $tanggal_selesai_jadwal[17];
        $jadwal35 = $tanggal_mulai_jadwal[18];
        $jadwal36 = $tanggal_selesai_jadwal[18];
        $jadwal37 = $tanggal_mulai_jadwal[19];
        $jadwal38 = $tanggal_selesai_jadwal[19];
        $jadwal39 = $tanggal_mulai_jadwal[20];
        $jadwal40 = $tanggal_selesai_jadwal[20];


        //row pertama
        if (date('Y-m-d H:i', strtotime($jadwal1)) > date('Y-m-d H:i', strtotime($jadwal2))) {
            $this->session->set_flashdata('jadwal_salah1', '<label id="validasi_c1" class="text-danger"></label>');
        } else {
            $where = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[1]
            ];
            $data = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[1],
                // 'jam_mulai' => $time_mulai[1],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[1],
                // 'jam_selesai' => $time_selesai[1],
            ];
            $data99 = [
                'batas_pendaftaran' => $tanggal_selesai_jadwal[1],
            ];
            $this->Rolepanitia_model->update_jadwal($data, $where);
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
        }

        //row kedua
        if (date('Y-m-d H:i', strtotime($jadwal3)) > date('Y-m-d H:i', strtotime($jadwal4))) {
            $this->session->set_flashdata('jadwal_salah2', '<label id="validasi_c2" class="text-danger"></label>');
        } else {
            $where2 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[2]
            ];
            $data2 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[2],
                // 'jam_mulai' => $time_mulai[2],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[2],
                // 'jam_selesai' => $time_selesai[2],
            ];
            $this->Rolepanitia_model->update_jadwal($data2, $where2);
        }

        //row ketiga
        if (date('Y-m-d H:i', strtotime($jadwal5)) < date('Y-m-d H:i', strtotime($jadwal4)) || date('Y-m-d H:i', strtotime($jadwal5)) > date('Y-m-d H:i', strtotime($jadwal6))) {
            $this->session->set_flashdata('jadwal_salah3', '<label  id="validasi_c3" class="text-danger"></label>');
        } else {
            $where3 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[3]
            ];
            $data3 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[3],
                // 'jam_mulai' => $time_mulai[3],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[3],
                // 'jam_selesai' => $time_selesai[3],
            ];

            $this->Rolepanitia_model->update_jadwal($data3, $where3);
        }

        //row keempat
        if (date('Y-m-d H:i', strtotime($jadwal7)) < date('Y-m-d H:i', strtotime($jadwal6)) || date('Y-m-d H:i', strtotime($jadwal7)) > date('Y-m-d H:i', strtotime($jadwal8))) {
            $this->session->set_flashdata('jadwal_salah4', '<label  id="validasi_c4" class="text-danger"></label>');
        } else {
            $where4 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[4]
            ];
            $data4 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[4],
                // 'jam_mulai' => $time_mulai[4],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[4],
                // 'jam_selesai' => $time_selesai[4],
            ];

            $this->Rolepanitia_model->update_jadwal($data4, $where4);
        }

        //row kelima
        if (date('Y-m-d H:i', strtotime($jadwal9)) < date('Y-m-d H:i', strtotime($jadwal8)) || date('Y-m-d H:i', strtotime($jadwal9)) > date('Y-m-d H:i', strtotime($jadwal10))) {
            $this->session->set_flashdata('jadwal_salah5', '<label id="validasi_c5" class="text-danger"></label>');
        } else {
            $where5 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[5]
            ];
            $data5 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[5],
                // 'jam_mulai' => $time_mulai[5],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[5],
                // 'jam_selesai' => $time_selesai[5],
            ];

            $this->Rolepanitia_model->update_jadwal($data5, $where5);
        }

        //row keenam
        if (date('Y-m-d H:i', strtotime($jadwal11)) < date('Y-m-d H:i', strtotime($jadwal10)) || date('Y-m-d H:i', strtotime($jadwal11)) > date('Y-m-d H:i', strtotime($jadwal12))) {
            $this->session->set_flashdata('jadwal_salah6', '<label  id="validasi_c6" class="text-danger"></label>');
        } else {
            $where6 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[6]
            ];
            $data6 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[6],
                // 'jam_mulai' => $time_mulai[6],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[6],
                // 'jam_selesai' => $time_selesai[6],
            ];

            $this->Rolepanitia_model->update_jadwal($data6, $where6);
        }

        //row ketujuh
        if (date('Y-m-d H:i', strtotime($jadwal13)) < date('Y-m-d H:i', strtotime($jadwal12)) || date('Y-m-d H:i', strtotime($jadwal13)) > date('Y-m-d H:i', strtotime($jadwal14))) {
            $this->session->set_flashdata('jadwal_salah7', '<label  id="validasi_c7" class="text-danger"></label>');
        } else {
            $where7 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[7]
            ];
            $data7 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[7],
                // 'jam_mulai' => $time_mulai[7],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[7],
                // 'jam_selesai' => $time_selesai[7],
            ];

            $this->Rolepanitia_model->update_jadwal($data7, $where7);
        }

        //row kelapan
        if (date('Y-m-d H:i', strtotime($jadwal15)) < date('Y-m-d H:i', strtotime($jadwal14)) || date('Y-m-d H:i', strtotime($jadwal15)) > date('Y-m-d H:i', strtotime($jadwal16))) {
            $this->session->set_flashdata('jadwal_salah8', '<label  id="validasi_c8" class="text-danger"></label>');
        } else {
            $where8 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[8]
            ];
            $data8 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[8],
                // 'jam_mulai' => $time_mulai[8],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[8],
                // 'jam_selesai' => $time_selesai[8],
            ];

            $this->Rolepanitia_model->update_jadwal($data8, $where8);
        }

        //row sembilan
        if (date('Y-m-d H:i', strtotime($jadwal17)) < date('Y-m-d H:i', strtotime($jadwal16)) || date('Y-m-d H:i', strtotime($jadwal17)) > date('Y-m-d H:i', strtotime($jadwal18))) {
            $this->session->set_flashdata('jadwal_salah9', '<label  id="validasi_c9" class="text-danger"></label>');
        } else {
            $where9 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[9]
            ];
            $data9 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[9],
                // 'jam_mulai' => $time_mulai[9],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[9],
                // 'jam_selesai' => $time_selesai[9],
            ];

            $this->Rolepanitia_model->update_jadwal($data9, $where9);
        }

        //row sepuluh
        if (date('Y-m-d H:i', strtotime($jadwal19)) < date('Y-m-d H:i', strtotime($jadwal18)) || date('Y-m-d H:i', strtotime($jadwal19)) > date('Y-m-d H:i', strtotime($jadwal20))) {
            $this->session->set_flashdata('jadwal_salah10', '<label  id="validasi_c10" class="text-danger"></label>');
        } else {
            $where10 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[10]
            ];
            $data10 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[10],
                // 'jam_mulai' => $time_mulai[10],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[10],
                // 'jam_selesai' => $time_selesai[10],
            ];

            $this->Rolepanitia_model->update_jadwal($data10, $where10);
        }

        //row sebelas
        if (date('Y-m-d H:i', strtotime($jadwal21)) < date('Y-m-d H:i', strtotime($jadwal20)) || date('Y-m-d H:i', strtotime($jadwal21)) > date('Y-m-d H:i', strtotime($jadwal22))) {
            $this->session->set_flashdata('jadwal_salah11', '<label  id="validasi_c11" class="text-danger"></label>');
        } else {
            $where11 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[11]
            ];
            $data11 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[11],
                // 'jam_mulai' => $time_mulai[11],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[11],
                // 'jam_selesai' => $time_selesai[11],
            ];

            $this->Rolepanitia_model->update_jadwal($data11, $where11);
        }

        //row duabelas
        if (date('Y-m-d H:i', strtotime($jadwal23)) < date('Y-m-d H:i', strtotime($jadwal22)) || date('Y-m-d H:i', strtotime($jadwal23)) > date('Y-m-d H:i', strtotime($jadwal24))) {
            $this->session->set_flashdata('jadwal_salah12', '<label  id="validasi_c12" class="text-danger"></label>');
        } else {
            $where12 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[12]
            ];
            $data12 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[12],
                // 'jam_mulai' => $time_mulai[12],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[12],
                // 'jam_selesai' => $time_selesai[12],
            ];

            $this->Rolepanitia_model->update_jadwal($data12, $where12);
        }

        //row tigabelas
        if (date('Y-m-d H:i', strtotime($jadwal25)) < date('Y-m-d H:i', strtotime($jadwal24)) || date('Y-m-d H:i', strtotime($jadwal25)) > date('Y-m-d H:i', strtotime($jadwal26))) {
            $this->session->set_flashdata('jadwal_salah13', '<label  id="validasi_c13" class="text-danger"></label>');
        } else {
            $where13 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[13]
            ];
            $data13 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[13],
                // 'jam_mulai' => $time_mulai[13],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[13],
                // 'jam_selesai' => $time_selesai[13],
            ];

            $this->Rolepanitia_model->update_jadwal($data13, $where13);
        }

        //row empatbelas
        if (date('Y-m-d H:i', strtotime($jadwal27)) < date('Y-m-d H:i', strtotime($jadwal26)) || date('Y-m-d H:i', strtotime($jadwal27)) > date('Y-m-d H:i', strtotime($jadwal28))) {
            $this->session->set_flashdata('jadwal_salah14', '<label  id="validasi_c14" class="text-danger"></label>');
        } else {
            $where14 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[14]
            ];
            $data14 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[14],
                // 'jam_mulai' => $time_mulai[14],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[14],
                // 'jam_selesai' => $time_selesai[14],
            ];

            $this->Rolepanitia_model->update_jadwal($data14, $where14);
        }

        //row limabelas
        if (date('Y-m-d H:i', strtotime($jadwal29)) < date('Y-m-d H:i', strtotime($jadwal28)) || date('Y-m-d H:i', strtotime($jadwal29)) > date('Y-m-d H:i', strtotime($jadwal30))) {
            $this->session->set_flashdata('jadwal_salah15', '<label  id="validasi_c15" class="text-danger"></label>');
        } else {
            $where15 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[15]
            ];
            $data15 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[15],
                // 'jam_mulai' => $time_mulai[15],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[15],
                // 'jam_selesai' => $time_selesai[15],
            ];

            $this->Rolepanitia_model->update_jadwal($data15, $where15);
        }

        //row enambelas
        if (date('Y-m-d H:i', strtotime($jadwal31)) < date('Y-m-d H:i', strtotime($jadwal30)) || date('Y-m-d H:i', strtotime($jadwal31)) > date('Y-m-d H:i', strtotime($jadwal32))) {
            $this->session->set_flashdata('jadwal_salah16', '<label  id="validasi_c16" class="text-danger"></label>');
        } else {
            $where16 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[16]
            ];
            $data16 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[16],
                // 'jam_mulai' => $time_mulai[16],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[16],
                // 'jam_selesai' => $time_selesai[16],
            ];

            $this->Rolepanitia_model->update_jadwal($data16, $where16);
        }

        //tujuhbelas
        if (date('Y-m-d H:i', strtotime($jadwal33)) < date('Y-m-d H:i', strtotime($jadwal32)) || date('Y-m-d H:i', strtotime($jadwal33)) > date('Y-m-d H:i', strtotime($jadwal34))) {
            $this->session->set_flashdata('jadwal_salah17', '<label  id="validasi_c17" class="text-danger"></label>');
        } else {
            $where17 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[17]
            ];
            $data17 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[17],
                // 'jam_mulai' => $time_mulai[17],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[17],
                // 'jam_selesai' => $time_selesai[17],
            ];

            $this->Rolepanitia_model->update_jadwal($data17, $where17);
        }


        //delapan belas
        if (date('Y-m-d H:i', strtotime($jadwal35)) < date('Y-m-d H:i', strtotime($jadwal34)) || date('Y-m-d H:i', strtotime($jadwal35)) > date('Y-m-d H:i', strtotime($jadwal36))) {
            $this->session->set_flashdata('jadwal_salah18', '<label  id="validasi_c18" class="text-danger"></label>');
        } else {
            $where18 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[18]
            ];
            $data18 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[18],
                // 'jam_mulai' => $time_mulai[18],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[18],
                // 'jam_selesai' => $time_selesai[18],
            ];

            $this->Rolepanitia_model->update_jadwal($data18, $where18);
        }

        //sembilan belas
        if (date('Y-m-d H:i', strtotime($jadwal37)) < date('Y-m-d H:i', strtotime($jadwal36)) || date('Y-m-d H:i', strtotime($jadwal37)) > date('Y-m-d H:i', strtotime($jadwal38))) {
            $this->session->set_flashdata('jadwal_salah19', '<label  id="validasi_c19" class="text-danger"></label>');
        } else {
            $where19 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[19]
            ];
            $data19 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[19],
                // 'jam_mulai' => $time_mulai[19],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[19],
                // 'jam_selesai' => $time_selesai[19],
            ];

            $this->Rolepanitia_model->update_jadwal($data19, $where19);
        }

        //DUA PULUH
        if (date('Y-m-d H:i', strtotime($jadwal39)) < date('Y-m-d H:i', strtotime($jadwal38)) || date('Y-m-d H:i', strtotime($jadwal39)) > date('Y-m-d H:i', strtotime($jadwal40))) {
            $this->session->set_flashdata('jadwal_salah20', '<label  id="validasi_c20" class="text-danger"></label>');
        } else {
            $where20 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[20]
            ];
            $data20 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[20],
                // 'jam_mulai' => $time_mulai[20],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[20],
                // 'jam_selesai' => $time_selesai[20],
            ];
            $data99 = [
                'selesai_semua_tender' => $tanggal_selesai_jadwal[20],
            ];
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);

            $this->Rolepanitia_model->update_jadwal($data20, $where20);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    public function simpanjadwal4($id_paket)
    {
        $id_jadwal_tender = $this->input->post('id_jadwal_tender[]');
        $tanggal_mulai_jadwal = $this->input->post('tanggal_mulai_jadwal[]');
        $tanggal_selesai_jadwal = $this->input->post('tanggal_selesai_jadwal[]');
        // $time_mulai = $this->input->post('time_mulai[]');
        // $time_selesai = $this->input->post('time_selesai[]');
        $id_kualifikasi = $this->input->post('id_kualifikasi');
        $jadwal1 = $tanggal_mulai_jadwal[1];
        $jadwal2 = $tanggal_selesai_jadwal[1];
        $jadwal3 = $tanggal_mulai_jadwal[2];
        $jadwal4 = $tanggal_selesai_jadwal[2];
        $jadwal5 = $tanggal_mulai_jadwal[3];
        $jadwal6 = $tanggal_selesai_jadwal[3];
        $jadwal7 = $tanggal_mulai_jadwal[4];
        $jadwal8 = $tanggal_selesai_jadwal[4];
        $jadwal9 = $tanggal_mulai_jadwal[5];
        $jadwal10 = $tanggal_selesai_jadwal[5];
        $jadwal11 = $tanggal_mulai_jadwal[6];
        $jadwal12 = $tanggal_selesai_jadwal[6];
        $jadwal13 = $tanggal_mulai_jadwal[7];
        $jadwal14 = $tanggal_selesai_jadwal[7];
        $jadwal15 = $tanggal_mulai_jadwal[8];
        $jadwal16 = $tanggal_selesai_jadwal[8];
        $jadwal17 = $tanggal_mulai_jadwal[9];
        $jadwal18 = $tanggal_selesai_jadwal[9];
        $jadwal19 = $tanggal_mulai_jadwal[10];
        $jadwal20 = $tanggal_selesai_jadwal[10];
        $jadwal21 = $tanggal_mulai_jadwal[11];
        $jadwal22 = $tanggal_selesai_jadwal[11];
        $jadwal23 = $tanggal_mulai_jadwal[12];
        $jadwal24 = $tanggal_selesai_jadwal[12];
        $jadwal25 = $tanggal_mulai_jadwal[13];
        $jadwal26 = $tanggal_selesai_jadwal[13];
        $jadwal27 = $tanggal_mulai_jadwal[14];
        $jadwal28 = $tanggal_selesai_jadwal[14];
        $jadwal29 = $tanggal_mulai_jadwal[15];
        $jadwal30 = $tanggal_selesai_jadwal[15];
        $jadwal31 = $tanggal_mulai_jadwal[16];
        $jadwal32 = $tanggal_selesai_jadwal[16];
        $jadwal33 = $tanggal_mulai_jadwal[17];
        $jadwal34 = $tanggal_selesai_jadwal[17];
        $jadwal35 = $tanggal_mulai_jadwal[18];
        $jadwal36 = $tanggal_selesai_jadwal[18];
        $jadwal37 = $tanggal_mulai_jadwal[19];
        $jadwal38 = $tanggal_selesai_jadwal[19];
        $jadwal39 = $tanggal_mulai_jadwal[20];
        $jadwal40 = $tanggal_selesai_jadwal[20];
        $jadwal41 = $tanggal_mulai_jadwal[21];
        $jadwal42 = $tanggal_selesai_jadwal[21];
        $jadwal43 = $tanggal_mulai_jadwal[22];
        $jadwal44 = $tanggal_selesai_jadwal[22];
        $jadwal45 = $tanggal_mulai_jadwal[23];
        $jadwal46 = $tanggal_selesai_jadwal[23];


        //row pertama
        if (date('Y-m-d H:i', strtotime($jadwal1)) > date('Y-m-d H:i', strtotime($jadwal2))) {
            $this->session->set_flashdata('jadwal_salah1', '<label id="validasi_c1" class="text-danger"></label>');
        } else {
            $where = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[1]
            ];
            $data = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[1],
                // 'jam_mulai' => $time_mulai[1],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[1],
                // 'jam_selesai' => $time_selesai[1],
            ];
            $data99 = [
                'batas_pendaftaran' => $tanggal_selesai_jadwal[1],
            ];
            $this->Rolepanitia_model->update_jadwal($data, $where);
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
        }

        //row kedua
        if (date('Y-m-d H:i', strtotime($jadwal3)) > date('Y-m-d H:i', strtotime($jadwal4))) {
            $this->session->set_flashdata('jadwal_salah2', '<label id="validasi_c2" class="text-danger"></label>');
        } else {
            $where2 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[2]
            ];
            $data2 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[2],
                // 'jam_mulai' => $time_mulai[2],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[2],
                // 'jam_selesai' => $time_selesai[2],
            ];
            $this->Rolepanitia_model->update_jadwal($data2, $where2);
        }

        //row ketiga
        if (date('Y-m-d H:i', strtotime($jadwal5)) < date('Y-m-d H:i', strtotime($jadwal4)) || date('Y-m-d H:i', strtotime($jadwal5)) > date('Y-m-d H:i', strtotime($jadwal6))) {
            $this->session->set_flashdata('jadwal_salah3', '<label  id="validasi_c3" class="text-danger"></label>');
        } else {
            $where3 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[3]
            ];
            $data3 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[3],
                // 'jam_mulai' => $time_mulai[3],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[3],
                // 'jam_selesai' => $time_selesai[3],
            ];

            $this->Rolepanitia_model->update_jadwal($data3, $where3);
        }

        //row keempat
        if (date('Y-m-d H:i', strtotime($jadwal7)) < date('Y-m-d H:i', strtotime($jadwal6)) || date('Y-m-d H:i', strtotime($jadwal7)) > date('Y-m-d H:i', strtotime($jadwal8))) {
            $this->session->set_flashdata('jadwal_salah4', '<label  id="validasi_c4" class="text-danger"></label>');
        } else {
            $where4 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[4]
            ];
            $data4 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[4],
                // 'jam_mulai' => $time_mulai[4],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[4],
                // 'jam_selesai' => $time_selesai[4],
            ];

            $this->Rolepanitia_model->update_jadwal($data4, $where4);
        }

        //row kelima
        if (date('Y-m-d H:i', strtotime($jadwal9)) < date('Y-m-d H:i', strtotime($jadwal8)) || date('Y-m-d H:i', strtotime($jadwal9)) > date('Y-m-d H:i', strtotime($jadwal10))) {
            $this->session->set_flashdata('jadwal_salah5', '<label id="validasi_c5" class="text-danger"></label>');
        } else {
            $where5 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[5]
            ];
            $data5 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[5],
                // 'jam_mulai' => $time_mulai[5],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[5],
                // 'jam_selesai' => $time_selesai[5],
            ];

            $this->Rolepanitia_model->update_jadwal($data5, $where5);
        }

        //row keenam
        if (date('Y-m-d H:i', strtotime($jadwal11)) < date('Y-m-d H:i', strtotime($jadwal10)) || date('Y-m-d H:i', strtotime($jadwal11)) > date('Y-m-d H:i', strtotime($jadwal12))) {
            $this->session->set_flashdata('jadwal_salah6', '<label  id="validasi_c6" class="text-danger"></label>');
        } else {
            $where6 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[6]
            ];
            $data6 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[6],
                // 'jam_mulai' => $time_mulai[6],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[6],
                // 'jam_selesai' => $time_selesai[6],
            ];

            $this->Rolepanitia_model->update_jadwal($data6, $where6);
        }

        //row ketujuh
        if (date('Y-m-d H:i', strtotime($jadwal13)) < date('Y-m-d H:i', strtotime($jadwal12)) || date('Y-m-d H:i', strtotime($jadwal13)) > date('Y-m-d H:i', strtotime($jadwal14))) {
            $this->session->set_flashdata('jadwal_salah7', '<label  id="validasi_c7" class="text-danger"></label>');
        } else {
            $where7 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[7]
            ];
            $data7 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[7],
                // 'jam_mulai' => $time_mulai[7],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[7],
                // 'jam_selesai' => $time_selesai[7],
            ];

            $this->Rolepanitia_model->update_jadwal($data7, $where7);
        }

        //row kelapan
        if (date('Y-m-d H:i', strtotime($jadwal15)) < date('Y-m-d H:i', strtotime($jadwal14)) || date('Y-m-d H:i', strtotime($jadwal15)) > date('Y-m-d H:i', strtotime($jadwal16))) {
            $this->session->set_flashdata('jadwal_salah8', '<label  id="validasi_c8" class="text-danger"></label>');
        } else {
            $where8 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[8]
            ];
            $data8 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[8],
                // 'jam_mulai' => $time_mulai[8],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[8],
                // 'jam_selesai' => $time_selesai[8],
            ];

            $this->Rolepanitia_model->update_jadwal($data8, $where8);
        }

        //row sembilan
        if (date('Y-m-d H:i', strtotime($jadwal17)) < date('Y-m-d H:i', strtotime($jadwal16)) || date('Y-m-d H:i', strtotime($jadwal17)) > date('Y-m-d H:i', strtotime($jadwal18))) {
            $this->session->set_flashdata('jadwal_salah9', '<label  id="validasi_c9" class="text-danger"></label>');
        } else {
            $where9 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[9]
            ];
            $data9 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[9],
                // 'jam_mulai' => $time_mulai[9],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[9],
                // 'jam_selesai' => $time_selesai[9],
            ];

            $this->Rolepanitia_model->update_jadwal($data9, $where9);
        }

        //row sepuluh
        if (date('Y-m-d H:i', strtotime($jadwal19)) < date('Y-m-d H:i', strtotime($jadwal18)) || date('Y-m-d H:i', strtotime($jadwal19)) > date('Y-m-d H:i', strtotime($jadwal20))) {
            $this->session->set_flashdata('jadwal_salah10', '<label  id="validasi_c10" class="text-danger"></label>');
        } else {
            $where10 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[10]
            ];
            $data10 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[10],
                // 'jam_mulai' => $time_mulai[10],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[10],
                // 'jam_selesai' => $time_selesai[10],
            ];

            $this->Rolepanitia_model->update_jadwal($data10, $where10);
        }

        //row sebelas
        if (date('Y-m-d H:i', strtotime($jadwal21)) < date('Y-m-d H:i', strtotime($jadwal20)) || date('Y-m-d H:i', strtotime($jadwal21)) > date('Y-m-d H:i', strtotime($jadwal22))) {
            $this->session->set_flashdata('jadwal_salah11', '<label  id="validasi_c11" class="text-danger"></label>');
        } else {
            $where11 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[11]
            ];
            $data11 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[11],
                // 'jam_mulai' => $time_mulai[11],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[11],
                // 'jam_selesai' => $time_selesai[11],
            ];

            $this->Rolepanitia_model->update_jadwal($data11, $where11);
        }

        //row duabelas
        if (date('Y-m-d H:i', strtotime($jadwal23)) < date('Y-m-d H:i', strtotime($jadwal22)) || date('Y-m-d H:i', strtotime($jadwal23)) > date('Y-m-d H:i', strtotime($jadwal24))) {
            $this->session->set_flashdata('jadwal_salah12', '<label  id="validasi_c12" class="text-danger"></label>');
        } else {
            $where12 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[12]
            ];
            $data12 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[12],
                // 'jam_mulai' => $time_mulai[12],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[12],
                // 'jam_selesai' => $time_selesai[12],
            ];

            $this->Rolepanitia_model->update_jadwal($data12, $where12);
        }

        //row tigabelas
        if (date('Y-m-d H:i', strtotime($jadwal25)) < date('Y-m-d H:i', strtotime($jadwal24)) || date('Y-m-d H:i', strtotime($jadwal25)) > date('Y-m-d H:i', strtotime($jadwal26))) {
            $this->session->set_flashdata('jadwal_salah13', '<label  id="validasi_c13" class="text-danger"></label>');
        } else {
            $where13 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[13]
            ];
            $data13 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[13],
                // 'jam_mulai' => $time_mulai[13],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[13],
                // 'jam_selesai' => $time_selesai[13],
            ];

            $this->Rolepanitia_model->update_jadwal($data13, $where13);
        }

        //row empatbelas
        if (date('Y-m-d H:i', strtotime($jadwal27)) < date('Y-m-d H:i', strtotime($jadwal26)) || date('Y-m-d H:i', strtotime($jadwal27)) > date('Y-m-d H:i', strtotime($jadwal28))) {
            $this->session->set_flashdata('jadwal_salah14', '<label  id="validasi_c14" class="text-danger"></label>');
        } else {
            $where14 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[14]
            ];
            $data14 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[14],
                // 'jam_mulai' => $time_mulai[14],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[14],
                // 'jam_selesai' => $time_selesai[14],
            ];

            $this->Rolepanitia_model->update_jadwal($data14, $where14);
        }

        //row limabelas
        if (date('Y-m-d H:i', strtotime($jadwal29)) < date('Y-m-d H:i', strtotime($jadwal28)) || date('Y-m-d H:i', strtotime($jadwal29)) > date('Y-m-d H:i', strtotime($jadwal30))) {
            $this->session->set_flashdata('jadwal_salah15', '<label  id="validasi_c15" class="text-danger"></label>');
        } else {
            $where15 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[15]
            ];
            $data15 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[15],
                // 'jam_mulai' => $time_mulai[15],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[15],
                // 'jam_selesai' => $time_selesai[15],
            ];

            $this->Rolepanitia_model->update_jadwal($data15, $where15);
        }

        //row enambelas
        if (date('Y-m-d H:i', strtotime($jadwal31)) < date('Y-m-d H:i', strtotime($jadwal30)) || date('Y-m-d H:i', strtotime($jadwal31)) > date('Y-m-d H:i', strtotime($jadwal32))) {
            $this->session->set_flashdata('jadwal_salah16', '<label  id="validasi_c16" class="text-danger"></label>');
        } else {
            $where16 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[16]
            ];
            $data16 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[16],
                // 'jam_mulai' => $time_mulai[16],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[16],
                // 'jam_selesai' => $time_selesai[16],
            ];

            $this->Rolepanitia_model->update_jadwal($data16, $where16);
        }

        //tujuhbelas
        if (date('Y-m-d H:i', strtotime($jadwal33)) < date('Y-m-d H:i', strtotime($jadwal32)) || date('Y-m-d H:i', strtotime($jadwal33)) > date('Y-m-d H:i', strtotime($jadwal34))) {
            $this->session->set_flashdata('jadwal_salah17', '<label  id="validasi_c17" class="text-danger"></label>');
        } else {
            $where17 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[17]
            ];
            $data17 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[17],
                // 'jam_mulai' => $time_mulai[17],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[17],
                // 'jam_selesai' => $time_selesai[17],
            ];

            $this->Rolepanitia_model->update_jadwal($data17, $where17);
        }


        //delapan belas
        if (date('Y-m-d H:i', strtotime($jadwal35)) < date('Y-m-d H:i', strtotime($jadwal34)) || date('Y-m-d H:i', strtotime($jadwal35)) > date('Y-m-d H:i', strtotime($jadwal36))) {
            $this->session->set_flashdata('jadwal_salah18', '<label  id="validasi_c18" class="text-danger"></label>');
        } else {
            $where18 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[18]
            ];
            $data18 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[18],
                // 'jam_mulai' => $time_mulai[18],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[18],
                // 'jam_selesai' => $time_selesai[18],
            ];

            $this->Rolepanitia_model->update_jadwal($data18, $where18);
        }

        //sembilan belas
        if (date('Y-m-d H:i', strtotime($jadwal37)) < date('Y-m-d H:i', strtotime($jadwal36)) || date('Y-m-d H:i', strtotime($jadwal37)) > date('Y-m-d H:i', strtotime($jadwal38))) {
            $this->session->set_flashdata('jadwal_salah19', '<label  id="validasi_c19" class="text-danger"></label>');
        } else {
            $where19 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[19]
            ];
            $data19 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[19],
                // 'jam_mulai' => $time_mulai[19],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[19],
                // 'jam_selesai' => $time_selesai[19],
            ];

            $this->Rolepanitia_model->update_jadwal($data19, $where19);
        }

        //DUA PULUH
        if (date('Y-m-d H:i', strtotime($jadwal39)) < date('Y-m-d H:i', strtotime($jadwal38)) || date('Y-m-d H:i', strtotime($jadwal39)) > date('Y-m-d H:i', strtotime($jadwal40))) {
            $this->session->set_flashdata('jadwal_salah20', '<label  id="validasi_c20" class="text-danger"></label>');
        } else {
            $where20 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[20]
            ];
            $data20 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[20],
                // 'jam_mulai' => $time_mulai[20],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[20],
                // 'jam_selesai' => $time_selesai[20],
            ];

            $this->Rolepanitia_model->update_jadwal($data20, $where20);
        }

        //DUA SATU
        if (date('Y-m-d H:i', strtotime($jadwal41)) < date('Y-m-d H:i', strtotime($jadwal40)) || date('Y-m-d H:i', strtotime($jadwal41)) > date('Y-m-d H:i', strtotime($jadwal42))) {
            $this->session->set_flashdata('jadwal_salah21', '<label  id="validasi_c21" class="text-danger"></label>');
        } else {
            $where21 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[21]
            ];
            $data21 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[21],
                // 'jam_mulai' => $time_mulai[21],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[21],
                // 'jam_selesai' => $time_selesai[21],
            ];

            $this->Rolepanitia_model->update_jadwal($data21, $where21);
        }

        //DUA DUA
        if (date('Y-m-d H:i', strtotime($jadwal43)) < date('Y-m-d H:i', strtotime($jadwal42)) || date('Y-m-d H:i', strtotime($jadwal43)) > date('Y-m-d H:i', strtotime($jadwal44))) {
            $this->session->set_flashdata('jadwal_salah22', '<label  id="validasi_c22" class="text-danger"></label>');
        } else {
            $where22 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[22]
            ];
            $data22 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[22],
                // 'jam_mulai' => $time_mulai[22],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[22],
                // 'jam_selesai' => $time_selesai[22],
            ];

            $this->Rolepanitia_model->update_jadwal($data22, $where22);
        }

        //DUA TIGA
        if (date('Y-m-d H:i', strtotime($jadwal45)) < date('Y-m-d H:i', strtotime($jadwal44)) || date('Y-m-d H:i', strtotime($jadwal45)) > date('Y-m-d H:i', strtotime($jadwal46))) {
            $this->session->set_flashdata('jadwal_salah23', '<label  id="validasi_c23" class="text-danger"></label>');
        } else {
            $where23 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[23]
            ];
            $data23 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[23],
                // 'jam_mulai' => $time_mulai[23],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[23],
                // 'jam_selesai' => $time_selesai[23],
            ];
            $data99 = [
                'selesai_semua_tender' => $tanggal_selesai_jadwal[23],
            ];
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
            $this->Rolepanitia_model->update_jadwal($data23, $where23);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    public function simpanjadwal5($id_paket)
    {
        $id_jadwal_tender = $this->input->post('id_jadwal_tender[]');
        $tanggal_mulai_jadwal = $this->input->post('tanggal_mulai_jadwal[]');
        $tanggal_selesai_jadwal = $this->input->post('tanggal_selesai_jadwal[]');
        $jadwal1 = $tanggal_mulai_jadwal[1];
        $jadwal2 = $tanggal_selesai_jadwal[1];
        $jadwal3 = $tanggal_mulai_jadwal[2];
        $jadwal4 = $tanggal_selesai_jadwal[2];
        $jadwal5 = $tanggal_mulai_jadwal[3];
        $jadwal6 = $tanggal_selesai_jadwal[3];
        $jadwal7 = $tanggal_mulai_jadwal[4];
        $jadwal8 = $tanggal_selesai_jadwal[4];
        $jadwal9 = $tanggal_mulai_jadwal[5];
        $jadwal10 = $tanggal_selesai_jadwal[5];
        $jadwal11 = $tanggal_mulai_jadwal[6];
        $jadwal12 = $tanggal_selesai_jadwal[6];


        //row pertama
        if (date('Y-m-d H:i', strtotime($jadwal1)) > date('Y-m-d H:i', strtotime($jadwal2))) {
            $this->session->set_flashdata('jadwal_salah1', '<label id="validasi_c1" class="text-danger"></label>');
        } else {
            $where = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[1]
            ];
            $data = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[1],
                // 'jam_mulai' => $time_mulai[1],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[1],
                // 'jam_selesai' => $time_selesai[1],
            ];
            $data99 = [
                'batas_pendaftaran' => $tanggal_selesai_jadwal[1],
            ];
            $this->Rolepanitia_model->update_jadwal($data, $where);
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
        }

        //row kedua
        if (date('Y-m-d H:i', strtotime($jadwal3)) > date('Y-m-d H:i', strtotime($jadwal4))) {
            $this->session->set_flashdata('jadwal_salah2', '<label id="validasi_c2" class="text-danger"></label>');
        } else {
            $where2 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[2]
            ];
            $data2 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[2],
                // 'jam_mulai' => $time_mulai[2],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[2],
                // 'jam_selesai' => $time_selesai[2],
            ];
            $this->Rolepanitia_model->update_jadwal($data2, $where2);
        }

        //row ketiga
        if (date('Y-m-d H:i', strtotime($jadwal5)) < date('Y-m-d H:i', strtotime($jadwal4)) || date('Y-m-d H:i', strtotime($jadwal5)) > date('Y-m-d H:i', strtotime($jadwal6))) {
            $this->session->set_flashdata('jadwal_salah3', '<label  id="validasi_c3" class="text-danger"></label>');
        } else {
            $where3 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[3]
            ];
            $data3 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[3],
                // 'jam_mulai' => $time_mulai[3],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[3],
                // 'jam_selesai' => $time_selesai[3],
            ];

            $this->Rolepanitia_model->update_jadwal($data3, $where3);
        }

        //row keempat
        if (date('Y-m-d H:i', strtotime($jadwal7)) < date('Y-m-d H:i', strtotime($jadwal6)) || date('Y-m-d H:i', strtotime($jadwal7)) > date('Y-m-d H:i', strtotime($jadwal8))) {
            $this->session->set_flashdata('jadwal_salah4', '<label  id="validasi_c4" class="text-danger"></label>');
        } else {
            $where4 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[4]
            ];
            $data4 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[4],
                // 'jam_mulai' => $time_mulai[4],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[4],
                // 'jam_selesai' => $time_selesai[4],
            ];

            $this->Rolepanitia_model->update_jadwal($data4, $where4);
        }

        //row kelima
        if (date('Y-m-d H:i', strtotime($jadwal9)) < date('Y-m-d H:i', strtotime($jadwal8)) || date('Y-m-d H:i', strtotime($jadwal9)) > date('Y-m-d H:i', strtotime($jadwal10))) {
            $this->session->set_flashdata('jadwal_salah5', '<label id="validasi_c5" class="text-danger"></label>');
        } else {
            $where5 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[5]
            ];
            $data5 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[5],
                // 'jam_mulai' => $time_mulai[5],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[5],
                // 'jam_selesai' => $time_selesai[5],
            ];

            $this->Rolepanitia_model->update_jadwal($data5, $where5);
        }

        //row keenam
        if (date('Y-m-d H:i', strtotime($jadwal11)) < date('Y-m-d H:i', strtotime($jadwal10)) || date('Y-m-d H:i', strtotime($jadwal11)) > date('Y-m-d H:i', strtotime($jadwal12))) {
            $this->session->set_flashdata('jadwal_salah6', '<label  id="validasi_c6" class="text-danger"></label>');
        } else {
            $where6 = [
                'id_paket' => $id_paket,
                'id_jadwal_tender' => $id_jadwal_tender[6]
            ];
            $data6 = [
                'tanggal_mulai_jadwal' => $tanggal_mulai_jadwal[6],
                // 'jam_mulai' => $time_mulai[6],
                'tanggal_selesai_jadwal' => $tanggal_selesai_jadwal[6],
                // 'jam_selesai' => $time_selesai[6],
            ];
            $data99 = [
                'selesai_semua_tender' => $tanggal_selesai_jadwal[6],
            ];
            $this->Rolepanitia_model->update_batas_pendaftaran($data99, $id_paket);
            $this->Rolepanitia_model->update_jadwal($data6, $where6);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    //perubahan jadwal tender
    public function perubahan_jadwal($id_jadwal_tender)
    {

        $nama_pegawai = $this->input->post('nama_pegawai');
        $alasan_pengubahan = $this->input->post('alasan_pengubahan');
        $id_paket  = $this->input->post('id_paket');


        /*
			1. menunggu
			2. approve
			3. Ditolak
		*/
        $data = [
            'id_jadwal_tender' => $id_jadwal_tender,
            'user_created' => 'Panitia',
            'alasan_perubahan' => $alasan_pengubahan,
            'status_perubahan' => 2
        ];
        $data2 = $this->input->post('id_panitia');

        $this->Rolepanitia_model->update_perubahan_jadwal($id_jadwal_tender, $data);
        $kirim_email = $this->Rolepanitia_model->notif_perubahan_ketua($id_paket, $data2);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'jmtm.co.id',
            'smtp_port' => 465,
            'smtp_user' => 'eproc@jmtm.co.id',
            'smtp_pass' => '@dminJMTM!',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('eproc@jmtm.co.id', 'KintekIndo');

        // Email penerima
        $this->email->to($kirim_email->email); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('E-Procurement JMTM');

        // Isi email
        $this->email->message("Ada Permintaan Update Jadwal Dari : $nama_pegawai");

        $this->email->send();
        $this->session->set_flashdata('ubah', '<div class="alert alert-success alert-dismissible">Pengajuan Perubahan Jadwal Berhasil Dikirim!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }

    public function status_approve_panitia($id_jadwal_tender)
    {

        $nama_pegawai = $this->input->post('nama_pegawai');
        $alasan_pengubahan = $this->input->post('alasan_pengubahan');
        $id_paket  = $this->input->post('id_paket');

        /*
			1. menunggu
			2. approve
			3. Ditolak
		*/
        $data = [
            'id_jadwal_tender' => $id_jadwal_tender,
            'user_created' => 'Panitia',
            'alasan_perubahan' => $alasan_pengubahan,
            'status_perubahan' => 1
        ];

        $this->Rolepanitia_model->update_perubahan_jadwal($id_jadwal_tender, $data);
        $this->session->set_flashdata('ubah', '<div class="alert alert-success alert-dismissible">Pengajuan Perubahan Jadwal Berhasil Dikirim!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/jadwaltender/' . $id_paket);
    }


    //persetujuan tender
    public function persetujuantender()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_penyetuju = $this->input->post('nama_penyetuju');
        $jabatan = $this->input->post('jabatan');
        $selaku = $this->input->post('selaku');
        $alamat_kedudukan = $this->input->post('alamat_kedudukan');

        $data = [
            'id_paket' => $id_paket,
            'nama_penyetuju' => $nama_penyetuju,
            'jabatan' => $jabatan,
            'selaku' => $selaku,
            'alamat_kedudukan' => $alamat_kedudukan,
            'status_persetujuan' => 1,
        ];
        $this->Rolepanitia_model->insertpersetujuan($data);
        redirect('panitiajmtm/daftarpaket/tender/' . $id_paket);
    }
    //persetujuan tender
    public function status_tidak_setuju()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_penyetuju = $this->input->post('nama_penyetuju');
        $jabatan = $this->input->post('jabatan');
        $selaku = $this->input->post('selaku');
        $alasan = $this->input->post('alasan');
        $alamat_kedudukan = $this->input->post('alamat_kedudukan');

        $data = [
            'id_paket' => $id_paket,
            'nama_penyetuju' => $nama_penyetuju,
            'jabatan' => $jabatan,
            'selaku' => $selaku,
            'alasan' => $alasan,
            'alamat_kedudukan' => $alamat_kedudukan,
            'status_persetujuan' => 2
        ];
        $this->Rolepanitia_model->insertpersetujuan($data);
        redirect('panitiajmtm/daftarpaket/tender/' . $id_paket);
    }

    public function persyaratankualifikasi($id_paket)
    {
        // NIB 

        $data['perysaratan_vms'] = $this->Rolepanitia_model->get_data_persyaratan_vms();
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['persyaratan_izin_usaha'] = $this->Rolepanitia_model->by_id_result_persyaratan_izin_usaha($id_paket);
        $data['datapersayaratan'] = $this->Rolepanitia_model->by_id_persyaratan($id_paket);
        $data['nib'] = $this->Rolepanitia_model->get_nib();
        $data['cek_perysaratan_tender'] = $this->Rolepanitia_model->get_perysaratan_tender($id_paket);
        $data['persyaratan_tambahan'] = $this->Rolepanitia_model->get_persyaratan_tambahan($id_paket);
        $data['cek_nib'] = $this->Rolepanitia_model->get_persyaratan_nib($id_paket);
        $data['cek_dokumen'] = $this->Rolepanitia_model->get_persyartan_dokumen($id_paket);
        $data['cek_audit'] = $this->Rolepanitia_model->get_persyaratan_audit($id_paket);
        // var_dump($data['cek_nib']);
        // die;
        $id_pegawai = $this->session->userdata('id_pegawai');

        $data['cek_persyaratan_vms'] = $this->Rolepanitia_model->get_persyaratanvms_byPaket($id_paket);

        $data['cek_nib_dan_audit'] = $this->Rolepanitia_model->get_persyaratanvms_byPaket_row($id_paket);

        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        // $data['']
        $this->load->view('template_panitia/header', $data);
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/daftarpaket/persyaratankualifikasi', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax', $data);
    }

    //cek nib
    public function ambil_nib($id_paket)
    {
        $nib = $this->uri->segment(5);
        $ambil_nib = $this->db->query("SELECT nomor_nib_undangan FROM tbl_nib_undangan WHERE id_paket = $id_paket AND nomor_nib_undangan = $nib")->row_array();
        $ambil_nib_result = $this->db->query("SELECT * FROM tbl_nib_undangan WHERE id_paket = $id_paket")->result_array();
        $output = [
            "ambil_nib" => $ambil_nib,
            "ambil_nib_result" => $ambil_nib_result
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function ambil_nib2($id_paket)
    {
        $ambil_nib_result = $this->db->query("SELECT * FROM tbl_nib_undangan WHERE id_paket = $id_paket")->result_array();
        $output = [

            "ambil_nib_result" => $ambil_nib_result
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function by_id_persyaratan_vendor_ke_undang($id_paket)
    {

        $vendor = $this->Rolepanitia_model->get_persyaratanvms_byPaket_row($id_paket);
        $output = [
            "vendor" => $vendor
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function datatable_vendor_persyaratan_terundang($id_paket)
    {
        $nib_yang_terundang = $this->Rolepanitia_model->get_persyaratanvms_byPaket_row($id_paket);
        $nib = $nib_yang_terundang['nib_persyaratan'];
        // TDP

        $nib_undangan = $this->Rolepanitia_model->get_undangan_nib($id_paket);
        $nib_where = $nib_undangan[0]['nomor_nib_undangan'];
        $sarat_undangan_vms_tdp = $this->Rolepanitia_model->get_data_persyaratan_vms_detail_TDP($id_paket);
        $seumur_hidup_tdp = $sarat_undangan_vms_tdp['seumur_hidup'];
        $tanggal_berlaku_awal_tdp = $sarat_undangan_vms_tdp['tanggal_berlaku_awal'];
        $tanggal_berlaku_selesai_tdp = $sarat_undangan_vms_tdp['tanggal_berlaku_selesai'];

        // NPWP
        $sarat_undangan_vms_npwp = $this->Rolepanitia_model->get_data_persyaratan_vms_detail_NPWP($id_paket);
        $seumur_hidup_npwp = $sarat_undangan_vms_npwp['seumur_hidup'];
        $tanggal_berlaku_awal_npwp = $sarat_undangan_vms_npwp['tanggal_berlaku_awal'];
        $tanggal_berlaku_selesai_npwp = $sarat_undangan_vms_npwp['tanggal_berlaku_selesai'];
        $resultss = $this->Rolepanitia_model->datatable_vendor_persyaratan_terundang(
            $nib_undangan,
            $nib_where,
            $seumur_hidup_tdp,
            $tanggal_berlaku_awal_tdp,
            $tanggal_berlaku_selesai_tdp,
            // NPWP
            $seumur_hidup_npwp,
            $tanggal_berlaku_awal_npwp,
            $tanggal_berlaku_selesai_npwp,
            // NIB
            // $nib
        );
        // var_dump($resultss);
        // die;
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nomor_nib;
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_persyaratan_terundang(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_persyaratan_terundang(
                $nib_undangan,
                $nib_where,
                $seumur_hidup_tdp,
                $tanggal_berlaku_awal_tdp,
                $tanggal_berlaku_selesai_tdp,
                // NPWP
                $seumur_hidup_npwp,
                $tanggal_berlaku_awal_npwp,
                $tanggal_berlaku_selesai_npwp,
                // NIB
                // $nib
            ),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function save($id_paket)
    {
        // INI UNTUTK IZIN PERSYARATAN
        $jenis_izin = $this->input->post('jenis_izin');
        $izin_kualifikasi = $this->input->post('izin_kualifikasi');

        $result3 = array();
        foreach ($izin_kualifikasi as $key => $val) {
            $result3[] = array(
                'id_paket'   => $id_paket,
                'jenis_izin'   => $jenis_izin[$key],
                'status_checked_izin'   => 1,
                'izin_kualifikasi'   => $izin_kualifikasi[$key],
            );
        }
        $this->db->insert_batch('tbl_izin_klasifikasi', $result3);
        // INI UNTUK PERSYARATN KUALIFIKASI
        $nama_persyaratan_kualifikasi = $this->input->post('nama_persyaratan_kualifikasi');
        $nama_status = $this->input->post('nama_status[]');
        $status_checked_persyaratan = $this->input->post('status_checked_persyaratan');

        $result2 = array();
        foreach ($status_checked_persyaratan as $key => $val) {
            $result2[] = array(
                'id_paket'   => $id_paket,
                'nama_status' => $nama_status[$key],
                'nama_persyaratan_kualifikasi' => $nama_persyaratan_kualifikasi[$key],
                'status_checked_persyaratan' => $status_checked_persyaratan[$key],
            );
        }
        $this->db->insert_batch('tbl_persyaratan_kualifikasi', $result2);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }

    public function save2($id_paket)
    {

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }

    public function update_izin_usaha($id_paket)
    {
        $id_izin_usaha = $this->input->post('id_izin_usaha');
        $data = [
            'id_paket' => $id_paket,
            'id_izin_usaha' => $id_izin_usaha,
            'jenis_izin' => $this->input->post('jenis_izin'),
            'izin_kualifikasi' => $this->input->post('izin_kualifikasi'),
        ];
        $this->Rolepanitia_model->update_izin_usaha($id_izin_usaha, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }

    public function delete_izin_usaha($id_izin_usaha)
    {
        $data = $this->Rolepanitia_model->by_id_result_persyaratan_izin_usaha_row($id_izin_usaha);
        $id_paket = $data['id_paket'];
        $this->Rolepanitia_model->delete_persyaratan_izin($id_izin_usaha);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">Data Berhasil Delete!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }
    public function update_persyaratan_kualifikasi($update_persyaratan_kualifikasi)
    {
        $id_paket = $this->input->post('id_paket');
        $data = [
            'id_paket' => $id_paket,
            'status_checked_persyaratan' => $this->input->post('update_status_checked_persyaratan'),
            'nama_status' => $this->input->post('update_nama_status'),
            'nama_persyaratan_kualifikasi' => $this->input->post('update_nama_persyaratan_kualifikasi'),
        ];
        $this->Rolepanitia_model->Update_persyartan($update_persyaratan_kualifikasi, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }


    public function update_persyaratan2()
    {
        $id_paket = $this->input->post('id_paket');
        $id_persyartan = $this->input->post('id_persyaratan_kualifikasi');
        $output = [
            'id_paket' => $id_paket,
            'status_checked_persyaratan' => $this->input->post('status_checked_persyaratan'),
            'nama_status' => $this->input->post('nama_status'),
            'nama_persyaratan_kualifikasi' => $this->input->post('nama_persyaratan_kualifikasi'),
        ];
        $this->Rolepanitia_model->delete_persyaratan2($id_persyartan, $output);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function delete_pesyaratan2($id_persyartan)
    {
        $this->Rolepanitia_model->delete_pesyaratan2($id_persyartan);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function get_by_id_persyartaan($id_persyaratan_kualifikasi)
    {
        $get_persyaratan = $this->Rolepanitia_model->getById_persyaratan_kualifikasi($id_persyaratan_kualifikasi);
        $output = [
            "persyaratan" => $get_persyaratan
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function save_persyaratan_kualifikasi()
    {
        $id_paket = $this->input->post('id_paket');
        $dataizin = [];
        $this->Rolepanitia_model->insert_izin_usaha($dataizin);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }


    public function penawaranteknis($id_paket)
    {
        $data['paket'] = $this->Rolepanitia_model->getById($id_paket);
        $data['penawaranteknis_cek'] = $this->Rolepanitia_model->get_penawaran_teknis($id_paket);
        $data['masa_berlaku_penawaran'] = $this->Rolepanitia_model->get_masa_berlaku($id_paket);
        $data['penawaran'] = $this->Rolepanitia_model->get_penawaran($id_paket);
        $data['spesifikasi'] = $this->Rolepanitia_model->get_spesifikasi($id_paket);
        $data['penyerahan'] = $this->Rolepanitia_model->get_penyerahan($id_paket);
        $data['bagian_pekerjaan'] = $this->Rolepanitia_model->get_bagian_pekerjaan($id_paket);
        $data['browsur'] = $this->Rolepanitia_model->get_browsur($id_paket);
        $data['jaminan'] = $this->Rolepanitia_model->get_jaminan($id_paket);
        $data['asuransi'] = $this->Rolepanitia_model->get_asuransi($id_paket);
        $data['tenaga_teknis'] = $this->Rolepanitia_model->get_tenaga_teknis($id_paket);
        $data['rekapitulasi'] = $this->Rolepanitia_model->get_rekapitulasi($id_paket);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin');
        $this->load->view('panitia_view/daftarpaket/penawaranteknis', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax');
    }

    public function save_penawaran_teknis()
    {
        $id_paket = $this->input->post('id_paket');

        //masa berlaku penawran 1 
        $masa_berlaku_penawaran = $this->input->post('nama_masa_berlaku_penawaran');
        $status_checked_masa_berlaku = $this->input->post('status_checked_masa_berlaku_penawaran');

        //penawaran 2 
        $penawaran = $this->input->post('nama_penawaran');
        $status_checked_penawaran = $this->input->post('status_checked_penawaran');

        //spesifikasi 3
        $spesifikasi = $this->input->post('spesifikasi');
        $status_checked_spesifikasi = $this->input->post('status_checked_spesifikasi');

        //penyerahan 4
        $penyerahan = $this->input->post('nama_penyerahan');
        $status_checked_penyerahan = $this->input->post('status_checked_penyerahan');

        //bagian pekerjaan 5
        $nama_bagian_pekerjaan = $this->input->post('nama_bagian_pekerjaan');
        $status_checked_bagian_pekerjaan = $this->input->post('status_checked_bagian_pekerjaan');

        //nama browsur dan gambar gambar 6
        $nama_browsur = $this->input->post('nama_browsur');
        $status_checked_browsur = $this->input->post('status_checked_browsur');

        //jaminan purna jual 7
        $nama_jaminan = $this->input->post('nama_jaminan');
        $status_checked_jaminan = $this->input->post('status_checked_jaminan');

        //asuransi 8
        $nama_asuransi = $this->input->post('nama_asuransi');
        $status_checked_asuransi = $this->input->post('status_checked_asuransi');

        //tenaga teknis 9
        $nama_tenaga_teknis = $this->input->post('nama_tenaga_teknis');
        $status_checked_tenaga_teknis = $this->input->post('status_checked_tenaga_teknis');

        //nama_rekapitulasi 10
        $nama_rekapitulasi = $this->input->post('nama_rekapitulasi');
        $status_checked_rekapitulasi = $this->input->post('status_checked_rekapitulasi');

        $data = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $masa_berlaku_penawaran,
            'status_checked' => $status_checked_masa_berlaku,
            'kategori' => 'Administrasi'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data);

        $data2 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $penawaran,
            'status_checked' => $status_checked_penawaran,
            'kategori' => 'Administrasi'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data2);

        $data3 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $spesifikasi,
            'status_checked' => $status_checked_spesifikasi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data3);

        $data4 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $penyerahan,
            'status_checked' => $status_checked_penyerahan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data4);

        $data5 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_bagian_pekerjaan,
            'status_checked' => $status_checked_bagian_pekerjaan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data5);

        $data6 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_browsur,
            'status_checked' => $status_checked_browsur,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data6);

        $data7 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_jaminan,
            'status_checked' => $status_checked_jaminan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data7);

        $data8 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_asuransi,
            'status_checked' => $status_checked_asuransi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data8);

        $data9 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_tenaga_teknis,
            'status_checked' => $status_checked_tenaga_teknis,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data9);

        $data10 = [
            'id_paket' => $id_paket,
            'nama_penawaran_teknis' => $nama_rekapitulasi,
            'status_checked' => $status_checked_rekapitulasi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->insert_penawaran_teknis($data10);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/penawaranteknis/' . $id_paket);
    }

    public function update_penawaran_teknis($id_paket)
    {
        //masa berlaku penawran 1 
        $id_masa_berlaku = $this->input->post('id_masa_berlaku');
        $status_checked_masa_berlaku = $this->input->post('status_checked_masa_berlaku_penawaran');

        //penawaran 2 
        $id_penawaran = $this->input->post('id_penawaran');
        $status_checked_penawaran = $this->input->post('status_checked_penawaran');

        //spesifikasi 3
        $id_spesifikasi = $this->input->post('id_spesifikasi');
        $status_checked_spesifikasi = $this->input->post('status_checked_spesifikasi');

        //penyerahan 4
        $id_penyerahan = $this->input->post('id_penyerahan');
        $status_checked_penyerahan = $this->input->post('status_checked_penyerahan');

        //bagian pekerjaan 5
        $id_bagian_pekerjaan = $this->input->post('id_bagian_pekerjaan');
        $status_checked_bagian_pekerjaan = $this->input->post('status_checked_bagian_pekerjaan');

        //nama browsur dan gambar gambar 6
        $id_browsur = $this->input->post('id_browsur');
        $status_checked_browsur = $this->input->post('status_checked_browsur');

        //jaminan purna jual 7
        $id_jaminan = $this->input->post('id_jaminan');
        $status_checked_jaminan = $this->input->post('status_checked_jaminan');

        //asuransi 8
        $id_asuransi = $this->input->post('id_asuransi');
        $status_checked_asuransi = $this->input->post('status_checked_asuransi');

        //tenaga teknis 9
        $id_tenaga_teknis = $this->input->post('id_tenaga_teknis');
        $status_checked_tenaga_teknis = $this->input->post('status_checked_tenaga_teknis');

        //nama_rekapitulasi 10
        $id_rekapitulasi = $this->input->post('id_rekapitulasi');
        $status_checked_rekapitulasi = $this->input->post('status_checked_rekapitulasi');

        $data = [
            'id_penawaran_teknis' => $id_masa_berlaku,
            'status_checked' => $status_checked_masa_berlaku,
            'kategori' => 'Administrasi'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_masa_berlaku, $data);

        $data2 = [
            'id_penawaran_teknis' => $id_penawaran,
            'status_checked' => $status_checked_penawaran,
            'kategori' => 'Administrasi'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_penawaran, $data2);

        $data3 = [
            'id_penawaran_teknis' => $id_spesifikasi,
            'status_checked' => $status_checked_spesifikasi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_spesifikasi, $data3);

        $data4 = [
            'id_penawaran_teknis' => $id_penyerahan,
            'status_checked' => $status_checked_penyerahan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_penyerahan, $data4);

        $data5 = [
            'id_penawaran_teknis' => $id_bagian_pekerjaan,
            'status_checked' => $status_checked_bagian_pekerjaan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_bagian_pekerjaan, $data5);

        $data6 = [
            'id_penawaran_teknis' => $id_browsur,
            'status_checked' => $status_checked_browsur,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_browsur, $data6);

        $data7 = [
            'id_penawaran_teknis' => $id_jaminan,
            'status_checked' => $status_checked_jaminan,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_jaminan, $data7);

        $data8 = [
            'id_penawaran_teknis' => $id_asuransi,
            'status_checked' => $status_checked_asuransi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_asuransi, $data8);

        $data9 = [
            'id_penawaran_teknis' => $id_tenaga_teknis,
            'status_checked' => $status_checked_tenaga_teknis,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_tenaga_teknis, $data9);

        $data10 = [
            'id_penawaran_teknis' => $id_rekapitulasi,
            'status_checked' => $status_checked_rekapitulasi,
            'kategori' => 'Teknis'
        ];
        $this->Rolepanitia_model->update_penawaran_teknis($id_rekapitulasi, $data10);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/penawaranteknis/' . $id_paket);
    }

    public function get_data_paket()
    {
        $panitia = $this->session->userdata('id_panitia');
        $result = $this->Rolepanitia_model->get_paket_byPanitia($panitia);
    }

    //  INI UNTUK UPDATE /SIMPAN PAKET TENDER
    public function update_save_tender($id_paket)
    {
        $this->form_validation->set_rules('kualifikasi_usaha', 'Kualifikasi Usaha', 'required|trim', ['required' => 'Kualifikasi Usaha Wajib Diisi!']);
        $this->form_validation->set_rules('bobot_teknis', 'Bobot Teknis', 'required|trim', ['required' => 'Bobot Teknis Diisi!']);
        $this->form_validation->set_rules('bobot_biaya', 'Bobot Biaya', 'required|trim', ['required' => 'Bobot Biaya Diisi!']);

        if ($this->form_validation->run() == false) {
            $data = [
                'kualifikasi_usaha' => form_error('kualifikasi_usaha'),
                'bobot_teknis' => form_error('bobot_teknis'),
                'bobot_biaya' => form_error('bobot_biaya'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            // NIB 
            $perysaratan = $this->Rolepanitia_model->get_perysaratan_untuk_vendor($id_paket);
            $kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
            $bobot_teknis = $this->input->post('bobot_teknis');
            $bobot_biaya = $this->input->post('bobot_biaya');
            $data = [
                'id_paket' => $id_paket,
                'kualifikasi_usaha' => $kualifikasi_usaha,
                'bobot_teknis' => $bobot_teknis,
                'bobot_biaya' => $bobot_biaya,
                'status_paket_tender' => 2,
                'penetapan_pemenang' => 1,
                'yang_mengumumkan_paket' => $this->session->userdata('nama_pegawai'),
                'status_tahap_tender' => 2,
                'token' => random_string('alnum', 128),
                'token_vendor' => random_string('alnum', 128)
            ];
            $this->Rolepanitia_model->update_save_tender(array('id_paket' => $id_paket), $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            $this->session->set_flashdata('message', '<br> <div class="alert alert-primary alert-dismissible">' . '<div class="form-inline"><img width="100px" src=' . base_url('assets/img/logo_pengumuman.png') . ' > <h3>  PAKET TENDER BERHASIL DI UMUMKAN! </h3></div>' . '</div>');
        }
    }

    public function update_save_tender_ulang($id_paket)
    {
        $id_paketku = $this->Rolepanitia_model->getById($id_paket);
        $nama_paket = $id_paketku['nama_paket'];
        $data_vendor = $this->Rolepanitia_model->ambil_vendor($id_paket);
        $this->form_validation->set_rules('kualifikasi_usaha', 'Kualifikasi Usaha', 'required|trim', ['required' => 'Kualifikasi Usaha Wajib Diisi!']);
        $this->form_validation->set_rules('bobot_teknis', 'Bobot Teknis', 'required|trim', ['required' => 'Bobot Teknis Diisi!']);
        $this->form_validation->set_rules('bobot_biaya', 'Bobot Biaya', 'required|trim', ['required' => 'Bobot Biaya Diisi!']);

        if ($this->form_validation->run() == false) {
            $data = [
                'kualifikasi_usaha' => form_error('kualifikasi_usaha'),
                'bobot_teknis' => form_error('bobot_teknis'),
                'bobot_biaya' => form_error('bobot_biaya'),
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            // NIB 
            $kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
            $bobot_teknis = $this->input->post('bobot_teknis');
            $bobot_biaya = $this->input->post('bobot_biaya');
            $data = [
                'id_paket' => $id_paket,
                'kualifikasi_usaha' => $kualifikasi_usaha,
                'bobot_teknis' => $bobot_teknis,
                'bobot_biaya' => $bobot_biaya,
                'status_paket_tender' => 2,
                'penetapan_pemenang' => 1,
                'yang_mengumumkan_paket' => $this->session->userdata('nama_pegawai'),
                'status_tahap_tender' => 2,
                'status_pembatalan_atau_pengulangan' => null,
                'token' => random_string('alnum', 128),
                'token_vendor' => random_string('alnum', 128)
            ];
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'jmtm.co.id',
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
                $this->email->from('eproc@jmtm.co.id', 'KintekIndo');
                // Email penerima

                $this->email->to($value->email_usaha); // Ganti dengan email tujuan

                // Subject email
                $this->email->subject('E-PROCUREMENT JMTM :  TENDER PENGULANGAN DENGAN JADWAL BARU');

                // Isi email
                $this->email->message("PAKET TENDER YANG MENGALAMI PENGULANGAN SUDAH DIBUATKAN JADWAL BARU ANDA SUDAH DAPAT MENGIKUTI KEMBALI, SILAKAN LOGIN DAN CEK BERANDA ANDA DENGAN NAMA PAKET : $nama_paket UNTUK MENGETAHUI TAHAPAN-TAHAPAN TENDER SELANJUTNYA");
                $this->email->send();
            }
            $this->Rolepanitia_model->update_save_tender(array('id_paket' => $id_paket), $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
            $this->session->set_flashdata('message', '<br> <div class="alert alert-primary alert-dismissible">' . '<div class="form-inline"><img width="100px" src=' . base_url('assets/img/logo_pengumuman.png') . ' > <h3>  PAKET TENDER BERHASIL DI UMUMKAN! </h3></div>' . '</div>');
        }
    }

    public function save_masa_berlaku_penawaran()
    {
        $id_paket = $this->input->post('id_paket');
        $masa_berlaku_penawaran = $this->input->post('masa_berlaku_penawaran');

        $data = [
            'id_paket' => $id_paket,
            'masa_berlaku_penawaran' => $masa_berlaku_penawaran
        ];
        $this->Rolepanitia_model->save_masa_berlaku($id_paket, $data);
        $this->session->set_flashdata('masa_berlaku', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/tender/' . $id_paket);
    }

    public function simpan_jenis_kontrak()
    {
        $cara_pembayaran = $this->input->post('cara_pembayaran');
        $pembebanan_tahun_anggaran = $this->input->post('pembebanan_tahun_anggaran');
        $sumber_pendanaan = $this->input->post('sumber_pendanaan');
        $id_paket = $this->input->post('id_paket');

        $data = [
            'cara_pembayaran' => $cara_pembayaran,
            'pembebanan_tahun_anggaran' => $pembebanan_tahun_anggaran,
            'sumber_pendanaan' => $sumber_pendanaan,
            'id_paket' => $id_paket
        ];
        $this->db->insert('tbl_jenis_kontrak', $data);
        $this->session->set_flashdata('masa_berlaku', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/tender/' . $id_paket);
    }

    public function update_jenis_kontrak()
    {
        $cara_pembayaran = $this->input->post('cara_pembayaran');
        $pembebanan_tahun_anggaran = $this->input->post('pembebanan_tahun_anggaran');
        $sumber_pendanaan = $this->input->post('sumber_pendanaan');
        $id_jenis_kontrak = $this->input->post('id_jenis_kontrak');
        $id_paket = $this->input->post('id_paket');
        $data = [
            'cara_pembayaran' => $cara_pembayaran,
            'pembebanan_tahun_anggaran' => $pembebanan_tahun_anggaran,
            'sumber_pendanaan' => $sumber_pendanaan,
            'id_jenis_kontrak' => $id_jenis_kontrak
        ];
        $this->db->where('id_jenis_kontrak', $id_jenis_kontrak);
        $this->db->update('tbl_jenis_kontrak', $data);
        $this->session->set_flashdata('masa_berlaku', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/tender/' . $id_paket);
    }
    public function add_dokumen_kualifikasi_pdf()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen_kualifikasi_pdf = $this->input->post('nama_dokumen_kualifikasi_pdf');
        $config['upload_path'] = './dokumen_file_dokumen_kualifikasi_pdf/';
        $config['allowed_types'] = 'pdf|csv|xlsx|docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen_kualifikasi_pdf')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'status_dokumen_file_pdf' => 1,
                'nama_dokumen_kualifikasi_pdf' => $nama_dokumen_kualifikasi_pdf,
                'file_dokumen_kualifikasi_pdf' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->create_pdf_dokumen_kualifikasi($upload);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Pdf Berhasil Di Upload');
            redirect(base_url('panitiajmtm/daftarpaket/tender/' . $id_paket));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_dokumen_kualifikasi($id_dokumen_kualifikasi_pdf)
    {
        $id_paket = $this->Rolepanitia_model->get_by_dokumen_kualifikasi_pdf($id_dokumen_kualifikasi_pdf);
        $this->Rolepanitia_model->deletedata_dokumen_kualifikasi_pdf($id_dokumen_kualifikasi_pdf);
        $this->session->set_flashdata('pesan_pdf', 'Berhasil Di Delete');
        redirect(base_url('panitiajmtm/daftarpaket/tender/' . $id_paket['id_paket']));
    }


    public function add_dokumen_kualifikasi_pdf_lelang()
    {
        $id_paket = $this->input->post('id_paket');
        $nama_dokumen_lelang = $this->input->post('nama_dokumen_lelang');
        $config['upload_path'] = './file_dokumen_lelang/';
        $config['allowed_types'] = 'pdf|csv|xlsx|docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen_lelang')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'status_file_lelang' => 1,
                'nama_dokumen_lelang' => $nama_dokumen_lelang,
                'file_dokumen_lelang' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->create_pdf_dokumen_kualifikasi_lelang($upload);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Pdf Berhasil Di Upload');
            redirect(base_url('panitiajmtm/daftarpaket/tender/' . $id_paket));
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
        redirect(base_url('panitiajmtm/daftarpaket/tender/' . $id_paket['id_paket']));
    }

    // ini untuk bagian nontender / penunjukan langsung



    public function getdata_all_vendor_penunjukan_langsung()
    {
        $resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_penunjukan_langsung();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_vendor . "','tambah_vendor_lama'" . ')"><i class="fas fa fa-user"></i>  Pilih Penyedia</a>';
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->nama_provinsi . ' ' . $angga->nama_kabupaten . ' ' . $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function getdata_penyedia_terplilih($id_paket)
    {
        $resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_terpilih($id_paket);
        $ambil_metode_pemilihan = $this->Paket_model->getByid($id_paket);
        $id_metode_pemilihan = $ambil_metode_pemilihan['id_metode_pemilihan'];
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<a  class="badge badge-sm badge-info text-white" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','tambah_vendor'" . ')"><i class="fas fa fa-check"></i> Terpilih</a>';
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->email_usaha;
            $row[] =  $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            if ($id_metode_pemilihan == 4) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor_terbatas'" . ",'" . $angga->id_mengikuti_paket . "'" . ')"><i class="fas fa-user-edit"></i> Hapus Penyedia</a>';
            } else if ($id_metode_pemilihan == 6) {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor_terbatas'" . ",'" . $angga->id_mengikuti_paket . "'" . ')"><i class="fas fa-user-edit"></i> Hapus Penyedia</a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor'" . ')"><i class="fas fa-user-edit"></i> Revisi Pemilihan</a>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_terpilih(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_terpilih($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function getdata_penyedia_baru($id_paket)
    {
        $resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_baru($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-info" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','tambah_vendor'" . ')"><i class="fas fa fa-check"></i> </a>';
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->no_ktp_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->alamat_vendor;
            $row[] =  $angga->telpon_vendor;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-warning btn-block" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','edit_vendor'" . ')"><i class="fas fa fa-edit"></i> Edit Vendor</a><a href="javascript:;"  class="btn btn-sm btn-danger btn-block" id="prosess" onClick="byid_vendor_baru(' . "'" . $angga->id_mengikuti_vendor . "','hapus_vendor'" . ')"><i class="fas fa-user-edit"></i> Revisi Pemilihan</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_baru(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_baru($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_by_pilih_penyedia($id_paket)
    {
        // $chat_all = $this->Non_tender_model->chat_all_whastaap();
        $paketku = $this->Non_tender_model->get_row_vendor_mengikuti_paket_list($id_paket);
        $output = [
            "paketku" => $paketku
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_by_id_vendor_tambah($id_vendor)
    {
        $get_vendor = $this->Non_tender_model->get_row_vendor($id_vendor);
        $output = [
            "get_vendor" => $get_vendor
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function simpan_persyaratan_tender($id_paket)
    {
        $nib_persyaratan = $this->input->post('nib_persyaratan');
        $status_audit = $this->input->post('status_audit');
        $tahun_audit = $this->input->post('tahun_audit');
        $nama_persyaratan_detail = $this->input->post('nama_persyaratan_detail');
        $tanggal_mulai_berlaku = $this->input->post('tanggal_mulai_berlaku');
        $tanggal_selesai_berlaku = $this->input->post('tanggal_selesai_berlaku');
        $seumur_hidup = $this->input->post('seumur_hidup');
        $status_persyaratan_vms = $this->input->post('status_persyaratan_vms');
        $result = array();
        foreach ($nama_persyaratan_detail as $key => $val) {
            $result[] = array(
                'id_paket'   => $id_paket,
                'nib_persyaratan'   => $nib_persyaratan,
                'status_audit'   => $status_audit,
                'tahun_audit'   => $tahun_audit,
                'tanggal_berlaku_awal' => $tanggal_mulai_berlaku[$key],
                'tanggal_berlaku_selesai' => $tanggal_selesai_berlaku[$key],
                'nama_persyaratan_detail'   => $nama_persyaratan_detail[$key],
                'seumur_hidup'   => $seumur_hidup[$key],
                'status_persyaratan_vms'  => $status_persyaratan_vms[$key]
            );
        }
        $this->db->insert_batch('tbl_persyaratan_vms_detail', $result);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }

    public function persyaratan_tambahan_save($id_paket)
    {
        $nama_persyaratan_tambahan = $this->input->post('nama_persyaratan_tambahan');
        $keterangan_tambahan = $this->input->post('keterangan_tambahan');
        $id_paket = $this->input->post('id_paket');
        $config['upload_path'] = './file_persyaratan_tambahan/';
        $config['allowed_types'] = 'pdf|xlsx|xls|csv';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_persyaratan_tambahan')) {

            $fileData = $this->upload->data();

            $upload = [
                'nama_persyaratan' => $nama_persyaratan_tambahan,
                'keterangan' => $keterangan_tambahan,
                'id_paket' => $id_paket,
                'status_persyaratan_tambahan' => 1,
                'file_persyaratan_tambahan' => $fileData['file_name']
            ];
            $this->db->insert('tbl_persyaratan_tender', $upload);
            $this->session->set_flashdata('pesan_pdf', 'Dokumen Berhasil Di Upload');
            redirect(base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket));
        } else {

            $upload = [
                'nama_persyaratan' => $nama_persyaratan_tambahan,
                'keterangan' => $keterangan_tambahan,
                'id_paket' => $id_paket,
                'status_persyaratan_tambahan' => 1
            ];
            $this->db->insert('tbl_persyaratan_tender', $upload);
            $this->session->set_flashdata('pesan_pdf', 'Persyaratan Tambahan Berhasil Diinput');
            redirect(base_url('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket));
        }
    }

    public function update_persyaratan_tender($id_paket)
    {
        $nib = $this->input->post('nib_persyaratan');
        $status_audit = $this->input->post('status_audit');
        $tahun_audit = $this->input->post('tahun_audit');
        $data = [
            'nib_persyaratan' => $nib,
            'status_audit' => $status_audit,
            'tahun_audit' => $tahun_audit
        ];
        $this->Rolepanitia_model->update_seumur_hidupnya_syarat(array('id_paket' => $id_paket), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }

    public function delete_persyaratan_tambahan($id_persyaratan_tender)
    {
        $ambil_paket = $this->Rolepanitia_model->ambil_id_paket($id_persyaratan_tender);
        $this->Rolepanitia_model->delete_persyartan_tambahan($id_persyaratan_tender);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $ambil_paket['id_paket']);
    }

    public function update_persyaratan_tambahan($id_paket)
    {

        $id_persyaratan_tender = $this->input->post('id_persyaratan_tender');
        $nama_persyaratan_tambahan = $this->input->post('nama_persyaratan');
        $keterangan_tambahan = $this->input->post('keterangan');
        $id_paket = $this->input->post('id_paket');

        $upload = [
            'nama_persyaratan' => $nama_persyaratan_tambahan,
            'keterangan' => $keterangan_tambahan,
            'id_paket' => $id_paket,
            'status_persyaratan_tambahan' => 1
        ];
        $this->Rolepanitia_model->update_persyaratan_tambah($id_persyaratan_tender, $upload);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('panitiajmtm/daftarpaket/persyaratankualifikasi/' . $id_paket);
    }


    public function update_masa_berlaku($id_persyartan_detail)
    {

        $get_row_persyartan = $this->Rolepanitia_model->get_syarat_kehidupan($id_persyartan_detail);
        $output = [
            "get_row_persyartan" => $get_row_persyartan,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function update_tahun_berlaku()
    {
        $id_persyaratan_vms_detail_second = $this->input->post('id_persyaratan_vms_detail_for_tahun');
        $tanggal_berlaku_awal_for_tahun = $this->input->post('tanggal_berlaku_awal_for_tahun');
        $tanggal_berlaku_selesai_for_tahun = $this->input->post('tanggal_berlaku_selesai_for_tahun');
        $data = [
            'tanggal_berlaku_awal' => $tanggal_berlaku_awal_for_tahun,
            'tanggal_berlaku_selesai' => $tanggal_berlaku_selesai_for_tahun
        ];
        $this->Rolepanitia_model->update_seumur_hidupnya_syarat(array('id_persyaratan_vms_detail' => $id_persyaratan_vms_detail_second), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_seumur_idup()
    {
        $id_persyaratan_vms_detail_second = $this->input->post('id_persyaratan_vms_detail_second');
        $data = [
            'seumur_hidup' => null,
        ];
        $this->Rolepanitia_model->update_seumur_hidupnya_syarat(array('id_persyaratan_vms_detail' => $id_persyaratan_vms_detail_second), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_seumur_idup2()
    {
        $id_persyaratan_vms_detail_second = $this->input->post('id_persyaratan_vms_detail_second');
        $data = [
            'seumur_hidup' => 1,
            'tanggal_berlaku_awal' => null,
            'tanggal_berlaku_selesai' => null
        ];
        $this->Rolepanitia_model->update_seumur_hidupnya_syarat(array('id_persyaratan_vms_detail' => $id_persyaratan_vms_detail_second), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function tambah_penyedia($id_paket)
    {
        $data['cek_kak'] = $this->Paket_model->cek_kak($id_paket);
        $data['cek_sskk'] = $this->Paket_model->cek_kak($id_paket);
        $data['cek_informasi'] = $this->Paket_model->cek_informasi($id_paket);
        $data['total_rincian_hps']  = $this->Paket_model->totalRincianHps($id_paket);
        $data['status_rincian_hps']  = $this->Paket_model->status_rincian_hps($id_paket);
        $data['total_hps']  = $this->Paket_model->totalhps($id_paket);
        $data['sumberdana']  = $this->Paket_model->getSumberDana($id_paket);
        $data['lokasi_kerja']  = $this->Paket_model->getLokasiPekerjaan($id_paket);
        $data['jadwal_pemilihan']  = $this->Paket_model->getJadwalPemilihan($id_paket);
        $data['angga'] = $this->Paket_model->getByid($id_paket);
        $data['getdivisi'] = $this->Paket_model->get_devisi();
        $data['get_jenis_anggaran'] = $this->Paket_model->get_jenis_anggaran();
        $data['get_metode'] = $this->Paket_model->get_metode_pemilihan();
        $data['get_jenis_pengadaan'] = $this->Paket_model->get_jenis_pengadaan();
        $data['get_produk_dl_negri'] = $this->Paket_model->get_produk_dalam_negri();
        $data['kabupaten'] = $this->Wilayah_model->getAllKabupaten();
        $data['provinsi'] = $this->Wilayah_model->getProvinsi();
        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['status_penetapan_langsung'] = $this->Rolepanitia_model->cek_role_penetapan($id_pegawai);
        $this->load->view('template_panitia/header');
        $this->load->view('template/navlogin', $data);
        $this->load->view('panitia_view/daftarpaket/tambah_penyedia_baru', $data);
        $this->load->view('template_panitia/footer');
        $this->load->view('panitia_view/daftarpaket/ajax', $data);
    }

    public function getdata_all_vendor_penunjukan_lngsung()
    {
        $resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_vendor . "','tambah_vendor_lama'" . ')"><i class="fas fa fa-user"></i>  Pilih Penyedia</a>';
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->nama_provinsi . ' ' . $angga->nama_kabupaten . ' ' . $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function save_pilih_penyedia_baru($id_paket)
    {
        $username_vendor = $this->input->post('username_vendor');
        $password_vendor = $this->input->post('password_vendor');
        $email_vendor = $this->input->post('email_vendor');
        $no_ktp_vendor = $this->input->post('no_ktp_vendor');
        $telpon_vendor = $this->input->post('telpon_vendor');
        $alamat_vendor = $this->input->post('alamat_vendor');
        $status_mengikuti_paket =  $this->input->post('status_mengikuti_paket');
        $data  = array(
            'username_vendor' => $username_vendor,
            'password_vendor' => password_hash($password_vendor, PASSWORD_DEFAULT),
            'email_vendor' => $email_vendor,
            'no_ktp_vendor' => $no_ktp_vendor,
            'telpon_vendor' => $telpon_vendor,
            'alamat_vendor' => $alamat_vendor,
            'status_aktive_vendor' => 1,
            'status_vendor_baru' => 1,

        );
        $this->db->insert('tbl_vendor', $data);

        $package_id = $this->db->insert_id();
        $result = array();
        foreach ($status_mengikuti_paket as $key => $val) {
            $result[] = array(
                'id_mengikuti_vendor'   => $package_id,
                'id_mengikuti_paket_vendor'   => $id_paket,
                'status_mengikuti_paket'   => $status_mengikuti_paket[$key],
                'jenis_pemilihan' => 'vendor baru',
            );
        }
        $this->db->insert_batch('tbl_vendor_mengikuti_paket', $result);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function save_pilih_penyedia_lama($id_paket)
    {
        $id_mengikuti_vendor = $this->input->post('id_mengikuti_vendor');
        $id_metode_pemilihan = $this->Rolepanitia_model->getByid($id_paket);
        if ($id_metode_pemilihan['id_metode_pemilihan'] == 10) {
            $data  = array(
                'id_mengikuti_vendor' => $id_mengikuti_vendor,
                'id_mengikuti_paket_vendor' => $id_paket,
                'jenis_pemilihan' => 'vendor lama',
                'status_transaksi_langsung' => 1

            );
            $this->db->insert('tbl_vendor_mengikuti_paket', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else if ($id_metode_pemilihan['id_metode_pemilihan'] == 9) {
            $data  = array(
                'id_mengikuti_vendor' => $id_mengikuti_vendor,
                'id_mengikuti_paket_vendor' => $id_paket,
                'jenis_pemilihan' => 'vendor lama',
                'status_penetapan_langsung' => 1

            );
            $this->db->insert('tbl_vendor_mengikuti_paket', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else if ($id_metode_pemilihan['id_metode_pemilihan'] == 8) {
            $data  = array(
                'id_mengikuti_vendor' => $id_mengikuti_vendor,
                'id_mengikuti_paket_vendor' => $id_paket,
                'jenis_pemilihan' => 'vendor lama',
                'status_penunjukan_langsung' => 1

            );
            $this->db->insert('tbl_vendor_mengikuti_paket', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else if ($id_metode_pemilihan['id_metode_pemilihan'] == 4 || $id_metode_pemilihan['id_metode_pemilihan'] == 17) {
            $data  = array(
                'id_mengikuti_vendor' => $id_mengikuti_vendor,
                'id_mengikuti_paket_vendor' => $id_paket,
                'jenis_pemilihan' => 'vendor lama',
                'status_tender_terbatas ' => 1

            );
            $this->db->insert('tbl_vendor_mengikuti_paket', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else if ($id_metode_pemilihan['id_metode_pemilihan'] == 6) {
            $data  = array(
                'id_mengikuti_vendor' => $id_mengikuti_vendor,
                'id_mengikuti_paket_vendor' => $id_paket,
                'jenis_pemilihan' => 'vendor lama',
                'status_tender_terbatas ' => 1

            );
            $this->db->insert('tbl_vendor_mengikuti_paket', $data);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }
    public function edit_pilih_penyedia_baru()
    {
        $id_vendor = $this->input->post('id_mengikuti_vendor');
        $username_vendor = $this->input->post('username_vendor');
        $password_vendor = $this->input->post('password_vendor');
        $email_vendor = $this->input->post('email_vendor');
        $no_ktp_vendor = $this->input->post('no_ktp_vendor');
        $telpon_vendor = $this->input->post('telpon_vendor');
        $alamat_vendor = $this->input->post('alamat_vendor');
        $data = [
            'username_vendor' => $username_vendor,
            'password_vendor' => password_hash($password_vendor, PASSWORD_DEFAULT),
            'email_vendor' => $email_vendor,
            'no_ktp_vendor' => $no_ktp_vendor,
            'telpon_vendor' => $telpon_vendor,
            'alamat_vendor' => $alamat_vendor,
        ];
        $this->Rolepanitia_model->update_vendor_baru(array('id_vendor' => $id_vendor), $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function by_id_vendor_lama($id_vendor)
    {

        $get_vendor_lama = $this->Rolepanitia_model->get_by_id_vendor_lama($id_vendor);
        $output = [
            "get_vendor_lama" => $get_vendor_lama,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function by_id_vendor_baru($id_mengikuti_vendor)
    {

        $get_vendor_baru = $this->Rolepanitia_model->get_by_id_vendor_baru($id_mengikuti_vendor);
        $output = [
            "get_vendor_baru" => $get_vendor_baru,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function delete_vendor_baru($id_mengikuti_vendor)
    {
        $this->Rolepanitia_model->delete_vendor_baru1($id_mengikuti_vendor);
        $this->Rolepanitia_model->delete_vendor_baru2($id_mengikuti_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function delete_vendor_lama($id_mengikuti_paket_vendor)
    {
        $this->Rolepanitia_model->delete_vendor_baru3($id_mengikuti_paket_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function delete_vendor_baru_terbatas($id_mengikuti_paket)
    {
        $this->Rolepanitia_model->delete_vendor_baru_terbatas($id_mengikuti_paket);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // INI UNTUK SAVE TENDER PENUNJUKAN LANGSUNG
    //  INI UNTUK UPDATE /SIMPAN PAKET TENDER
    public function update_save_tender_penunjukan_langsung($id_paket)
    {

        $kirim_email = $this->input->post('kirim_email');
        $username_vendor = $this->input->post('username_vendor');
        $password_vendor = $this->input->post('password_vendor');
        $data = [
            'id_paket' => $id_paket,
            'status_paket_tender' => 2,
            'penetapan_pemenang' => 1,
            'yang_mengumumkan_paket' => $this->session->userdata('nama_pegawai'),
            'status_tahap_tender' => 2,
            'status_persetujuan_manager' => 4,
            'token' => random_string('alnum', 128),
            'token_vendor' => random_string('alnum', 128),
            'tahap_binding' => 1,
        ];
        $data2 = [
            'status_penunjukan_langsung' => 1
        ];
        // INI UNTUK KIRIM WA NYA

        $this->Rolepanitia_model->update_save_tender(array('id_paket' => $id_paket), $data);
        $this->Non_tender_model->tunjuk_penyedia(array('id_mengikuti_paket_vendor' => $id_paket), $data2);
        $vendor = $this->Rolepanitia_model->ambil_telpon_email($id_paket);
        if ($vendor['jenis_pemilihan'] == 'vendor lama') {
            $telpon = $vendor['telpon_usaha'];
        } else {
            $telpon = $vendor['telpon_vendor'];
        }

        $output = [
            "telpon" => $telpon,
            "vendor" => $vendor,
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
        $this->email->from('eproc@jmtm.co.id', 'JMTM');

        // Email penerima
        $this->email->to($kirim_email); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('E-PROCUREMENT JMTM PENUNJUKAN LANGSUNG');

        // Isi email
        $this->email->message("Kepada PT/PD : $username_vendor Anda Mempunyai Paket Penunjukan Langsung  Silakan Login Dan lihat Paket.                                                Username : $username_vendor           Password:$password_vendor                                    Login ke : https://vms.jmtm.co.id/auth");

        $this->email->send();

        $this->output->set_content_type('application/json')->set_output(json_encode($output));
        $this->session->set_flashdata('message', '<br> <div class="alert alert-primary alert-dismissible">' . '<div class="form-inline"><img width="100px" src=' . base_url('assets/img/logo_pengumuman.png') . ' > <h3>  PAKET TENDER BERHASIL DI UMUMKAN! </h3></div>' . '</div>');
    }

    // INI UNTUK DOKUMEN PENUNJANG

    public function getdatatable_dokumen_penunjang($id_paket)
    {
        $resultss = $this->Rolepanitia_model->getdatatable_dokumen_penunjang($id_paket);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] =  $angga->nama_dokumen_penunjang;
            $row[] = '<a href=' . base_url('/file_dokumen_penunjang' . '/' . $angga->file_dokumen_penunjang) . '>' . '<img width="40px" src=' . base_url('assets/img/pdf.png') . ' >' . '</a>';
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-danger" id="prosess" onClick="by_id_dokumen_penunjang(' . "'" . $angga->id_dokumen_penunjang . "','hapus_penunjang'" . ')"><i class="fas fa fa-trash"></i> </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_dokumen_penunjang(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_dokumen_penunjang($id_paket),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function by_id_dokumen_penunjang($id_dokumen_penunjang)
    {

        $get_dokumen = $this->Rolepanitia_model->by_id_dokumen_penunjang($id_dokumen_penunjang);
        $output = [
            "get_dokumen" => $get_dokumen,

        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function upload_dokumen_penunjang($id_paket)
    {
        $nama_dokumen_penunjang = $this->input->post('nama_dokumen_penunjang');
        $config['upload_path'] = './file_dokumen_penunjang/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_dokumen_penunjang')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_paket' => $id_paket,
                'nama_dokumen_penunjang' => $nama_dokumen_penunjang,
                'user_created' => $this->session->userdata('nama_pegawai'),
                'file_dokumen_penunjang' => $fileData['file_name'],
            ];
            $this->Rolepanitia_model->tambah_dokumen_penunjang($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode($upload));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('upload'));
        }
    }

    public function delete_dokumen_penunjang($id_dokumen_penunjang)
    {
        $this->Rolepanitia_model->delete_dokumen_penunjang($id_dokumen_penunjang);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // INI BAGIAN DI PERSYARTAN UNTUK MENGUNDANG VENDORR

    // INI DATA UNDUNAGAN PENYEDIA TERUNDANG

    public function cek_loop_js_persyartan()
    {
        $get_persyaratan = $this->Rolepanitia_model->get_data_persyaratan_vms();
        $output = [
            "persyaratan" => $get_persyaratan
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_penyedia_terundang()
    {
        $resultss = $this->Rolepanitia_model->get_data_penyedia_terundang();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_vendor . "','tambah_vendor_lama'" . ')"><i class="fas fa fa-user"></i>  Pilih Penyedia</a>';
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->nama_provinsi . ' ' . $angga->nama_kabupaten . ' ' . $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_terundang(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_terundang(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // public function insert_sbu($id_paket)
    // {
    // 	$cek_data = $this->input->post('id_sbu_selected');
    // 	$query = $this->db->query("SELECT * FROM tbl_paket_sbu_detail WHERE id_sbu = $cek_data AND id_paket = $id_paket")->row_array();

    // 	if ($this->input->post('id_sbu_selected')) {
    // 		if ($query == TRUE) {
    // 			$this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
    // 		} else {
    // 			$id_sbu = $this->input->post('id_sbu_selected');

    // 			$data = [
    // 				'id_sbu' => $id_sbu,
    // 				'id_paket' => $id_paket
    // 			];
    // 			$this->Rolepanitia_model->insert_sbu_paket($data);
    // 			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
    // 		}
    // 	} else {
    // 		// $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
    // 	}
    // }

    public function insert_sbu($id_paket)
    {
        // $cek_data = $this->input->post('id_sbu_selected');
        // $query = $this->db->query("SELECT * FROM tbl_paket_sbu_detail WHERE id_sbu = $cek_data AND id_paket = $id_paket")->row_array();

        $id_sbu = $this->input->post('id_sbu_selected');
        $kualifkasi_usaha_sb = $this->input->post('kualifikasi_usaha_sbu_detail_selected');
        $data = [
            'id_sbu' => $id_sbu,
            'kualifikasi_usaha_sbu_detail' => $kualifkasi_usaha_sb,
            'id_paket' => $id_paket
        ];
        $this->Rolepanitia_model->insert_sbu_paket($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function ambil_sbu($id_paket)
    {
        $sbu_paket = $this->Rolepanitia_model->get_sbu_paket($id_paket);
        $output = [
            "sbu_paket" => $sbu_paket
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function delete_sbu($id_sbu)
    {
        $this->Rolepanitia_model->delete_sbu($id_sbu);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function getdata_all_vendor_tender_terbatas($id_paket)
    {
        $resultss = $this->Rolepanitia_model->getdatatable_list_all_vendor_tender_terbatas();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $angga) {
            $cek_vendor = $this->Rolepanitia_model->get_mengikuti_paket_vendor($id_paket, $angga->id_vendor);
            $row = array();
            $row[] = ++$no;
            if ($cek_vendor) {
                $row[] = '<a  class="btn btn-sm btn-success text-white" id="prosess" ><i class="fas fa fa-check"></i>  Vendor Sudah Tepilih</a>';
            } else {
                $row[] = '<a href="javascript:;"  class="btn btn-sm btn-primary" id="prosess" onClick="by_id_vendor_lama(' . "'" . $angga->id_vendor . "','tambah_vendor_lama'" . ')"><i class="fas fa fa-user"></i>  Pilih Penyedia</a>';
            }
            $row[] =  $angga->username_vendor;
            $row[] =  $angga->email_vendor;
            $row[] =  $angga->nama_provinsi . ' ' . $angga->nama_kabupaten . ' ' . $angga->alamat_usaha;
            $row[] =  $angga->telpon_usaha;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Rolepanitia_model->count_all_data_all_vendor_list_all_vendor_tender_terbatas(),
            "recordsFiltered" => $this->Rolepanitia_model->count_filtered_data_all_vendor_list_all_vendor_tender_terbatas(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function update_persyaratan_vms_detail($id_persyartan_vms_detail)
    {
        $cek = $this->db->query("SELECT id_persyaratan_vms_detail, status_persyaratan_vms FROM tbl_persyaratan_vms_detail WHERE id_persyaratan_vms_detail = $id_persyartan_vms_detail")->row_array();
        if ($cek['status_persyaratan_vms']  == 1) {
            $data = [
                'status_persyaratan_vms' => 0
            ];
            $this->Rolepanitia_model->update_status_persyaratan_vms($data, $id_persyartan_vms_detail);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $data = [
                'status_persyaratan_vms' => 1
            ];
            $this->Rolepanitia_model->update_status_persyaratan_vms($data, $id_persyartan_vms_detail);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
        // $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // 30 juni 2022
    public function update_sts_peralatan($id_paket)
    {
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'sts_peralatan' => 1
        ];
        $this->Rolepanitia_model->update_sts_peralatan($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function unupdate_sts_peralatan($id_paket)
    {
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'sts_peralatan' => NULL
        ];
        $this->Rolepanitia_model->update_sts_peralatan($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update_sts_tenaga_ahli($id_paket)
    {
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'sts_tenaga_ahli' => 1
        ];
        $this->Rolepanitia_model->update_sts_peralatan($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function unupdate_sts_tenaga_ahli($id_paket)
    {
        $where = [
            'id_paket' => $id_paket
        ];
        $data = [
            'sts_tenaga_ahli' => NULL
        ];
        $this->Rolepanitia_model->update_sts_peralatan($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
