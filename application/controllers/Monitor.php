<?php
class Monitor extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			// if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
			$this->load->model('M_monitor');
			$this->load->library('form_validation');
			// }else {
			// 	echo redirect(base_url('../'));
			// }
	   }
 
	public function index(){
		$data = array(
			'dd_bg' => $this->M_monitor->get_barang()
		);
		$this->load->view('monitor/monitor', $data);
		}
		
	function create(){
		
		$data['dd_pk'] = $this->M_monitor->get_paket();
		$data = array(
			'dd_pk' => $this->M_monitor->get_paket(),
			'dd_ek' => $this->M_monitor->get_ekspedisi(),
			'dd_pr' => $this->M_monitor->get_provinsi(),
			'dd_bg' => $this->M_monitor->get_barang()
		);
		 $this->load->view('monitor/monitor_form', $data);
	}
	public function create_action(){
			$aktif = 1;
			if($this->input->post('cek') == 1){
				$kirim = $this->input->post('almt_rmh');
			}else{
				$kirim = $this->input->post('almt_outlet');
			}
			$data = array(
			'nm_mitra' => $this->input->post('nm_mitra', TRUE),
			'kt_lahir' => $this->input->post('kt_lahir', TRUE),
			'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'almt_rmh' => $this->input->post('almt_rmh', TRUE),
			'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'no_hp1' => $this->input->post('no_hp1', TRUE),
			'no_hp2' => $this->input->post('no_hp2', TRUE),
			'almt_outlet' => $this->input->post('almt_outlet', TRUE),
			'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kirim' => $this->input->post('almt_kirim'),
			'sts_pmby' => $this->input->post('sts_pmby'),
			'paket' => $this->input->post('paket', TRUE),
			'jml_tarif' => $this->input->post('jml_tarif', TRUE),
			'nm_bank' => $this->input->post('nm_bank', TRUE),
			'rekening' => $this->input->post('rekening', TRUE),
			'ats_nm_rekening' => $this->input->post('ats_nm_rekening', TRUE),
			'ekspedisi' => $this->input->post('ekspedisi', TRUE),
			'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
			'kd_mitra' => $this->kode(),
			'dt_aktif' => $aktif,
			'dt_create' => date('Y-m-d')
			);
			
			$this->M_monitor->insert($data);
			// $this->M_monitor->insertaset($dataaset);
			$this->session->set_flashdata('message','Data Barang Berhasil Ditambahkan');
			redirect(site_url('Monitor'));
		}
	// }

	// public function _rules()
	// {
	// 	$this->form_validation->set_rules('nm_inv', 'Nama Barang', 'trim|required');
	// 	$this->form_validation->set_rules('kondisi', 'Kondisi Barang', 'trim|required');
	// 	$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
	// 	$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
	// 	$this->form_validation->set_rules('jmlh', 'Jumlah', 'trim|required');
	// 	$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'trim|required');
	// 	$this->form_validation->set_rules('status', 'Status', 'trim|required');
	// 	$this->form_validation->set_rules('kd_bantu', 'Jenis Barang', 'trim|required');
	// 	$this->form_validation->set_rules('id_ruang', 'Ruang', 'trim|required');
	// 	$this->form_validation->set_rules('jns_brg', 'Jenis Tipe', 'trim|required');
	// 	$this->form_validation->set_rules('nm_pengg', 'Nama Pengguna', 'trim|required');
	// 	$this->form_validation->set_rules('tipe_aset', 'Jenis Aset', 'trim|required');

	// 	$this->form_validation->set_error_delimiters('<i class="fa fa-fw fa-info-circle text-danger"></i><span class="text-danger">', '</span>');
	// }
	
	function update($id){
		$row = $this->M_monitor->get_by_id($id);
		
		if ($row) {
			$data = array (
				'kd_mitra' => set_value('kd_mitra',$row->kd_mitra),
				'nm_mitra' => set_value('nm_mitra',$row->nm_mitra),
				'kt_lahir' => set_value('kt_lahir',$row->kt_lahir),
				'tgl_lahir' => set_value('tgl_lahir', date('d/m/Y', strtotime($row->tgl_lahir))),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'almt_kt_rmh' => set_value('almt_kt_rmh', $row->almt_kt_rmh),
				'no_hp1' => set_value('no_hp1', $row->no_hp1),
				'no_hp2' => set_value('no_hp2', $row->no_hp2),
				'almt_outlet' => set_value('almt_outlet', $row->almt_outlet),
				'almt_kt_outlet' => set_value('almt_kt_outlet', $row->almt_kt_outlet),
				'almt_kirim' => set_value('almt_kirim', $row->almt_kirim),
				'paket' => set_value('paket', $row->paket),
				'jml_tarif' => set_value('jml_tarif', $row->jml_tarif),
				'nm_bank' => set_value('nm_bank', $row->nm_bank),
				'rekening' => set_value('rekening', $row->rekening),
				'ats_nm_rekening' => set_value('ats_nm_rekening', $row->ats_nm_rekening),
				'ekspedisi' => set_value('ekspedisi', $row->ekspedisi),
				'biaya_kirim' => set_value('biaya_kirim', $row->biaya_kirim),
				'sts_pmby' => set_value('sts_pmby', $row->sts_pmby),
				'dd_pk' => $this->M_monitor->get_paket(),
				'dd_ek' => $this->M_monitor->get_ekspedisi(),
			);
				$this->load->view('monitor/monitor_form_edit', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}
	
	function update_action(){
		$data = array(
			'nm_mitra' => $this->input->post('nm_mitra', TRUE),
			'kt_lahir' => $this->input->post('kt_lahir', TRUE),
			'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'almt_rmh' => $this->input->post('almt_rmh', TRUE),
			'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'no_hp1' => $this->input->post('no_hp1', TRUE),
			'no_hp2' => $this->input->post('no_hp2', TRUE),
			'almt_outlet' => $this->input->post('almt_outlet', TRUE),
			'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kirim' => $this->input->post('almt_kirim'),
			'sts_pmby' => $this->input->post('sts_pmby'),
			'paket' => $this->input->post('paket', TRUE),
			'jml_tarif' => $this->input->post('jml_tarif', TRUE),
			'nm_bank' => $this->input->post('nm_bank', TRUE),
			'rekening' => $this->input->post('rekening', TRUE),
			'ats_nm_rekening' => $this->input->post('ats_nm_rekening', TRUE),
			'ekspedisi' => $this->input->post('ekspedisi', TRUE),
			'biaya_kirim' => $this->input->post('biaya_kirim', TRUE)
			);
				$this->M_monitor->update($this->input->post('kd_mitra', TRUE), $data);
				$this->session->set_flashdata('message','Ubah Data Barang Berhasil');
				redirect(base_url('Monitor'));
	}

	

	function delete($id){
		$row = $this->M_monitor->get_by_id($id);

		$aktif = 0;

		if($row){
			$data = array(
				'aktif' => $aktif
			);
			$this->M_monitor->update($id, $data);
			$this->session->set_flashdata('messages', 'Hapus Data Barang Berhasil');
			redirect(base_url('Monitor'));
		}
	}
	
	function read($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
			'kd_inv' => set_value('kd_inv', $row->kd_inv),
			'nm_inv' => set_value('nm_inv', $row->nm_inv),
			'merk' => set_value('merk', $row->vc_nm_merk),
			'satuan' => set_value('satuan', $row->satuan),
			'jmlh' => set_value('jmlh', $row->jmlh),
			'tgl_terima' => set_value('tgl_terima', date('m/d/Y', strtotime($row->tgl_terima ))),
			'status' => set_value('status', $row->status),
			'kondisi' => set_value('kondisi', $row->kondisi),
			'ket' => set_value('ket', $row->ket),
			'kd_bantu' => set_value('kd_bantu', $row->kd_bantu),
			'no_aset' => set_value('no_aset', $row->no_aset),
			'id_ruang' => set_value('id_ruang', $row->vc_n_gugus),
			'kd_brg' => set_value('kd_brg', $row->kd_brg),
			'foto_brg' => set_value('foto_brg', $row->foto_brg),
			'foto_qr' => set_value('foto_qr', $row->foto_qr),
			'id_urut' => set_value('id_urut', $row->id_urut),
			'aktif' => set_value('aktif', $row->aktif),
			'jns_brg' => set_value('jns_brg', $row->jns_brg),
			'cetak' => set_value('cetak', $row->cetak),
			'kd_aset' => set_value('kd_aset', $row->kd_aset),
			'dt_create' => set_value('dt_create', $row->dt_create),
			'bt_ti' => set_value('bt_ti', $row->bt_ti),
			'fl_harga' => set_value('fl_harga', $row->fl_harga),
			'vc_op_update' => set_value('vc_op_update', $row->vc_op_update),
			'dt_tgl_update' => set_value('dt_tgl_update', $row->dt_tgl_update),
			'vc_op' => set_value('vc_op', $row->vc_op),
			'kd_aset' => set_value('kd_aset', $row->kd_aset),
			'nm_pengg' => set_value('vc_nm_pengguna', $row->vc_nm_pengguna),
			'a_spes' => set_value('vc_spesifikasi', $row->vc_spesifikasi),
			'sn' => set_value('vc_sn', $row->vc_sn),
			// 'aset_aktif' => set_value('vc_kd_aktv', $row->vc_kd_aktv),
			'vc_model' => set_value('vc_model', $row->vc_model)
			);
			$this->load->view('monitor/monitor_read', $data);
		}else{
			$this->session->set_flashdata('messages', 'Data Barang Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}

	function order($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
				'kd_mitra' => set_value('kd_mitra', $row->kd_mitra),
				'nm_mitra' => set_value('nm_mitra', $row->nm_mitra),
				'kt_lahir' => set_value('kt_lahir', $row->kt_lahir),
				'tgl_lahir' => set_value('tgl_lahir', date('m/d/Y', strtotime($row->tgl_lahir ))),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'almt_kt_rmh' => set_value('almt_kt_rmh', $row->almt_kt_rmh),
				'almt_outlet' => set_value('almt_outlet', $row->almt_outlet),
				'almt_kt_outlet' => set_value('almt_kt_outlet', $row->almt_kt_outlet),
				'almt_kirim' => set_value('almt_kirim', $row->almt_kirim)
			);
			
		}
	}


	function kode(){
        $kode = $this->M_monitor->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "MT";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}
	function no_aset($no_gol, $id_rng, $tgl_m, $merk, $urut){
		 
		 $g_no_aset = $this->M_monitor->get_no_aset();
		 foreach($g_no_aset as $row){
			 $data = $row->maxkode;
		 }
		 $no_aset = (int) $data;
		 $th_aset = date('Y');
		 $gp = $this->M_monitor->get_p($id_rng, $tgl_m, $merk);
		 $da_ruang ='';
		 $d_tgl = '';
		 $d_merk = '';
		 foreach($gp as $row){
			 $da_ruang = $row->id_ruang;
			 $d_tgl = $row->tgl_terima;
			 $d_merk = $row->merk;
		 }
		 if(($id_rng != $da_ruang) && ($tgl_m != $d_tgl) && ($merk != $d_merk)){
			$no_aset++;
		 }
		 $kd_aset = $no_gol.'-'.$th_aset.'-'.$no_aset.'-'.$urut;
		 return $kd_aset;
	}

	function urut($rng, $tgl_m, $merk){
		$id_u = $this->M_monitor->get_urut_brg($rng, $tgl_m, $merk);
		$data='';
		foreach($id_u as $row){
			$data = $row->maxkode;
		}
		$urut = (int) $data;
		$urut++;
		return $urut;
	}

	function kode_aset($id)
	{
		$th = date('Y');
		$k_aset = $this->M_monitor->get_k_aset($id, $th);
		foreach($k_aset as $row){
			$data = $row->maxkode;
		}
		$kodeaset = $data;
		$noUrut = (int) substr($kodeaset, 12, 3);
		$noUrut++;
		$char = $id;
		$bl = date('m');
		$kodebaru = $char.'-'.$th.'-'.$bl.'-'.$noUrut;
		return $kodebaru;
	}

	function no_as($no_gol, $id_rng, $tgl_m, $merk){
		
		 $g_no_aset = $this->M_monitor->get_no_aset();
		 foreach($g_no_aset as $row){
			 $no_aset = $row->maxkode;
		 }
		 
		 $gp = $this->M_monitor->get_p($id_rng, $tgl_m, $merk);
		 $da_ruang ='';
		 $d_tgl = '';
		 $d_merk = '';
		 foreach($gp as $row){
			 $da_ruang = $row->id_ruang;
			 $d_tgl = $row->tgl_terima;
			 $d_merk = $row->merk;
		 }
		 if(($id_rng != $da_ruang) && ($tgl_m != $d_tgl) && ($merk != $d_merk)){
			$no_aset++;
		 }
		 return $no_aset;
	}
	
	function kode_urut($id)
	{
		$th = date('Y');
		$k_aset = $this->M_monitor->get_k_aset($id, $th);
		foreach($k_aset as $row){
			$data = $row->maxkode;
		}
		$kodeaset = $data;
		$noUrut = (int) substr($kodeaset, 12, 3);
		$noUrut++;
		return $noUrut;
	}

	function in_kd_barang(){
		$in_kd_barang =  $this->M_monitor->get_in_kd_barang();
		foreach($in_kd_barang as $row){
			$data = $row->maxkode;
		}
		$kd_barang = (int) $data;
		$kd_barang++;
		return $kd_barang;
	}
	function dt_tbl(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
			$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
            $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
			$searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		 }
		if($searchValue != ''){
		$searchQuery .= " and (
		nm_mitra like '%".$searchValue."%' or  
		atas_nama like '%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info" style="width: 100%;">
				Info
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" onclick="load(this.value)">Order</button>
				';
			}
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"tgl_lahir"=>date('d-m-Y', strtotime($row->tgl_lahir)),
			"almt_rmh"=>$row->almt_rmh,
			"almt_kt_rmh"=>$row->nama_kota,
			"almt_outlet"=>$row->almt_outlet,
			"almt_kirim"=>$row->almt_kirim,
			"paket"=>$row->nm_paket,
			"jml_tarif"=>$row->jml_tarif,
			"rekening"=>$row->rekening,
			"ats_nm_rekening"=>$row->ats_nm_rekening,
			"ekspedisi"=>$row->nama_ekspedisi,
			"biaya_kirim"=>$row->biaya_kirim,
			"action"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
	}

	function get_kota(){
        $id=$this->input->post('id');
        $data=$this->M_monitor->get_kota($id);
        echo json_encode($data);
    }
	
	function dt_dp(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
			$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
            $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
			$searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		 }
		 $searchQuery .= " and sts_pmby = '1'";
		if($searchValue != ''){
		$searchQuery .= " and (
		nm_mitra like '%".$searchValue."%' or  
		ats_nm_rekening like '%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info" style="width: 100%; color: white">
				Info
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning" style="width: 100%; color: white">
				Edit
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger" style="width: 100%; color: white">
				Hapus
				</a>
				';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info" style="width: 100%;">
				Info
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"tgl_lahir"=>date('d-m-Y', strtotime($row->tgl_lahir)),
			"almt_rmh"=>$row->almt_rmh,
			"almt_kt_rmh"=>$row->nama_kota,
			"almt_outlet"=>$row->almt_outlet,
			"almt_kirim"=>$row->almt_kirim,
			"paket"=>$row->nm_paket,
			"jml_tarif"=>$row->jml_tarif,
			"rekening"=>$row->rekening,
			"ats_nm_rekening"=>$row->ats_nm_rekening,
			"ekspedisi"=>$row->nama_ekspedisi,
			"biaya_kirim"=>$row->biaya_kirim,
			"action"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
	}

	function dt_lunas(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
			$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
            $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
			$searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		 }
		 $searchQuery .= " and sts_pmby = '2'";
		if($searchValue != ''){
		$searchQuery .= " and (
		nm_mitra like '%".$searchValue."%' or  
		ats_nm_rekening like '%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info" style="width: 100%;">
				Info
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"tgl_lahir"=>date('d-m-Y', strtotime($row->tgl_lahir)),
			"almt_rmh"=>$row->almt_rmh,
			"almt_kt_rmh"=>$row->nama_kota,
			"almt_outlet"=>$row->almt_outlet,
			"almt_kirim"=>$row->almt_kirim,
			"paket"=>$row->nm_paket,
			"jml_tarif"=>$row->jml_tarif,
			"rekening"=>$row->rekening,
			"ats_nm_rekening"=>$row->ats_nm_rekening,
			"ekspedisi"=>$row->nama_ekspedisi,
			"biaya_kirim"=>$row->biaya_kirim,
			"action"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
	}

	function tmp_order(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		// if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
		// 	$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
        //     $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
		// 	$searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		//  }
		// //  $searchQuery .= " and sts_pmby = '2'";
		// if($searchValue != ''){
		// $searchQuery .= " and (
		// nm_mitra like '%".$searchValue."%' or  
		// ats_nm_rekening like '%".$searchValue."%' ) ";
		// }

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt_or();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl_or($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft_or($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
			 $harga = $row->harga_barang*$row->jml_barang;

			 $button = '
				
				<button value="'.$row->kd_tmp_order.'" class="btn btn-danger" data-whatever="'.$row->kd_tmp_order.'" onclick="hapus_order(this.value)">Hapus</button>
				';
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			// "kd_tmp_order"=>$row->kd_tmp_order,
			"nm_barang"=>$row->nm_barang,
			"jml_barang"=>$row->jml_barang,
			"harga"=>$row->harga_barang,
			"harga_total"=>$harga,
			"aksi"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
	}

	function get_harga_barang(){
		// if(isset($_POST['id_tindakan'])) {
			$kd_barang = $_POST['kd_barang'];
			$row = $this->M_monitor->get_harga_brg($kd_barang);
			if($row){
				$data = $row->harga_barang;
				// echo json_encode($data);
			}
			echo $data;
			// echo $row;
		// }
	}

	function tambah_order(){
		$kd = 'MT000001';
		$id = '1';
		$kd_or = 'OR000001';
		$data = array(
			"kd_barang" => $this->input->post('brg', TRUE),
			"jml_barang" => $this->input->post('jml', TRUE),
			"harga_barang" => $this->input->post('harg', TRUE),
			"kd_mitra" => $kd,
			"kd_tmp_order" => $this->kode_OR(),
			"id" => $id
		);
		$this->M_monitor->tmp_order_insert($data);
	}

	function hapus_order(){
		
			$data = $this->input->post('val', TRUE);
	
		$this->M_monitor->tmp_order_delete($data);
	}
	function kode_OR(){
        $kode = $this->M_monitor->get_kode_order();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "OR";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}
}
?>