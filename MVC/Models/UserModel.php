<?php
class UserModel extends connectDB {
    
    public function checkUser($username, $password) {
        $sql = "SELECT * FROM taikhoan WHERE Tentaikhoan = '$username' AND Matkhau = '$password'";
        return mysqli_query($this->con, $sql);
    }
}
?>
