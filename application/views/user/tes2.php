<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="A stepper plugin for Bootstrap 4.">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
      <!-- <link href="<?php echo base_url()?>/assets/select2/css/select2.css" rel="stylesheet" /> -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/user/css/bs-stepper.min.css">
      <title>Pevita</title>
   </head>
   <body class="d-flex flex-column min-vh-100 bg-light">

      <div class="container flex-grow-1 flex-shrink-0 py-5">
         <div class="card mb-5 p-4 bg-white shadow-sm">
            <h3>Pendaftaran</h3>
            <div id="stepperForm" class="bs-stepper">
               <div class="bs-stepper-header" role="tablist">
                  <div class="step" data-target="#test-form-1">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                     <span class="bs-stepper-circle">1</span>
                     <span class="bs-stepper-label">Data Indihome</span>
                  </button>
                  </div>
                  <div class="bs-stepper-line"></div>
                  <div class="step" data-target="#test-form-2">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                     <span class="bs-stepper-circle">2</span>
                     <span class="bs-stepper-label">Domisili</span>
                  </button>
                  </div>
                  <div class="bs-stepper-line"></div>
                  <div class="step" data-target="#test-form-3">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                     <span class="bs-stepper-circle">3</span>
                     <span class="bs-stepper-label">Data Pribadi</span>
                  </button>
                  </div>
               </div>
               <div class="bs-stepper-content">
                  <form method="post" id="register_form" action="<?php echo site_url('Add/save_pelanggan') ?>" enctype="multipart/form-data">
                     <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                        <div class="form-group">
                           <label for="inputMailForm">Nomor Indihome <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnoindihome" type="number" name="no_indihome" id="no_indihome" class="form-control" oninput="javascript: if (this.value.length > this.minLength) this.value = this.value.slice(0, this.minLength);" minlength="12"  placeholder="Enter no indihome" required>
                           <div class="invalid-feedback">Nomor indihome harus terdiri dari 12 angka</div>
                        </div>
                        <div class="form-group">
                           <label for="inputMailForm">Nomor Telepon <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnotelepon" name="no_telepon" id="no_telepon" type="number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" minlength="10" maxlength="13" placeholder="Enter no indihome" required>
                           <div class="invalid-feedback">Nomor telepon harus terdiri dari 10-13 angka</div>
                        </div>
                        <div class="form-group">
                           <label for="inputMailForm">Nama Lengkap <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnama" name="nama_lengkap" id="nama_lengkap" type="text" class="form-control" placeholder="Enter no indihome" required>
                           <div class="invalid-feedback">Harap isi dengan nama lengkap</div>
                        </div>
                        <span class="btn btn-danger btn-next-form">Next</span>
                     </div>
                     <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                        <div class="form-group">
                           <label>Kota Kabupaten:</label>
                           <select class="form-control select2" name="kota_kabupaten" id="kota_kabupaten" required>
                           <option>Pilih Kota Kabupaten</option>
                              <?php foreach($Domisili as $row):?>
                                 <option value="<?php echo $row->id;?>"><?php echo $row->nama_kota_kabupaten;?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
								<div class="form-group">
									<label>Kecamatan</label>
									<select class="form-control select2" name="kecamatan" id='kecamatan' required>
                              <option>Pilih Setelah Kota</option>
		                     </select>
                        </div>
                        <div class="form-group">
                           <label>Desa Kelurahan</label>
                           <select class="form-control select2" name="desa_kelurahan" id='desa_kelurahan' required>
                              <option>Pilih Setelah Kecamatan</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Kode POS</label>
                           <select class="form-control select2" name="kodepos_id" id="kodepos_id" required>
                              <option>Otomatis Setelah Memilih Desa</option>			
                           </select>
								</div>
                        <span class="btn btn-secondary" onclick="stepperForm.previous()">Previous</span>
                        <span class="btn btn-danger btn-next-form">Next</span>
                     </div>
                     <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger3">
                        <div class="form-group">
                           <label>Alamat</label>
                           <textarea name="alamat" id="alamat" class="form-control"></textarea>
                           <span id="error_address" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                           <label>Nomor Handphone</label>
                           <input type="text" name="no_handphone" id="no_handphone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" minlength="10" maxlength="13" class="form-control" />
                           <span id="error_mobile_no" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input type="text" name="email" id="email" class="form-control" />
                           <span id="error_email" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                           <label>Pekerjaan</label>
                           <select class="form-control select2" name="pekerjaan" id="pekerjaan" required>
                           <option>Pilih Pekerjaan</option>
                                 <?php
                                    if(!empty($Pekerjaan)){
                                    foreach ($Pekerjaan as $key => $value) {
                                 echo "<option value='".$value->id."'>".$value->nama_pekerjaan."</option>";
                                 }
                                    }
                                    else{
                                 echo '<option value="">not available</option>';
                              }
                              ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>No KTP</label>
                           <input type="number" name="kartu_tanda_penduduk" id="kartu_tanda_penduduk" class="form-control" />
                           <label class="mt-3">Upload KTP</label>
                           <input type="file" name="foto_ktp" id="foto_ktp" class="form-control-file">
                           <span id="error_kartu_tanda_penduduk" class="text-danger"></span>
                        </div>
                        <span class="btn btn-secondary" onclick="stepperForm.previous()">Previous</span>
                        <button type="submit" class="btn btn-danger btn-next-form" id="register">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
            
         </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/user/select2/js/select2.min.js"></script>
      <script src="<?php echo base_url()?>assets/user/script/bs-stepper.min.js"></script>
      <script>
         var stepperFormEl = document.querySelector('#stepperForm')
         stepperForm = new Stepper(stepperFormEl, {
            animation: true
         })

         var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
         var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'))
         var inputMailForm = document.getElementById('inputMailForm')
         var inputnoindihome = document.getElementById('inputnoindihome')
         var inputnotelpon = document.getElementById('inputnotelpon')
         var inputnama = document.getElementById('inputnama')
         var inputPasswordForm = document.getElementById('kota_kabupaten')
         var form = stepperFormEl.querySelector('.bs-stepper-content form')
         
         btnNextList.forEach(function (btn) {
            btn.addEventListener('click', function () {
               stepperForm.next()
            })
         })

         stepperFormEl.addEventListener('show.bs-stepper', function (event) {
            form.classList.remove('was-validated')
            var nextStep = event.detail.indexStep
            var currentStep = nextStep

            if (currentStep > 0) {
               currentStep--
            }

            var stepperPan = stepperPanList[currentStep]

            if ((stepperPan.getAttribute('id') === 'test-form-1'  && !inputnama.value.length )
            || (stepperPan.getAttribute('id') === 'test-form-2' && !inputPasswordForm.value.length)) {
               event.preventDefault()
               form.classList.add('was-validated')
            }
         })
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
            $('#kota_kabupaten').change(function(){ 
                  var id=$(this).val();
                  $.ajax({
                     url : "<?php echo site_url('User/get_Kecamatan');?>",
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
                     url : "<?php echo site_url('User/get_Desa');?>",
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
                     url : "<?php echo site_url('User/get_Pos');?>",
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
         var submit = document.getElementById('register_form');
         document.getElementById("register".addEventListener("click",function(){
            submit.submit();
         }));
      </script>
   </body>
</html>