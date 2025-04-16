<?php
    class Profile extends controller{
        private $goi;
        function __construct(){
         $this->goi=$this->model("OJSinhvien_m");

        }
         function Get_data(){


          $this->view("Masterlayout_SV",["page"=>"userdetails","dulieu"=>$this->goi->timkiem($_SESSION['Tentaikhoan']

          )]);
        }
       
        function timkiem(){ 
            if(isset($_POST['btnTimkiem'])){
                $mt=$_POST['txtmt'];
                $dl=$this->goi->timkiem($mt);
              $this->view("Masterlayout_SV",["page"=>"dstt","dulieu"=>$dl,"mt"=>$mt]);

            }
           
          }
      
          public function changepass() {
            if (isset($_POST['btnChange'])) {
                $tentaikhoan = $_POST['tentk'];
                $matkhaucu = $_POST['current_password'];
                $matkhaumoi = $_POST['new_password'];
                $xacnhan = $_POST['confirm_password'];
                $loaitaikhoan = $_POST['loaitk'];
    
                if ($xacnhan == '' || $matkhaucu == '' || $matkhaumoi == '') {
                      echo '<script>
                            alert("Thiếu Dữ Liệu");
                            window.location.href = "http://localhost/congnghephanmem/Profile";
                          </script>';
                    exit;
                }
    
                if ( $xacnhan != $matkhaumoi){ echo '<script> alert("Nhập lại mật khẩu còn sai nữa???"); window.location.href = "http://localhost/congnghephanmem/Profile"; </script>';
                    exit;
                }
    
               
                $doi = $this->goi->check_account($tentaikhoan, $matkhaucu, $loaitaikhoan );
                if ($doi) {
                    
                    $doii = $this->goi->changepass($tentaikhoan, $matkhaumoi);
                    echo '<script>
                            alert("Sửa thành công!");
                            window.location.href = "http://localhost/congnghephanmem/Profile";
                          </script>';
                    exit;
                } else {
                    echo '<script>
                            alert("Sửa thất bại!");
                            window.location.href = "http://localhost/congnghephanmem/Profile";
                          </script>';
                    exit;
                }
            }   
        }
    
}
?>