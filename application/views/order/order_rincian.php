<?php
    $this->load->view('mainmenu');
?>
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/elements.css')?>">

    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/timepicker.min.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <style>
    table {
            table-layout: fixed;
        }
        textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    </style>
    
			<div class="card shadow mb-4">
			<div class="card-header py-3">
           	<h6 class="m-0 font-weight-bold text-dark">Rincian Order</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <!-- <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a> -->
    
    <?php
        if($mitra){
            echo '<table><tr><td>Nama Mitra</td><td>:</td><td>'.$mitra->nm_mitra.'</td></tr>
            <tr><td>Alamat Kirim</td><td>:</td><td>'.$mitra->almt_kirim.'</td></tr>
            <tr><td>Kota</td><td>:</td><td>'.$mitra->nama_kota.'</td></tr>
            <tr><td>Ekspedisi</td><td>:</td><td>'.$mitra->ekspedisi.'</td></tr>
            <tr><td>Total Berat</td><td>:</td><td>'.$mitra->b_barang.' kg</td></tr>
            <tr><td>Biaya Kirim</td><td>:</td><td>'.$mitra->biaya_kirim.'</td></tr>
            <tr><td>Keterangan</td><td>:</td><td>'.$mitra->ket.'</td></tr>
            </table>';
            if($mitra->nm_produk == 'PR000001'){
                if($tigaitem){
                    echo '<br><b>Paket 3 Item</b><br>Total Porsi: '.$mitra->porsi.'<br> <table class="table table-bordered dataTable">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Porsi</th>
                    </tr>';

                    foreach($tigaitem as $row){
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">'.$row->jml_barang.'</td></tr>';
                    }
                    echo '</table>';
                }else if($duasitem){
                    echo '<br><b>Paket 2 Item (Tepung dan Bumbu)</b><br>Total Porsi: '.$mitra->porsi.'<br> <table class="table table-bordered dataTable">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Porsi</th>
                    </tr>';

                    foreach($duasitem as $row){
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">'.$row->jml_barang.'</td></tr>';
                    }
                    echo '</table>';
                }else if($duaditem){
                    echo '<br><b>Paket 2 Item (Kemasan dan Bumbu)</b><br>Total Porsi: '.$mitra->porsi.'<br> <table class="table table-bordered dataTable">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Porsi</th>
                    </tr>';

                    foreach($duaditem as $row){
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">'.$row->jml_barang.'</td></tr>';
                    }
                    echo '</table>';
                }else if($duatitem){
                    echo '<br><b>Paket 2 Item (Tepung dan Kemasan)</b><br>Total Porsi: '.$mitra->porsi.'<br> <table class="table table-bordered dataTable">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Porsi</th>
                    </tr>';

                    foreach($duatitem as $row){
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">'.$row->jml_barang.'</td></tr>';
                    }
                    echo '</table>';
                } 
                if($ecer){
                    echo '<br><b>Eceran</b><br><table class="table table-bordered dataTable">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Sub Total</th>
                    </tr>';
                    $total = 0;
                    foreach($ecer as $row){
                        $sub = $row->harga_barang*$row->jml_barang;
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">Rp '.number_format($row->harga_barang,2,',','.').'</td><td align="right">'.$row->jml_barang.'</td><td>'.$row->satuan.'</td><td align="right">Rp '.number_format($sub,2,',','.').'</td></tr>';
                        $total = $total+($row->harga_barang*$row->jml_barang);
                    };
                    echo '<tr><td colspan="4" align="right">Total :</td><td align="right">Rp '.number_format($total,2,',','.').'</td></tr>';
                    echo '</table>';
                }
                
            }else{
                echo '<table class="table table-bordered dataTable">
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Sub Total</th>
                </tr>';
                
                if($drior){
                    $total = 0;
                    foreach($drior as $row){
                        $sub = $row->harga_barang*$row->jml_barang;
                        echo '<tr><td>'.$row->nm_barang.'</td><td align="right">Rp '.number_format($row->harga_barang,2,',','.').'</td><td align="right">'.$row->jml_barang.'</td><td>'.$row->satuan.'</td><td align="right">Rp '.number_format($sub,2,',','.').'</td></tr>';
                        $total = $total+($row->harga_barang*$row->jml_barang);
                    };
                    echo '<tr><td colspan="4" align="right">Total :</td><td align="right">Rp '.number_format($total,2,',','.').'</td></tr>';
                }else{
                    echo 'Tidak ada data';
                }
                
                echo '</table>';
            }
        }
    ?>
    
    </div>
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

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>    
    
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

	<!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-clock-timepicker.min.js')?>"></script>
    <script type="text/javascript">
    
    </script>
    </body>
</html>