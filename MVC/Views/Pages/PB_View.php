<header>
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <br>
    <h1><b>QUẢN LÝ SINH VIÊN</b></h1>
    
    <form action="http://localhost/congnghephanmem/PB/fillter/" method="post">
    <div class="w3-section w3-bottombar w3-padding-16" style="display: flex; align-items: center; gap: 5px;">
      <span class="w3-margin-right">Lọc:</span> 
      <button class="w3-button w3-black" name="filter" value="ALL">ALL</button>
      <button class="w3-button w3-white w3-hide-small" name="filter" value="congtrinh"><i class=""></i>Công trình</button>
      <button class="w3-button w3-white w3-hide-small" name="filter" value="cokhi"><i class=""></i>Cơ khí</button>
      <button class="w3-button w3-white w3-hide-small" name="filter" value="kinhte"><i class=""></i>Kinh tế vận tải</button>
      <button class="w3-button w3-white w3-hide-small" name="filter" value="congnghethongtin"><i class=""></i>Công nghệ thông tin</button>
      <button class="w3-button w3-white w3-hide-small" name="filter" value="luat"><i class=""></i>Luật-Chính trị</button>
      <input type="text" class="form-control w3-input" 
       style="width: 170px; height: 40px; border-radius: 0; border: none; padding: 5px;" 
       placeholder="Tên khoa" 
       name="ten_khoa" 
       value="<?php if(isset($data['ten_khoa'])) echo $data['ten_khoa'] ?>">    


       <button  type="button" class="w3-button w3-blue" data-bs-toggle="modal" data-bs-target="#myModal">Thêm mới</button>
       
    </div>
    </form>
    
    </div>
    
</header>

<body>

<div class="container mt-3">
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Mã khoa</th>
        <th>Tên khoa</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php 
      if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0)
      while($row = mysqli_fetch_assoc($data['dulieu']))
      {
    ?>
 
 <tr onclick="window.location.href='http://localhost/congnghephanmem/PB/sua/<?php echo $row['MaKhoa'];?>';">
    <td id="wrap"><?php echo $row['MaKhoa'];?></td>
    <td id="wrap"><?php echo $row['TenKhoa'];?></td>
    <td id="wrap"><?php echo $row['Email'];?></td>
    <td id="wrap">
        <a onclick="return confirm('Bạn có muốn xóa thông tin này không');" 
           href="http://localhost/congnghephanmem/PB/del/<?php echo $row['MaKhoa'];?>"  
           class="w3-button w3-red">Xóa</a>
    </td>
</tr>

    <?php
    }
    ?>
   

    </tbody>
  </table>
</div>


  <!-- The Modal -->
  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <label><h3 class="modal-title">Sinh Viên Mới</h3></label>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="container">
        <h1><h1>
        <form action="http://localhost/congnghephanmem/PB/add/" method="POST">
        
        <div class="form-group">
            <label><h4>Mã khoa</h4></label>
            <input type="text"  class="form-control" name="Makhoa">
        </div>
        <div class="form-group">
            <label><h4>Tên khoa</h4></label>
            <input type="text"  class="form-control" name="Tenkhoa">
        </div>
        <div class="form-group">
            <label><h4>Email</h4></label>
            <input type="text"class="form-control"  name="Email">
        </div>

    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button  type="submit" class="w3-button w3-green" data-dismiss="modal" id="btnSave" name="btnSave">Lưu</button>
      <button type="button" class="w3-button w3-red" data-bs-dismiss="modal">Đóng</button>
      </div>
        </form>
    </div>
  </div>
</div>


 




</body>
</html>