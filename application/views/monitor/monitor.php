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
								<th>Kota</th>
								<th>History</th>
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
                        <!-- <select class="form-control" style="width: 80%;">
                            <option>Rumah</option>
                            <option>Outlet</option>
                            <option>Kirim</option>
                        </select> -->
                    </div>
                    <table width='80%'>
                        <!-- <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    <?php
                                    // foreach ($dd_pr as $row) {  
                                    //     echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                    //     }
                                    //     echo"
                                    // </select>"
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
                        // $(document).ready(function(){
                        //     $('#daftarProduk').change(function(){
                        //         var id=$(this).val();
                        //         $.ajax({
                        //             url : "<?php echo base_url();?>monitor/get_jns_barang",
                        //             method : "POST",
                        //             data : {id: id},
                        //             async : false,
                        //             dataType : 'json',
                        //             success: function(data){
                        //                 var html = '<option value="0">Pilih</option>';
                        //                 var i;
                        //                 for(i=0; i<data.length; i++){
                        //                     html += '<option value="'+data[i].kd_barang+'">'+data[i].nm_barang+'</option>';
                        //                 }
                        //                 $('#daftarBarang').html(html);
                                        
                        //             }
                        //         });
                        //     });
                        // });
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
                    <div class="form-group">
                        <label for="jml_tarif">Jumlah Transfer</label>
                        <input class="form-control" type="text" name="jml_transfer" id="jml_transfer" style="width: 80%;">
                    </div>
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

                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url('Monitor/tambah_mitra_order')?>',
                            data: dataString,
                            success: function(){
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
                                        url: "<?php echo base_url('Monitor/get_dtorder_mitra')?>",
                                        dataType: "json",
                                        data: dataString,
                                        success: function(data) {
                                            $('#nm_mitra').val(data[0]['nm_mitra']);
                                            $('#almt_rmh').val(data[0]['almt_rmh']);
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
                                <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <!-- <h3 class="modal-title" id="exampleModalLabel">Data Order</h3> -->
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data Mitra</h3>
                                    <ul class="nav nav-pills ml-auto p-2">
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
                                            <div class="form-group">
                                                <label for="jml_tarif">Jumlah Transfer</label>
                                                <input class="form-control" type="text" name="dt_jml_tarif" id="dt_jml_tarif" style="width: 80%;">
                                            </div>
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
                                                <input class="form-control" type="text" name="dt_ats_nm_rekening" id="dt_ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                            </div>
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
                                            <a href="#" class="btn btn-danger">Batal</a>
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
                    // $("#updatebyr").on('click', function(){
                    //     var byr = $('#dt_sts_pmby').val();
                    //     var kd_mitra = $('#dt_kd_mitra').val();
                    //     var dataString = 'byr='+byr+'&kd_mitra='+kd_mitra;
                    //     $.ajax({
                    //           url: "<?php echo base_url('Monitor/update_byr')?>",
                    //           type: "POST",
                    //           data: dataString,
                    //           success: function(data){
                    //             console.log('suksas');
                    //           }
                    //       });
                    //   })
                      function update_byr(){
                        var byr = $('#dt_sts_pmby').val();
                        var kd_mitra = $('#dt_kd_mitra').val();
                        var dataString = 'byr='+byr+'&kd_mitra='+kd_mitra;
                        $.ajax({
                              url: "<?php echo base_url('Monitor/update_byr')?>",
                              type: "POST",
                              data: dataString,
                              success: function(data){
                                console.log('suksas');
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