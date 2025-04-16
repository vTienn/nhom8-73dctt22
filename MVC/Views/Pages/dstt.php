<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/CDT/deptt.css">
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/CDT/mms.css">

</head>
<body>
<div class="qltao">          
            
            <div class="nd">               
                <form method="post" action="http://localhost/congnghephanmem/Thongtin/timkiem">
            <div class="dau">
                <div class="onhap">
                <input id="otk" type="text" placeholder="    Nhập Mã Hoặc Tên"  name="txtmt" value="<?php if(isset($data['mt'])) echo $data['mt'] ?>">
            </div>
            <div class="nuttk">
                <button id="ntk" type="submit"  name="btnTimkiem">Tìm kiếm</button>             
            </div>
            <div class="nuttk">
                <button id="ntk1" type="submit"  name="btnxuat">Xuất Excel</button>
            </div>   

           

         </div>
 <div class="nut">
       <a  href="http://localhost/congnghephanmem/Thongtin/vthem">Thêm</a>
            </div>
        </form> 
      <div class="dsht">
         <table class="tableht sticky">
          
            
           <thead>
       
            <tr >                                  
                <th class="c stt">STT</th>
                <th class="c ma">Mã SV</th>
                <th class="c ten">Tên SV</th>
                <th class="c ns">Ngày Sinh</th>
                <th class="c gt">Lớp</th>
                <th  class="c sdt">Khoa</th>
                <th  class="c dc">Email</th>
                <th  class="c hd">Hành Động</th>
            
            </tr> 
            </thead>

        <tbody>
         
            <?php 
                if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
            ?> 
                        <tr>
                            <td  class="c stt"><?php echo (++$i) ?></td>
                            <td class="c ma"><?php echo $row['MaSinhVien'] ?></td>
                            <td id="ten"><?php echo $row['HoTen'] ?></td>
                            <td class="c ns">
                                <?php 
                                     $d =$row['NgaySinh'];
                                     $a=date('d-m-Y', strtotime($d) );
                                     echo $a;
                                ?>
                            </td>
                            <td class="c gt"><?php echo $row['Lop'] ?></td>
                            <td class="c sdt"><?php echo $row['TenKhoa'] ?></td>
                            <td  class="c dc"><?php echo $row['Email'] ?></td>
                            <td class="c hd">
                                <div class="hdong">
                                     <a class="chucnang" 
                                href="http://localhost/congnghephanmem/Thongtin/vsua/<?php echo $row['MaSinhVien'] ?>">Sửa</a>
                               
                                 <a class="chucnang"  
                                 onclick="return confirm('Bạn có thực sự muốn xóa?')"

                                href="http://localhost/congnghephanmem/Thongtin/xoa/<?php echo $row['MaSinhVien'] ?>">Xóa</a>
                               </div>
                               
                            </td>
                        </tr>
            <?php
                    }
                }          
                else{
                    echo"<tr>
                            <td colspan=8 class='dl'><h5>Không có dữ liệu</h5  ></td>
                        </tr>";
                } 
            ?>
                
                </tbody>
                    </table>
        
      </div>
 

            </div> 
      
    </div>
    
       

</body>
</html>
