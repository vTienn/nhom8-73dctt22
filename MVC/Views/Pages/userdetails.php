<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
<link rel='stylesheet' href='http://localhost/congnghephanmem/Public/css/CDT/styleinf.css'>

<?php 
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])==1){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?> 
<div class="container">
    <div class="main-body">
    
        
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center" style=" margin-top:20px;">
                    <img src="http://localhost/congnghephanmem/Public/picture/avatar7.png"  class="rounded-circle" width="150">
                    <div class="mt-3">
                    <h5 class="text-secondary mb-1" style="color: black; margin-top:25px; font-size:20px;">Sinh Viên</h5>
                   
                    <h5 class="text-secondary mb-1" style="color: black; margin-top:25px; font-size:20px;">  <?php echo $row['HoTen'] ?></h5>
                  
                    </div>
                  </div>
                </div>
              </div>        
            </div>
            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mã sinh viên</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" >

                    <?php echo $row['MaSinhVien'] ?>    

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Họ và tên</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                    <?php echo $row['HoTen'] ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ngày sinh</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                    <?php 

                    $a=date('d-m-Y', strtotime($row['NgaySinh']) );
                    echo $a ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Lớp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                    <?php echo $row['Lop'] ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Khoa</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                    <?php echo $row['TenKhoa'] ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      
                    <?php echo $row['Email'] ?>

                    </div>
                  </div>
                </div>
              </div>           
            </div>
          </div>

        </div>
    </div>
    <?php        
                }
            }
            ?>   