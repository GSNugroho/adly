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
           	<h6 class="m-0 font-weight-bold text-primary">Info Mitra</h6>
		</div>
    <div class="card-body">
    <h2></h2>
    <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a>
    <br>
    <br>
    <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 80%">
      <tr><td>Nama Mitra</td><td>:</td><td><?php echo $nm_mitra; ?></td></tr>
      <tr><td>Kota, Tanggal Lahir</td><td>:</td><td><?php echo $kt_lahir; ?>, <?php echo $tgl_lahir;?></td></tr>
      <tr><td>Tanggal Join</td><td>:</td><td><?php echo $tgl_join; ?></td></tr>
      <tr><td>Alamat Rumah</td><td>:</td><td><?php echo $almt_rmh; ?></td></tr>
      <tr><td>Provinsi</td><td>:</td><td><?php echo $prov_rmh; ?></td></tr>
      <tr><td>Kota</td><td>:</td><td><?php echo $nm_kota; ?></td></tr>
      <tr><td>No HP</td><td>:</td><td><?php echo $no_hp; ?></td></tr>
    </table>
    <br>
    <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 80%">
    <tr><td>Alamat Outlet</td><td>:</td><td><?php echo $almt_outlet; ?></td></tr>
    <tr><td>Provinsi</td><td>:</td><td><?php echo $prov_outlet; ?></td></tr>
    <tr><td>Kota</td><td>:</td><td><?php echo $kt_outlet; ?></td></tr>
    <tr><td>Nama Produk</td><td>:</td><td><?php echo $nm_produk; ?></td></tr>
    <tr><td>Paket</td><td>:</td><td><?php echo $paket; ?></td></tr>
    </table>
    <br>
    Rincian Pembayaran Mitra Join :
    <table class="table table-bordered dataTable" style="width: 80%">
      <tr>
        <th>Atas Nama</th>
        <th>Nama Bank</th>
        <th>No Rekening</th>
        <th>Jumlah Transfer</th>
      </tr>
      <?php
        foreach($rin_by as $row){
          echo '<tr><td>'.$row->ats_nm.'</td><td>'.$row->nm_bank.'</td><td>'.$row->no_rekening.'</td><td>'.$row->jml_transfer.'</td>
          </tr>';
      };
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