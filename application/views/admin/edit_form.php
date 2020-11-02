<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url()?>/assets/select2/css/select2.css" rel="stylesheet" />
</head>


<body class="hold-transition sidebar-mini">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<?php $this->load->view("admin/_partials/sidebar.php") ?>
	
<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

			
<!-- put content here-->

	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('Pelanggan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
                        <!-- <?php foreach($pelanggan as $Pelanggan){ ?> -->
						<form action="<?php echo site_url('Admin/update') ?>" method="post" >
                        <input type="hidden" name="id" value="<?php echo $Pelanggan->id?>" />
						<script>
							function hanyaAngka(evt) {
							var charCode = (evt.which) ? evt.which : event.keyCode
							if (charCode > 31 && (charCode < 48 || charCode > 57))
					
								return false;
							return true;
							}
						</script>
                        <div class="form-group">
								<label>Nomor Indihome:</label>
								<select class="form-control select2" name="no_indihome" id="no_indihome" required minlength="12" maxlength="12">
								<option>Pilih No Indihome</option>
								<?php foreach($Pel as $row):?>
									<option value="<?php echo $row->no_indihome;?>" <?php if($row->no_indihome == $Pelanggan->indihome) echo 'selected' ;?>><?php echo $Pelanggan->no_indihome ;?></option>
								<?php endforeach;?>
								</select>
								<input class="form-control <?php echo form_error('no_indihome') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_indihome" required minlength="12" maxlength="12" placeholder="Nomor Indihome" value="<?php echo $Pelanggan->no_indihome ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_indihome') ?>
								</div>
							</div>
							<script>
							function hanyaAngka(evt) {
							var charCode = (evt.which) ? evt.which : event.keyCode
							if (charCode > 31 && (charCode < 48 || charCode > 57))
					
								return false;
							return true;
							}
						</script>
							<div class="form-group">
								<label>Nomor Telepon:</label>
								<input class="form-control <?php echo form_error('no_telepon') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_telepon" required minlength="12" maxlength="12" placeholder="Nomor Telepon" value="<?php echo $Pelanggan->no_telepon ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_telepon') ?>
								</div>
							</div>

                            <div class="form-group">
								<label>Nama Lengkap:</label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $Pelanggan->nama_lengkap ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Kota Kabupaten:</label>
								<select class="form-control select2" name="kota_kabupaten" id="kota_kabupaten" required>
								<option>Pilih Kota Kabupaten</option>
								<?php foreach($Domisili as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kota_kabupaten_id) echo 'selected' ;?>><?php echo $row->nama_kota_kabupaten ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kota_kabupaten') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Kecamatan:</label>
								<select class="form-control select2" name="kecamatan" id="kecamatan" required>
								<option>Pilih Kecamatan</option>
								<?php foreach($Dom as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kecamatan_id) echo 'selected' ;?>><?php echo $row->nama_kecamatan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kecamatan') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Desa Kelurahan:</label>
								<select class="form-control select2" name="desa_kelurahan" id="desa_kelurahan" required>
								<option>Pilih Kecamatan</option>
								<?php foreach($Domi as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->desa_kelurahan_id) echo 'selected' ;?>><?php echo $row->nama_desa_kelurahan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('desa_kelurahan') ?>
								</div>
							</div>
                     <div class="form-group">
								<label>Alamat:</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								type="text" name="alamat" placeholder="Alamat" value="<?php echo $Pelanggan->alamat ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Kode POS:</label>
								<select class="form-control select2" name="kodepos_id" id="kodepos_id" required>
								<option>Pilih Kecamatan</option>
								<?php foreach($Domis as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kodepos_id) echo 'selected' ;?>><?php echo $row->kodepos ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kodepos_id') ?>
								</div>
							</div>
							<script>
							function hanyaAngka(evt) {
							var charCode = (evt.which) ? evt.which : event.keyCode
							if (charCode > 31 && (charCode < 48 || charCode > 57))
					
								return false;
							return true;
							}
						</script>
                     <div class="form-group">
								<label>Nomor Handphone</label>
								<input class="form-control <?php echo form_error('no_handphone') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_handphone" placeholder="Nomor Handphone" required minlength="12" maxlength="12" value="<?php echo $Pelanggan->no_handphone ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('no_handphone') ?>
								</div>
							</div>

                            <div class="form-group">
								<label>Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								type="text" name="email" placeholder="Email" value="<?php echo $Pelanggan->email ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Pekerjaan:</label>
								<select class="form-control select2 <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>" name="pekerjaan" id="pekerjaan" required>
								<option>Pilih Kecamatan</option>
								<?php foreach($Pekerjaan as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->pekerjaan_id) echo 'selected' ;?>><?php echo $row->nama_pekerjaan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('pekerjaan') ?>
								</div>
							</div>
							<?php if($row->id == $Pelanggan->pekerjaan_id) echo 'selected' ;?>


							<div class="form-group">
								<label>KTP</label>
								<input class="form-control <?php echo form_error('kartu_tanda_penduduk') ? 'is-invalid':'' ?>"
								type="text" name="kartu_tanda_penduduk" placeholder="" value="<?php echo $Pelanggan->kartu_tanda_penduduk ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('kartu_tanda_penduduk') ?>
								</div>
							</div>



							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
                        <?php } ?>           
					</div>

					<div class="card-footer small text-muted">
					
					</div>
					</div>
		</div>
	</div>

				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/js.php") ?>
				<?php $this->load->view("admin/_partials/footer.php") ?>


        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <!-- <script src="ajax-script.js" type="text/javascript"></script> -->
        <!-- <script type="text/javascript" src="<?php echo base_url().'/assets/bootstrap/js/jquery-3.3.1.js'?>"></script> -->
		 <script type="text/javascript" src="<?php echo base_url().'/assets/bootstrap/js/bootstrap.js'?>"></script>
		 <script src="<?php echo base_url()?>/assets/select2/js/select2.min.js"></script>
		<?php $this->load->view("admin/_partials/scrolltop.php") ?>


		<script type="text/javascript">
        $(document).ready(function(){
            $('#kota_kabupaten').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('Admin_add/get_Kecamatan');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].nama_kecamatan+'</option>';
                        }
                        $('#kecamatan').html(html);
                    }
                });
                return false;
            }); 
            
            $('#kecamatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('Admin_add/get_Desa');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].nama_desa_kelurahan+'</option>';
                        }
                        $('#desa_kelurahan').html(html);

                    }
                });
                return false;
            }); 

            $('#desa_kelurahan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('Admin_add/get_Pos');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].kodepos+'</option>';
                        }
                        $('#kodepos_id').html(html);
                    }
                });
                return false;
            });
        });
	 </script>
	 <script>
		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option'
			});
		});
	</script>


</body>



</html>