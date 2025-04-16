<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
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


       <button  type="submit" class="w3-button w3-blue" href="http://localhost/congnghephanmem/PB">Quay lại</button>
       
       
       
      
    </div>
    </form>
    
    </div>
    
</head>

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
    <form action="http://localhost/congnghephanmem/PB/edit/" method="POST">
    <?php 
      if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0)
      while($row = mysqli_fetch_assoc($data['dulieu']))
      {
    ?>
        <tr>

        <td>
        <input type="text" name="makhoa" class="form-control" 
        style="border: none; padding: 5px;" 
        value="<?php echo $row['MaKhoa'] ?>" readonly>
        </td>     
        <td>
            <input type="text" name="tenkhoa" class="form-control"
            style="border: none; padding: 5px;"  
                                value="<?php echo $row['TenKhoa'] ?>" >     
        </td>
        <td>
            <input type="text" name="email" class="form-control" 
            style="border: none; padding: 5px;" 
                                value="<?php echo $row['Email'] ?>" >      
        </td>

        <td id="wrap">
        <button class="w3-button w3-green" type="submit" name="btnLuu">Lưu</button>

        </td>
        
      </tr>

              <?php
    }
    ?>    

   </form>

    </tbody>
  </table>
</div>
</div>
</body>
</html>