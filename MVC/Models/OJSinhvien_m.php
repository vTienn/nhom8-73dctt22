<?php
    class OJSinhvien_m extends connectDB{


        function tracuuchungchi($m1,$m,$loai){

            if($loai==1){
                $sql="SELECT * From bangtotnghiep WHERE TenSinhvien='$m1' and Masinhvien = '$m' ";             
            }
            elseif($loai==2){
                $sql="SELECT * From chungchi WHERE TenSinhvien='$m1' and Masinhvien = '$m' and LoaiChungChi=N'Ngoại ngữ'";             

            }
            elseif($loai==3){
                $sql="SELECT * From chungchi WHERE TenSinhvien='$m1' and Masinhvien = '$m' and LoaiChungChi=N'Tin học'";             
            }                             
           return mysqli_query($this->con,$sql);
        }
        function timkiem($m){
            $sql="SELECT sinhvien.*,khoa.TenKhoa FROM `sinhvien`join `khoa` on sinhvien.MaKhoa=khoa.MaKhoa WHERE  MaSinhVien ='$m'";                     
           return mysqli_query($this->con,$sql);
        }  
        function insertcc($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc, $trangthai) {
    
            $sql = "INSERT INTO pheduyetchungchi 
             VALUES ('$macc', '$tencc', '$loaicc', '$tensv', '$masv', '$ngaycapcc', '$trangthai')";
            if (mysqli_query($this->con, $sql)) {
                return true;
            } else {
                echo "Lỗi SQL: " . mysqli_error($this->con);
                return false;
            }
        }
        function delete_cc($macc){
            $sql="DELETE FROM pheduyetchungchi WHERE MaChungChi='$macc'";
            return mysqli_query($this->con,$sql);
        }
        
        function sua_chungchi($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc){
            $sql="UPDATE pheduyetchungchi SET MaChungChi='$macc', TenChungChi='$tencc', 
            LoaiChungChi='$loaicc', TenSinhVien='$tensv', MaSinhVien='$masv', NgayCapChungChi='$ngaycapcc' 
            WHERE MaChungchi='$macc'";
            return mysqli_query($this->con,$sql);
        }
        function chungchi_find($macc){
            $sql="SELECT * FROM pheduyetchungchi WHERE MaChungchi ='$macc'";
            return mysqli_query($this->con,$sql);
        }
        function chungchi_find1($masv){
            $sql="SELECT * FROM pheduyetchungchi WHERE MaSinhVien='$masv'";
            return mysqli_query($this->con,$sql);
        }
        function checktrungmacc($macc){
     
            $sql1 = "SELECT * FROM pheduyetchungchi WHERE MaChungChi='$macc'";
            $dl1 = mysqli_query($this->con, $sql1);
            
        
            $sql2 = "SELECT * FROM chungchi WHERE MaChungChi='$macc'";
            $dl2 = mysqli_query($this->con, $sql2);
        
           
            if (mysqli_num_rows($dl1) > 0 || mysqli_num_rows($dl2) > 0) {
                return true; 
            }
        
            return false; 
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