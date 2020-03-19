<?php
	$this->load->view('mainmenu');
?>
	<style>
		.pesan{
			display: none;
			position: fixed;
			border: 1px solid greenyellow;
			width: 200px;
			top: 75px;
			left: 500px;
			padding: 5px 10px;
			background-color: #00a65a;
			text-align: center;
			color: white;
		}
		.pesans{
			display: none;
			position: fixed;
			border: 1px solid red;
			width: 200px;
			top: 95px;
			left: 500px;
			padding: 5px 10px;
			background-color: #f56954;
			text-align: center;
			color: white;
		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
    <!-- <script src="<?php //echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script> -->
    <script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>

				<div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-primary">Data Mitra</h6>
					</div>
					<div class="col-md-12 text-center">
						<?php 
							if (($this->session->userdata('message')) <> ''){
								echo '<div class="pesan">'.$this->session->userdata('message').'</div>';
							}
							if (($this->session->userdata('messages')) <> ''){
								echo '<div class="pesans">'.$this->session->userdata('messages').'</div>';
							}
						?>
					</div>
					<p>&nbsp;&nbsp;&nbsp;</p>
					<table style="margin-left: 10px">
						<tr>
						<td>
						<input type="text" class="form-control" name="rtm_waktu" id="tgl1"placeholder="dd-mm-yyyy"/>
						<!-- <input type="date" class="form-control" name="rtm-waktu" id="tgl1"> -->
						</td>
						<td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
						<td>
						<input type="text" class="form-control" name="rta_waktu" id="tgl2" placeholder="dd-mm-yyyy"/>	
						<!-- <input type="date" class="form-control" name="rta_waktu" id="tgl2"> -->
						</td>
						</tr>
					</table>
					<div class="card-body">
                    <?php if($this->session->userdata('level')=='2'):?>
					<!-- <a href="<?php //echo base_url('monitor/create')?>" class="btn btn-primary btn-icon-split">
                    	<span class="text">Input Data Mitra</span>
                    </a> -->
                    <button style="height: 36px" class="btn btn-primary" data-toggle="modal" data-target="#inputMitra"  data-keyboard="false" data-backdrop="static" onclick="load()">Input Data Mitra</button>
                    <?php endif;?>
					<br>
                    <br>

                    <?php if($this->session->userdata('level')=='2'):?>
                    <div id="dynamic-tabs">
                        <ul>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_mt_hri')?>" data-table="mthri-table"><a href="#tab-mthri">Hari ini</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_dp')?>" data-table="dp-table"><a href="#tab-dp">DP</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_cc')?>" data-table="cc-table"><a href="#tab-cc">Cicilan</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_lunas')?>" data-table="lunas-table"><a href="#tab-lunas">Lunas</a>
                            </li>
                        </ul>
                        <div id="tab-mthri" class="table-responsive">
                            <table id="mthri-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th>Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-dp" class="table-responsive">
                            <table id="dp-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-cc" class="table-responsive">
                            <table id="cc-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-lunas" class="table-responsive">
                            <table id="lunas-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:13%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                        <?php endif;?>
                        <?php if($this->session->userdata('level')=='3'):?>
						<div class="table-responsive">
						<table class="table table-bordered" id="dataMitra" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Nama Mitra</th>
                                <th style="display: none;">Last Order</th>
								<th>Produk</th>
								<th>Kota</th>
								<th>History</th>
								<th style="width:13%;">Action</th>
							</tr>
							</thead>

						</table>
                        </div>
                        <?php endif;?>
					</div>
                    <div class="modal fade" id="inputMitra" tabindex="-1" role="dialog" aria-labelledby="inputMitraLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" onclick="wis()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <!-- <form action="<?php //echo base_url().'monitor/create_action';?>" method="post"> -->
                                        <div class="card-header d-flex p-0">
                                            <h3 class="card-title p-3">Data Mitra</h3>
                                            <ul class="nav nav-pillss ml-auto p-2">
                                            <li class="nav-item"><a class="nav-link" href="#tabb_1" data-toggle="tab">Identitas</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabb_2" data-toggle="tab">Outlet</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabb_3" data-toggle="tab">Pengiriman</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabb_4" data-toggle="tab">Jenis Pembayaran</a></li>
                                            <!-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                                Dropdown <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                                                <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                                                <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                                                </div>
                                            </li> -->
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                            <div class="tab-pane active" id="tabb_1">
                                                <div class="form-group">
                                                    <label for="nm_mitra">Nama Mitra </label> <?php echo form_error('nm_mitra')?>
                                                    <input class="form-control" type="text" name="in_nm_mitra" id="in_nm_mitra" style="width: 80%;" value="<?php //echo $nm_mitra?>">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='10%'>
                                                        <div class="form-group">
                                                            <label for="tgl_terima">Kota & Tanggal Lahir </label> <?php echo form_error('tgl_lahir') ?>
                                                                <input class="form-control" type="text" name="in_kt_lahir" id="in_kt_lahir" placeholder="Kota">
                                                            </div>
                                                        </td>
                                                        <td width='40%'>
                                                        <div class="form-group">
                                                            <label style="height: 42px;"></label>
                                                            <input class="form-control" type="text" name="in_tgl_lahir" id="in_tgl_lahir" placeholder="dd-mm-yyyy" >
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="almt_rmh">Alamat Rumah</label> <?php echo form_error('almt_rmh') ?>
                                                    <input class="form-control" type="text" name="in_almt_rmh" id="in_almt_rmh" style="width: 80%;">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="form-control" name="in_provinsi" id="in_provinsi" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            <div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                    <select class="form-control" name="in_almt_kt_rmh" id="in_almt_kt_rmh" style="width: 100%;">
                                                                        <option value="0">Pilih</option>
                                                                    </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="no_hp1">Nomor Handphone</label>
                                                                <input class="form-control" name="in_no_hp1" id="in_no_hp1" style="width: 100%">
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="no_hp2">Nomor Handphone</label>
                                                                <input class="form-control" name="in_no_hp2" id="in_no_hp2" style="width: 100%">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tabb_2">
                                                <div class="form-group">
                                                        <label for="almt_outlet">Alamat Outlet</label> <?php echo form_error('almt_outlet') ?>
                                                        <input class="form-control" type="text" name="in_almt_outlet" id="in_almt_outlet" style="width: 80%;">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="form-control" name="in_provinsi" id="in_provinsi2" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="form-control" name="in_almt_kt_outlet" id="in_almt_kt_outlet" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- <div class="form-group">
                                                    <input type="radio" name="in_cek2" id="in_cek3" value="1"> Seperti Alamat Rumah
                                                </div> -->
                                                <div class="form-group">
                                                    <input type="checkbox" name="incek2" id="incek3"> Seperti Alamat Rumah
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#incek3').on('click', function(){
                                                            if($(this).is(':checked')){
                                                                var almt = document.getElementById('in_almt_rmh').value;
                                                                document.getElementById('in_almt_outlet').value = almt;
                                                                document.getElementById('in_almt_outlet').disabled = true;
                                                                $('#in_provinsi2').val($('#in_provinsi option:selected').val());
                                                                $('#in_provinsi2').prop('disabled', 'disabled');
                                                                if($('#in_provinsi option:selected').val() !== 0){
                                                                    var id=$('#in_provinsi option:selected').val();
                                                                    $.ajax({
                                                                        url : "<?php echo base_url();?>monitor/get_kota",
                                                                        method : "POST",
                                                                        data : {id: id},
                                                                        async : false,
                                                                        dataType : 'json',
                                                                        success: function(data){
                                                                            var html = '';
                                                                            var i;
                                                                            for(i=0; i<data.length; i++){
                                                                                html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                                            }
                                                                            $('#in_almt_kt_outlet').html(html);
                                                                            $('#in_almt_kt_outlet').val($('#in_almt_kt_rmh option:selected').val());
                                                                            $('#in_almt_kt_outlet').prop('disabled', 'disabled');
                                                                        }
                                                                    });
                                                                }
                                                            }else{
                                                                document.getElementById('in_almt_outlet').value = '';
                                                                document.getElementById('in_almt_outlet').disabled = false;
                                                                document.getElementById('in_provinsi2').value = '0';
                                                                document.getElementById('in_provinsi2').disabled = false;
                                                                document.getElementById('in_almt_kt_outlet').value = '';
                                                                document.getElementById('in_almt_kt_outlet').disabled = false;
                                                            }
                                                        })
                                                    })
                                                </script>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tabb_3">
                                                <div class="form-group">
                                                        <label for="almt_kirim">Alamat Kirim</label> <?php echo form_error('almt_kirim') ?>
                                                        <input class="form-control" type="text" name="in_almt_kirim" id="in_almt_kirim" style="width: 80%;">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="form-control" name="in_provinsi" id="in_provinsi3" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>                               
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="form-control" name="in_almt_kt_kirim" id="in_almt_kt_kirim">
                                                                    <option value="0">Pilih</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <input type="radio" name="in_cek" id="in_cek1" value="1"> Seperti Alamat Rumah
                                                    &nbsp&nbsp
                                                    <input type="radio" name="in_cek" id="in_cek2" value="2"> Seperti Alamat Outlet
                                                </div>
                                                <!-- <div class="form-group">
                                                    <input type="checkbox" name="incek" id="incek1" class="chb"> Seperti Alamat Rumah
                                                    &nbsp&nbsp
                                                    <input type="checkbox" name="incek" id="incek2" class="chb"> Seperti Alamat Outlet
                                                </div> -->
                                                <script>
                                                    // $(".chb").change(function(){
                                                    //         $(".chb").prop('checked',false);
                                                    //         $(this).prop('checked',true);
                                                    //         if()
                                                    //     });
                                                </script>
                                                <div class="form-group">
                                                    <input type="checkbox" name="in_penerusan" id="in_penerusan">&nbsp&nbsp Penerusan Alamat
                                                </div>
                                                <div class="form-group">
                                                    <label for="almt_terusan">Penerusan Alamat</label>
                                                    <input class="form-control" type="text" name="in_almt_terusan" id="in_almt_terusan" style="width: 80%;" disabled>
                                                </div>
                                                <table width="80%">
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="prov_terusan">Provinsi</label>
                                                                <select class="form-control" name="in_prov_terusan" id="in_prov_terusan" style="width: 100%;" disabled>
                                                                    <option value="0">Pilih</option>
                                                                    <?php
                                                                    foreach ($dd_pr as $row) {  
                                                                        echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                        }
                                                                        echo"
                                                                    </select>"
                                                                    ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="kt_terusan">Kota</label> 
                                                            <select class="form-control" name="in_kt_terusan" id="in_kt_terusan" disabled>
                                                                <option value="0">Pilih</option>
                                                            </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <input type="radio" name="cekter" id="in_cekter1" value="1"> Seperti Alamat Rumah
                                                    &nbsp&nbsp
                                                    <input type="radio" name="cekter" id="in_cekter2" value="2"> Seperti Alamat Outlet
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabb_4">
                                                <div class="form-group">
                                                    <label for="nm_marketing">Nama Marketing</label>
                                                    <input class="form-control" type="text" name="in_nm_marketing" id="in_nm_marketing" style="width: 80%">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pembayaran">Pembayaran</label><br>
                                                    <!-- <input type="radio" name="sts_pmby" id="sts_pmby1" value="1"> DP
                                                    <input type="radio" name="sts_pmby" id="sts_pmby2" value="2"> Lunas -->
                                                    <select class="form-control" name="in_sts_pmby" id="in_sts_pmby" style="width: 80%">
                                                        <option value="1">DP</option>
                                                        <option value="2">Lunas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nm_produk">Nama Produk</label>
                                                    <select class="form-control" name="in_nm_produk" id="in_nm_produk" style="width: 80%">
                                                        <option value="0">Pilih</option>
                                                        <?php
                                                        foreach ($dd_pro as $row) {  
                                                            echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                                            }
                                                            echo"
                                                        </select>"
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paket">Paket</label> 
                                                    <select class="form-control" name="in_paket" id="in_paket" style="width: 80%">
                                                        <option value="0">Pilih</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="bank_form">
                                                    <table width='80%'>
                                                        <tr>
                                                            <td width='20%'>
                                                                <div class="form-group">
                                                                    <label for="rekening">Bank</label>
                                                                    <select class="form-control" name="in_nm_bank" id="in_nm_bank" style="width: 100%;">
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="BRI">BRI</option>
                                                                        <option value="BCA">BCA</option>
                                                                        <option value="Mandiri">Mandiri</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td width='80%'>
                                                                <div class="form-group">
                                                                    <label for="no_rekening">Nomor Rekening</label>
                                                                    <input class="form-control" type="text" name="in_rekening" id="in_rekening" style="width: 100%">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group">
                                                        <label for="jml_tarif">Jumlah Transfer</label>
                                                        <input class="form-control" type="text" name="in_jml_tarif" id="in_jml_tarif" style="width: 80%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="in_ats_nm_rekening" id="in_ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" id="tambah" value="tambah">Tambah Bank</button>
                                                
                                                <!-- <button class="btn btn-primary" id="tambah" value="tambah" onclick="tm_bank()">Tambah</button> -->
                                                <script>
                                                    $(document).ready(function() {
                                                        var max_fields      = 3; //maximum input boxes allowed
                                                        var wrapper   		= $(".bank_form"); //Fields wrapper
                                                        var add_button      = $("#tambah"); //Add button ID
                                                        
                                                        var x = 1; //initlal text box count
                                                        $(add_button).click(function(e){ //on add input button click
                                                            e.preventDefault();
                                                            if(x < max_fields){ //max input box allowed
                                                                x++; //text box increment
                                                                $(wrapper).append(`    
                                                                <div class=".bank">
                                                                <table width='80%'>
                                                                        <tr>
                                                                            <td width='20%'>
                                                                                <div class="form-group">
                                                                                    <label for="rekening">Bank</label>
                                                                                    <select class="form-control" name="in_nm_bank" id="in_nm_bank`+x+`" style="width: 100%;">
                                                                                        <option value="BNI">BNI</option>
                                                                                        <option value="BRI">BRI</option>
                                                                                        <option value="BCA">BCA</option>
                                                                                        <option value="Mandiri">Mandiri</option>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                            <td width='80%'>
                                                                                <div class="form-group">
                                                                                    <label for="no_rekening">Nomor Rekening</label>
                                                                                    <input class="form-control" type="text" name="in_rekening" id="in_rekening`+x+`" style="width: 100%">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="form-group">
                                                                        <label for="jml_tarif">Jumlah Transfer</label>
                                                                        <input class="form-control" type="text" name="in_jml_tarif" id="in_jml_tarif`+x+`" style="width: 80%;">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="in_ats_nm_rekening" id="in_ats_nm_rekening`+x+`" placeholder="Atas Nama" style="width: 80%;">
                                                                    </div>
                                                                <a href="#" class="remove_field">Remove</a></div>`); //add input box
                                                                console.log('aaa');
                                                            }
                                                        });
                                                        
                                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                                        })
                                                    });
                                                </script>
                                                <br>
                                                <!-- <div class="form-group">
                                                        <label for="almt_outlet">Data Bank</label> <?php echo form_error('almt_outlet') ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="tableBank" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                <th>Nama Bank</th>
                                                                <th>Jumlah Transfer</th>
                                                                <th>No. Rekening</th>
                                                                <th>Atasnama</th>
                                                                <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            </table>
                                                        </div>
                                                </div> -->
                                                
                                                <table width="80%">
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="ekspedisi">Ekspedisi</label>
                                                                <select class="form-control" name="in_ekspedisi" id="in_ekspedisi" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_ek as $row) {  
                                                                    echo "<option value='".$row->kd_ekspedisi."' >".$row->nama_ekspedisi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                            ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>             
                                                            <div class="form-group">
                                                                <label for="biaya_kirim">Biaya Kirim</label>
                                                                <input class="form-control" type="text" name="in_biaya_kirim" id="in_biaya_kirim" style="width: 100%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="tambahan">Tambahan</label>
                                                    <input class="form-control" type="text" name="in_tambahan" id="in_tambahan" style="width: 80%;">
                                                </div>
                                                <button type="submit" class="btn btn-success" id="simpan" onclick="inputRinci()">Simpan</button>
                                                <button type="button" id="close" class="btn btn-danger" onclick="wis()">Batal</button>
                                            </div>
                                            <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#in_tgl_lahir').datetimepicker({
                            locale: 'id',
                            format: 'DD-MM-YYYY'
                        });

                        function inputRinci(){
                            Swal.fire({
                                title: "Data Mitra",
                                html: '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Nama Mitra</td><td width=5%>:</td><td align="left">'+$('#in_nm_mitra').val()+
                                '</td></tr><tr><td align="left">Kota, Tanggal Lahir</td><td>:</td><td align="left">'+$('#in_kt_lahir').val()+', '+$('#in_tgl_lahir').val()+
                                '</td></tr><tr><td align="left">Alamat Rumah</td><td>:</td><td align="left"> '+$('#in_almt_rmh').val()+
                                '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi option:selected').html()+
                                '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_rmh option:selected').html()+
                                '</td></tr><tr><td align="left">No HP</td><td>:</td><td align="left">'+ $('#in_no_hp1').val()+
                                '</td></tr><tr><td align="left">No HP</td><td>:</td><td align="left">'+ $('#in_no_hp2').val()+
                                '</td></tr></table><br>'+
                                '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Status Pembayaran</td><td width=5%>:</td><td align="left"> '+$('#in_sts_pmby option:selected').html()+
                                '</td></tr><tr><td align="left">Nama Produk</td><td>:</td><td align="left"> '+$('#in_nm_produk option:selected').html()+
                                '</td></tr><tr><td align="left">Paket</td><td>:</td><td align="left"> '+$('#in_paket option:selected').html()+
                                '</td></tr><tr><td align="left">Jumlah Transfer</td><td>:</td><td align="left"> '+$('#in_jml_tarif').val()+
                                '</td></tr><tr><td align="left">Bank</td><td>:</td><td align="left"> '+$('#in_nm_bank option:selected').html()+
                                '</td></tr><tr><td align="left">No Rekening</td><td>:</td><td align="left"> '+$('#in_rekening').val()+
                                '</td></tr><tr><td align="left">Alamat Outlet</td><td>:</td><td align="left"> '+$('#in_almt_outlet').val()+
                                '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi2 option:selected').html()+
                                '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_outlet option:selected').html()+
                                '</td></tr></table><br>'+
                                '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Atas Nama</td><td width=5%>:</td><td align="left"> '+$('#in_ats_nm_rekening').val()+
                                '</td></tr><tr><td align="left">Alamat Kirim</td><td>:</td><td align="left"> '+$('#in_almt_kirim').val()+
                                '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi3 option:selected').html()+
                                '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_kirim option:selected').html()+
                                '</td></tr><tr><td align="left">Ekspedisi</td><td>:</td><td align="left"> '+$('#in_ekspedisi option:selected').html()+
                                '</td></tr><tr><td align="left">Biaya Kirim</td><td>:</td><td align="left"> '+$('#in_biaya_kirim').val()+
                                '</td></tr><tr><td align="left">Tambahan</td><td>:</td><td align="left"> '+$('#in_tambahan').val()+
                                '</td></tr></table>',
                                showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Kirim'
                            }).then((result) => {
                                if (result.value) {
                                    console.log('Sukses');
                                    simpanmitra();
                                }
                                })
                        }

                        function simpanmitra(){
                            var nm_mitra = $('#in_nm_mitra').val();
                            var kt_lahir = $('#in_kt_lahir').val();
                            var tgl_lahir = $('#in_tgl_lahir').val();
                            var almt_rmh = $('#in_almt_rmh').val();
                            var almt_prov_rmh =$('#in_provinsi option:selected').val();
                            var almt_kt_rmh =$('#in_almt_kt_rmh option:selected').val();
                            var no_hp1 = $('#in_no_hp1').val();
                            var no_hp2 = $('#in_no_hp2').val();
                            var almt_outlet = $('#in_almt_outlet').val();
                            var almt_prov_outlet = $('#in_provinsi2 option:selected').val();
                            var almt_kt_outlet = $('#in_almt_kt_outlet option:selected').val();
                            var almt_kirim = $('#in_almt_kirim').val();
                            var almt_prov_kirim = $('#in_provinsi3 option:selected').val();
                            var almt_kt_kirim = $('#in_almt_kt_kirim option:selected').val();
                            var almt_terusan = $('#in_almt_terusan').val();
                            var almt_prov_terusan = $('#in_prov_terusan option:selected').val();
                            var almt_kt_terusan = $('#in_kt_terusan option:selected').val();
                            var nm_marketing = $('#in_nm_marketing').val();
                            var sts_pmby = $('#in_sts_pmby option:selected').val();
                            var nm_produk = $('#in_nm_produk option:selected').val();
                            var paket = $('#in_paket option:selected').val();
                            var ekspedisi = $('#in_ekspedisi option:selected').val();
                            var biaya_kirim = $('#in_biaya_kirim').val();
                            var tambahan = $('#in_tambahan').val();

                            var jml_tarif = $('#in_jml_tarif').val();
                            var nm_bank = $('#in_nm_bank option:selected').val();
                            var rekening = $('#in_rekening').val();
                            var ats_nm_rekening = $('#in_ats_nm_rekening').val();

                            var dataString = 'nm_mitra='+nm_mitra+'&kt_lahir='+kt_lahir+'&tgl_lahir='+tgl_lahir+'&almt_rmh='+almt_rmh+
                            '&almt_prov_rmh='+almt_prov_rmh+'&almt_kt_rmh='+almt_kt_rmh+'&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&almt_outlet='+almt_outlet+
                            '&almt_prov_outlet='+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet+'&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+
                            '&almt_kt_kirim='+almt_kt_kirim+'&almt_terusan='+almt_terusan+'&almt_prov_terusan='+almt_prov_terusan+'&almt_kt_terusan='+almt_kt_terusan+
                            '&nm_marketing='+nm_marketing+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim+
                            '&jml_tarif='+jml_tarif+'&nm_bank='+nm_bank+'&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening+'&tambahan='+tambahan;
                            
                            if($('#in_jml_tarif2').val() !== undefined){
                                var jml_tarif2 = $('#in_jml_tarif2').val();
                                var nm_bank2 = $('#in_nm_bank2 option:selected').val();
                                var rekening2 = $('#in_rekening2').val();
                                var ats_nm_rekening2 = $('#in_ats_nm_rekening2').val();
                                dataString += '&jml_tarif2='+jml_tarif2+'&nm_bank2='+nm_bank2+'&rekening2='+rekening2+'&ats_nm_rekening2='+ats_nm_rekening2;
                            }
                            if($('#in_jml_tarif3').val() !== undefined){
                                var jml_tarif3 = $('#in_jml_tarif3').val();
                                var nm_bank3 = $('#in_nm_bank3 option:selected').val();
                                var rekening3 = $('#in_rekening3').val();
                                var ats_nm_rekening3 = $('#in_ats_nm_rekening3').val();
                                dataString += '&jml_tarif3='+jml_tarif3+'&nm_bank3='+nm_bank3+'&rekening3='+rekening3+'&ats_nm_rekening3='+ats_nm_rekening3;
                            }

                            $.ajax({
                                type: 'post',
                                url: '<?php echo base_url('Monitor/create_action')?>',
                                data: dataString,
                                success: function(){
                                    console.log('yee');
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: "Data Berhasil Disimpan!",
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                        }).then((result) => {
                                        if (result.value) {
                                            document.getElementById('in_nm_mitra').value = '';
                                            document.getElementById('in_tambahan').value = '';
                                            document.getElementById('in_kt_lahir').value = '';
                                            document.getElementById('in_tgl_lahir').value = '';
                                            document.getElementById('in_almt_rmh').value = '';
                                            document.getElementById('in_provinsi').value = '0';
                                            document.getElementById('in_almt_kt_rmh').value = '0';
                                            document.getElementById('in_no_hp1').value = '';
                                            document.getElementById('in_no_hp2').value = '';
                                            document.getElementById('in_almt_outlet').value = '';
                                            document.getElementById('in_provinsi2').value = '0';
                                            document.getElementById('in_almt_kt_outlet').value = '0';
                                            document.getElementById('in_provinsi3').value = '0';
                                            document.getElementById('in_almt_kirim').value = '';
                                            document.getElementById('in_almt_kt_kirim').value = '0';
                                            document.getElementById('in_almt_terusan').value = '';
                                            document.getElementById('in_prov_terusan').value = '0';
                                            document.getElementById('in_kt_terusan').value = '0';
                                            document.getElementById('in_nm_marketing').value = '';
                                            document.getElementById('in_sts_pmby').value = '0';
                                            document.getElementById('in_nm_produk').value = '0';
                                            document.getElementById('in_paket').value = '0';
                                            document.getElementById('in_ekspedisi').value = '0';
                                            document.getElementById('in_biaya_kirim').value = '';
                                            document.getElementById('in_cek3').checked = false;
                                            document.getElementById('in_cek1').checked = false;
                                            document.getElementById('in_cekter1').checked = false;
                                            document.getElementById('in_cekter2').checked = false;
                                            document.getElementById('in_penerusan').checked = false;
                                            // table.destroy();
                                            $('.nav-pillss a:first').tab('show');
                                            $('#inputMitra').modal('hide');
                                            $('#mthri-table').DataTable().ajax.reload();
                                        }
                                    })
                                }
                            })
                        }

                        function wis(){
                            $.ajax({
                                type: 'post',
                                url: '<?php echo base_url('monitor/hapus_bank')?>',
                                success: function(){
                                    console.log('YEEE');
                                    
                                }
                            });
                            document.getElementById('in_nm_mitra').value = '';
                            document.getElementById('in_kt_lahir').value = '';
                            document.getElementById('in_tgl_lahir').value = '';
                            document.getElementById('in_almt_rmh').value = '';
                            document.getElementById('in_provinsi').value = '0';
                            document.getElementById('in_almt_kt_rmh').value = '0';
                            document.getElementById('in_no_hp1').value = '';
                            document.getElementById('in_no_hp2').value = '';
                            document.getElementById('in_almt_outlet').value = '';
                            document.getElementById('in_almt_outlet').disabled = false;
                            document.getElementById('in_provinsi2').value = '0';
                            document.getElementById('in_provinsi2').disabled = false;
                            document.getElementById('in_almt_kt_outlet').value = '0';
                            document.getElementById('in_almt_kt_outlet').disabled = false;
                            document.getElementById('in_provinsi3').value = '0';
                            document.getElementById('in_provinsi3').disabled = false;
                            document.getElementById('in_almt_kirim').value = '';
                            document.getElementById('in_almt_kirim').disabled = false;
                            document.getElementById('in_almt_kt_kirim').value = '0';
                            document.getElementById('in_almt_kt_kirim').disabled = false;
                            document.getElementById('in_almt_terusan').value = '';
                            document.getElementById('in_prov_terusan').value = '0';
                            document.getElementById('in_kt_terusan').value = '0';
                            document.getElementById('in_nm_marketing').value = '';
                            document.getElementById('in_sts_pmby').value = '0';
                            document.getElementById('in_nm_produk').value = '0';
                            document.getElementById('in_paket').value = '0';
                            document.getElementById('in_ekspedisi').value = '0';
                            document.getElementById('in_biaya_kirim').value = '';
                            document.getElementById('in_cek2').checked = false;
                            document.getElementById('in_cek1').checked = false;
                            document.getElementById('in_cekter1').checked = false;
                            document.getElementById('in_cekter2').checked = false;
                            document.getElementById('in_penerusan').checked = false;
                            // bayar.destroy();
                            $('.nav-pillss a:first').tab('show');
                            $('#inputMitra').modal('hide');
                            console.log('as');
                        }

                        $(document).ready(function(){
                            $('#in_nm_produk').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_jns_paket",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '<option value="0">Pilih</option>';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].kd_paket+'">'+data[i].nm_paket+'</option>';
                                        }
                                        $('#in_paket').html(html);
                                        
                                    }
                                });
                            });
                        });

                        $(document).ready(function(){
                            $('#in_provinsi').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_kota",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                        }
                                        $('#in_almt_kt_rmh').html(html);
                                        
                                    }
                                });
                            });
                        });

                        $(document).ready(function(){
                            $('#in_provinsi2').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_kota",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                        }
                                        $('#in_almt_kt_outlet').html(html);
                                        
                                    }
                                });
                            });
                        });

                        $(document).ready(function(){
                            $('#in_provinsi3').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_kota",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                        }
                                        $('#in_almt_kt_kirim').html(html);
                                        
                                    }
                                });
                            });
                        });

                        $(document).ready(function(){
                            $('#in_prov_terusan').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_kota",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                        }
                                        $('#in_kt_terusan').html(html);
                                        
                                    }
                                });
                            });
                        });

                        var rupiah1 = document.getElementById('in_jml_tarif');
                        rupiah1.addEventListener('keyup', function(e){
                            rupiah1.value = formatRupiah1(this.value, 'Rp ');
                        });

                        function formatRupiah1(angka, prefix){
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                            if(ribuan){
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah :'');
                        }

                        var kirim1 = document.getElementById('in_biaya_kirim');
                        kirim1.addEventListener('keyup', function(e){
                            kirim1.value = formatRupiahKirim1(this.value, 'Rp ');
                        });

                        function formatRupiahKirim1(angka, prefix){
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            kirim = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                            if(ribuan){
                                separator = sisa ? '.' : '';
                                kirim += separator + ribuan.join('.');
                            }

                            kirim = split[1] != undefined ? kirim + '.' + split[1] : kirim;
                            return prefix == undefined ? kirim : (kirim ? 'Rp ' + kirim :'');
                        }
                    //kirim
                        $(document).ready(function(){
                            $('#in_cek1').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('in_almt_rmh').value;
                                        document.getElementById('in_almt_kirim').value = almt;
                                        document.getElementById('in_almt_kirim').disabled  = true;
                                        $('#in_provinsi3').val($('#in_provinsi option:selected').val());
                                        $('#in_provinsi3').prop('disabled', 'disabled');
                                        if($('#in_provinsi option:selected').val() !== 0){
                                            var id=$('#in_provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#in_almt_kt_kirim').html(html);
                                                    $('#in_almt_kt_kirim').val($('#in_almt_kt_rmh option:selected').val());
                                                    $('#in_almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                        
                                    }
                                }
                            )
                        })
                    //kirim
                        $(document).ready(function(){
                            $('#in_cek2').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('in_almt_outlet').value;
                                        document.getElementById('in_almt_kirim').value = almt;
                                        document.getElementById('in_almt_kirim').disabled  = true;
                                        $('#in_provinsi3').val($('#in_provinsi2 option:selected').val());
                                        $('#in_provinsi3').prop('disabled', 'disabled');
                                        if($('#in_provinsi3 option:selected').val() !== 0){
                                            var id=$('#in_provinsi2 option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#in_almt_kt_kirim').html(html);
                                                    $('#in_almt_kt_kirim').val($('#in_almt_kt_outlet option:selected').val());
                                                    $('#in_almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })
                    //outlet
                        $(document).ready(function(){
                            $('#in_cek3').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('in_almt_rmh').value;
                                        document.getElementById('in_almt_outlet').value = almt;
                                        document.getElementById('in_almt_outlet').disabled = true;
                                        $('#in_provinsi2').val($('#in_provinsi option:selected').val());
                                        $('#in_provinsi2').prop('disabled', 'disabled');
                                        if($('#in_provinsi option:selected').val() !== 0){
                                            var id=$('#in_provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#in_almt_kt_outlet').html(html);
                                                    $('#in_almt_kt_outlet').val($('#in_almt_kt_rmh option:selected').val());
                                                    $('#in_almt_kt_outlet').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })

                        $(document).ready(function(){
                            $('#in_cekter2').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('in_almt_outlet').value;
                                        document.getElementById('in_almt_terusan').value = almt;
                                        document.getElementById('in_almt_terusan').disabled  = true;
                                        $('#in_prov_terusan').val($('#in_provinsi2 option:selected').val());
                                        $('#in_prov_terusan').prop('disabled', 'disabled');
                                        if($('#in_provinsi3 option:selected').val() !== 0){
                                            var id=$('#in_provinsi2 option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#in_kt_terusan').html(html);
                                                    $('#in_kt_terusan').val($('#in_almt_kt_outlet option:selected').val());
                                                    $('#in_kt_terusan').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })

                        $(document).ready(function(){
                            $('#in_cekter1').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('in_almt_rmh').value;
                                        document.getElementById('in_almt_terusan').value = almt;
                                        document.getElementById('in_almt_terusan').disabled = true;
                                        $('#in_prov_terusan').val($('#in_provinsi option:selected').val());
                                        $('#in_prov_terusan').prop('disabled', 'disabled');
                                        if($('#in_provinsi option:selected').val() !== 0){
                                            var id=$('#provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#in_kt_terusan').html(html);
                                                    $('#in_kt_terusan').val($('#in_almt_kt_rmh option:selected').val());
                                                    $('#in_kt_terusan').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })

                    $(document).ready(function(){
                        $('#in_penerusan').on('click', function(){
                            if($('#in_penerusan').is(':checked')){
                                $('#in_almt_terusan').prop('disabled', false);
                                $('#in_prov_terusan').prop('disabled', false);
                                $('#in_kt_terusan').prop('disabled', false);
                                console.log('a');
                            }else{
                                $('#in_almt_terusan').prop('disabled', true);
                                $('#in_prov_terusan').prop('disabled', true);
                                $('#in_kt_terusan').prop('disabled', true);
                                $('#in_almt_terusan').val('');
                                $('#in_prov_terusan').val('0');
                                $('#in_kt_terusan').val('0');
                                console.log('b');
                            }
                        })
                    })
                    </script>



					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Tindakan popup -->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <!-- <h3 class="modal-title" id="exampleModalLabel">Data Order</h3> -->
                            </div>
                            <div class="modal-body">
							<div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                    
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Data Order</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item "><a class="nav-link" href="#tab_1" data-toggle="tab"></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Order</a></li>
                            <li class="nav-item"><a id="tab3" class="nav-link" href="#tab_3" >Pengiriman</a></li>
                            <li class="nav-item"><a id="tab4" class="nav-link" href="#tab_4" >Jenis Pembayaran</a></li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                Dropdown <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                                <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                                <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                                </div>
                            </li> -->
                            </ul>
                        </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="form-group">
                                <label for="nm_mitra">Nama Mitra </label> 
                                <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" disabled>
                            </div>
                            <div class="form-group">
                                <label for="almt_rmh">Alamat Rumah</label> 
                                <input class="form-control" type="text" name="almt_rmh" id="almt_rmh" style="width: 80%;" disabled>
                            </div>
                            <table width='80%'>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="provinsi" id="provinsi3" style="width: 100%; display: none;">
                                                <option value="0">Pilih</option>
                                            <?php
                                            foreach ($dd_pr as $row) {  
                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                }
                                                echo"
                                            </select>"
                                            ?>
                                        <div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            
                                                <select class="form-control" name="almt_kt_rmh" id="almt_kt_rmh" style="width: 100%; display: none;">
                                                    <option value="0">Pilih</option>
                                                </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="no_hp1">Nomor Handphone</label>
                                            <input class="form-control" name="no_hp1" id="no_hp1" style="width: 100%" disabled>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="no_hp2">Nomor Handphone</label>
                                            <input class="form-control" name="no_hp2" id="no_hp2" style="width: 100%" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="form-group">
                                <label for="Produk">Produk</label>
                                <select class="form-control" name="produk" id="daftarProduk" style="width: 80%" >
                                    <option value="0">Pilih</option>
                                    <?php
                                            foreach ($dd_pro as $row) {  
                                                echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                                }
                                                echo"
                                            </select>
                                            " 
                                            ?>
                                </select>
                                <br>
                                <label for="Barang">Barang</label>
                                <select class="form-control" name="barang" id="daftarBarang" style="width: 80%;" >
                                <option value="0">Pilih</option>
                                            <?php
                                            // foreach ($dd_bg as $row) {  
                                            //     echo "<option value='".$row->kd_barang."' >".$row->nm_barang."</option>";
                                            //     }
                                            //     echo"
                                            // </select>
                                            // " 
                                            ?>
                                </select>
                                <br>
                                <input class="form-control" name="inputHarga" id="inputHarga" type="text" placeholder="Harga Barang" style="width: 80%" disabled>
                                <br>
                                <input class="form-control" name="jml_barang" id="jml_barang" type="text" placeholder="Jumlah barang" style="width: 80%">
                                <br>
                                <button class="btn btn-primary" id="tambah" value="tambah" onclick="order()">Tambah</button>
                            </div>
                    
                            <div class="form-group">
                                    <label for="almt_outlet">Rincian Order</label> <?php echo form_error('almt_outlet') ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tableOrder" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Name</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                                <tr>
                                                    <th colspan="3" style="text-align:right">Total:</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                            <script>
                                
                                function load(val) {
                                        table = $('#tableOrder').DataTable({
                                                // columnDefs: [{
                                                //     orderable: false,
                                                //     // targets: [0, 1, 2, 3, 4]
                                                // }],
                                                "footerCallback": function(row, data, start, end, display) {
                                                    var api = this.api(),
                                                        data;

                                                    // Remove the formatting to get integer data for summation
                                                    var intVal = function(i) {
                                                        return typeof i === 'string' ?
                                                            i.replace(/[\$,]/g, '') * 1 :
                                                            typeof i === 'number' ?
                                                            i : 0;
                                                    };

                                                    // Total over all pages
                                                    total = api
                                                        .column(3)
                                                        .data()
                                                        .reduce(function(a, b) {
                                                            return intVal(a) + intVal(b);
                                                        }, 0);

                                                    // Total over this page
                                                    pageTotal = api
                                                        .column(3, {
                                                            page: 'current'
                                                        })
                                                        .data()
                                                        .reduce(function(a, b) {
                                                            return intVal(a) + intVal(b);
                                                        }, 0);

                                                    // if (($('#pilDiskon option:selected').val()) == "Rp") {
                                                    //     totalbyr = pageTotal - diskon;
                                                    // } else {
                                                    //     diskon = pageTotal * (diskon / 100);
                                                    //     totalbyr = pageTotal - diskon;
                                                    // }

                                                    // Update footer
                                                    var numformat = $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display;
                                                    $('tr:eq(0) th:eq(1)', api.table().footer()).html(
                                                        numformat(pageTotal)
                                                    );
                                                    // $('tr:eq(2) th:eq(1)', api.table().footer()).html(
                                                    //     numformat(totalbyr)
                                                    // );
                                                },
                                                "bLengthChange": false,
                                                "bFilter": false,
                                                language: {
                                                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                                                    "sProcessing": "Sedang memproses...",
                                                    "sLengthMenu": "Tampilkan _MENU_ entri",
                                                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                                                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                                                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                                    "sInfoPostFix": "",
                                                    "sSearch": "Cari:",
                                                    "sUrl": "",
                                                    "oPaginate": {
                                                        "sFirst": "Pertama",
                                                        "sPrevious": "Sebelumnya",
                                                        "sNext": "Selanjutnya",
                                                        "sLast": "Terakhir"
                                                    }
                                                },
                                                // 'order': [[ 2, "desc" ]],
                                                'processing': true,
                                                'serverSide': true,
                                                'serverMethod': 'post',
                                                'ajax': {
                                                    'url': '<?php echo base_url('monitor/tmp_order')?>',
                                                    'data': function(d) {
                                                        d.kd_mitra = val;
                                                    }
                                                },
                                                'columns': [
                                                    {
                                                        data: 'nm_barang'
                                                    },
                                                    {
                                                        data: 'jml_barang'
                                                    },
                                                    {
                                                        data: 'harga',
                                                        render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                                    },
                                                    {
                                                        data: 'harga_total',
                                                        render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                                    },
                                                    {
                                                        data: 'aksi'
                                                    }
                                                ]
                                            });
                                        };

                                        $(document).on('change', '#daftarBarang', function(e){
                                            var harga = document.getElementById('inputHarga');
                                            var daftar = $('#daftarBarang option:selected').val();
                                            // id = daftar.options[daftar.selectedIndex].value();
                                            $.ajax({
                                                url: '<?php echo base_url('monitor/get_harga_barang')?>',
                                                type: 'POST',
                                                data: {
                                                    kd_barang: daftar,
                                                },
                                                success: function(result) {
                                                    harga.value = result;
                                                }
                                            });
                                        });
                                    
                                            function order(){
                                                // var poli = $('#inputPoliklinik').val();
                                                // var diag = $('#inputDiagnosis').val();
                                                var brg = $('#daftarBarang option:selected').val();
                                                var harg = document.getElementById('inputHarga').value;
                                                var jml = $('#jml_barang').val();
                                                var kd_mitra = $('#kd_mitra').val();
                                                // var idku = $('#inputIdkunj').val();

                                                // var dataString = 'poli=' + poli + '&diag=' + diag + '&tind=' + tind + '&harg=' + harg +
                                                //     '&idku=' + idku + '&pers=' + pers + '&jmlh=' + jmlh + '&tambah=' + tambah + '&usin=' + usin;
                                                
                                                var dataString = 'brg='+brg+'&harg='+harg+'&jml='+jml+'&kd_mitra='+kd_mitra;
                                                $.ajax({
                                                    type: 'post',
                                                    url: '<?php echo base_url('monitor/tambah_order')?>',
                                                    data: dataString,
                                                    success: function() {
                                                        $('#tableOrder').DataTable().ajax.reload();
                                                        document.getElementById('daftarBarang').value = "";
                                                        // $('.ui-autocomplete-input').focus().val('');
                                                        document.getElementById('inputHarga').value = "";
                                                        document.getElementById('jml_barang').value = "1";
                                                        // document.getElementById('tab3').data-toggle="tab"
                                                        $("#tab3").attr("data-toggle", "tab");
                                                        $("#tab4").attr("data-toggle", "tab");
                                                        console.log('YEEE');
                                                    }
                                                });
                                            }
                            
                                        function hapus_order(val){
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    $('#tableOrder').DataTable().ajax.reload();
                                                    console.log('YEEE');
                                                }
                                            })
                                            // console.log(val);
                                        }
                                        function temp_hapus_order(val){
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/temp_hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    $('#tableOrder').DataTable().ajax.reload();
                                                    console.log('YEEE');
                                                }
                                            })
                                            // console.log(val);
                                        }
                                        
                            </script>
                            <div class="form-group" stye="display: none;">
                                
                                <input class="form-control" type="text" name="almt_outlet" id="almt_outlet" style="width: 80%; display: none;" disabled>
                            </div>
                            <table width='80%'>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="provinsi" id="provinsi2" style="width: 100%; display: none;">
                                                <option value="0">Pilih</option>
                                            <?php
                                            foreach ($dd_pr as $row) {  
                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                }
                                                echo"
                                            </select>"
                                            ?>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="almt_kt_outlet" id="almt_kt_outlet" style="width: 100%; display: none;">
                                                <option value="0">Pilih</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="form-group">
                                    <label for="almt_kirim">Alamat Kirim</label> 
                                    <input class="form-control" type="text" name="almt_kirim" id="almt_kirim" style="width: 80%;">
                            </div>
                            <table width='80%'>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <select class="form-control" name="provinsi" id="provinsi" style="width: 100%;">
                                                <option value="0">Pilih</option>
                                            <?php
                                            foreach ($dd_pr as $row) {  
                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                }
                                                echo" 
                                            </select>
                                            " 
                                            ?>
                                        </div>
                                    </td>
                                    <td width='50%'>                               
                                        <div class="form-group">
                                            <label for="almt_kt_rmh">Kota</label>
                                            <select class="form-control" name="almt_kt_kirim" id="almt_kt_kirim">
                                                <option value="0">Pilih</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <input type="radio" name="cek" id="cek1" value="1"> Seperti Alamat Rumah
                                &nbsp&nbsp
                                <input type="radio" name="cek" id="cek2" value="2"> Seperti Alamat Outlet
                            </div>
                        </div>
                        <! /.tab-pane -->
                        <div class="tab-pane" id="tab_4">
                            <div class="or_bank">
                                <table width='80%'>
                                    <tr>
                                        <td width='20%'>
                                            <div class="form-group">
                                                <label for="rekening">Bank</label>
                                                <select class="form-control" name="nm_bank" id="nm_bank" style="width: 100%;">
                                                    <option value="BNI">BNI</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td width='80%'>
                                            <div class="form-group">
                                                <label for="no_rekening">Nomor Rekening</label>
                                                <input class="form-control" type="text" name="rekening" id="rekening" style="width: 100%">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                    <label for="jml_tarif">Jumlah Transfer</label>
                                    <input class="form-control" type="text" name="jml_transfer" id="jml_transfer" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="or_tambah" value="tambah">Tambah Bank</button>

                            <script>
                                $(document).ready(function() {
                                    var max_fields      = 3; //maximum input boxes allowed
                                    var wrapper   		= $(".or_bank"); //Fields wrapper
                                    var add_button      = $("#or_tambah"); //Add button ID
                                    
                                    var x = 1; //initlal text box count
                                    $(add_button).click(function(e){ //on add input button click
                                        e.preventDefault();
                                        if(x < max_fields){ //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append(`    
                                            <div class=".dtbank">
                                            <table width='80%'>
                                                    <tr>
                                                        <td width='20%'>
                                                            <div class="form-group">
                                                                <label for="rekening">Bank</label>
                                                                <select class="form-control" name="nm_bank" id="nm_bank`+x+`" style="width: 100%;">
                                                                    <option value="BNI">BNI</option>
                                                                    <option value="BRI">BRI</option>
                                                                    <option value="BCA">BCA</option>
                                                                    <option value="Mandiri">Mandiri</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='80%'>
                                                            <div class="form-group">
                                                                <label for="no_rekening">Nomor Rekening</label>
                                                                <input class="form-control" type="text" name="rekening" id="rekening`+x+`" style="width: 100%">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="jml_tarif">Jumlah Transfer</label>
                                                    <input class="form-control" type="text" name="jml_tarif" id="jml_tarif`+x+`" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening`+x+`" placeholder="Atas Nama" style="width: 80%;">
                                                </div>
                                            <a href="#" class="remove_field">Remove</a></div>`); //add input box
                                            console.log('aaa');
                                        }
                                    });
                                    
                                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                        e.preventDefault(); $(this).parent('div').remove(); x--;
                                    })
                                });

                                var rupiah2 = document.getElementById('jml_transfer');
                                rupiah2.addEventListener('keyup', function(e){
                                    rupiah2.value = formatRupiah2(this.value, 'Rp ');
                                });
                            
                                function formatRupiah2(angka, prefix){
                                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                    split = number_string.split(','),
                                    sisa = split[0].length % 3,
                                    rupiah = split[0].substr(0, sisa),
                                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                                
                                    if(ribuan){
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');
                                    }
                                
                                    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                                    return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah :'');
                                }
                            </script>
                            <table width="80%">
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="ekspedisi">Ekspedisi</label>
                                            <select class="form-control" name="ekspedisi" id="ekspedisi" style="width: 100%;">
                                                <option value="0">Pilih</option>
                                            <?php
                                            foreach ($dd_ek as $row) {  
                                                echo "<option value='".$row->kd_ekspedisi."' >".$row->nama_ekspedisi."</option>";
                                                }
                                                echo"
                                            </select>
                                            <!-- "
                                        ?> -->
                                        </div>
                                    </td>
                                    <td width='50%'>             
                                        <div class="form-group">
                                            <label for="biaya_kirim">Berat</label>
                                            <input class="form-control" type="text" name="b_barang" id="b_barang" style="width: 100%;" placeholder="kg">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-group">
                                    <label for="biaya_kirim">Biaya Kirim</label>
                                    <input class="form-control" type="text" name="biaya_kirim" id="biaya_kirim" style="width: 80%;">
                                </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" id="keterangan" style="width: 80%;">
                            </div>
                            <input type="hidden" id="kd_mitra">
                            <input type="hidden" id="almt_outlet">
                            <button id="submit" type="submit" class="btn btn-success" >Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                        <script>
                            var kirim2 = document.getElementById('biaya_kirim');
                            kirim2.addEventListener('keyup', function(e){
                                kirim2.value = formatRupiahKirim2(this.value, 'Rp ');
                            });

                            function formatRupiahKirim2(angka, prefix){
                                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                split = number_string.split(','),
                                sisa = split[0].length % 3,
                                kirim = split[0].substr(0, sisa),
                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                if(ribuan){
                                    separator = sisa ? '.' : '';
                                    kirim += separator + ribuan.join('.');
                                }

                                kirim = split[1] != undefined ? kirim + '.' + split[1] : kirim;
                                return prefix == undefined ? kirim : (kirim ? 'Rp ' + kirim :'');
                            }
                            $("#submit").click(function(){
                                $.ajax({
                                    url: "<?php echo base_url('Monitor/get_temp')?>",
                                    dataType: 'json',
                                    success: function(data){
                                        var rinci = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            rinci += '<tr><td>'+data[i].nm_barang+'</td><td>'+data[i].jml_barang+'</td></tr>';
                                            //   rinci += 'a';
                                        };
                                        //   console.log(rinci);
                                        Swal.fire({
                                                title: "Rincian Order",
                                                html: '<table><tr><td align="left">Nama Mitra</td><td>:</td><td align="left">'+document.getElementById('nm_mitra').value+
                                                '</td></tr><tr><td align="left">Alamat Kirim</td><td>:</td><td align="left">'+document.getElementById('almt_rmh').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp1').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp2').value+
                                                '</td></tr><tr><td align="left">Produk</td><td>:</td><td align="left"> '+$('#daftarProduk option:selected').html()+
                                                '</td></tr><tr><td align="left">Rincian Order</td><td>:</td><td align="left"> '+
                                                '<table border="1"><tr><td>Nama</td><td>Jumlah</td></tr>'+rinci+'</table></td></tr><tr><td align="left">Keterangan</td><td>:</td><td align="left">'+
                                                document.getElementById('keterangan').value+'</td></tr><tr><td align="left">Ekspedisi</td><td>:</td><td align="left"> '+$('#ekspedisi option:selected').text()+
                                                '</td></tr></table>',
                                                showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Kirim'
                                            }).then((result) => {
                                                if (result.value) {
                                                    console.log('Sukses');
                                                    simpan_order_mitra();
                                                }
                                                })
                                    }
                                });
                            })

                            function alert(){
                                console.log('BUG');
                                
                            }

                            function form_validation(){
                                var almt_kirim = $('#almt_kirim').val();
                                if (almt_kirim == "") {
                                    alert("Alamat kirim harus di isi");
                                    return false;
                                }
                            }

                            function simpan_order_mitra(){
                                var kd_mitra = $('#kd_mitra').val();
                                var nm_mitra = $('#nm_mitra').val();
                                var almt_rmh = $('#almt_rmh').val();
                                var no_hp1 = $('#no_hp1').val();
                                var no_hp2 = $('#no_hp2').val();
                                var almt_kirim = $('#almt_kirim').val();
                                var provinsi = $('#provinsi option:selected').val();
                                var almt_kt_kirim = $('#almt_kt_kirim option:selected').val();
                                var jml_transfer = $('#jml_transfer').val();
                                var nm_bank = $('#nm_bank option:selected').val();
                                var rekening = $('#rekening').val();
                                var ats_nm_rekening = $('#ats_nm_rekening').val();
                                var ekspedisi = $('#ekspedisi option:selected').val();
                                var b_barang = $('#b_barang').val();
                                var biaya_kirim = $('#biaya_kirim').val();
                                var keterangan = $('#keterangan').val();
                                // var 
                                var dataString = 'kd_mitra='+kd_mitra+'&nm_mitra='+nm_mitra+'&almt_rmh='+almt_rmh+
                                '&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&almt_kirim='+almt_kirim+'&provinsi='+provinsi+
                                '&almt_kt_kirim='+almt_kt_kirim+'&jml_transfer='+jml_transfer+'&nm_bank='+nm_bank+
                                '&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening+'&ekspedisi='+ekspedisi+
                                '&b_barang='+b_barang+'&biaya_kirim='+biaya_kirim+'&keterangan='+keterangan;

                                if($('#jml_tarif2').val() !== undefined){
                                var jml_tarif2 = $('#jml_tarif2').val();
                                var nm_bank2 = $('#nm_bank2 option:selected').val();
                                var rekening2 = $('#rekening2').val();
                                var ats_nm_rekening2 = $('#ats_nm_rekening2').val();
                                dataString += '&jml_tarif2='+jml_tarif2+'&nm_bank2='+nm_bank2+'&rekening2='+rekening2+'&ats_nm_rekening2='+ats_nm_rekening2;
                                }
                                if($('#jml_tarif3').val() !== undefined){
                                    var jml_tarif3 = $('#jml_tarif3').val();
                                    var nm_bank3 = $('#nm_bank3 option:selected').val();
                                    var rekening3 = $('#rekening3').val();
                                    var ats_nm_rekening3 = $('#ats_nm_rekening3').val();
                                    dataString += '&jml_tarif3='+jml_tarif3+'&nm_bank3='+nm_bank3+'&rekening3='+rekening3+'&ats_nm_rekening3='+ats_nm_rekening3;
                                }

                                $.ajax({
                                    type: 'post',
                                    url: '<?php echo base_url('Monitor/tambah_mitra_order')?>',
                                    data: dataString,
                                    success: function(){
                                            document.getElementById('almt_kirim').value = "";
                                            document.getElementById('provinsi3').value = "";
                                            document.getElementById('provinsi3').disabled = false;
                                            document.getElementById('almt_outlet').value = "";
                                            document.getElementById('provinsi2').value = "";
                                            document.getElementById('provinsi2').disabled = false;
                                            document.getElementById('provinsi').value = "";
                                            document.getElementById('provinsi').disabled = false;
                                            document.getElementById('almt_kt_kirim').value = "";
                                            document.getElementById('almt_kt_kirim').disabled = false;
                                            document.getElementById('almt_kirim').disabled = false;
                                            document.getElementById('jml_transfer').value = "";
                                            document.getElementById('rekening').value = "";
                                            document.getElementById('ats_nm_rekening').value = "";
                                            document.getElementById('ekspedisi').value = "";
                                            document.getElementById('b_barang').value = "";
                                            document.getElementById('biaya_kirim').value = "";
                                            document.getElementById('keterangan').value = "";
                                            document.getElementById('daftarProduk').value = "";
                                            document.getElementById('daftarBarang').value = "";
                                            document.getElementById('jml_barang').value = "";
                                            document.getElementById("cek1").checked = false;
                                            document.getElementById("cek2").checked = false;
                                            // $(".nav-item:first-child").addClass("active");
                                            $('.nav-pills a:first').tab('show');
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            $('#exampleModal').modal('hide');
                                            Swal.fire(
                                                'Sukses',
                                                'Order berhasil disimpan',
                                                'success'
                                            )
                                    }
                                })
                            
                            }

                            $('#exampleModal').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget)
                                            var recipient = button.data('whatever')
                                            var modal = $(this);
                                            var dataString = 'id=' + recipient;

                                            $.ajax({
                                                type: "GET",
                                                url: "<?php echo base_url('Monitor/get_dtmt_pel')?>",
                                                dataType: "json",
                                                data: dataString,
                                                success: function(data) {
                                                    $('#nm_mitra').val(data[0]['nm_mitra']);
                                                    $('#almt_rmh').val(data[0]['almt_rmh']);
                                                    $('#provinsi3').val(data[0]['provinsi1']);
                                                    if($('#provinsi3').val() !== 0){
                                                        var id = $('#provinsi3').val();
                                                        $.ajax({
                                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                                method : "POST",
                                                                data : {id: id},
                                                                async : false,
                                                                dataType : 'json',
                                                                success: function(data){
                                                                    var html = '<option value="0">Pilih</option>';
                                                                    var i;
                                                                    for(i=0; i<data.length; i++){
                                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                                    }
                                                                    $('#almt_kt_rmh').html(html);
                                                                }
                                                            });
                                                    }
                                                    $('#almt_kt_rmh').val(data[0]['kota1']);
                                                    $('#almt_outlet').val(data[0]['almt_outlet']);
                                                    $('#provinsi2').val(data[0]['provinsi2']);
                                                    if($('#provinsi2').val() !== 0){
                                                        var id = $('#provinsi2').val();
                                                        $.ajax({
                                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                                method : "POST",
                                                                data : {id: id},
                                                                async : false,
                                                                dataType : 'json',
                                                                success: function(data){
                                                                    var html = '<option value="0">Pilih</option>';
                                                                    var i;
                                                                    for(i=0; i<data.length; i++){
                                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                                    }
                                                                    $('#almt_kt_outlet').html(html);
                                                                }
                                                            });
                                                    }
                                                    $('#almt_kt_outlet').val(data[0]['kota2']);
                                                    $('#no_hp1').val(data[0]['no_hp1']);
                                                    $('#no_hp2').val(data[0]['no_hp2']);
                                                    $('#kd_mitra').val(data[0]['kd_mitra']);
                                                    $('#almt_outlet').val(data[0]['almt_outlet']);
                                                    // document.getElementById("daftarProduk").selectedIndex = data[0]['nm_produk'];
                                                    $('#daftarProduk').val(data[0]['nm_produk']);
                                                    $('#daftarProduk').prop('disabled', 'disabled');
                                                        if($('#daftarProduk').val() !== 0){
                                                            var id=$('#daftarProduk').val();
                                                            $.ajax({
                                                                url : "<?php echo base_url();?>monitor/get_jns_barang",
                                                                method : "POST",
                                                                data : {id: id},
                                                                async : false,
                                                                dataType : 'json',
                                                                success: function(data){
                                                                    var html = '<option value="0">Pilih</option>';
                                                                    var i;
                                                                    for(i=0; i<data.length; i++){
                                                                        html += '<option value="'+data[i].kd_barang+'">'+data[i].nm_barang+'</option>';
                                                                    }
                                                                    $('#daftarBarang').html(html);
                                                                    
                                                                }
                                                            });
                                                        }
                                                },
                                                error: function(err) {
                                                    console.log(err);
                                                }
                                            });
                                        });
                                        function tutup() {
                                            table.destroy();
                                            val = $('#kd_mitra').val();
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    
                                                    console.log('YEEE');
                                                }
                                            });
                                            
                                            
                                            document.getElementById('almt_kirim').value = "";
                                            document.getElementById('almt_kirim').disabled = false;
                                            document.getElementById('jml_transfer').value = "";
                                            document.getElementById('rekening').value = "";
                                            document.getElementById('ats_nm_rekening').value = "";
                                            document.getElementById('ekspedisi').value = "";
                                            document.getElementById('b_barang').value = "";
                                            document.getElementById('biaya_kirim').value = "";
                                            document.getElementById('keterangan').value = "";
                                            document.getElementById('daftarProduk').value = "";
                                            document.getElementById('daftarBarang').value = "";
                                            document.getElementById('jml_barang').value = "";
                                            document.getElementById('provinsi3').value = "";
                                            document.getElementById('provinsi3').disabled = false;
                                            document.getElementById('almt_outlet').value = "";
                                            document.getElementById('provinsi2').value = "";
                                            document.getElementById('provinsi2').disabled = false;
                                            document.getElementById('provinsi').value = "";
                                            document.getElementById('provinsi').disabled = false;
                                            document.getElementById('almt_kt_kirim').value = "";
                                            document.getElementById('almt_kt_kirim').disabled = false;
                                            document.getElementById("cek1").checked = false;
                                            document.getElementById("cek2").checked = false;
                                            // $(".nav-item:first-child").addClass("active");
                                            // $('.nav-item a[href="#tab1"]').tab('show');
                                            $('.nav-pills a:first').tab('show');
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            $('#exampleModal').modal('hide');
                                        }
                        </script>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    </div>
            
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="modal fade" id="modalPelunasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Tindakan popup -->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <!-- <h3 class="modal-title" id="exampleModalLabel">Data Order</h3> -->
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data Mitra</h3>
                                    <ul class="nav nav-pillsl ml-auto p-2">
                                        <li class="nav-item"><a class="nav-link" href="#tabs_1" data-toggle="tab">Identitas</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabs_2" data-toggle="tab">Outlet</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabs_3" data-toggle="tab">Pengiriman</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabs_4" data-toggle="tab">Jenis Pembayaran</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs_1">
                                            <div class="form-group">
                                                <label for="nm_mitra">Nama Mitra </label> <?php echo form_error('nm_mitra')?>
                                                <input class="form-control" type="text" name="dt_nm_mitra" id="dt_nm_mitra" style="width: 80%;" disabled>
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='10%'>
                                                    <div class="form-group">
                                                        <label for="tgl_terima">Kota & Tanggal Lahir </label> <?php echo form_error('tgl_lahir') ?>
                                                            <input class="form-control" type="text" name="dt_kt_lahir" id="dt_kt_lahir" placeholder="Kota" disabled>
                                                        </div>
                                                    </td>
                                                    <td width='40%'>
                                                    <div class="form-group">
                                                        <label style="height: 42px;"></label>
                                                        <input class="form-control" type="text" name="dt_tgl_lahir" id="dt_tgl_lahir" placeholder="dd-mm-yyyy" disabled>
                                                    </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <label for="almt_rmh">Alamat Rumah</label> <?php echo form_error('almt_rmh') ?>
                                                <input class="form-control" type="text" name="dt_almt_rmh" id="dt_almt_rmh" style="width: 80%;" disabled>
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi" id="dt_provinsi" style="width: 100%;" disabled>
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_pr as $row) {  
                                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                            ?>
                                                        <div>
                                                    </td>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="form-control" name="dt_almt_kt_rmh" id="dt_almt_kt_rmh" style="width: 100%;" disabled>
                                                                    <option value="0">Pilih</option>
                                                                </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="no_hp1">Nomor Handphone</label>
                                                            <input class="form-control" name="dt_no_hp1" id="dt_no_hp1" style="width: 100%" disabled>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="no_hp2">Nomor Handphone</label>
                                                            <input class="form-control" name="dt_no_hp2" id="dt_no_hp2" style="width: 100%" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tabs_2">
                                            <div class="form-group">
                                                    <label for="almt_outlet">Alamat Outlet</label> <?php echo form_error('almt_outlet') ?>
                                                    <input class="form-control" type="text" name="dt_almt_outlet" id="dt_almt_outlet" style="width: 80%;" disabled>
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi" id="dt_provinsi2" style="width: 100%;" disabled>
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_pr as $row) {  
                                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                            <select class="form-control" name="dt_almt_kt_outlet" id="dt_almt_kt_outlet" style="width: 100%;" disabled>
                                                                <option value="0">Pilih</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <div class="form-group">
                                                    <label for="almt_outlet">Alamat Outlet Perbaikan</label> <?php echo form_error('almt_outlet') ?>
                                                    <input class="form-control" type="text" name="dt_almt_outlet_prb" id="dt_almt_outlet_prb" style="width: 80%;">
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi_prb" id="dt_provinsi2_prb" style="width: 100%;">
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_pr as $row) {  
                                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                            <select class="form-control" name="dt_almt_kt_outlet_prb" id="dt_almt_kt_outlet_prb" style="width: 100%;">
                                                                <option value="0">Pilih</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <input type="radio" name="cek2" id="cek3" value="1"> Seperti Alamat Rumah
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs_3">
                                            <div class="form-group">
                                                    <label for="almt_kirim">Alamat Kirim</label> <?php echo form_error('almt_kirim') ?>
                                                    <input class="form-control" type="text" name="dt_almt_kirim" id="dt_almt_kirim" style="width: 80%;" disabled>
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi" id="dt_provinsi3" style="width: 100%;" disabled>
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_pr as $row) {  
                                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>                               
                                                        <div class="form-group">
                                                            <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                            <select class="form-control" name="dt_almt_kt_kirim" id="dt_almt_kt_kirim" disabled>
                                                                <option value="0">Pilih</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                    <label for="almt_kirim">Alamat Kirim Perbaikan</label> <?php echo form_error('almt_kirim') ?>
                                                    <input class="form-control" type="text" name="dt_almt_kirim_prb" id="dt_almt_kirim_prb" style="width: 80%;">
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi_prb" id="dt_provinsi3_prb" style="width: 100%;">
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_pr as $row) {  
                                                                echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>                               
                                                        <div class="form-group">
                                                            <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                            <select class="form-control" name="dt_almt_kt_kirim_prb" id="dt_almt_kt_kirim_prb">
                                                                <option value="0">Pilih</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <input type="radio" name="cek" id="cek1" value="1"> Seperti Alamat Rumah
                                                &nbsp&nbsp
                                                <input type="radio" name="cek" id="cek2" value="2"> Seperti Alamat Outlet
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="penerusan" id="penerusan">&nbsp&nbsp Penerusan Alamat
                                            </div>
                                            <div class="form-group">
                                                <label for="almt_terusan">Penerusan Alamat</label>
                                                <input class="form-control" type="text" name="dt_almt_terusan" id="dt_almt_terusan" style="width: 80%;" disabled>
                                            </div>
                                            <table width="80%">
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="prov_terusan">Provinsi</label>
                                                            <select class="form-control" name="dt_prov_terusan" id="dt_prov_terusan" style="width: 100%;" disabled>
                                                                <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>
                                                    <div class="form-group">
                                                        <label for="kt_terusan">Kota</label> 
                                                        <select class="form-control" name="dt_kt_terusan" id="dt_kt_terusan" disabled>
                                                            <option value="0">Pilih</option>
                                                        </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <input type="radio" name="cekter" id="cekter1" value="1"> Seperti Alamat Rumah
                                                &nbsp&nbsp
                                                <input type="radio" name="cekter" id="cekter2" value="2"> Seperti Alamat Outlet
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs_4">
                                            <div class="form-group">
                                                <label for="pembayaran">Pembayaran</label><br>
                                                <!-- <input type="radio" name="sts_pmby" id="sts_pmby1" value="1"> DP
                                                <input type="radio" name="sts_pmby" id="sts_pmby2" value="2"> Lunas -->
                                                <select class="form-control" name="dt_sts_pmby" id="dt_sts_pmby" style="width: 80%">
                                                    <option value="3">Cicilan</option>
                                                    <option value="4">Pelunasan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nm_produk">Nama Produk</label>
                                                <select class="form-control" name="dt_nm_produk" id="dt_nm_produk" style="width: 80%">
                                                    <option value="0">Pilih</option>
                                                    <?php
                                                    foreach ($dd_pro as $row) {  
                                                        echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                                        }
                                                        echo"
                                                    </select>"
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="paket">Paket</label> 
                                                <select class="form-control" name="dt_paket" id="dt_paket" style="width: 80%">
                                                    <option value="0">Pilih</option>
                                                </select>
                                            </div>
                                            <div class="dt_bank_form">
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='20%'>
                                                            <div class="form-group">
                                                                <label for="rekening">Bank</label>
                                                                <select class="form-control" name="dt_nm_bank" id="dt_nm_bank" style="width: 100%;">
                                                                    <option value="BNI">BNI</option>
                                                                    <option value="BRI">BRI</option>
                                                                    <option value="BCA">BCA</option>
                                                                    <option value="Mandiri">Mandiri</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='80%'>
                                                            <div class="form-group">
                                                                <label for="no_rekening">Nomor Rekening</label>
                                                                <input class="form-control" type="text" name="dt_rekening" id="dt_rekening" style="width: 100%">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="jml_tarif">Jumlah Transfer</label>
                                                    <input class="form-control" type="text" name="dt_jml_tarif" id="dt_jml_tarif" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="dt_ats_nm_rekening" id="dt_ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                                </div>
                                            </div>
                                            <input type="hidden" name="dt_kd_pmby" id="dt_kd_pmby">
                                            <!-- <button class="btn btn-primary" id="tambah" value="tambah" onclick="tmb_bank()">Tambah</button> -->
                                            <button class="btn btn-primary" id="dt_tambah" value="tambah">Tambah Bank</button>
                                            
                                            <script>
                                            $(document).ready(function() {
                                                var max_fields      = 3; //maximum input boxes allowed
                                                var wrapper   		= $(".dt_bank_form"); //Fields wrapper
                                                var add_button      = $("#dt_tambah"); //Add button ID
                                                
                                                var x = 1; //initlal text box count
                                                $(add_button).click(function(e){ //on add input button click
                                                    e.preventDefault();
                                                    if(x < max_fields){ //max input box allowed
                                                        x++; //text box increment
                                                        $(wrapper).append(`    
                                                        <div class=".dtbank">
                                                        <table width='80%'>
                                                                <tr>
                                                                    <td width='20%'>
                                                                        <div class="form-group">
                                                                            <label for="rekening">Bank</label>
                                                                            <select class="form-control" name="dt_nm_bank" id="dt_nm_bank`+x+`" style="width: 100%;">
                                                                                <option value="BNI">BNI</option>
                                                                                <option value="BRI">BRI</option>
                                                                                <option value="BCA">BCA</option>
                                                                                <option value="Mandiri">Mandiri</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td width='80%'>
                                                                        <div class="form-group">
                                                                            <label for="no_rekening">Nomor Rekening</label>
                                                                            <input class="form-control" type="text" name="dt_rekening" id="dt_rekening`+x+`" style="width: 100%">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div class="form-group">
                                                                <label for="jml_tarif">Jumlah Transfer</label>
                                                                <input class="form-control" type="text" name="dt_jml_tarif" id="dt_jml_tarif`+x+`" style="width: 80%;">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="dt_ats_nm_rekening" id="dt_ats_nm_rekening`+x+`" placeholder="Atas Nama" style="width: 80%;">
                                                            </div>
                                                        <a href="#" class="remove_field">Remove</a></div>`); //add input box
                                                        console.log('aaa');
                                                    }
                                                });
                                                
                                                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                    e.preventDefault(); $(this).parent('div').remove(); x--;
                                                })
                                            });
                                            </script>
                                            <table width="80%">
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="ekspedisi">Ekspedisi</label>
                                                            <select class="form-control" name="dt_ekspedisi" id="dt_ekspedisi" style="width: 100%;">
                                                                <option value="0">Pilih</option>
                                                            <?php
                                                            foreach ($dd_ek as $row) {  
                                                                echo "<option value='".$row->kd_ekspedisi."' >".$row->nama_ekspedisi."</option>";
                                                                }
                                                                echo"
                                                            </select>"
                                                        ?>
                                                        </div>
                                                    </td>
                                                    <td width='50%'>             
                                                        <div class="form-group">
                                                            <label for="biaya_kirim">Biaya Kirim</label>
                                                            <input class="form-control" type="text" name="dt_biaya_kirim" id="dt_biaya_kirim" style="width: 100%;">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <label for="tambahan">Tambahan</label>
                                                <input class="form-control" type="text" name="dt_tambahan" id="dt_tambahan" style="width: 80%;">
                                            </div>
                                            <input type="hidden" name="dt_kd_mitra" id="dt_kd_mitra">
                                            
                                            <button type="submit" class="btn btn-success" id="update_byr" onclick="update_byr()">Simpan</button>
                                            <button class="btn btn-danger" onclick="ttp()">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <script>
                    var rupiah3 = document.getElementById('dt_jml_tarif');
                    rupiah3.addEventListener('keyup', function(e){
                        rupiah3.value = formatRupiah3(this.value, 'Rp ');
                    });
                
                    function formatRupiah3(angka, prefix){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                    
                        if(ribuan){
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }
                    
                        rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah :'');
                    }
                
                
                
                    var kirim3 = document.getElementById('dt_biaya_kirim');
                    kirim3.addEventListener('keyup', function(e){
                        kirim3.value = formatRupiahKirim3(this.value, 'Rp ');
                    });

                    function formatRupiahKirim3(angka, prefix){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        kirim = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        if(ribuan){
                            separator = sisa ? '.' : '';
                            kirim += separator + ribuan.join('.');
                        }

                        kirim = split[1] != undefined ? kirim + '.' + split[1] : kirim;
                        return prefix == undefined ? kirim : (kirim ? 'Rp ' + kirim :'');
                    }

                    function ttp(){
                        var kd_pmby = $('#dt_kd_pmby').val();
                        var data =  'kd_pmby='+kd_pmby;
                        $.ajax({
                                type: 'post',
                                url: '<?php echo base_url('monitor/hapus_bank_ad')?>',
                                data: data,
                                success: function(){
                                    console.log('YEEE');
                                    
                                }
                            });
                            document.getElementById('dt_nm_mitra').value = '';
                            document.getElementById('dt_kt_lahir').value = '';
                            document.getElementById('dt_tgl_lahir').value = '';
                            document.getElementById('dt_almt_rmh').value = '';
                            document.getElementById('dt_provinsi').value = '0';
                            document.getElementById('dt_almt_kt_rmh').value = '0';
                            document.getElementById('dt_no_hp1').value = '';
                            document.getElementById('dt_no_hp2').value = '';
                            document.getElementById('dt_almt_outlet').value = '';
                            document.getElementById('dt_provinsi2').value = '0';
                            document.getElementById('dt_almt_kt_outlet').value = '0';
                            document.getElementById('dt_provinsi3').value = '0';
                            document.getElementById('dt_almt_kirim').value = '';
                            document.getElementById('dt_almt_kt_kirim').value = '0';
                            document.getElementById('dt_almt_terusan').value = '';
                            document.getElementById('dt_prov_terusan').value = '0';
                            document.getElementById('dt_kt_terusan').value = '0';
                            // document.getElementById('dt_nm_marketing').value = '';
                            document.getElementById('dt_sts_pmby').value = '0';
                            document.getElementById('dt_nm_produk').value = '0';
                            document.getElementById('dt_paket').value = '0';
                            document.getElementById('dt_ekspedisi').value = '0';
                            document.getElementById('dt_biaya_kirim').value = '';
                            // document.getElementById('dt_cek3').checked = false;
                            // document.getElementById('dt_cek1').checked = false;
                            // document.getElementById('dt_cekter1').checked = false;
                            // document.getElementById('dt_cekter2').checked = false;
                            // document.getElementById('dt_penerusan').checked = false;
                            // lunas.destroy();
                            // $('#dttableBank').DataTable().ajax.reload();
                            $('.nav-pillsl a:first').tab('show');
                            $('#modalPelunasan').modal('hide');
                    }

                    $(document).ready(function(){
                        $('#penerusan').on('click', function(){
                            if($('#penerusan').is(':checked')){
                                $('#dt_almt_terusan').prop('disabled', false);
                                $('#dt_prov_terusan').prop('disabled', false);
                                $('#dt_kt_terusan').prop('disabled', false);
                                console.log('a');
                            }else{
                                $('#dt_almt_terusan').prop('disabled', true);
                                $('#dt_prov_terusan').prop('disabled', true);
                                $('#dt_kt_terusan').prop('disabled', true);
                                $('#dt_almt_terusan').val('');
                                $('#dt_prov_terusan').val('0');
                                $('#dt_kt_terusan').val('0');
                                console.log('b');
                            }
                        })
                    })

                      function update_byr(){
                        // var byr = $('#dt_sts_pmby').val();
                        var kd_mitra = $('#dt_kd_mitra').val();
                        var sts_pmby = $('#dt_sts_pmby option:selected').val();
                        var nm_produk = $('#dt_nm_produk option:selected').val();
                        var paket = $('#dt_paket option:selected').val();
                        var ekspedisi =$('#dt_ekspedisi option:selected').val();
                        var biaya_kirim = $('#dt_biaya_kirim').val();
                        var tambahan = $('#dt_tambahan').val();
                        var pembayaran = $('#dt_kd_pmby').val();
                        var jml_tarif = $('#dt_jml_tarif').val();
                        var nm_bank = $('#dt_nm_bank option:selected').val();
                        var rekening = $('#dt_rekening').val();
                        var ats_nm_rekening = $('#dt_ats_nm_rekening').val();

                        var dataString = 'kd_mitra='+kd_mitra+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim+
                        '&tambahan='+tambahan+'&pembayaran='+pembayaran+'&jml_tarif='+jml_tarif+'&nm_bank='+nm_bank+'&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening;
                        if($('#dt_almt_outlet_prb').val() !== ''){
                            var almt_outlet = $('#dt_almt_outlet_prb').val();
                            var almt_prov_outlet = $('#dt_provinsi2_prb option:selected').val();
                            var almt_kt_outlet = $('#dt_almt_kt_outlet_prb option:selected').val();
                            dataString += '&almt_outlet='+almt_outlet+'&almt_prov_outlet'+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet;
                        }else{
                            var almt_outlet = $('#dt_almt_outlet').val();
                            var almt_prov_outlet = $('#dt_provinsi2 option:selected').val();
                            var almt_kt_outlet = $('#dt_almt_kt_outlet option:selected').val();
                            dataString += '&almt_outlet='+almt_outlet+'&almt_prov_outlet'+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet;
                        }
                        if($('#dt_almt_kirim_prb').val() !== ''){
                            var almt_kirim = $('#dt_almt_kirim_prb').val();
                            var almt_prov_kirim = $('#dt_provinsi3_prb option:selected').val();
                            var almt_kt_kirim = $('#dt_almt_kt_kirim_prb option:selected').val();
                            dataString += '&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+'&almt_kt_kirim='+almt_kt_kirim;
                        }else{
                            var almt_kirim = $('#dt_almt_kirim').val();
                            var almt_prov_kirim = $('#dt_provinsi3 option:selected').val();
                            var almt_kt_kirim = $('#dt_almt_kt_kirim option:selected').val();
                            dataString += '&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+'&almt_kt_kirim='+almt_kt_kirim;
                        }
                        if($('#dt_almt_terusan').val() !== ''){
                            var almt_terusan = $('#dt_almt_terusan').val();
                            var almt_prov_terusan = $('#dt_prov_terusan option:selected').val();
                            var almt_kt_terusan = $('#dt_kt_terusan option:selected').val();
                            dataString += '&almt_terusan='+almt_terusan+'&almt_prov_terusan='+almt_prov_terusan+'&almt_kt_terusan='+almt_kt_terusan;
                        }
                        if($('#dt_jml_tarif2').val() !== undefined){
                                var jml_tarif2 = $('#dt_jml_tarif2').val();
                                var nm_bank2 = $('#dt_nm_bank2 option:selected').val();
                                var rekening2 = $('#dt_rekening2').val();
                                var ats_nm_rekening2 = $('#dt_ats_nm_rekening2').val();
                                dataString += '&jml_tarif2='+jml_tarif2+'&nm_bank2='+nm_bank2+'&rekening2='+rekening2+'&ats_nm_rekening2='+ats_nm_rekening2;
                            }
                        if($('#dt_jml_tarif3').val() !== undefined){
                            var jml_tarif3 = $('#dt_jml_tarif3').val();
                            var nm_bank3 = $('#dt_nm_bank3 option:selected').val();
                            var rekening3 = $('#dt_rekening3').val();
                            var ats_nm_rekening3 = $('#dt_ats_nm_rekening3').val();
                            dataString += '&jml_tarif3='+jml_tarif3+'&nm_bank3='+nm_bank3+'&rekening3='+rekening3+'&ats_nm_rekening3='+ats_nm_rekening3;
                        }
                        $.ajax({
                              url: "<?php echo base_url('Monitor/update_byr')?>",
                              type: "POST",
                              data: dataString,
                              success: function(data){
                                console.log('suksas');
                                Swal.fire(
                                    'Sukses',
                                    'Update berhasil disimpan',
                                    'success'
                                )
                                $('#modalPelunasan').modal('hide');
                                $('.nav-pillsl a:first').tab('show');
                                $('#mthri-table').DataTable().ajax.reload();
                                $('#dp-table').DataTable().ajax.reload();
                                $('#cc-table').DataTable().ajax.reload();
                              }
                          });
                      }


                    $('#modalPelunasan').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var recipient = button.data('whatever')
                        var modal = $(this);
                        var dataString = 'id=' + recipient
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('Monitor/get_dtmt_pel')?>",
                            dataType: "json",
                            data: dataString,
                            success: function(data) {
                                $('#dt_nm_mitra').val(data[0]['nm_mitra']);
                                $('#dt_kt_lahir').val(data[0]['kt_lahir']);
                                $('#dt_tgl_lahir').val(data[0]['tgl_lahir']);
                                $('#dt_almt_rmh').val(data[0]['almt_rmh']);
                                $('#dt_provinsi').val(data[0]['provinsi1']);
                                if($('#dt_provinsi').val() !== 0){
                                    var id = $('#dt_provinsi').val();
                                    $.ajax({
                                            url : "<?php echo base_url();?>monitor/get_kota",
                                            method : "POST",
                                            data : {id: id},
                                            async : false,
                                            dataType : 'json',
                                            success: function(data){
                                                var html = '<option value="0">Pilih</option>';
                                                var i;
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                }
                                                $('#dt_almt_kt_rmh').html(html);
                                            }
                                        });
                                }
                                $('#dt_almt_kt_rmh').val(data[0]['kota1']);
                                $('#dt_no_hp1').val(data[0]['no_hp1']);
                                $('#dt_no_hp2').val(data[0]['no_hp2']);
                                $('#dt_almt_outlet').val(data[0]['almt_outlet']);
                                $('#dt_provinsi2').val(data[0]['provinsi2']);
                                if($('#dt_provinsi2').val() !== 0){
                                    var id = $('#dt_provinsi2').val();
                                    $.ajax({
                                            url : "<?php echo base_url();?>monitor/get_kota",
                                            method : "POST",
                                            data : {id: id},
                                            async : false,
                                            dataType : 'json',
                                            success: function(data){
                                                var html = '<option value="0">Pilih</option>';
                                                var i;
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                }
                                                $('#dt_almt_kt_outlet').html(html);
                                            }
                                        });
                                }
                                $('#dt_almt_kt_outlet').val(data[0]['kota2']);
                                $('#dt_almt_kirim').val(data[0]['almt_kirim']);
                                $('#dt_nm_produk').val(data[0]['nm_produk']);
                                if($('#dt_nm_produk').val() !== 0){
                                    var id = $('#dt_nm_produk').val();
                                    $.ajax({
                                            url : "<?php echo base_url();?>monitor/get_jns_paket",
                                            method : "POST",
                                            data : {id: id},
                                            async : false,
                                            dataType : 'json',
                                            success: function(data){
                                                var html = '<option value="0">Pilih</option>';
                                                var i;
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].kd_paket+'">'+data[i].nm_paket+'</option>';
                                                }
                                                $('#dt_paket').html(html);
                                            }
                                        });
                                }
                                $('#dt_paket').val(data[0]['paket']);
                                $('#dt_kd_mitra').val(data[0]['kd_mitra']);
                                $('#dt_kd_pmby').val(data[0]['pembayaran']);
                                
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    });

                    $(document).ready(function(){
                        $('#dt_nm_produk').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_jns_paket",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '<option value="0">Pilih</option>';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].kd_paket+'">'+data[i].nm_paket+'</option>';
                                    }
                                    $('#dt_paket').html(html);
                                    
                                }
                            });
                        });
                    });

                    $(document).ready(function(){
                        $('#dt_provinsi_prb').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                    }
                                    $('#dt_almt_kt_rmh_prb').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#dt_provinsi2_prb').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                    }
                                    $('#dt_almt_kt_outlet_prb').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#dt_provinsi3_prb').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                    }
                                    $('#dt_almt_kt_kirim_prb').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#dt_prov_terusan').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                    }
                                    $('#dt_kt_terusan').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                            $('#cek1').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_rmh').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                        $('#provinsi').val($('#provinsi3 option:selected').val());
                                        $('#provinsi').prop('disabled', 'disabled');
                                        if($('#provinsi option:selected').val() !== 0){
                                            var id=$('#provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#almt_kt_kirim').html(html);
                                                    $('#almt_kt_kirim').val($('#almt_kt_rmh option:selected').val());
                                                    $('#almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                        
                                    }
                                }
                            )
                        })
                    //kirim
                        $(document).ready(function(){
                            $('#cek2').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_outlet').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                        $('#provinsi3').val($('#provinsi2 option:selected').val());
                                        $('#provinsi3').prop('disabled', 'disabled');
                                        if($('#provinsi3 option:selected').val() !== 0){
                                            var id=$('#provinsi2 option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#almt_kt_kirim').html(html);
                                                    $('#almt_kt_kirim').val($('#almt_kt_outlet option:selected').val());
                                                    $('#almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })
                </script>

			</div>
		</div>
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
	  </div>

	
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

	<script>
	$(document).ready(function(){
   var table=$('#dataMitra').DataTable({
	language: {
	"sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
	"sProcessing":   "Sedang memproses...",
	"sLengthMenu":   "Tampilkan _MENU_ entri",
	"sZeroRecords":  "Tidak ditemukan data yang sesuai",
	"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
	"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
	"sInfoPostFix":  "",
	"sSearch":       "Cari:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst":    "Pertama",
		"sPrevious": "Sebelumnya",
		"sNext":     "Selanjutnya",
		"sLast":     "Terakhir"
	}
	},
	  'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'monitor/dt_tbl'?>',
		  'data': function(data){
			var awal = $('#tgl1').val();
          	var akhir = $('#tgl2').val();

			data.searchByAwal = awal;
          	data.searchByAkhir = akhir;
		  }
      },
      "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if (aData['last'] === "Di atas 3 bulan") {
                $('td', nRow).css('background-color', 'LightCoral');
            } else {
                $('td', nRow).css('background-color', '');
            }
        },
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
      'columns': [
         //{ data: 'no' },
        //  { data: 'kd_inv' },
         { data: 'nm_mitra' },
         { data: 'last' },
         { data: 'nm_produk' },
         { data: 'almt_kt_rmh' },
         { data: 'history' },
		 { data: 'action'}
      ]
	});
	$('#tgl2').on('dp.change', function(){
    	table.draw(true);
  	});
	});

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);

	

	  $('#tgl1').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});

	$('#tgl2').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});

                        $(function() {
                            $(".tabs").click(function(){
                            var source = $(this).data("source");
                            var tableId = $(this).data("table");
                            console.log(tableId);
                            initiateTable(tableId,source);
                            });

                            function initiateTable(tableId, source) {
                                if(tableId === 'mthri-table'){visible = true}else{visible = false}
                                var table = $("#" + tableId).DataTable({
                                    language: {
                                        "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                                        "sProcessing":   "Sedang memproses...",
                                        "sLengthMenu":   "Tampilkan _MENU_ entri",
                                        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                                        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                        "sInfoPostFix":  "",
                                        "sSearch":       "Cari:",
                                        "sUrl":          "",
                                        "oPaginate": {
                                            "sFirst":    "Pertama",
                                            "sPrevious": "Sebelumnya",
                                            "sNext":     "Selanjutnya",
                                            "sLast":     "Terakhir"
                                        }
                                        },
                                        'order': [[ 0, "desc" ]],
                                        'processing': true,
                                        'serverSide': true,
                                        'serverMethod': 'post',
                                    "ajax": {
                                        'url' : source,
                                        'data' : function(data){
                                            var awal = $('#tgl1').val();
                                            var akhir = $('#tgl2').val();

                                            data.searchByAwal = awal;
                                            data.searchByAkhir = akhir;
                                        }
                                    },
                                    "columnDefs": [
                                        {
                                            "targets": [ 3 ],
                                            "visible": visible,
                                            "searchable": visible
                                        }
                                    ],
                                    'columns': [
                                        //{ data: 'no' },
                                        //  { data: 'kd_inv' },
                                        { data: 'nm_mitra' },
                                        { data: 'dt_create'},
                                        { data: 'dt_pelunasan' },
                                        { data: 'sts_pmby' },
                                        { data: 'almt_kt_rmh' },
                                        { data: 'paket' },
                                        { data: 'action'}
                                    ],
                                    "destroy": true,
                                    "bFilter": true
                                    // "bLengthChange": false,
                                    // "bPaginate": false
                                });
                                $('#tgl2').on('dp.change', function(){
                                    table.draw(true);
                                });
                            }
                            initiateTable("mthri-table", "<?php echo base_url('monitor/dt_mt_hri')?>");
                            $("#dynamic-tabs").tabs();
                        });

            $(document).ready(function(){
            $('#provinsi').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>monitor/get_kota",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                        }
                        $('#almt_kt_kirim').html(html);
                        
                    }
                });
            });
        });
        $(document).ready(function(){
        $('#cek1').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_rmh').value;
                    document.getElementById('almt_kirim').value = almt;
                    document.getElementById('almt_kirim').disabled  = true;
                    $('#provinsi2').val($('#provinsi option:selected').val());
                    $('#provinsi2').prop('disabled', 'disabled');
                    if($('#provinsi option:selected').val() !== 0){
                        var id=$('#provinsi option:selected').val();
                        $.ajax({
                            url : "<?php echo base_url();?>monitor/get_kota",
                            method : "POST",
                            data : {id: id},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                }
                                $('#almt_kt_outlet').html(html);
                                $('#almt_kt_outlet').val($('#almt_kt_rmh option:selected').val());
                                $('#almt_kt_outlet').prop('disabled', 'disabled');
                            }
                        });
                    }
                }
            }
        )
    })
    //kirim
    $(document).ready(function(){
        $('#cek2').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_outlet').value;
                    document.getElementById('almt_kirim').value = almt;
                    document.getElementById('almt_kirim').disabled  = true;
                }
            }
        )
    })
	</script>

	</body>
</html>