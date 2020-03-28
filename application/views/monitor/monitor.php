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
        input[type=number] {
            -moz-appearance: textfield;
            padding-left: 6px;
            padding-right: 6px;
        }
	</style>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
    <!-- <script src="<?php //echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script> -->
    
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>

				<div class="card shadow mb-4">
					<div class="card-header py-3">
              			<h6 class="m-0 font-weight-bold text-dark">Data Mitra</h6>
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
					<table style="margin-left: 20px">
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
                    <button style="height: 36px" class="btn btn-dark" data-toggle="modal" data-target="#inputMitra"  data-keyboard="false" data-backdrop="static" onclick="load()">Input Data Mitra</button>
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
                                                    <label for="almt_terusan">Atasnama Penerusan</label>
                                                    <input class="form-control" type="text" name="in_ats_nm_penerusan" id="in_ats_nm_penerusan" style="width: 80%;" disabled>
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
                                                <div class="form-group">
                                                    <input type="checkbox" name="tmbbb" id="tmbb">&nbsp&nbsp Tambah Bahan Baku
                                                </div>
                                                <div id="by_tmbb" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="barang_tambah">Nama Barang</label>
                                                        <input class="form-control" type="text" name="in_nmb_tmbb" id="in_nmb_tmbb" style="width: 80%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="biaya_tmbbb">Biaya Tambahan Bahan Baku</label>
                                                        <input class="form-control" type="text" name="in_by_tmbbb" id="in_by_tmbbb" style="width: 80%;">
                                                    </div>
                                                    <table width='80%'>
                                                        <tr>
                                                            <td width='20%'>
                                                                <div class="form-group">
                                                                    <label for="rekening">Bank</label>
                                                                    <select class="form-control" name="in_nm_bank_tmbbb" id="in_nm_bank_tmbbb" style="width: 100%;">
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
                                                                    <input class="form-control" type="text" name="in_rekening_tmbbb" id="in_rekening_tmbbb" style="width: 100%">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group">
                                                        <label for="jml_tarif">Jumlah Transfer</label>
                                                        <input class="form-control" type="text" name="in_jml_tarif_tmbbb" id="in_jml_tarif_tmbbb" style="width: 80%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="in_ats_nm_rekening_tmbbb" id="in_ats_nm_rekening_tmbbb" placeholder="Atas Nama" style="width: 80%;">
                                                    </div>
                                                </div>
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#tmbb').on('click', function(){
                                                                if($('#tmbb').is(':checked')){
                                                                    $('#by_tmbb').show();
                                                                }else{
                                                                    $('#by_tmbb').hide();
                                                                }
                                                            })
                                                        })
                                                    </script>
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

                            var ats_nm_penerusan = $('#in_ats_nm_penerusan').val();
                            

                            var dataString = 'nm_mitra='+nm_mitra+'&kt_lahir='+kt_lahir+'&tgl_lahir='+tgl_lahir+'&almt_rmh='+almt_rmh+
                            '&almt_prov_rmh='+almt_prov_rmh+'&almt_kt_rmh='+almt_kt_rmh+'&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&almt_outlet='+almt_outlet+
                            '&almt_prov_outlet='+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet+'&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+
                            '&almt_kt_kirim='+almt_kt_kirim+'&almt_terusan='+almt_terusan+'&almt_prov_terusan='+almt_prov_terusan+'&almt_kt_terusan='+almt_kt_terusan+
                            '&nm_marketing='+nm_marketing+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim+
                            '&jml_tarif='+jml_tarif+'&nm_bank='+nm_bank+'&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening+'&tambahan='+tambahan+
                            '&ats_nm_penerusan='+ats_nm_penerusan;
                            
                            if($('#tmbb').is(':checked')){
                                var by_tmbbb = $('#in_by_tmbbb').val();
                                var nm_bank_tmbb = $('#in_nm_bank_tmbbb').val();
                                var rekening_tmbb = $('#in_rekening_tmbbb').val();
                                var jml_tarif_tmbbb = $('#in_jml_tarif_tmbbb').val();
                                var ats_nm_rekening_tmbbb = $('#in_ats_nm_rekening_tmbbb').val();
                                var nm_tb = $('#in_nmb_tmbb').val();
                                var cek_tmbb = 'tambah';
                                dataString += '&by_tmbbb='+by_tmbbb+'&nm_bank_tmbb='+nm_bank_tmbb+'&rekening_tmbb='+rekening_tmbb+'&jml_tarif_tmbbb='+jml_tarif_tmbbb+'&ats_nm_rekening_tmbbb='+ats_nm_rekening_tmbbb+
                                '&cek_tmbb='+cek_tmbb+'&nm_tb='+nm_tb;
                            }

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
                                            document.getElementById('in_nm_bank').value = '0';
                                            document.getElementById('in_biaya_kirim').value = '';
                                            document.getElementById('in_rekening').value = '';
                                            document.getElementById('in_jml_tarif').value = '';
                                            document.getElementById('in_ats_nm_rekening').value = '';
                                            if(document.getElementById('in_rekening2') !== null){
                                                document.getElementById('in_nm_bank2').value = '0';
                                                document.getElementById('in_rekening2').value = '';
                                                document.getElementById('in_jml_tarif2').value = '';
                                                document.getElementById('in_ats_nm_rekening2').value = '';
                                            }
                                            if(document.getElementById('in_rekening3') !== null){
                                                document.getElementById('in_nm_bank3').value = '0';
                                                document.getElementById('in_rekening3').value = '';
                                                document.getElementById('in_jml_tarif3').value = '';
                                                document.getElementById('in_ats_nm_rekening3').value = '';
                                            }
                                            if($('#tmbb').is(':checked')){
                                                $('#by_tmbb').hide();
                                                document.getElementById('in_by_tmbbb').value = '';
                                                document.getElementById('in_nm_bank_tmbbb').value = '';
                                                document.getElementById('in_rekening_tmbbb').value = '';
                                                document.getElementById('in_jml_tarif_tmbbb').value = '';
                                                document.getElementById('in_ats_nm_rekening_tmbbb').value = '';
                                            }
                                            // document.getElementById('in_cek3').checked = false;
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
                            if($('#tmbb').is(':checked')){
                                $('#by_tmbb').hide();
                                document.getElementById('in_by_tmbbb').value = '';
                                document.getElementById('in_nm_bank_tmbbb').value = '';
                                document.getElementById('in_rekening_tmbbb').value = '';
                                document.getElementById('in_jml_tarif_tmbbb').value = '';
                                document.getElementById('in_ats_nm_rekening_tmbbb').value = '';
                                document.getElementById('tmbb').checked = false;
                            }
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
                                $('#in_ats_nm_penerusan').prop('disabled', false);
                                console.log('a');
                            }else{
                                $('#in_almt_terusan').prop('disabled', true);
                                $('#in_prov_terusan').prop('disabled', true);
                                $('#in_kt_terusan').prop('disabled', true);
                                $('#in_ats_nm_penerusan').prop('disabled', true);
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
                        <form id="form_order_identitas">
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
                        </form>
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
                            </div>
                            <div id="nav-tahu-gila" style="display: none">
                                <input type="checkbox" name="paketItem" id="paketItem3"> Eceran
                                <input type="checkbox" name="paketItem" id="paketItem2"> Paket 3 Item
                                <input type="checkbox" name="paketItem" id="paketItem1"> Paket 2 Item
                            </div>
                            <div id="eceran" style="display: none;">
                                <div class="form-group">
                                    <label for="Barang">Barang</label>
                                    <select class="form-control" name="barang" id="daftarBarang" style="width: 80%;" >
                                    <option value="0">Pilih</option>
                                    </select>
                                    <br>
                                    <input class="form-control" name="inputHarga" id="inputHarga" type="text" placeholder="Harga Barang" style="width: 80%" disabled>
                                    <br>
                                    <input class="form-control" name="jml_barang" id="jml_barang" type="text" placeholder="Jumlah barang" style="width: 80%">
                                    <br>
                                    <button class="btn btn-primary" id="tambah_ecer" value="tambah" onclick="order()" style="display: none;">Tambah</button>
                                    <button class="btn btn-primary" id="tambah_tahu" value="tambah" onclick="order_tahu()" style="display: none;">Tambah</button>
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
                            </div>

                            <div id="tahu-gila">
                                    <script>
                                    $(document).ready(function(){
                                        $('#paketItem1').on('click', function(){
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#paket2').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    $(document).ready(function(){
                                        $('#paketItem2').on('click', function(){
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#paket3').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    $(document).ready(function(){
                                        $('#paketItem3').on('click', function(){
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#eceran').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    </script>
                                </div>
                                <form id="form_order_order">
                                <div id="paket3" style="display: none;">
                                <div class="form-group">
                                <label for="paketPorsi">Jumlah Porsi</label>
                                <input class="form-control" type="number" name="paketPorsi" id="paketPorsi" style="width: 80%;">
                                </div>
                                <table class="table table-bordered" id="tablePaket3">
                                    <tr>
                                    <th colspan="2" width=30%>Bahan Baku</th>
                                    <th colspan="2" width=30%>Bumbu</th>
                                    <th colspan="2" width=30%>Kemasan</th>
                                    </tr>
                                    <tr>
                                    <td width=20%>Tepung</td>
                                    <td><input class="form-control" type="number" name="jmltpng" id="jmltpng" step="any">kg</td>
                                    <td width=20%>Asin</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlasin" id="jmlasin"></td>
                                    <td width=20%>Paperbag</td>
                                    <td><input class="form-control kemCal" type="number" name="jmlpaperbag" id="jmlpaperbag"></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 1</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe1" id="jmlcabe1"></td>
                                    <td width=20%>Box</td>
                                    <td><input class="form-control kemCal" type="number" name="jmlbox" id="jmlbox"></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 2</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe2" id="jmlcabe2"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 3</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe3" id="jmlcabe3"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>BBQ</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlbbq" id="jmlbbq"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Balado</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlbalado" id="jmlbalado"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Keju</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlkeju" id="jmlkeju"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Pizza</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlpizza" id="jmlpizza"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Jagung Bakar</td>
                                    <td><input class="form-control txtCal" type="number" name="jmljbakar" id="jmljbakar"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Ayam Bawang Pedas</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlabp" id="jmlabp"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Sapi Panggang</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlsp" id="jmlsp"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Kari Ayam</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlka" id="jmlka"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Rumput Laut</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlrl" id="jmlrl"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Jagung Manis</td>
                                    <td><input class="form-control txtCal" type="number" name="jmljm" id="jmljm"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Lada Hitam</td>
                                    <td><input class="form-control txtCal" type="number" name="jmllh" id="jmllh"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlbb" id="jmlbb" >kg</td>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlbumbu" id="jmlbumbu" >porsi</td>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlkemasan" id="jmlkemasan" >pcs</td>
                                    </tr>
                                </table>
                                </div>
                                <script>
                                var tpng = 0.04;
                                var hitung = 0;
                                var jmlporsi = document.getElementById('paketPorsi');
                                jmlporsi.addEventListener('keyup', function(e){
                                    var tot = parseInt(document.getElementById('paketPorsi').value) * 1900;
                                    // document.getElementById('tot_harga').value = number_format(tot,2,',','.');
                                    
                                    document.getElementById("jmlbumbu").max = jmlporsi.value;
                                    document.getElementById("jmlkemasan").max = jmlporsi.value;
                                    hitung = parseInt(jmlporsi.value) * tpng;
                                    document.getElementById("jmltpng").value = hitung;
                                    document.getElementById("jmlbb").value = hitung;
                                })

                                $(document).ready(function(){
                                $("#tablePaket3").on('input', '.txtCal', function () {
                                        var calculated_total_sum = 0;
                                    
                                        $("#tablePaket3 .txtCal").each(function () {
                                            var get_textbox_value = $(this).val();
                                            if ($.isNumeric(get_textbox_value)) {
                                                calculated_total_sum += parseFloat(get_textbox_value);
                                                }                  
                                            });
                                                $("#jmlbumbu").val(calculated_total_sum);
                                        });

                                });
                                $(document).ready(function(){
                                $("#tablePaket3").on('input', '.kemCal', function () {
                                        var calculated_total_sum = 0;
                                    
                                        $("#tablePaket3 .kemCal").each(function () {
                                            var get_textbox_value = $(this).val();
                                            if ($.isNumeric(get_textbox_value)) {
                                                calculated_total_sum += parseFloat(get_textbox_value);
                                                }                  
                                            });
                                                $("#jmlkemasan").val(calculated_total_sum);
                                        });

                                });
                                </script>

                                <div id="paket2" style="display: none;">
                                <div class="form-group">
                                    <label for="paketPorsi">Jumlah Porsi</label>
                                    <input class="form-control" type="number" name="paketPorsi" id="paketPorsi2" style="width: 80%;">
                                </div>
                                <table class="table table-bordered" id="tablePaket2">
                                    <tr>
                                    <td align="center"><input type="checkbox" name="bbdanb" id="bbdanb"> Bahan & Bumbu</td>
                                    <td align="center"><input type="checkbox" name="kdanb" id="kdanb"> Kemasan & Bumbu</td>
                                    <td align="center"><input type="checkbox" name="bbdank" id="bbdank"> Bahan & Kemasan</td>
                                    <script>
                                        var jmlporsi2 = document.getElementById('paketPorsi2');
                                        var hitung2 = 0;
                                        jmlporsi2.addEventListener('keyup', function(e){
                                        var tot2 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                        // var a = number_format(tot2,2,',','.');
                                        // document.getElementById('tot_harga').value = tot2;

                                        document.getElementById("jmlbumbu21").max = jmlporsi2.value;
                                        document.getElementById("jmlbumbu22").max = jmlporsi2.value;
                                        document.getElementById("jmlkemasan22").max = jmlporsi2.value;
                                        document.getElementById("jmlkemasan23").max = jmlporsi2.value;
                                        hitung2 = parseInt(jmlporsi2.value) * tpng;
                                        document.getElementById("jmlhtpng21").value = hitung2;
                                        document.getElementById("jmlhtpng23").value = hitung2;
                                        document.getElementById("jmlbb21").value = hitung2;
                                        document.getElementById("jmlbb23").value = hitung2;
                                        })
                                    </script>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div id="bahandanbumbu" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket21">
                                        <tr>
                                            <th colspan="2">Bahan</th>
                                            <th colspan="2">Bumbu</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Tepung</td>
                                            <td><input class="form-control" type="number" name="jmltpng21" id="jmlhtpng21" step="any">kg</td>
                                            <td width=20%>Asin</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlasin21" id="jmlasin21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 1</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe121" id="jmlcabe121"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 2</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe221" id="jmlcabe221"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 3</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe321" id="jmlcabe321"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>BBQ</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlbbq21" id="jmlbbq21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Balado</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlbalado21" id="jmlbalado21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Keju</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlkeju21" id="jmlkeju21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Pizza</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlpizza21" id="jmlpizza21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Bakar</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmljbakar21" id="jmljbakar21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Ayam Bawang Pedas</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlabp21" id="jmlabp21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Sapi Panggang</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlsp21" id="jmlsp21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Kari Ayam</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlka21" id="jmlka21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Rumput Laut</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlrl21" id="jmlrl21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Manis</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmljm21" id="jmljm21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Lada Hitam</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmllh21" id="jmllh21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbb21" id="jmlbb21">kg</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbumbu21" id="jmlbumbu21">porsi</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket21").on('input', '.21Cal', function () {
                                                var calculated_total_sum = 0;
                                            
                                                $("#tablePaket21 .21Cal").each(function () {
                                                    var get_textbox_value = $(this).val();
                                                    if ($.isNumeric(get_textbox_value)) {
                                                        calculated_total_sum += parseFloat(get_textbox_value);
                                                        }                  
                                                    });
                                                        $("#jmlbumbu21").val(calculated_total_sum);
                                                });

                                        });
                                        
                                    </script>
                                    </td>
                                    <td>
                                        <div id="kemasandanbumbu" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket22">
                                        <tr>
                                            <th colspan="2">Kemasan</th>
                                            <th colspan="2">Bumbu</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Paperbag</td>
                                            <td><input class="form-control 22Kem" type="number" name="jmlpaperbag22" id="jmlpaperbag22"></td>
                                            <td width=20%>Asin</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlasin22" id="jmlasin22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Box</td>
                                            <td><input class="form-control 22Kem" type="number" name="jmlbox22" id="jmlbox22"></td>
                                            <td width=20%>Cabe Lev 1</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe122" id="jmlcabe122"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 2</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe222" id="jmlcabe222"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 3</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe322" id="jmlcabe322"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>BBQ</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlbbq22" id="jmlbbq22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Balado</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlbalado22" id="jmlbalado22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Keju</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlkeju22" id="jmlkeju22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Pizza</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlpizza22" id="jmlpizza22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Bakar</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmljbakar22" id="jmljbakar22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Ayam Bawang Pedas</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlabp22" id="jmlabp22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Sapi Panggang</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlsp22" id="jmlsp22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Kari Ayam</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlka22" id="jmlka22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Rumput Laut</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlrl22" id="jmlrl22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Manis</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmljm22" id="jmljm22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Lada Hitam</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmllh22" id="jmllh22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlkemasan22" id="jmlkemasan22">pcs</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbumbu22" id="jmlbumbu22">porsi</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket22").on('input', '.22Cal', function () {
                                            var calculated_total_sum = 0;
                                            
                                            $("#tablePaket22 .22Cal").each(function () {
                                                var get_textbox_value = $(this).val();
                                                if ($.isNumeric(get_textbox_value)) {
                                                    calculated_total_sum += parseFloat(get_textbox_value);
                                                    }                  
                                                    });
                                                    $("#jmlbumbu22").val(calculated_total_sum);
                                            });

                                        });
                                        $(document).ready(function(){
                                        $("#tablePaket22").on('input', '.22Kem', function () {
                                            var calculated_total_sum = 0;
                                            
                                            $("#tablePaket22 .22Kem").each(function () {
                                                var get_textbox_value = $(this).val();
                                                if ($.isNumeric(get_textbox_value)) {
                                                    calculated_total_sum += parseFloat(get_textbox_value);
                                                    }                  
                                                    });
                                                    $("#jmlkemasan22").val(calculated_total_sum);
                                            });

                                        });

                                    </script>
                                    </td>
                                    <td>
                                        <div id="bahandankemasan" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket23">
                                        <tr>
                                            <th colspan="2">Bahan</th>
                                            <th colspan="2">Kemasan</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Tepung</td>
                                            <td><input class="form-control" type="number" name="jmltpng23" id="jmlhtpng23" step="any">kg</td>
                                            <td width=20%>Paperbag</td>
                                            <td><input class="form-control 23Kem" type="number" name="jmlpaperbag23" id="jmlpaperbag23"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Box</td>
                                            <td><input class="form-control 23Kem" type="number" name="jmlbox23" id="jmlbox23"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbb23" id="jmlbb23" step="any">kg</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlkemasan23" id="jmlkemasan23">pcs</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket23").on('input', '.23Kem', function () {
                                                var calculated_total_sum = 0;
                                            
                                                $("#tablePaket23 .23Kem").each(function () {
                                                    var get_textbox_value = $(this).val();
                                                    if ($.isNumeric(get_textbox_value)) {
                                                        calculated_total_sum += parseFloat(get_textbox_value);
                                                        }                  
                                                    });
                                                        $("#jmlkemasan23").val(calculated_total_sum);
                                                });

                                        });
                                    </script>
                                    </td>
                                    
                                    </tr>
                                </table>
                                </div>
                                <script>
                                $(document).ready(function(){
                                        $('#bbdanb').on('click', function(){
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').show();
                                            }else{
                                                $('#bahandanbumbu').hide();
                                            }
                                        })
                                    })
                                $(document).ready(function(){
                                        $('#kdanb').on('click', function(){
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').show();
                                            }else{
                                                $('#kemasandanbumbu').hide();
                                            }
                                        })
                                    })
                                $(document).ready(function(){
                                        $('#bbdank').on('click', function(){
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').show();
                                            }else{
                                                $('#bahandankemasan').hide();
                                            }
                                        })
                                    })
                                </script>
                            </form>
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

                                                    // Update footer
                                                    var numformat = $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display;
                                                    $('tr:eq(0) th:eq(1)', api.table().footer()).html(
                                                        numformat(pageTotal)
                                                    );
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
                                            function order_tahu(){
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
                                                    url: '<?php echo base_url('monitor/tambah_order_tahu')?>',
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
                        
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                        <form id="form_order_kirim">
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
                            <div class="form-group">
                                <input type="checkbox" name="in_penerusan" id="penerusan">&nbsp&nbsp Penerusan Alamat
                            </div>
                            <div class="form-group">
                                <label for="almt_terusan">Atasnama Penerusan</label>
                                <input class="form-control" type="text" name="ats_nm_penerusan" id="ats_nm_penerusan" style="width: 80%;" disabled>
                            </div>
                            <div class="form-group">
                                <label for="almt_terusan">Penerusan Alamat</label>
                                <input class="form-control" type="text" name="almt_terusan" id="almt_terusan" style="width: 80%;" disabled>
                            </div>
                            <table width="80%">
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="prov_terusan">Provinsi</label>
                                            <select class="form-control" name="prov_terusan" id="prov_terusan" style="width: 100%;" disabled>
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
                                        <select class="form-control" name="kt_terusan" id="kt_terusan" disabled>
                                            <option value="0">Pilih</option>
                                        </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <script>
                                $(document).ready(function(){
                                    $('#penerusan').on('click', function(){
                                        if($('#penerusan').is(':checked')){
                                            $('#almt_terusan').prop('disabled', false);
                                            $('#prov_terusan').prop('disabled', false);
                                            $('#kt_terusan').prop('disabled', false);
                                            $('#ats_nm_penerusan').prop('disabled', false);
                                            console.log('a');
                                        }else{
                                            $('#almt_terusan').prop('disabled', true);
                                            $('#prov_terusan').prop('disabled', true);
                                            $('#kt_terusan').prop('disabled', true);
                                            $('#ats_nm_penerusan').prop('disabled', true);
                                            $('#almt_terusan').val('');
                                            $('#prov_terusan').val('0');
                                            $('#kt_terusan').val('0');
                                            console.log('b');
                                        }
                                    })
                                })
                                $(document).ready(function(){
                                    $('#prov_terusan').change(function(){
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
                                                $('#kt_terusan').html(html);
                                                
                                            }
                                        });
                                    });
                                });
                            </script>
                        </form>
                        </div>
                        <!--tab-pane -->
                        <div class="tab-pane" id="tab_4">
                        <form id="form_order_bayar">
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
                            </form>
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
                                        if(data.length !== 0){
                                            rinci += '<table border="1"><tr><th>Nama Barang</th><th>Jumlah Barang</th></tr>';
                                            for(i=0; i<data.length; i++){
                                            rinci += '<tr><td>'+data[i].nm_barang+'</td><td>'+data[i].jml_barang+' kg</td></tr>';
                                            };
                                            rinci += '</table>';
                                        }
                                        if(($('#daftarProduk option:selected').val()) === 'PR000001'){
                                            if($('#paketItem2').is(':checked')){
                                                rinci += '<b>Paket 3 Item</b><table border="1"><tr><th>Nama Barang</th><th>Jumlah Barang</th></tr>';
                                                var jmltpng = $('#jmltpng').val();
                                                rinci += '<tr><td>Tepung</td><td>'+jmltpng+' kg</td></tr>';

                                                if($('#jmlpaperbag').val() !== ''){
                                                    var jmlpaperbag = $('#jmlpaperbag').val();
                                                    rinci += '<tr><td>Paperbag</td><td>'+jmlpaperbag+' pcs</td></tr>';
                                                }
                                                if($('#jmlbox').val() !== ''){
                                                    var jmlbox = $('#jmlbox').val();
                                                    rinci += '<tr><td>Box</td><td>'+jmlbox+' pcs</td></tr>';
                                                }
                                                if($('#jmlasin').val() !== ''){
                                                    var jmlasin = $('#jmlasin').val();
                                                    rinci += '<tr><td>Asin</td><td>'+jmlasin+' porsi</td></tr>';
                                                }
                                                if($('#jmlcabe1').val() !== ''){
                                                    var jmlcabe1 = $('#jmlcabe1').val();
                                                    rinci += '<tr><td>Cabe Level 1</td><td>'+jmlcabe1+' porsi</td></tr>';
                                                }
                                                if($('#jmlcabe2').val() !== ''){
                                                    var jmlcabe2 = $('#jmlcabe2').val();
                                                    rinci += '<tr><td>Cabe Level 2</td><td>'+jmlcabe2+' porsi</td></tr>';
                                                }
                                                if($('#jmlcabe3').val() !== ''){
                                                    var jmlcabe3 = $('#jmlcabe3').val();
                                                    rinci += '<tr><td>Cabe Level 3</td><td>'+jmlcabe3+' porsi</td></tr>';
                                                }
                                                if($('#jmlbbq').val() !== ''){
                                                    var jmlbbq = $('#jmlbbq').val();
                                                    rinci += '<tr><td>BBQ</td><td>'+jmlbbq+' porsi</td></tr>';
                                                }
                                                if($('#jmlbalado').val() !== ''){
                                                    var jmlbalado = $('#jmlbalado').val();
                                                    rinci += '<tr><td>Balado</td><td>'+jmlbalado+' porsi</td></tr>';
                                                }
                                                if($('#jmlkeju').val() !== ''){
                                                    var jmlkeju = $('#jmlkeju').val();
                                                    rinci += '<tr><td>Keju</td><td>'+jmlkeju+' porsi</td></tr>';
                                                }
                                                if($('#jmlpizza').val() !== ''){
                                                    var jmlpizza = $('#jmlpizza').val();
                                                    rinci += '<tr><td>Pizza</td><td>'+jmlpizza+' porsi</td></tr>';
                                                }
                                                if($('#jmljbakar').val() !== ''){
                                                    var jmljbakar = $('#jmljbakar').val();
                                                    rinci += '<tr><td>Jagung Bakar</td><td>'+jmljbakar+' porsi</td></tr>';
                                                }
                                                if($('#jmlabp').val() !== ''){
                                                    var jmlabp = $('#jmlabp').val();
                                                    rinci += '<tr><td>Ayam Bawang Pedas</td><td>'+jmlabp+' porsi</td></tr>';
                                                }
                                                if($('#jmlsp').val() !== ''){
                                                    var jmlsp = $('#jmlsp').val();
                                                    rinci += '<tr><td>Sapi Panggang</td><td>'+jmlsp+' porsi</td></tr>';
                                                }
                                                if($('#jmlka').val() !== ''){
                                                    var jmlka = $('#jmlka').val();
                                                    rinci += '<tr><td>Kari Ayam</td><td>'+jmlka+' porsi</td></tr>';
                                                }
                                                if($('#jmlrl').val() !== ''){
                                                    var jmlrl = $('#jmlrl').val();
                                                    rinci += '<tr><td>Rumput Laut</td><td>'+jmlrl+' porsi</td></tr>';
                                                }
                                                if($('#jmljm').val() !== ''){
                                                    var jmljm = $('#jmljm').val();
                                                    rinci += '<tr><td>Jagung Manis</td><td>'+jmljm+' porsi</td></tr>';
                                                }
                                                if($('#jmllh').val() !== ''){
                                                    var jmllh = $('#jmllh').val();
                                                    rinci += '<tr><td>Lada Hitam</td><td>'+jmllh+' porsi</td></tr>';
                                                }
                                                rinci += '</table>';
                                            }else if($('#paketItem1').is(':checked')){
                                                if($('#bbdanb').is(':checked')){
                                                    rinci += '<b>Paket 2 Item (Tepung & Bumbu)</b><table border="1"><tr><th>Nama Barang</th><th>Jumlah Barang</th></tr>';
                                                    var jmltpng21 = $('#jmlhtpng21').val();
                                                    rinci += '<tr><td>Tepung</td><td>'+jmltpng21+' kg</td></tr>';
                                                    
                                                    if($('#jmlasin21').val() !== ''){
                                                        var jmlasin21 = $('#jmlasin21').val();
                                                        rinci += '<tr><td>Tepung</td><td>'+jmltpng21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe121').val() !== ''){
                                                        var jmlcabe121 = $('#jmlcabe121').val();
                                                        rinci += '<tr><td>Cabe Level 1</td><td>'+jmlcabe121+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe221').val() !== ''){
                                                        var jmlcabe221 = $('#jmlcabe221').val();
                                                        rinci += '<tr><td>Cabe Level 2</td><td>'+jmlcabe221+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe321').val() !== ''){
                                                        var jmlcabe321 = $('#jmlcabe321').val();
                                                        rinci += '<tr><td>Cabe Level 3</td><td>'+jmlcabe321+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlbbq21').val() !== ''){
                                                        var jmlbbq21 = $('#jmlbbq21').val();
                                                        rinci += '<tr><td>BBQ</td><td>'+jmlbbq21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlbalado21').val() !== ''){
                                                        var jmlbalado21 = $('#jmlbalado21').val();
                                                        rinci += '<tr><td>Balado</td><td>'+jmlbalado21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlkeju21').val() !== ''){
                                                        var jmlkeju21 = $('#jmlkeju21').val();
                                                        rinci += '<tr><td>Keju</td><td>'+jmlkeju21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlpizza21').val() !== ''){
                                                        var jmlpizza21 = $('#jmlpizza21').val();
                                                        rinci += '<tr><td>Pizza</td><td>'+jmlpizza21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmljbakar21').val() !== ''){
                                                        var jmljbakar21 = $('#jmljbakar21').val();
                                                        rinci += '<tr><td>Jagung Bakar</td><td>'+jmljbakar21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlabp21').val() !== ''){
                                                        var jmlabp21 = $('#jmlabp21').val();
                                                        rinci += '<tr><td>Ayam Bawang Pedas</td><td>'+jmlabp21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlsp21').val() !== ''){
                                                        var jmlsp21 = $('#jmlsp21').val();
                                                        rinci += '<tr><td>Sapi Panggang</td><td>'+jmlsp21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlka21').val() !== ''){
                                                        var jmlka21 = $('#jmlka21').val();
                                                        rinci += '<tr><td>Kari Ayam</td><td>'+jmlka21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlrl21').val() !== ''){
                                                        var jmlrl21 = $('#jmlrl21').val();
                                                        rinci += '<tr><td>Rumput Laut</td><td>'+jmlrl21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmljm21').val() !== ''){
                                                        var jmljm21 = $('#jmljm21').val();
                                                        rinci += '<tr><td>Jagung Manis</td><td>'+jmljm21+' porsi</td></tr>';
                                                    }
                                                    if($('#jmllh21').val() !== ''){
                                                        var jmllh21 = $('#jmllh21').val();
                                                        rinci += '<tr><td>Lada Hitam</td><td>'+jmllh21+' porsi</td></tr>';
                                                    }
                                                    rinci += '</table>';
                                                }else if($('#kdanb').is(':checked')){
                                                    rinci += '<b>Paket 2 Item (Kemasan & Bumbu)</b><table border="1"><tr><th>Nama Barang</th><th>Jumlah Barang</th></tr>';

                                                    if($('#jmlpaperbag22').val() !== ''){
                                                        var jmlpaperbag22 = $('#jmlpaperbag22').val();
                                                        rinci += '<tr><td>Paperbag</td><td>'+jmlpaperbag22+' pcs</td></tr>';
                                                    }
                                                    if($('#jmlbox22').val() !== ''){
                                                        var jmlbox22 = $('#jmlbox22').val();
                                                        rinci += '<tr><td>Box</td><td>'+jmlbox22+' pcs</td></tr>';
                                                    }
                                                    if($('#jmlasin22').val() !== ''){
                                                        var jmlasin22 = $('#jmlasin22').val();
                                                        rinci += '<tr><td>Asin</td><td>'+jmlasin22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe122').val() !== ''){
                                                        var jmlcabe122 = $('#jmlcabe122').val();
                                                        rinci += '<tr><td>Cabe Level 1</td><td>'+jmlcabe122+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe222').val() !== ''){
                                                        var jmlcabe222 = $('#jmlcabe222').val();
                                                        rinci += '<tr><td>Cabe Level 2</td><td>'+jmlcabe222+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlcabe322').val() !== ''){
                                                        var jmlcabe322 = $('#jmlcabe322').val();
                                                        rinci += '<tr><td>Cabe Level 3</td><td>'+jmlcabe322+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlbbq22').val() !== ''){
                                                        var jmlbbq22 = $('#jmlbbq22').val();
                                                        rinci += '<tr><td>BBQ</td><td>'+jmlbbq22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlbalado22').val() !== ''){
                                                        var jmlbalado22 = $('#jmlbalado22').val();
                                                        rinci += '<tr><td>Balado</td><td>'+jmlbalado22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlkeju22').val() !== ''){
                                                        var jmlkeju22 = $('#jmlkeju22').val();
                                                        rinci += '<tr><td>Keju</td><td>'+jmlkeju22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlpizza22').val() !== ''){
                                                        var jmlpizza22 = $('#jmlpizza22').val();
                                                        rinci += '<tr><td>Pizza</td><td>'+jmlpizza22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmljbakar22').val() !== ''){
                                                        var jmljbakar22 = $('#jmljbakar22').val();
                                                        rinci += '<tr><td>Jagung Bakar</td><td>'+jmljbakar22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlabp22').val() !== ''){
                                                        var jmlabp22 = $('#jmlabp22').val();
                                                        rinci += '<tr><td>Ayam Bawang Pedas</td><td>'+jmlabp22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlsp22').val() !== ''){
                                                        var jmlsp22 = $('#jmlsp22').val();
                                                        rinci += '<tr><td>Sapi Panggang</td><td>'+jmlsp22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlka22').val() !== ''){
                                                        var jmlka22 = $('#jmlka22').val();
                                                        rinci += '<tr><td>Kari Ayam</td><td>'+jmlka22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmlrl22').val() !== ''){
                                                        var jmlrl22 = $('#jmlrl22').val();
                                                        rinci += '<tr><td>Rumput Laut</td><td>'+jmlrl22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmljm22').val() !== ''){
                                                        var jmljm22 = $('#jmljm22').val();
                                                        rinci += '<tr><td>Jagung Manis</td><td>'+jmljm22+' porsi</td></tr>';
                                                    }
                                                    if($('#jmllh22').val() !== ''){
                                                        var jmllh22 = $('#jmllh22').val();
                                                        rinci += '<tr><td>Lada Hitam</td><td>'+jmllh22+' porsi</td></tr>';
                                                    }
                                                    rinci += '</table>';
                                                }else if($('#bbdank').is(':checked')){
                                                    rinci += '<b>Paket 2 Item (Tepung & Kemasan)</b><table border="1"><tr><th>Nama Barang</th><th>Jumlah Barang</th></tr>';
                                                    var jmltpng23 = $('#jmlhtpng23').val();
                                                    rinci += '<tr><td>Tepung</td><td>'+jmltpng23+' kg</td></tr>';

                                                    if($('#jmlpaperbag23').val() !== ''){
                                                        var jmlpaperbag23 = $('#jmlpaperbag23').val();
                                                        rinci += '<tr><td>Paperbag</td><td>'+jmlpaperbag23+' pcs</td></tr>';
                                                    }
                                                    if($('#jmlbox23').val() !== ''){
                                                        var jmlbox23 = $('#jmlbox23').val();
                                                        rinci += '<tr><td>Box</td><td>'+jmlbox23+' pcs</td></tr>';
                                                    }
                                                }
                                            }
                                        }
                                        //   console.log(rinci);
                                        Swal.fire({
                                                title: "Rincian Order",
                                                html: '<table><tr><td align="left">Nama Mitra</td><td>:</td><td align="left">'+document.getElementById('nm_mitra').value+
                                                '</td></tr><tr><td align="left">Alamat Kirim</td><td>:</td><td align="left">'+document.getElementById('almt_kirim').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp1').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp2').value+
                                                '</td></tr><tr><td align="left">Produk</td><td>:</td><td align="left"> '+$('#daftarProduk option:selected').html()+
                                                '</td></tr><tr><td align="left">Rincian Order</td><td>:</td><td align="left"> '+
                                                rinci+
                                                '</td></tr><tr><td align="left">Keterangan</td><td>:</td><td align="left">'+
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
                                var almt_terusan = $('#almt_terusan').val();
                                var prov_terusan = $('#prov_terusan option:selected').val();
                                var almt_kt_terusan = $('#kt_terusan option:selected').val();
                                var nm_produk = $('#daftarProduk option:selected').val();
                                // var 
                                var dataString = 'kd_mitra='+kd_mitra+'&nm_mitra='+nm_mitra+'&almt_rmh='+almt_rmh+
                                '&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&almt_kirim='+almt_kirim+'&provinsi='+provinsi+
                                '&almt_kt_kirim='+almt_kt_kirim+'&jml_transfer='+jml_transfer+'&nm_bank='+nm_bank+
                                '&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening+'&ekspedisi='+ekspedisi+
                                '&b_barang='+b_barang+'&biaya_kirim='+biaya_kirim+'&keterangan='+keterangan+
                                '&almt_terusan='+almt_terusan+'&prov_terusan='+prov_terusan+'&almt_kt_terusan='+almt_kt_terusan+
                                '&nm_produk='+nm_produk;

                                if(($('#daftarProduk option:selected').val()) === 'PR000001'){
                                    if($('#paketItem2').is(':checked')){
                                        var jmlporsi = $('#paketPorsi').val();
                                        var jmltpng = $('#jmltpng').val();
                                        var tepung = 'tepung';
                                        
                                        var tot_h_paket3 = parseInt(document.getElementById('paketPorsi').value) * 1900;
                                        dataString += '&jmlporsi='+jmlporsi+'&jmltpng='+jmltpng+'&tot_h_paket3='+tot_h_paket3+'&tepung='+tepung;
                                        if($('#jmlasin').val() !== ''){
                                            var jmlasin = $('#jmlasin').val();
                                            var asin = 'asin';
                                            dataString += '&jmlasin='+jmlasin+'&asin='+asin
                                        }
                                        if($('#jmlpaperbag').val() !== ''){
                                            var jmlpaperbag = $('#jmlpaperbag').val();
                                            var paperbag = 'paperbag';
                                            dataString += '&jmlpaperbag='+jmlpaperbag+'&paperbag='+paperbag;
                                        }
                                        if($('#jmlcabe1').val() !== ''){
                                            var jmlcabe1 = $('#jmlcabe1').val();
                                            var cabe1 = 'cabe1';
                                            dataString += '&jmlcabe1='+jmlcabe1+'&cabe1='+cabe1;
                                        }
                                        if($('#jmlbox').val() !== ''){
                                            var jmlbox = $('#jmlbox').val();
                                            var box ='box';
                                            dataString += '&jmlbox='+jmlbox+'&box='+box;
                                        }
                                        if($('#jmlcabe2').val() !== ''){
                                            var jmlcabe2 = $('#jmlcabe2').val();
                                            var cabe2 = 'cabe2';
                                            dataString += '&jmlcabe2='+jmlcabe2+'&cabe2='+cabe2;
                                        }
                                        if($('#jmlcabe3').val() !== ''){
                                            var jmlcabe3 = $('#jmlcabe3').val();
                                            var cabe3 = 'cabe3';
                                            dataString += '&jmlcabe3='+jmlcabe3+'&cabe3='+cabe3;
                                        }
                                        if($('#jmlbbq').val() !== ''){
                                            var jmlbbq = $('#jmlbbq').val();
                                            var bbq = 'bbq';
                                            dataString += '&jmlbbq='+jmlbbq+'&bbq='+bbq;
                                        }
                                        if($('#jmlbalado').val() !== ''){
                                            var jmlbalado = $('#jmlbalado').val();
                                            var balado = 'balado';
                                            dataString += '&jmlbalado='+jmlbalado+'&balado='+balado;
                                        }
                                        if($('#jmlkeju').val() !== ''){
                                            var jmlkeju = $('#jmlkeju').val();
                                            var keju = 'keju';
                                            dataString += '&jmlkeju='+jmlkeju+'&keju='+keju;
                                        }
                                        if($('#jmlpizza').val() !== ''){
                                            var jmlpizza = $('#jmlpizza').val();
                                            var pizza = 'pizza';
                                            dataString += '&jmlpizza='+jmlpizza+'&pizza='+pizza;
                                        }
                                        if($('#jmljbakar').val() !== ''){
                                            var jmljbakar = $('#jmljbakar').val();
                                            var jbakar = 'jagung bakar';
                                            dataString += '&jmljbakar='+jmljbakar+'&jbakar='+jbakar;
                                        }
                                        if($('#jmlabp').val() !== ''){
                                            var jmlabp = $('#jmlabp').val();
                                            var abaw = 'ayam bawang';
                                            dataString += '&jmlabp='+jmlabp+'&abaw='+abaw;
                                        }
                                        if($('#jmlsp').val() !== ''){
                                            var jmlsp = $('#jmlsp').val();
                                            var sapip = 'sapi panggang';
                                            dataString += '&jmlsp='+jmlsp+'&sapip='+sapip;
                                        }
                                        if($('#jmlka').val() !== ''){
                                            var jmlka = $('#jmlka').val();
                                            var kari = 'kari';
                                            dataString += '&jmlka='+jmlka+'&kari='+kari;
                                        }
                                        if($('#jmlrl').val() !== ''){
                                            var jmlrl = $('#jmlrl').val();
                                            var rumput = 'rumput';
                                            dataString += '&jmlrl='+jmlrl+'&rumput='+rumput;
                                        }
                                        if($('#jmljm').val() !== ''){
                                            var jmljm = $('#jmljm').val();
                                            var jman = 'jagung manis';                                            
                                            dataString += '&jmljm='+jmljm+'&jman='+jman;
                                        }
                                        if($('#jmllh').val() !== ''){
                                            var jmllh = $('#jmllh').val();
                                            var ladah = 'lada hitam';
                                            dataString += '&jmllh='+jmllh+'&ladah='+ladah;
                                        }
                                        var jmlbb = $('#jmlbb').val();
                                        var jmlbumbu = $('#jmlbumbu').val();
                                        var jmlkemasan = $('#jmlkemasan').val();
                                        dataString += '&jmlbb='+jmlbb+'&jmlbumbu='+jmlbumbu+'&jmlkemasan='+jmlkemasan;

                                    }else if($('#paketItem1').is(':checked')){
                                        var jmlporsi = $('#paketPorsi2').val();
                                        var tot_h_paket3 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                        dataString += '&jmlporsi='+jmlporsi+'&tot_h_paket3='+tot_h_paket3;

                                        if($('#bbdanb').is(':checked')){
                                            var jmltpng21 = $('#jmlhtpng21').val();
                                            var tepung = 'tepung';
                                            dataString += '&jmltpng21='+jmltpng21+'&tepung='+tepung;
                                            
                                            if($('#jmlasin21').val() !== ''){
                                                var jmlasin21 = $('#jmlasin21').val();
                                                var asin = 'asin';
                                                dataString += '&jmlasin21='+jmlasin21+'&asin='+asin
                                            }
                                            if($('#jmlcabe121').val() !== ''){
                                                var jmlcabe121 = $('#jmlcabe121').val();
                                                var cabe1 = 'cabe1';
                                                dataString += '&jmlcabe121='+jmlcabe121+'&cabe1='+cabe1;
                                            }
                                            if($('#jmlcabe221').val() !== ''){
                                                var jmlcabe221 = $('#jmlcabe221').val();
                                                var cabe2 = 'cabe2';
                                                dataString += '&jmlcabe221='+jmlcabe221+'&cabe2='+cabe2;
                                            }
                                            if($('#jmlcabe321').val() !== ''){
                                                var jmlcabe321 = $('#jmlcabe321').val();
                                                var cabe3 = 'cabe3';
                                                dataString += '&jmlcabe321='+jmlcabe321+'&cabe3='+cabe3;
                                            }
                                            if($('#jmlbbq21').val() !== ''){
                                                var jmlbbq21 = $('#jmlbbq21').val();
                                                var bbq = 'bbq';
                                                dataString += '&jmlbbq21='+jmlbbq21+'&bbq='+bbq;
                                            }
                                            if($('#jmlbalado21').val() !== ''){
                                                var jmlbalado21 = $('#jmlbalado21').val();
                                                var balado = 'balado';
                                                dataString += '&jmlbalado21='+jmlbalado21+'&balado='+balado;
                                            }
                                            if($('#jmlkeju21').val() !== ''){
                                                var jmlkeju21 = $('#jmlkeju21').val();
                                                var keju = 'keju';
                                                dataString += '&jmlkeju21='+jmlkeju21+'&keju='+keju;
                                            }
                                            if($('#jmlpizza21').val() !== ''){
                                                var jmlpizza21 = $('#jmlpizza21').val();
                                                var pizza = 'pizza';
                                                dataString += '&jmlpizza21='+jmlpizza21+'&pizza='+pizza;
                                            }
                                            if($('#jmljbakar21').val() !== ''){
                                                var jmljbakar21 = $('#jmljbakar21').val();
                                                var jbakar = 'jagung bakar';
                                                dataString += '&jmljbakar21='+jmljbakar21+'&jbakar='+jbakar;
                                            }
                                            if($('#jmlabp21').val() !== ''){
                                                var jmlabp21 = $('#jmlabp21').val();
                                                var abaw = 'ayam bawang';
                                                dataString += '&jmlabp21='+jmlabp21+'&abaw='+abaw;
                                            }
                                            if($('#jmlsp21').val() !== ''){
                                                var jmlsp21 = $('#jmlsp21').val();
                                                var sapip = 'sapi panggang';
                                                dataString += '&jmlsp21='+jmlsp21+'&sapip='+sapip;
                                            }
                                            if($('#jmlka21').val() !== ''){
                                                var jmlka21 = $('#jmlka21').val();
                                                var kari = 'kari';
                                                dataString += '&jmlka21='+jmlka21+'&kari='+kari;
                                            }
                                            if($('#jmlrl21').val() !== ''){
                                                var jmlrl21 = $('#jmlrl21').val();
                                                var rumput = 'rumput';
                                                dataString += '&jmlrl21='+jmlrl21+'&rumput='+rumput;
                                            }
                                            if($('#jmljm21').val() !== ''){
                                                var jmljm21 = $('#jmljm21').val();
                                                var jman = 'jagung manis';
                                                dataString += '&jmljm21='+jmljm21+'&jman='+jman;
                                            }
                                            if($('#jmllh21').val() !== ''){
                                                var jmllh21 = $('#jmllh21').val();
                                                var ladah = 'lada hitam';
                                                dataString += '&jmllh21='+jmllh21+'&ladah='+ladah;
                                            }

                                        }else if($('#kdanb').is(':checked')){
                                            var jmlporsi = $('#paketPorsi2').val();
                                            var tot_h_paket3 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                            dataString += '&jmlporsi='+jmlporsi+'&tot_h_paket3='+tot_h_paket3;

                                            if($('#jmlpaperbag22').val() !== ''){
                                                var jmlpaperbag22 = $('#jmlpaperbag22').val();
                                                var paperbag = 'paperbag';
                                                dataString += '&jmlpaperbag22='+jmlpaperbag22+'&paperbag='+paperbag;
                                            }
                                            if($('#jmlbox22').val() !== ''){
                                                var jmlbox22 = $('#jmlbox22').val();
                                                var box ='box';
                                                dataString += '&jmlbox22='+jmlbox22+'&box='+box;
                                            }
                                            if($('#jmlasin22').val() !== ''){
                                                var jmlasin22 = $('#jmlasin22').val();
                                                var asin = 'asin';
                                                dataString += '&jmlasin22='+jmlasin22+'&asin='+asin
                                            }
                                            if($('#jmlcabe122').val() !== ''){
                                                var jmlcabe122 = $('#jmlcabe122').val();
                                                var cabe1 = 'cabe1';
                                                dataString += '&jmlcabe122='+jmlcabe122+'&cabe1='+cabe1;
                                            }
                                            if($('#jmlcabe222').val() !== ''){
                                                var jmlcabe222 = $('#jmlcabe222').val();
                                                var cabe2 = 'cabe2';
                                                dataString += '&jmlcabe222='+jmlcabe222+'&cabe2='+cabe2;
                                            }
                                            if($('#jmlcabe322').val() !== ''){
                                                var jmlcabe322 = $('#jmlcabe322').val();
                                                var cabe3 = 'cabe3';
                                                dataString += '&jmlcabe322='+jmlcabe322+'&cabe3='+cabe3;
                                            }
                                            if($('#jmlbbq22').val() !== ''){
                                                var jmlbbq22 = $('#jmlbbq22').val();
                                                var bbq = 'bbq';
                                                dataString += '&jmlbbq22='+jmlbbq22+'&bbq='+bbq;
                                            }
                                            if($('#jmlbalado22').val() !== ''){
                                                var jmlbalado22 = $('#jmlbalado22').val();
                                                var balado = 'balado';
                                                dataString += '&jmlbalado22='+jmlbalado22+'&balado='+balado;
                                            }
                                            if($('#jmlkeju22').val() !== ''){
                                                var jmlkeju22 = $('#jmlkeju22').val();
                                                var keju = 'keju';
                                                dataString += '&jmlkeju22='+jmlkeju22+'&keju='+keju;
                                            }
                                            if($('#jmlpizza22').val() !== ''){
                                                var jmlpizza22 = $('#jmlpizza22').val();
                                                var pizza = 'pizza';
                                                dataString += '&jmlpizza22='+jmlpizza22+'&pizza='+pizza;
                                            }
                                            if($('#jmljbakar22').val() !== ''){
                                                var jmljbakar22 = $('#jmljbakar22').val();
                                                var jbakar = 'jagung bakar';
                                                dataString += '&jmljbakar22='+jmljbakar22+'&jbakar='+jbakar;
                                            }
                                            if($('#jmlabp22').val() !== ''){
                                                var jmlabp22 = $('#jmlabp22').val();
                                                var abaw = 'ayam bawang';
                                                dataString += '&jmlabp22='+jmlabp22+'&abaw='+abaw;
                                            }
                                            if($('#jmlsp22').val() !== ''){
                                                var jmlsp22 = $('#jmlsp22').val();
                                                var sapip = 'sapi panggang';
                                                dataString += '&jmlsp22='+jmlsp22+'&sapip='+sapip;
                                            }
                                            if($('#jmlka22').val() !== ''){
                                                var jmlka22 = $('#jmlka22').val();
                                                var kari = 'kari';
                                                dataString += '&jmlka22='+jmlka22+'&kari='+kari;
                                            }
                                            if($('#jmlrl22').val() !== ''){
                                                var jmlrl22 = $('#jmlrl22').val();
                                                var rumput = 'rumput';
                                                dataString += '&jmlrl22='+jmlrl22+'&rumput='+rumput;
                                            }
                                            if($('#jmljm22').val() !== ''){
                                                var jmljm22 = $('#jmljm22').val();
                                                var jman = 'jagung manis';
                                                dataString += '&jmljm22='+jmljm22+'&jman='+jman;
                                            }
                                            if($('#jmllh22').val() !== ''){
                                                var jmllh = $('#jmllh22').val();
                                                var ladah = 'lada hitam';
                                                dataString += '&jmllh22='+jmllh+'&ladah='+ladah;
                                            }
                                        }else if($('#bbdank').is(':checked')){
                                            var jmltpng23 = $('#jmlhtpng23').val();
                                            var tepung = 'tepung';
                                            dataString += '&jmltpng23='+jmltpng23+'&tepung='+tepung;

                                            if($('#jmlpaperbag23').val() !== ''){
                                                var jmlpaperbag23 = $('#jmlpaperbag23').val();
                                                var paperbag = 'paperbag';
                                                dataString += '&jmlpaperbag23='+jmlpaperbag23+'&paperbag='+paperbag;
                                            }
                                            if($('#jmlbox23').val() !== ''){
                                                var jmlbox23 = $('#jmlbox23').val();
                                                var box ='box';
                                                dataString += '&jmlbox23='+jmlbox23+'&box='+box;
                                            }
                                        }
                                    }
                                }
                                
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
                                            table.destroy();
                                            $('.nav-pills a:first').tab('show');
                                            $('#tahu-gila').hide();
                                            $('#nav-tahu-gila').hide();
                                            $('#eceran').hide();
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').hide();
                                                document.getElementById('bbdanb').checked = false;
                                            }
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').hide();
                                                document.getElementById('kdanb').checked = false;
                                            }
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').hide();
                                                document.getElementById('bbdank').checked = false;
                                            }
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').hide();
                                                document.getElementById('paketItem1').checked = false;
                                            }
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').hide();
                                                document.getElementById('paketItem2').checked = false;
                                            }
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').hide();
                                                document.getElementById('paketItem3').checked = false;
                                            }
                                            $('#tambah_ecer').hide();
                                            $('#tambah_tahu').hide();
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            form_order_identitas.reset();
                                            form_order_order.reset();
                                            form_order_kirim.reset();
                                            form_order_bayar.reset();
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
                                var dataString = 'id=' + recipient
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
                                        if((data[0]['nm_produk']) === 'PR000001'){
                                            $('#tahu-gila').show();
                                            $('#nav-tahu-gila').show();
                                            $('#tambah_tahu').show();
                                        }else{
                                            $('#eceran').show();
                                            $('#tambah_ecer').show();
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
                                            $('#tahu-gila').hide();
                                            $('#nav-tahu-gila').hide();
                                            $('#tambah_ecer').hide();
                                            $('#tambah_tahu').hide();
                                            $('#eceran').hide();
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').hide();
                                                document.getElementById('bbdanb').checked = false;
                                            }
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').hide();
                                                document.getElementById('kdanb').checked = false;
                                            }
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').hide();
                                                document.getElementById('bbdank').checked = false;
                                            }
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').hide();
                                                document.getElementById('paketItem1').checked = false;
                                            }
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').hide();
                                                document.getElementById('paketItem2').checked = false;
                                            }
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').hide();
                                                document.getElementById('paketItem3').checked = false;
                                            }
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            form_order_identitas.reset();
                                            form_order_order.reset();
                                            form_order_kirim.reset();
                                            form_order_bayar.reset();
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
                                                <input class="form-control" type="text" name="dt_almt_rmh" id="dt_almt_rmh" style="width: 80%;" >
                                            </div>
                                            <table width='80%'>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select class="form-control" name="dt_provinsi" id="dt_provinsi" style="width: 100%;" >
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
                                                                <select class="form-control" name="dt_almt_kt_rmh" id="dt_almt_kt_rmh" style="width: 100%;" >
                                                                    <option value="0">Pilih</option>
                                                                </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="no_hp1">Nomor Handphone</label>
                                                            <input class="form-control" name="dt_no_hp1" id="dt_no_hp1" style="width: 100%" >
                                                        </div>
                                                    </td>
                                                    <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="no_hp2">Nomor Handphone</label>
                                                            <input class="form-control" name="dt_no_hp2" id="dt_no_hp2" style="width: 100%" >
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
                        var almt_rmh = $('#dt_almt_rmh').val();
                        var almt_prov_rmh = $('#dt_provinsi option:selected').val();
                        var almt_kt_rmh = $('#dt_almt_kt_rmh option:selected').val();
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

                        var dataString = 'kd_mitra='+kd_mitra+'&almt_rmh='+almt_rmh+'&almt_kt_rmh='+almt_kt_rmh+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim+
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