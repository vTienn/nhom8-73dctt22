<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/CDT/SuaTT.css">

    
</head>
<body>
    <form method="post" action="http://localhost/congnghephanmem/Thongtin/sua">
       
        <div class="khoi">
              <?php 
            if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?> 
            <div class="khoi1">

            <label >Mã SV</label>
            <input readonly type="text" class="form-control dd2" name="txtma" 
            value="<?php echo $row['MaSinhVien'] ?>">

            </div>
            <div class="khoi1">

             <label >Họ Và Tên </label>         
            <input type="text" class="form-control dd2" name="txtten" 
            value="<?php echo $row['HoTen'] ?>">
            </div>
          
            <div class="khoi1">

              <label >Ngày Sinh</label>
              <input type="date" class="form-control dd2" name="txtns" 
                value="<?php echo $row['NgaySinh'] ?>">

            </div>
           
            <!-- <div class="khoi1">
             <label >Giới Tính</label>
            <select name="ddlgt" class="form-control dd2">
                <option value="">------ Giới Tính ------</option>
                <option value="Nam" <?php if($row['Gioitinh']=='Nam') echo 'selected' ?>>Nam</option>
                <option value="Nữ" <?php if($row['Gioitinh']=='Nữ') echo 'selected' ?>>Nữ</option>
                <option value="Khác" <?php if($row['Gioitinh']=='Khác') echo 'selected' ?>>Khác</option>
            </select>


            </div> -->
          
            <div class="khoi1">
            <label >Lớp</label>
            <input type="text" class="form-control dd2" name="txtml" 
            value="<?php echo $row['Lop'] ?>">
            </div>

            <div class="khoi1">
            <label >Khoa</label>
            <input type="text" readonly class="form-control dd2" name="txtmk" 
            value="<?php echo $row['MaKhoa'] ?>">
            </div>

            <div class="khoi1">
                <label >Email</label>
            <input type="text" class="form-control dd2" name="txteml" 
            value="<?php echo $row['Email'] ?>">       
            </div>
          
            <?php        
                }
            }
            ?>   
            <div class="nut">

            <button type="submit" class="btn btn-primary" name="btnSua">Sửa</button>
            <a href="http://localhost/congnghephanmem/Thongtin">Hủy</a>

            </div>
        </div>         
    </form>
</body>
</html>