<?php
class chungchi extends connectDB {  
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
   
    
    function insertcc_gv($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc) {
    
        $sql = "INSERT INTO chungchi 
         VALUES ('$macc', '$tencc', '$loaicc', '$tensv', '$masv', '$ngaycapcc')";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            echo "Lỗi SQL: " . mysqli_error($this->con);
            return false;
        }
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
    function checktrungmacc_gv($macc){
     
        $sql1 = "SELECT * FROM chungchi WHERE MaChungChi='$macc'";
        $dl1 = mysqli_query($this->con, $sql1);
    
       
        if (mysqli_num_rows($dl1) > 0) {
            return true; 
        }
    
        return false; 
    }
function chungchi_find($macc){
    $sql="SELECT * FROM pheduyetchungchi WHERE MaChungchi like '%$macc%'";
    return mysqli_query($this->con,$sql);
}
function timkiem_ccdaduyet($macc,$masv){
    $sql="SELECT * FROM chungchi WHERE MaChungChi like '%$macc%' OR MaSinhVien LIKE '%$masv%'";
    return mysqli_query($this->con,$sql);
}
function chungchi_find1($macc){
    $sql="SELECT * FROM chungchi WHERE MaChungchi like '%$macc%'";
    return mysqli_query($this->con,$sql);
}
function chungchi_find2($macc){
    $sql="SELECT * FROM chungchi WHERE MaChungchi like '%$macc%'";
    return mysqli_query($this->con,$sql);
}

function chungchi_byMaKhoa($makhoa){
    $sql="SELECT * FROM chungchi
    join sinhvien on chungchi.masinhvien = sinhvien.masinhvien
     WHERE sinhvien.makhoa = '$makhoa'";
    return mysqli_query($this->con,$sql);
}

function chungchi_yc_byMaKhoa($makhoa){
    $sql="SELECT * FROM pheduyetchungchi
    join sinhvien on pheduyetchungchi.masinhvien = sinhvien.masinhvien
     WHERE sinhvien.makhoa = '$makhoa'";
    return mysqli_query($this->con,$sql);
}

public function timkiem_sv($masv)
{
    
    $sql = "SELECT HoTen FROM sinhvien WHERE MaSinhVien = '$masv'";
    $result = mysqli_query($this->con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); 
    }
  
    return false;
}

function delete_cc($macc){
    $sql="DELETE FROM chungchi WHERE MaChungChi='$macc'";
    return mysqli_query($this->con,$sql);
}

function sua_chungchi($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc){
    $sql="UPDATE chungchi SET MaChungChi='$macc', TenChungChi='$tencc', 
    LoaiChungChi='$loaicc', TenSinhVien='$tensv', MaSinhVien='$masv', NgayCapChungChi='$ngaycapcc' 
    WHERE MaChungchi='$macc'";
    return mysqli_query($this->con,$sql);
}
public function tim_kiem_sinh_vien($masv) {
   
    $sql = "SELECT HoTen FROM sinhvien WHERE MaSinhVien = '$masv'";
    $result = mysqli_query($this->con, $sql);

  
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); 
    }
}
}
?>

