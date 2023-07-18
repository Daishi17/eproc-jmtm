<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progres_kinerja_vendor_model extends CI_Model
{


    public function getByid($id_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_paket');
        $this->db->join('tbl_tahun_anggaran', 'tbl_tahun_anggaran.id_tahun_anggaran = tbl_paket.id_tahun_anggaran', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_metode_evaluasi', 'tbl_metode_evaluasi.id_metode_evaluasi = tbl_paket.id_metode_evaluasi', 'left');
        $this->db->join('tbl_jadwal_kualifikasi', 'tbl_jadwal_kualifikasi.id_kualifikasi = tbl_paket.id_kualifikasi', 'left');
        $this->db->join('tbl_metode_dokumen', 'tbl_metode_dokumen.id_metode_dokumen = tbl_paket.id_metode_dokumen', 'left');
        $this->db->join('tbl_produk_dalam_luar_negri', 'tbl_produk_dalam_luar_negri.id_produk_dl_negri = tbl_paket.id_produk_dl_negri', 'left');
        $this->db->join('tbl_sub_agency', 'tbl_sub_agency.id_sub_agency = tbl_paket.id_sub_agency', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->row_array();
    }
    // TAMBAH PROGRES KINERJA VENDOR
    public function tambah_progres_kinerja_vendor($data)
    {
        $this->db->insert('tbl_progres_pekerjaan_tender', $data);
        return $this->db->affected_rows();
    }
    // get_all_vendor_kinerja
    public function get_all_vendor_kinerja($id_paket, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_progres_pekerjaan_tender');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_paket', $id_paket);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_nilai_persen_progres_kinerja($id_paket, $id_vendor)
    {
        $this->db->select_sum('persen_progres');
        $this->db->where('id_paket', $id_paket);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->from('tbl_progres_pekerjaan_tender');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function hapus_progres_kinerja($id_progres_pekerjaan_tender)
    {
        $this->db->delete('tbl_progres_pekerjaan_tender', ['id_progres_pekerjaan_tender' => $id_progres_pekerjaan_tender]);
    }

    public function by_id_progres_vendor($id_progres_pekerjaan_tender)
    {
        $this->db->select('*');
        $this->db->from('tbl_progres_pekerjaan_tender');
        $this->db->where('id_progres_pekerjaan_tender', $id_progres_pekerjaan_tender);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_progres_vendor($data, $where)
    {
        $this->db->where($where)
            ->update('tbl_progres_pekerjaan_tender', $data);
        return $this->db->affected_rows();
    }

    public function update_selesai_tender($data, $where)
    {
        $this->db->where($where)
            ->update('tbl_vendor_mengikuti_paket', $data);
        return $this->db->affected_rows();
    }
}
