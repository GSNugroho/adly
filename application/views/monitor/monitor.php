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
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

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
					<a href="<?php echo base_url('monitor/create')?>" class="btn btn-primary btn-icon-split">
                    	<span class="text">Input Data Mitra</span>
                    </a>
                    <?php endif;?>
					<br>
                    <br>

                    <?php if($this->session->userdata('level')=='2'):?>
                    <div id="dynamic-tabs">
                        <ul>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_dp')?>" data-table="dp-table"><a href="#tab-dp">DP</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('monitor/dt_lunas')?>" data-table="lunas-table"><a href="#tab-lunas">Lunas</a>
                            </li>
                        </ul>
                        <div id="tab-dp" class="table-responsive">
                            <table id="dp-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kota</th>
                                        <th>Alamat Rumah</th>
                                        <th>Alamat Outet</th>
                                        <th>Alamat Kirim</th>
                                        <th>Paket</th>
                                        <th>Jumlah Transfer</th>
                                        <th>Rekening</th>
                                        <th>Atas Nama</th>
                                        <th>Ekspedisi</th>
                                        <th>Biaya Kirim</th>
                                        <th style="width:13%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-lunas" class="table-responsive">
                            <table id="lunas-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kota</th>
                                        <th>Alamat Rumah</th>
                                        <th>Alamat Outet</th>
                                        <th>Alamat Kirim</th>
                                        <th>Paket</th>
                                        <th>Jumlah Transfer</th>
                                        <th>Rekening</th>
                                        <th>Atas Nama</th>
                                        <th>Ekspedisi</th>
                                        <th>Biaya Kirim</th>
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
								<th>Tanggal Lahir</th>
								<th>Kota</th>
								<th>Alamat Rumah</th>
								<th>Alamat Outet</th>
								<th>Alamat Kirim</th>
								<th>Paket</th>
								<th>Jumlah Transfer</th>
								<th>Rekening</th>
								<th>Atas Nama</th>
								<th>Ekspedisi</th>
								<th>Biaya Kirim</th>
								<th style="width:13%;">Action</th>
							</tr>
							</thead>

						</table>
                        </div>
                        <?php endif;?>
					</div>
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
                      <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Data Mitra</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Order</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Pengiriman</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Jenis Pembayaran</a></li>
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
                        <label for="nm_mitra">Nama Mitra </label> <?php echo form_error('nm_mitra')?>
                        <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" value="Mitra" disabled>
                    </div>
                    <!-- <table width='80%'>
                        <tr>
                            <td width='10%'>
                            <div class="form-group">
                                <label for="tgl_terima">Kota & Tanggal Lahir </label> <?php echo form_error('tgl_lahir') ?>
                                    <input class="form-control" type="text" name="kt_lahir" id="kt_lahir" placeholder="Kota">
                                </div>
                            </td>
                            <td width='40%'>
                            <div class="form-group">
                                <label style="height: 17px;"></label>
                                <input class="form-control" type="text" name="tgl_lahir" id="tgl_lahir" placeholder="dd-mm-yyyy" >
                            </div>
                            </td>
                        </tr>
                    

                    </table> -->
                    <div class="form-group">
                        <label for="almt_rmh">Alamat Rumah</label> <?php echo form_error('almt_rmh') ?>
                        <!-- <input class="form-control" type="text" name="almt_rmh" id="almt_rmh" style="width: 80%;"> -->
                        <select class="form-control" style="width: 80%;">
                            <option>Rumah</option>
                            <option>Outlet</option>
                            <option>Kirim</option>
                        </select>
                    </div>
                    <table width='80%'>
                        <!-- <tr>
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
                                    </select>"
                                    ?>
                                <div>
                            </td>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                        <select class="form-control" name="almt_kt_rmh" id="almt_kt_rmh" style="width: 100%;">
                                            <option value="0">Pilih</option>
                                        </select>
                                </div>
                            </td>
                        </tr> -->
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="no_hp1">Nomor Handphone</label>
                                    <input class="form-control" name="no_hp1" id="no_hp1" style="width: 100%" value="08754728831" disabled>
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
                        <label for="Barang">Barang</label>
                        <select class="form-control" name="barang" id="daftarBarang" style="width: 80%;" >
                        <option value="0">Pilih</option>
                                     <?php
                                    foreach ($dd_bg as $row) {  
                                        echo "<option value='".$row->kd_barang."' >".$row->nm_barang."</option>";
                                        }
                                        echo"
                                    </select>
                                    " 
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
                                        </tr>
                                    </tfoot>
                                </table>
                              </div>
                    </div>
                    <script>
                        function load(val) {
                                   var table = $('#tableOrder').DataTable({
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
                                                data: 'harga'
                                                //  render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                            },
                                            {
                                                data: 'harga_total'
                                                // render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
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
                                        // var idku = $('#inputIdkunj').val();

                                        // var dataString = 'poli=' + poli + '&diag=' + diag + '&tind=' + tind + '&harg=' + harg +
                                        //     '&idku=' + idku + '&pers=' + pers + '&jmlh=' + jmlh + '&tambah=' + tambah + '&usin=' + usin;
                                        
                                        var dataString = 'brg='+brg+'&harg='+harg+'&jml='+jml;
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
                                
                    </script>
                    <!-- <table width='80%'>
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi2" style="width: 100%;">
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
                                    <select class="form-control" name="almt_kt_outlet" id="almt_kt_outlet" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <input type="radio" name="cek2" id="cek3" value="1"> Seperti Alamat Rumah
                    </div> -->
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
                                    <select class="form-control" name="provinsi" id="provinsi2" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    <!-- <?php
                                    foreach ($dd_pr as $row) {  
                                        echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                        }
                                        echo" -->
                                    </select>
                                    " 
                                    ?>
                                </div>
                            </td>
                            <td width='50%'>                               
                                <div class="form-group">
                                    <label for="almt_kt_rmh">Kota</label>
                                    <select class="form-control" name="almt_kt_outlet" id="almt_kt_outlet">
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
                    <div class="form-group">
                        <label for="jml_tarif">Jumlah Transfer</label>
                        <input class="form-control" type="text" name="jml_tarif" id="jml_tarif" style="width: 80%;">
                    </div>
                    <table width='80%'>
                        <tr>
                            <td width='20%'>
                                <div class="form-group">
                                    <label for="rekening">Bank</label>
                                    <select class="form-control" name="nm_bank" id="nm_bank" style="width: 100%;">
                                        <option>BNI</option>
                                        <option>BRI</option>
                                        <option>BCA</option>
                                        <option>Mandiri</option>
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
                        <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                    </div>
                    <table width="80%">
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="ekspedisi">Ekspedisi</label>
                                    <select class="form-control" name="ekspedisi" style="width: 100%;">
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
                                    <label for="biaya_kirim">Biaya Kirim</label>
                                    <input class="form-control" type="text" name="biaya_kirim" id="biaya_kirim" style="width: 100%;">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                  <script>
					  function tutup() {
                                    
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
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

	<!-- Page level custom scripts -->
	<!-- <script src="<?php //echo base_url('assets/js/datatables-demo.js')?>"></script> -->
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>

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
      'columns': [
         //{ data: 'no' },
        //  { data: 'kd_inv' },
         { data: 'nm_mitra' },
		 { data: 'tgl_lahir'},
         { data: 'almt_kt_rmh' },
         { data: 'almt_rmh' },
         { data: 'almt_outlet' },
         { data: 'almt_kirim' },
         { data: 'paket' },
         { data: 'jml_tarif' },
         { data: 'rekening' },
         { data: 'ats_nm_rekening' },
         { data: 'ekspedisi' },
         { data: 'biaya_kirim' },
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
                                    'columns': [
                                        //{ data: 'no' },
                                        //  { data: 'kd_inv' },
                                        { data: 'nm_mitra' },
                                        { data: 'tgl_lahir'},
                                        { data: 'almt_kt_rmh' },
                                        { data: 'almt_rmh' },
                                        { data: 'almt_outlet' },
                                        { data: 'almt_kirim' },
                                        { data: 'paket' },
                                        { data: 'jml_tarif' },
                                        { data: 'rekening' },
                                        { data: 'ats_nm_rekening' },
                                        { data: 'ekspedisi' },
                                        { data: 'biaya_kirim' },
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
                            initiateTable("dp-table", "<?php echo base_url('monitor/dt_dp')?>");
                            $("#dynamic-tabs").tabs();
                        });

	</script>

	</body>
</html>