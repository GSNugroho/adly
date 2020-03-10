<?php
class M_monitor extends CI_Model{

	public $table = 'adilaya_dt_mitra';
	// public $tbaset = 'aset_barang';
	public $id = 'kd_tmp_order';
	// public $id_a = 'vc_nm_barang';
	// public $order = 'DESC';
	public $table2 = 'tmp_order';
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
	function get_data()
	{
		$query = $this->db->query("SELECT nm_mitra, tgl_lahir, almt_rmh, almt_kt_rmh, almt_outlet, almt_kirim, paket, jml_tarif, rekening, ats_nm_rekening, ekspedisi, biaya_kirim FROM adilaya_dt_mitra");
		return $query->result();
	}

	function get_limit_data($limit, $start = 0, $q = NULL){
		$this->db->order_by($this->id, $this->order);
        $this->db->like('id_inv', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	function insert($data){
		$this->db->insert($this->table, $data);
	}

	function tmp_order_insert($data){
		$this->db->insert($this->table2, $data);
	}

	function insertaset($dataaset){
		$this->db->insert($this->tbaset, $dataaset);
	}

	function update($id, $data){
		$this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
	}
	function update_aset($id, $dataaset){
		$this->db->where($this->id_a, $id);
		$this->db->update($this->tbaset, $dataaset);
	}

	function get_by_id($id){
		$query = $this->db->query("SELECT * FROM adilaya_dt_mitra WHERE kd_mitra = '".$id."'");
		return $query->row();
	}
	
	function delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	function tmp_order_delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table2);
	}
	
	function jumlah_data(){
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $this->db->get('inv_barang')->num_rows();
	}

	function data($number,$offset){
		$this->db->order_by('kd_inv', 'asc');
		$this->db->join('inv_merk', 'inv_barang.merk = inv_merk.vc_kd_merk');
		$this->db->join('inv_pubgugus','inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
		$this->db->join('inv_golongan','inv_barang.kd_bantu = inv_golongan.id_gol');
		$this->db->join('inv_jenis','inv_barang.jns_brg = inv_jenis.in_kd_jenis');
		$this->db->join('aset_barang','inv_barang.kd_aset = aset_barang.vc_nm_barang');
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $query = $this->db->get('inv_barang',$number,$offset)->result();		
	}

	function get_paket(){
		$query = $this->db->query('SELECT * FROM adilaya_paket ORDER BY kd_paket asc');
		return $query->result();
	}
	function get_ekspedisi(){
		$query = $this->db->query('SELECT * FROM a_ekspedisi ORDER BY kd_ekspedisi asc');
		return $query->result();
	}
	function get_barang(){
		$query = $this->db->query("SELECT * FROM a_barang ORDER BY kd_barang asc");
		return $query->result();
	}
	function get_harga_brg($kd_barang){
		$query = $this->db->query("SELECT harga_barang FROM a_barang WHERE kd_barang = '".$kd_barang."'");
		return $query->row();
	}
	function get_provinsi(){
		$query = $this->db->query('SELECT * FROM provinsi ORDER BY nama_provinsi');
		return $query->result();
	}
	function get_kota($id){
		$query = $this->db->query("SELECT * FROM kota WHERE id_provinsi_fk = '".$id."'");
		return $query->result();
	}
	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_mitra) AS maxkode FROM adilaya_dt_mitra');
		return $query->result();
	}
	function get_kode_order(){
		$query = $this->db->query('SELECT MAX(kd_tmp_order) AS maxkode FROM tmp_order');
		return $query->result();
	}
	function get_k_aset($id, $th){
		$query = $this->db->query("SELECT MAX(vc_nm_barang) AS maxkode FROM aset_barang WHERE aset_barang.vc_nm_barang LIKE '%".$id."%'AND aset_barang.vc_nm_barang LIKE '%".$th."%'");
		return $query->result();
	}
	function get_no_aset(){
		$query = $this->db->query("SELECT MAX(no_aset) AS maxkode FROM inv_barang WHERE aktif=1");
		return $query->result();
	}
	function get_p($id_rng, $tgl_m, $merk){
		$query = $this->db->query("SELECT * FROM inv_barang WHERE id_ruang = '$id_rng' and tgl_terima = '$tgl_m' and merk = '$merk' and aktif=1");
		return $query->result();
	}
	function get_urut_brg($rng, $tgl_m, $merk){
		$query = $this->db->query("SELECT MAX(id_urut) as maxkode FROM inv_barang WHERE id_ruang = '$rng' and tgl_terima = '$tgl_m' and merk = '$merk' and aktif=1");
		return $query->result();
	}
	function get_in_kd_barang(){
		$query = $this->db->query('SELECT MAX(in_kd_barang) AS maxkode FROM aset_barang');
		return $query->result();
	}
	function cek_aset($kd_aset){
		$query = $this->db->query("SELECT vc_nm_barang FROM aset_barang WHERE vc_nm_barang = '".$kd_aset."'");
		return $query->result();
	}
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra");
		return $query->result();
	}
	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra WHERE 1=1".$searchQuery);
		return $query->result();
	}
	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."
		kd_mitra,
		nm_mitra, 
		tgl_lahir, 
		almt_rmh, 
		nama_kota, 
		almt_outlet, 
		almt_kirim, 
		nm_paket, 
		jml_tarif, 
		rekening, 
		ats_nm_rekening, 
		nama_ekspedisi, 
		biaya_kirim 
		FROM adilaya_dt_mitra 
		JOIN kota on almt_kt_rmh = id_kota
		JOIN adilaya_paket on paket = kd_paket
		JOIN a_ekspedisi on ekspedisi = kd_ekspedisi
		WHERE 1=1 ".$searchQuery." and kd_mitra NOT IN (
			SELECT TOP ".$baris." kd_mitra FROM adilaya_dt_mitra 
			WHERE 1=1".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_total_dt_or(){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang");
		return $query->result();
	}
	function get_total_fl_or($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang WHERE 1=1".$searchQuery);
		return $query->result();
	}
	function get_total_ft_or($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."
		kd_tmp_order, nm_barang, jml_barang, kd_mitra, tmp_order.harga_barang as harga_barang
		FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang
		WHERE 1=1 ".$searchQuery." and kd_tmp_order NOT IN (
			SELECT TOP ".$baris." kd_tmp_order FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang
			WHERE 1=1".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}
}
?>