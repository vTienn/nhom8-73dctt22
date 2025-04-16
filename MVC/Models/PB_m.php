<?php
class PB_m extends connectDB{
    public function pb_find($tenkhoa,$makhoa){
        $sql="SELECT * FROM khoa WHERE MaKhoa like '%$makhoa%'
              and TenKhoa like '%$tenkhoa%'";
        return mysqli_query($this->con,$sql);
    }
    public function pb_load($makhoa,$tenkhoa, $email){
        $sql="SELECT * FROM khoa 
        WHERE MaKhoa='$makhoa'and HoTen like '%$tensv%' 
        and Lop like '%$lop%'";
        return mysqli_query($this->con,$sql);
    }


    public function pb_add($makhoa, $tenkhoa, $email){
        $sql="INSERT INTO khoa VALUES ('$makhoa', '$tenkhoa', '$email')";
        return mysqli_query($this->con,$sql);
    }

    function checkmakhoa($makhoa){
        $sql="SELECT * FROM khoa Where MaKhoa='$makhoa'";
        $dl=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dl)>0){
            $kq=true;  //trùng tiêu đề
        }
        return $kq;
    }

    function pb_del($makhoa){
        $sql="DELETE FROM khoa WHERE MaKhoa = '$makhoa'";
        return mysqli_query($this->con,$sql);
    }
    function pb_edit($makhoa, $tenkhoa, $email){
    $sql="UPDATE khoa SET TenKhoa='$tenkhoa', email='$email'
    WHERE MaKhoa='$makhoa'";
        return mysqli_query($this->con,$sql);
    }

    // Truy vấn dữ liệu cần chỉnh sửa
function pb_find_edit($makhoa) {
    $query = "SELECT * FROM khoa WHERE MaKhoa = '$makhoa'";
    return mysqli_query($this->con, $query);
}

    function add_tk($makhoa){
        $sql="INSERT INTO taikhoan VALUES ('$makhoa', '111', 'Department')";
        return mysqli_query($this->con,$sql);
    }

    
}
?>

