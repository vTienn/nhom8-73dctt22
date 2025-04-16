<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/CDT/deptt123.css">

</head>
<body>
<div class="qltao">          
            
                      
                <form method="post" action="http://localhost/congnghephanmem/Tracuu/timkiem">
          <div class="nd">     
              <div class="dau">

                <div class="onhap">
                <input id="otk" type="text" placeholder="    Nhập Mã Sinh Viên"  name="txtmt" value="<?php if(isset($data['mt'])) echo $data['mt'] ?>">
            </div>
                
            <div class="onhap">
                <input id="otk" type="text" placeholder="    Nhập Tên Sinh Viên"  name="txtmt1" value="<?php if(isset($data['mt1'])) echo $data['mt1'] ?>">
            </div>
            <select class="slcb" name="cb">
                 <option value="1" <?php if(isset($data['cb'])&& $data['cb']==1) echo 'selected'?>>Bằng Tốt Nghiệp</option>
                 <option value="2" <?php if(isset($data['cb'])&& $data['cb']==2) echo 'selected'?> >Chứng Chỉ Tiếng Anh</option>
                 <option value="3" <?php if(isset($data['cb'])&& $data['cb']==3) echo 'selected'?> >Chứng Chỉ Tin Học</option>
            </select>
            
            <div class="nuttk">
                <button id="ntk" type="submit"  name="btnTimkiem">Tra cứu</button>             
            </div>                  
         </div>
 
        </form> 
      <div class="dsht">
      <?php 
       if(isset($data['get']) && $data['get']==-1){
        echo"
        <h5>Tra cứu bẳng tốt nghiệp hoặc các chứng chỉ</h5  >
   ";            }
            elseif(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                if(isset($data['cb'])&& $data['cb']==1){
                  
            ?> 
         <table class="tableht sticky">
          
            
           <thead>
       
            <tr >                                  
                <th class="c stt">Mã BTN</th>
                <th class="c ma">Mã SV</th>
                <th class="c ten">Tên SV</th>
                <th class="c ns">Loại</th>
                <th class="c gt">Khoa</th>
                <th  class="c sdt">Xếp hạng</th>
                <th  class="c dc">Ngày cấp</th>

            
            </tr> 
            </thead>

        <tbody>
         
            <?php 
               
               if(isset($data['dulieu'])&& mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
            ?> 
                        <tr>
                            <td  class="c stt"><?php echo$row['MaBang'] ?></td>
                            <td class="c ma"><?php echo $row['MaSinhVien'] ?></td>
                            <td id="ten"><?php echo $row['TenSinhVien'] ?></td>
                            
                            <td class="c gt"><?php echo $row['LoaiBang'] ?></td>
                            <td class="c sdt"><?php echo $row['MaKhoa'] ?></td>
                            <td  class="c dc"><?php echo $row['XepHang'] ?></td>
                            <td class="c ns">
                                <?php 
                                     $d =$row['NgayCapBang'];
                                     $a=date('d-m-Y', strtotime($d) );
                                     echo $a;
                                ?>
                            </td>
                        </tr>
            <?php
                    }
                }          
              
            ?>
                
                </tbody>
                    </table>
                    <?php
                    }
                    else{

                            
            ?>
             <table class="tableht sticky">
          
            
          <thead>
      
           <tr >                                  
               <th class="c stt">STT</th>
               <th class="c ma">Mã CC</th>
               <th class="c ten">Tên CC</th>
               <th class="c ns">Loại CC</th>
               <th class="c gt">Mã SV</th>
               <th  class="c sdt">Tên SV</th>
               <th  class="c dc">Ngày cấp</th>
           
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
                           <td class="c ma"><?php echo $row['MaChungChi'] ?></td>
                           <td id="ten"><?php echo $row['TenChungChi'] ?></td>
                           
                           <td class="c gt"><?php echo $row['LoaiChungChi'] ?></td>
                           <td class="c sdt"><?php echo $row['MaSinhVien'] ?></td>
                           <td  class="c dc"><?php echo $row['TenSinhVien'] ?></td>
                           <td class="c ns">
                               <?php 
                                    $d =$row['NgayCapChungChi'];
                                    $a=date('d-m-Y', strtotime($d) );
                                    echo $a;
                               ?>
                           </td>
                       </tr>
           <?php
                   }
               }          
             
           ?>
               
               </tbody>
                   </table>
                   <?php
                }  
            }
            else{
                echo"<tr>
                <td colspan=8 class='dl'><h5>Không có dữ liệu</h5  ></td>
            </tr>";      
            }
                      
                ?>
        
      </div>
 

            </div> 
      
    </div>
    
       

</body>
</html>
