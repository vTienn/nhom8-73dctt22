<?php
    class tk_m extends connectDB{
        function tennv(){
            $sql="SELECT Tentaikhoan From taikhoan";                     
           return mysqli_query($this->con,$sql);
        }
        function tk_find($manguoidung,$tentk){
            $sql = "SELECT * FROM taikhoan WHERE Tentaikhoan like '%$manguoidung%'
            and Matkhau like '%$tentk%' ";
            
            return mysqli_query($this->con,$sql);
        }

         function timkiem($tentk,$loaitk){
            $sql = "SELECT * FROM taikhoan WHERE Tentaikhoan like '%$tentk%'
            and Loaitaikhoan like '%$loaitk%' ";
            return mysqli_query($this->con,$sql);
        }

        function tk_insert($tentk,$mk,$loaitk){
            $sql= "INSERT INTO taikhoan VALUES ('$tentk','$mk','$loaitk') ";
            return mysqli_query($this->con,$sql);
        }

        function tk_delete($manguoidung){
            $sql = "DELETE FROM taikhoan WHERE Tentaikhoan = '$manguoidung' ";
            return mysqli_query($this->con,$sql);
        }

        function tk_update ($tentk, $mk, $loaitk){
            $sql= "UPDATE taikhoan SET  Matkhau ='$mk',Loaitaikhoan='$loaitk' WHERE Tentaikhoan='$tentk' ";
            return mysqli_query($this->con,$sql);
        }

        function tk_findsua($manguoidung){
            $sql = "SELECT * FROM taikhoan WHERE Tentaikhoan = '$manguoidung' ";
            return mysqli_query($this->con,$sql);
        }

        function check_trung($tentk){
            $sql = "SELECT Tentaikhoan FROM taikhoan WHERE Tentaikhoan = '$tentk'";
            $dl=mysqli_query($this->con,$sql);
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