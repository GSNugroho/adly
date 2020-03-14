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
           	<h6 class="m-0 font-weight-bold text-primary">History Order</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <!-- <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a> -->
    Nama Mitra : <?php echo $nm_mitra?> <br>
    Alamat Rumah : <?php echo $almt_rmh?>
    <table class="table table-bordered dataTable">
        <tr>
            <th>Tanggal Order</th>
            <th>Total Biaya Order</th>
            <th>Ekspedisi</th>
            <th>Berat</th>
            <th>Biaya Kirim</th>
            <th>Rincian Order</th>
        </tr>
        <?php 
        if($dthis){
            foreach($dthis as $row){
                echo '<tr><td>'.date('d-m-Y', strtotime($row->dt_trans)).'</td><td>Rp '.number_format($row->total_order,2,',','.').'</td><td>'.$row->nama_ekspedisi.'</td><td>'.$row->b_barang.' kg</td><td>Rp '.number_format($row->biaya_kirim,2,',','.').'</td>
                <td><a href="'.base_url().'Order/read/'.$row->kd_order.'" class="btn btn-info" style="width: 100%;color: white">
                Rincian Order
                </a></td></tr>';
            };
        }else{
            echo 'Tidak ada data';
        }
        ?>
    </table>
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