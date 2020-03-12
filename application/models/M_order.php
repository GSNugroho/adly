<?php 
class M_order extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra_order
        JOIN kota ON almt_kt_kirim = id_kota
        JOIN a_ekspedisi ON ekspedisi = kd_ekspedisi");
		return $query->result();
    }
    
	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra_order
        JOIN kota ON almt_kt_kirim = id_kota
        JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
        JOIN a_ekspedisi ON adilaya_dt_mitra_order.ekspedisi = kd_ekspedisi WHERE 1=1".$searchQuery);
		return $query->result();
    }
    
	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."
        adilaya_dt_mitra_order.kd_mitra as kd_mitra, nm_mitra, kd_order, dt_trans, adilaya_dt_mitra_order.almt_kirim as almt_kirim, nama_kota, jml_transfer, adilaya_dt_mitra_order.nm_bank as nm_bank, adilaya_dt_mitra_order.ats_nm_rekening as ats_nm_rekening, 
        nama_ekspedisi, ket FROM adilaya_dt_mitra_order
        JOIN kota ON almt_kt_kirim = id_kota
        JOIN a_ekspedisi ON ekspedisi = kd_ekspedisi
        JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
		WHERE 1=1 ".$searchQuery." and kd_order NOT IN (
			SELECT TOP ".$baris." kd_order FROM adilaya_dt_mitra_order 
			WHERE 1=1".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
    }
    
    function rincian_order($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE kd_order = '".$id."'");
        return $query->result();
    }
}
?>