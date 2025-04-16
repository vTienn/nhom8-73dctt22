<?php
    class Thongtin_m extends connectDB{
       
        
        function tim($m){
            $sql="SELECT * From sinhvien WHERE MaSinhVien = '$m'";                     
           return mysqli_query($this->con,$sql);
        }
        function timkiem($m,$makhoa){
            $sql="SELECT sinhvien.*,khoa.TenKhoa FROM `sinhvien` JOIN`khoa` on khoa.MaKhoa=sinhvien.MaKhoa WHERE( MaSinhVien like '%$m%'OR HoTen like '%$m%') and sinhvien.MaKhoa='$makhoa'";                     
           return mysqli_query($this->con,$sql);
        }
        function them($m,$t,$gt,$ns,$qq,$sdt){
            $sql="INSERT INTO `sinhvien`(`MaSinhVien`, `HoTen`, `NgaySinh`, `Lop`, `MaKhoa`, `Email`) VALUES
             ('$m','$t','$gt','$ns','$qq','$sdt')";
               $sql1=" INSERT INTO `taikhoan`(`Tentaikhoan`, `Matkhau`, `Loaitaikhoan`)
               VALUES ('$m','1','User')";       
          mysqli_query($this->con,$sql1);
      
             return mysqli_query($this->con,$sql);
        }
        function sua($m,$t,$gt,$ns,$qq,$sdt){
           $sql=" UPDATE `sinhvien` SET 
           `HoTen`='$t',`NgaySinh`='$gt',`Lop`='$ns',
           `MaKhoa`='$qq',`Email`='$sdt' WHERE `MaSinhVien`='$m' ";
            return mysqli_query($this->con,$sql);
        }
        function xoa($m){
            $sql="DELETE FROM sinhvien WHERE `MaSinhVien`='$m' "; 
            $sql0=" DELETE FROM `taikhoan` WHERE Tentaikhoan='$m' ";
            $sql1="DELETE FROM `bangtotnghiep`  WHERE `MaSinhVien`='$m' "; 
            $sql2="DELETE FROM `chungchi`  WHERE `MaSinhVien`='$m' "; 
            $sql3="DELETE FROM `pheduyetchungchi`  WHERE `MaSinhVien`='$m' "; 
            mysqli_query($this->con,$sql0);  
            mysqli_query($this->con,$sql1);
            mysqli_query($this->con,$sql2);
            mysqli_query($this->con,$sql3);
            return mysqli_query($this->con,$sql);
        }
        function trungma($mnv){
            $sql=" SELECT * FROM sinhvien WHERE `MaSinhVien`='$mnv' ";
            $dl= mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;
            }
            return $kq;
        }

        public function check_account($tentaikhoan,$matkhau,$loaitaikhoan){
            $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Tentaikhoan = '$tentaikhoan' and Matkhau = '$matkhau' and Loaitaikhoan = '$loaitaikhoan'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;
            }
            return $kq;
        }
    
        public function changepass($tentaikhoan,$matkhau) {
            $sql= "UPDATE taikhoan SET  Matkhau ='$matkhau' WHERE Tentaikhoan='$tentaikhoan' ";
            return mysqli_query($this->con,$sql); 
        }

    }
?>