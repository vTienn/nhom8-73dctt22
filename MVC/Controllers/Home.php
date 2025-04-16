<?php

class Home extends controller {
    private $userModel;

    // Hàm khởi tạo để sử dụng model
    public function __construct() {
        $this->userModel=$this->model('UserModel');
    }

    // Hàm hiển thị trang login
    public function Get_data() {
        $this->view('mm',[
            'page'=>'Login'
        ]
    ); 
    }

  
    public function Login() {
        if (isset($_POST['txtLogin'])) {
            $username = $_POST['txtName'];
            $password = $_POST['txtPasswd'];
    
            if ($username == "" || $password == "") {
                echo "<script>
                        alert('Vui lòng nhập đầy đủ thông tin');
                        window.location.href = '/congnghephanmem/Login';
                      </script>";
                exit; 
            } else {
                
                $result = $this->userModel->checkUser($username, $password);
                if ($result && $result->num_rows > 0) {
                    session_start();
                    $user = $result->fetch_assoc();
                    $_SESSION['Tentaikhoan'] = $user['Tentaikhoan'];
                    $_SESSION['Loaitaikhoan'] = $user['Loaitaikhoan'];
                    $loaiTaiKhoan = $user['Loaitaikhoan'];   
    
                   
                    if ($loaiTaiKhoan == "Department") {
                        header('Location: /congnghephanmem/Bangtotnghiep/hienthi');
                        exit;
                    } elseif ($loaiTaiKhoan == "User") {
                        header('Location: /congnghephanmem/Profile');
                        exit;
                    } else {
                        header('Location: /congnghephanmem/Danhsachtk');
                        exit;
                    }
                } else {
                    echo "<script>
                            alert('Tên tài khoản hoặc mật khẩu không đúng');
                            window.location.href = '/congnghephanmem/Login';
                          </script>";
                    exit; 
                }
            }
        }
    }
    
    
}
?>
