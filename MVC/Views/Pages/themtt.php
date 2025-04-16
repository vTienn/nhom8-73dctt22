<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/CDT/SuaTT.css">

</head>  
   <body>  

    <form method="post" action="http://localhost/congnghephanmem/Thongtin/them">
         <div class="khoi">

            <div class="khoi1">
                 <label >Mã SV  </label>
            <input type="text"  placeholder="    Mã SV"  name="txtma" value=<?php if( isset($data['mnv']) ) echo $data['mnv'] ?> >
            </div>
           
            <div class="khoi1">
            <label >Họ Và Tên</label>
            <input type="text" placeholder="    Họ và Tên" name="txtten" value=<?php if( isset($data['mca']) ) echo $data['mca'] ?> >
            </div>
          
            <div class="khoi1">
            <label >Ngày Sinh</label>
            <input id="ns" type="date"  name="txtns" value=<?php if( isset($data['ns']) ) echo $data['ns'] ?> >
            </div>
       <!-- <div class="khoi1">
            <label >Giới Tính</label>
            <select name="ddlgt" >
                <option value="">---Chọn giới tính---</option>
                <option value="Nam" <?php if( isset($data['gt']) && $data['gt']=="Nam")  echo 'Selected' ?>>Nam</option>  
                <option value="Nữ" <?php if( isset($data['gt']) && $data['gt']=="Nữ")  echo 'Selected' ?> >Nữ</option>
                <option value="Khác" <?php if( isset($data['gt']) && $data['gt']=="Khác")  echo 'Selected' ?> >Khác</option>
            </select>
       </div> -->
            
            <div class="khoi1">
                <label >Lớp</label>
            <input type="text"  placeholder="   Tên lớp" name="txtml" value=<?php if( isset($data['ml']) ) echo $data['ml'] ?> >
            </div>  
            <div class="khoi1">
                <label >Khoa</label>
            <input type="text"  placeholder="    Makhoa" name="txtmk" readonly value=<?php if( isset($data['mk']) ) echo $data['mk'] ;if( isset($data['khoa']) ) echo $data['khoa'];?> >
            </div>  
            <div class="khoi1">
                   <label >Email</label>
            <input type="text" placeholder="     Email" name="txteml" value=<?php  if( isset($data['eml']) ) echo $data['eml'] ?> >
            </div>
          <div class="nut">
            <button type="submit" class="btn btn-primary" name="btnThem">Thêm</button>
            <a href="http://localhost/congnghephanmem/Thongtin">Hủy</a>
          </div> 
               </div>

    </form>

</body>
</html>