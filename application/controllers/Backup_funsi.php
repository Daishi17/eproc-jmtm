<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup_funsi extends CI_Controller
{

    public function update_pekerjaan_kontruksisaya()
    {

        $id_penilaian_pekerjaan_kontruksi_detail = $this->input->post('id_penilaian_pekerjaan_kontruksi_detail[]');
        $penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi_update[]');
        $nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi_update[]');

        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi_update');
        $status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi_update');
        $status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi_update');

        // 17
        $id_penilaian_pekerjaan_kontruksi_detail0 = $id_penilaian_pekerjaan_kontruksi_detail[0];
        $penilaian_pekerjaan_kontruksi0 = $penilaian_pekerjaan_kontruksi[0];
        $nilai_akhir_pekerjaan_kontruksi0 = $nilai_akhir_pekerjaan_kontruksi[0];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail0,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi0,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi0
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        $id_penilaian_pekerjaan_kontruksi_detail1 = $id_penilaian_pekerjaan_kontruksi_detail[1];
        $penilaian_pekerjaan_kontruksi1 = $penilaian_pekerjaan_kontruksi[1];
        $nilai_akhir_pekerjaan_kontruksi1 = $nilai_akhir_pekerjaan_kontruksi[1];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail1,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi1,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi1
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 2
        $id_penilaian_pekerjaan_kontruksi_detail2 = $id_penilaian_pekerjaan_kontruksi_detail[2];
        $penilaian_pekerjaan_kontruksi2 = $penilaian_pekerjaan_kontruksi[2];
        $nilai_akhir_pekerjaan_kontruksi2 = $nilai_akhir_pekerjaan_kontruksi[2];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail2,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi2,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi2
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 3
        $id_penilaian_pekerjaan_kontruksi_detail3 = $id_penilaian_pekerjaan_kontruksi_detail[3];
        $penilaian_pekerjaan_kontruksi3 = $penilaian_pekerjaan_kontruksi[3];
        $nilai_akhir_pekerjaan_kontruksi3 = $nilai_akhir_pekerjaan_kontruksi[3];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail3,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi3,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi3
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 4
        $id_penilaian_pekerjaan_kontruksi_detail4 = $id_penilaian_pekerjaan_kontruksi_detail[4];
        $penilaian_pekerjaan_kontruksi4 = $penilaian_pekerjaan_kontruksi[4];
        $nilai_akhir_pekerjaan_kontruksi4 = $nilai_akhir_pekerjaan_kontruksi[4];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail4,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi4,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi4
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 5
        $id_penilaian_pekerjaan_kontruksi_detail5 = $id_penilaian_pekerjaan_kontruksi_detail[5];
        $penilaian_pekerjaan_kontruksi5 = $penilaian_pekerjaan_kontruksi[5];
        $nilai_akhir_pekerjaan_kontruksi5 = $nilai_akhir_pekerjaan_kontruksi[5];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail5,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi5,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi5
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 6
        $id_penilaian_pekerjaan_kontruksi_detail6 = $id_penilaian_pekerjaan_kontruksi_detail[6];
        $penilaian_pekerjaan_kontruksi6 = $penilaian_pekerjaan_kontruksi[6];
        $nilai_akhir_pekerjaan_kontruksi6 = $nilai_akhir_pekerjaan_kontruksi[6];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail6,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi6,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi6
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 7
        $id_penilaian_pekerjaan_kontruksi_detail7 = $id_penilaian_pekerjaan_kontruksi_detail[7];
        $penilaian_pekerjaan_kontruksi7 = $penilaian_pekerjaan_kontruksi[7];
        $nilai_akhir_pekerjaan_kontruksi7 = $nilai_akhir_pekerjaan_kontruksi[7];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail7,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi7,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi7
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 8
        $id_penilaian_pekerjaan_kontruksi_detail8 = $id_penilaian_pekerjaan_kontruksi_detail[8];
        $penilaian_pekerjaan_kontruksi8 = $penilaian_pekerjaan_kontruksi[8];
        $nilai_akhir_pekerjaan_kontruksi8 = $nilai_akhir_pekerjaan_kontruksi[8];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail8,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi8,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi8
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 9
        $id_penilaian_pekerjaan_kontruksi_detail9 = $id_penilaian_pekerjaan_kontruksi_detail[9];
        $penilaian_pekerjaan_kontruksi9 = $penilaian_pekerjaan_kontruksi[9];
        $nilai_akhir_pekerjaan_kontruksi9 = $nilai_akhir_pekerjaan_kontruksi[9];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail9,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi9,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi9
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 10
        $id_penilaian_pekerjaan_kontruksi_detail10 = $id_penilaian_pekerjaan_kontruksi_detail[10];
        $penilaian_pekerjaan_kontruksi10 = $penilaian_pekerjaan_kontruksi[10];
        $nilai_akhir_pekerjaan_kontruksi10 = $nilai_akhir_pekerjaan_kontruksi[10];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail10,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi10,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi10
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 11
        $id_penilaian_pekerjaan_kontruksi_detail11 = $id_penilaian_pekerjaan_kontruksi_detail[11];
        $penilaian_pekerjaan_kontruksi11 = $penilaian_pekerjaan_kontruksi[11];
        $nilai_akhir_pekerjaan_kontruksi11 = $nilai_akhir_pekerjaan_kontruksi[11];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail11,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi11,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi11
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 12
        $id_penilaian_pekerjaan_kontruksi_detail12 = $id_penilaian_pekerjaan_kontruksi_detail[12];
        $penilaian_pekerjaan_kontruksi12 = $penilaian_pekerjaan_kontruksi[12];
        $nilai_akhir_pekerjaan_kontruksi12 = $nilai_akhir_pekerjaan_kontruksi[12];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail12,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi12,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi12
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 13
        $id_penilaian_pekerjaan_kontruksi_detail13 = $id_penilaian_pekerjaan_kontruksi_detail[13];
        $penilaian_pekerjaan_kontruksi13 = $penilaian_pekerjaan_kontruksi[13];
        $nilai_akhir_pekerjaan_kontruksi13 = $nilai_akhir_pekerjaan_kontruksi[13];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail13,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi13,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi13
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 14
        $id_penilaian_pekerjaan_kontruksi_detail14 = $id_penilaian_pekerjaan_kontruksi_detail[14];
        $penilaian_pekerjaan_kontruksi14 = $penilaian_pekerjaan_kontruksi[14];
        $nilai_akhir_pekerjaan_kontruksi14 = $nilai_akhir_pekerjaan_kontruksi[14];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail14,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi14,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi14
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 15
        $id_penilaian_pekerjaan_kontruksi_detail15 = $id_penilaian_pekerjaan_kontruksi_detail[15];
        $penilaian_pekerjaan_kontruksi15 = $penilaian_pekerjaan_kontruksi[15];
        $nilai_akhir_pekerjaan_kontruksi15 = $nilai_akhir_pekerjaan_kontruksi[15];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail15,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi15,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi15
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 16
        $id_penilaian_pekerjaan_kontruksi_detail16 = $id_penilaian_pekerjaan_kontruksi_detail[16];
        $penilaian_pekerjaan_kontruksi16 = $penilaian_pekerjaan_kontruksi[16];
        $nilai_akhir_pekerjaan_kontruksi16 = $nilai_akhir_pekerjaan_kontruksi[16];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail16,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi16,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi16
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        $where = [
            'id_mengikuti_paket_vendor' => $id_paket,
            'id_mengikuti_vendor' => $id_vendor,
        ];
        $data = [
            'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
            'status_rating' => $status_rating_pekerjaan_kontruksi,
            'status_rating_sudah_di_nilai' => 1,
            'status_jenis_penilayan' => 'kontruksi',
            'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function Update_warning_pekerjaan_kontruksi()
    {

        $id_penilaian_pekerjaan_kontruksi_detail = $this->input->post('id_penilaian_pekerjaan_kontruksi_detail[]');
        $penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi_update[]');
        $nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi_update[]');
        $id_paket = $this->input->post('id_paket');
        $id_vendor = $this->input->post('id_vendor');
        $rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi_update');
        $status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi_update');
        $status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi_update');
        if ($status_nilai_akhir_pekerjaan_kontruksi <= 51) {
            $area_agency = $this->session->userdata('id_unit_kerja2');
            $data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
            $id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
            $id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
            $vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);
            if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 2,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            }
        } else if ($status_nilai_akhir_pekerjaan_kontruksi <= 70) {
            $area_agency = $this->session->userdata('id_unit_kerja2');
            $data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
            $id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
            $id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
            $vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);
            if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 0,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            }
        } else if ($status_nilai_akhir_pekerjaan_kontruksi <= 80) {
            $area_agency = $this->session->userdata('id_unit_kerja2');
            $data['data_pemenang'] = $this->Penilaian_vendor_model->get_paket_data_vendor_pemenang($area_agency, $id_paket);
            $id_vendor2 = $data['data_pemenang']['id_mengikuti_vendor'];
            $id_paket_vendor = $data['data_pemenang']['id_mengikuti_paket_vendor'];
            $vendor_pemenag_by_id_pekerjaan_kontruksi = $this->Penilaian_vendor_model->by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor2, $id_paket_vendor);
            if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 1,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            } else {
                $where_tbl_vendor_warning = [
                    'id_vendor' => $id_vendor,
                ];
                $data_tbl_vendor_warning = [
                    'status_warning_vendor' => 0,
                ];
                $this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
            }
        }
        $where = [
            'id_mengikuti_paket_vendor' => $id_paket,
            'id_mengikuti_vendor' => $id_vendor,
        ];
        $data = [
            'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
            'status_rating' => $status_rating_pekerjaan_kontruksi,
            'status_rating_sudah_di_nilai' => 1,
            'status_jenis_penilayan' => 'kontruksi',
            'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
        // 17
        $id_penilaian_pekerjaan_kontruksi_detail0 = $id_penilaian_pekerjaan_kontruksi_detail[0];
        $penilaian_pekerjaan_kontruksi0 = $penilaian_pekerjaan_kontruksi[0];
        $nilai_akhir_pekerjaan_kontruksi0 = $nilai_akhir_pekerjaan_kontruksi[0];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail0,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi0,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi0
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        $id_penilaian_pekerjaan_kontruksi_detail1 = $id_penilaian_pekerjaan_kontruksi_detail[1];
        $penilaian_pekerjaan_kontruksi1 = $penilaian_pekerjaan_kontruksi[1];
        $nilai_akhir_pekerjaan_kontruksi1 = $nilai_akhir_pekerjaan_kontruksi[1];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail1,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi1,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi1
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 2
        $id_penilaian_pekerjaan_kontruksi_detail2 = $id_penilaian_pekerjaan_kontruksi_detail[2];
        $penilaian_pekerjaan_kontruksi2 = $penilaian_pekerjaan_kontruksi[2];
        $nilai_akhir_pekerjaan_kontruksi2 = $nilai_akhir_pekerjaan_kontruksi[2];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail2,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi2,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi2
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 3
        $id_penilaian_pekerjaan_kontruksi_detail3 = $id_penilaian_pekerjaan_kontruksi_detail[3];
        $penilaian_pekerjaan_kontruksi3 = $penilaian_pekerjaan_kontruksi[3];
        $nilai_akhir_pekerjaan_kontruksi3 = $nilai_akhir_pekerjaan_kontruksi[3];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail3,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi3,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi3
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);

        // 4
        $id_penilaian_pekerjaan_kontruksi_detail4 = $id_penilaian_pekerjaan_kontruksi_detail[4];
        $penilaian_pekerjaan_kontruksi4 = $penilaian_pekerjaan_kontruksi[4];
        $nilai_akhir_pekerjaan_kontruksi4 = $nilai_akhir_pekerjaan_kontruksi[4];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail4,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi4,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi4
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 5
        $id_penilaian_pekerjaan_kontruksi_detail5 = $id_penilaian_pekerjaan_kontruksi_detail[5];
        $penilaian_pekerjaan_kontruksi5 = $penilaian_pekerjaan_kontruksi[5];
        $nilai_akhir_pekerjaan_kontruksi5 = $nilai_akhir_pekerjaan_kontruksi[5];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail5,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi5,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi5
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 6
        $id_penilaian_pekerjaan_kontruksi_detail6 = $id_penilaian_pekerjaan_kontruksi_detail[6];
        $penilaian_pekerjaan_kontruksi6 = $penilaian_pekerjaan_kontruksi[6];
        $nilai_akhir_pekerjaan_kontruksi6 = $nilai_akhir_pekerjaan_kontruksi[6];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail6,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi6,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi6
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 7
        $id_penilaian_pekerjaan_kontruksi_detail7 = $id_penilaian_pekerjaan_kontruksi_detail[7];
        $penilaian_pekerjaan_kontruksi7 = $penilaian_pekerjaan_kontruksi[7];
        $nilai_akhir_pekerjaan_kontruksi7 = $nilai_akhir_pekerjaan_kontruksi[7];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail7,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi7,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi7
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 8
        $id_penilaian_pekerjaan_kontruksi_detail8 = $id_penilaian_pekerjaan_kontruksi_detail[8];
        $penilaian_pekerjaan_kontruksi8 = $penilaian_pekerjaan_kontruksi[8];
        $nilai_akhir_pekerjaan_kontruksi8 = $nilai_akhir_pekerjaan_kontruksi[8];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail8,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi8,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi8
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 9
        $id_penilaian_pekerjaan_kontruksi_detail9 = $id_penilaian_pekerjaan_kontruksi_detail[9];
        $penilaian_pekerjaan_kontruksi9 = $penilaian_pekerjaan_kontruksi[9];
        $nilai_akhir_pekerjaan_kontruksi9 = $nilai_akhir_pekerjaan_kontruksi[9];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail9,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi9,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi9
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 10
        $id_penilaian_pekerjaan_kontruksi_detail10 = $id_penilaian_pekerjaan_kontruksi_detail[10];
        $penilaian_pekerjaan_kontruksi10 = $penilaian_pekerjaan_kontruksi[10];
        $nilai_akhir_pekerjaan_kontruksi10 = $nilai_akhir_pekerjaan_kontruksi[10];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail10,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi10,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi10
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 11
        $id_penilaian_pekerjaan_kontruksi_detail11 = $id_penilaian_pekerjaan_kontruksi_detail[11];
        $penilaian_pekerjaan_kontruksi11 = $penilaian_pekerjaan_kontruksi[11];
        $nilai_akhir_pekerjaan_kontruksi11 = $nilai_akhir_pekerjaan_kontruksi[11];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail11,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi11,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi11
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 12
        $id_penilaian_pekerjaan_kontruksi_detail12 = $id_penilaian_pekerjaan_kontruksi_detail[12];
        $penilaian_pekerjaan_kontruksi12 = $penilaian_pekerjaan_kontruksi[12];
        $nilai_akhir_pekerjaan_kontruksi12 = $nilai_akhir_pekerjaan_kontruksi[12];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail12,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi12,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi12
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 13
        $id_penilaian_pekerjaan_kontruksi_detail13 = $id_penilaian_pekerjaan_kontruksi_detail[13];
        $penilaian_pekerjaan_kontruksi13 = $penilaian_pekerjaan_kontruksi[13];
        $nilai_akhir_pekerjaan_kontruksi13 = $nilai_akhir_pekerjaan_kontruksi[13];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail13,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi13,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi13
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 14
        $id_penilaian_pekerjaan_kontruksi_detail14 = $id_penilaian_pekerjaan_kontruksi_detail[14];
        $penilaian_pekerjaan_kontruksi14 = $penilaian_pekerjaan_kontruksi[14];
        $nilai_akhir_pekerjaan_kontruksi14 = $nilai_akhir_pekerjaan_kontruksi[14];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail14,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi14,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi14
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 15
        $id_penilaian_pekerjaan_kontruksi_detail15 = $id_penilaian_pekerjaan_kontruksi_detail[15];
        $penilaian_pekerjaan_kontruksi15 = $penilaian_pekerjaan_kontruksi[15];
        $nilai_akhir_pekerjaan_kontruksi15 = $nilai_akhir_pekerjaan_kontruksi[15];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail15,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi15,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi15
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        // 16
        $id_penilaian_pekerjaan_kontruksi_detail16 = $id_penilaian_pekerjaan_kontruksi_detail[16];
        $penilaian_pekerjaan_kontruksi16 = $penilaian_pekerjaan_kontruksi[16];
        $nilai_akhir_pekerjaan_kontruksi16 = $nilai_akhir_pekerjaan_kontruksi[16];
        $where = [
            'id_penilaian_pekerjaan_kontruksi_detail' => $id_penilaian_pekerjaan_kontruksi_detail16,
        ];
        $data = [
            'penilaian_kontruksi_detail' => $penilaian_pekerjaan_kontruksi16,
            'nilai_akhir_pekerjaan_kontruksi_detail' => $nilai_akhir_pekerjaan_kontruksi16
        ];
        $this->Penilaian_vendor_model->update_pekerjaan_kontruksi_aspek($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
