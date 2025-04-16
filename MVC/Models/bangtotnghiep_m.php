<?php

    class bangtotnghiep_m extends connectDB{

        function getKhoa(){
            $sql = "SELECT * FROM khoa";
             return mysqli_query($this->con,$sql);
        }

        function getTenKhoa($makhoa){
            $sql = "SELECT TenKhoa FROM khoa where MaKhoa = '$makhoa' ";
            $result =  mysqli_query($this->con,$sql);

            $row = mysqli_fetch_assoc($result);
            return $row['TenKhoa'];

        }

        function bangtotnghiep_insert($mabang,$tensv,$masv,$makhoa,$loaibang,$xephang,$ngaycap){
            $sql = "INSERT INTO bangtotnghiep VALUES ('$mabang',N'$tensv','$masv','$makhoa',N'$loaibang',N'$xephang','$ngaycap', N'Chưa nhận' ) ";
            return mysqli_query($this ->con,$sql);
        }

        function check_trung_mabang($mabang){
            $sql = "SELECT * FROM bangtotnghiep WHERE mabang = '$mabang'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0){
                $kq=true;
            }
            return $kq;
        }

        function bangtotnghiep_find($mabang,$tensv){
            $sql = "SELECT * FROM bangtotnghiep WHERE mabang like '%$mabang%'
            and tensinhvien like '%$tensv%' ";
            
            return mysqli_query($this->con,$sql);
        }

        function bangtotnghiep_find2($mabang){
            $sql = "SELECT * FROM bangtotnghiep WHERE mabang like '%$mabang%' ";
            
            return mysqli_query($this->con,$sql);
        }

        function findByMaKhoa($makhoa){
            $sql = "SELECT * FROM bangtotnghiep WHERE makhoa like '%$makhoa%' ";
            
            return mysqli_query($this->con,$sql);
        }

        function bangtotnghiep_update($mabang,$tensv,$masv,$makhoa,$loaibang,$xephang,$ngaycap){
            $sql= "UPDATE `bangtotnghiep` SET `tensinhvien`='$tensv',
            `masinhvien`='$masv',
            `makhoa`='$makhoa',
            `loaibang`='$loaibang',
            `xephang`='$xephang',
            `ngaycapbang`='$ngaycap'
            WHERE mabang='$mabang'  ";
            return mysqli_query($this->con,$sql);
        }

        function bangtotnghiep_delete($mabang){
            $sql = "DELETE FROM `bangtotnghiep` WHERE mabang = '$mabang' ";
            return mysqli_query($this->con,$sql);
        }

        function capnhattrangthai($mabang, $trangthai) {
            $query = "UPDATE bangtotnghiep SET TrangThai = '$trangthai' WHERE MaBang = '$mabang'";
            return mysqli_query($this->con, $query);
        }
        
        function checkChungChi($masv) {
            $sql = "SELECT COUNT(DISTINCT LoaiChungChi) AS SoLuongChungChi
                    FROM chungchi 
                    WHERE MaSinhVien = '$masv' 
                    AND (LoaiChungChi = N'Tin học' OR LoaiChungChi = N'Ngoại ngữ')
                    GROUP BY MaSinhVien
                    HAVING COUNT(DISTINCT LoaiChungChi) = 2"; 
        
            $result = mysqli_query($this->con, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['SoLuongChungChi'] == 2; 
        }
        
    }
?>