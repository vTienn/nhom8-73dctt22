<?php
    class Thongtin extends controller{
        private $goi;
        function __construct(){
         $this->goi=$this->model("Thongtin_m");

        }
         function Get_data(){
          $this->view("Masterlayout",["page"=>"dstt","dulieu"=>$this->goi->timkiem("",$_SESSION['Tentaikhoan'])]);
        }
       
        function timkiem(){ 
            if(isset($_POST['btnTimkiem'])){
                $mt=$_POST['txtmt'];
                $dl=$this->goi->timkiem($mt,$_SESSION['Tentaikhoan']);
              $this->view("Masterlayout",["page"=>"dstt","dulieu"=>$dl,"mt"=>$mt]);

            }
          
          }
        function vthem(){
            $this->view("Masterlayout",["page"=>"themtt","khoa"=>$_SESSION['Tentaikhoan']]);

        }
        function them(){
            if(isset($_POST['btnThem'])){
                $m=$_POST['txtma'];
                $t=$_POST['txtten'];
                $ns=$_POST['txtns'];
                $ml=$_POST['txtml'];
                $mk=$_POST['txtmk'];
                $eml=$_POST['txteml'];
                if(empty($m)|| empty($t)|| empty($ns)|| empty($ml)|| empty($mk)|| empty($eml)){
                    echo '<script>alert("Hãy nhập đầy đủ thông tin")</script>';
                    $this->view("Masterlayout",
                    ["page"=>"themtt",
                    "mnv"=>$m,
                    "mca"=>$t,
                    "ns"=>$ns,
                    "ml"=>$ml,
                    "mk"=>$mk,
                    "eml"=>$eml
                    ]);


                }else{
                      if($this->goi->trungma($m)){
                        echo '<script>alert("Mã nhập đã trùng")</script>';
                        $this->view("Masterlayout",
                        ["page"=>"themtt",
                        "mnv"=>$m,
                        "mca"=>$t,
                        "ns"=>$ns,
                        "ml"=>$ml,
                        "mk"=>$mk,
                        "eml"=>$eml
                        ]);

                         }
                    else{
                           $kq=$this->goi->them($m,$t,$ns,$ml,$mk,$eml);
                          
                              if($kq){
                                     echo '<script>alert("Thêm nhân viên mới thành công!")</script>';
                                     }
                              else{
                                    echo '<script>alert("Thêm nhân viên mới thất bại!")</script>';
                                  }   
                               $this->view("Masterlayout",["page"=>"dstt","dulieu"=>$this->goi->timkiem("",$_SESSION['Tentaikhoan'])]);

                          }
                }

            }
        }
        function vsua($m){
            $this->view("Masterlayout",["page"=>"suatt","khoa"=>$_SESSION['Tentaikhoan'],"dulieu"=>$this->goi->tim($m)]);

        }
        function sua(){
            if(isset($_POST['btnSua'])){
                $m=$_POST['txtma'];
                $t=$_POST['txtten'];
                $ns=$_POST['txtns'];
                $ml=$_POST['txtml'];
                $mk=$_POST['txtmk'];
                $eml=$_POST['txteml'];
                if(empty($m)|| empty($t)|| empty($ns)|| empty($ml)|| empty($mk)|| empty($eml)){
                    echo '<script>alert("Hãy nhập đầy đủ thông tin")</script>';
                    $this->view("Masterlayout",["page"=>"suatt","dulieu"=>$this->goi->tim($m)]);

                }else{
                      $kq=$this->goi->sua($m,$t,$ns,$ml,$mk,$eml);
                if($kq){
                    echo '<script>alert("Sửa thành công!");
                    window.location.href = "http://localhost/congnghephanmem/Thongtin";</script>';
                }
                else{
                    echo '<script>alert("Sửa thất bại!")</script>';
                }
                $this->view("Masterlayout_SV",["page"=>"dstt","dulieu"=>$this->goi->timkiem("",$_SESSION['Tentaikhoan'])]);
                }
              
            }
        }
        function xoa($m){
            $kq=$this->goi->xoa($m);
           
            if($kq){
                echo '<script>alert("Xóa thành công!")</script>';
            }
            else{
                echo '<script>alert("Xoá thất bại!")</script>';
            }
            $this->view("Masterlayout",["page"=>"dstt","dulieu"=>$this->goi->timkiem("",$_SESSION['Tentaikhoan'])]);

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
                            window.location.href = "http://localhost/congnghephanmem/Thongtin/hienthi/hienthi";
                          </script>';
                    exit;
                }
    
                if ( $xacnhan != $matkhaumoi){ echo '<script> alert("Nhập lại mật khẩu còn sai nữa???"); window.location.href = "http://localhost/congnghephanmem/Thongtin/hienthi"; </script>';
                    exit;
                }
    
               
                $doi = $this->goi->check_account($tentaikhoan, $matkhaucu, $loaitaikhoan );
                if ($doi) {
                    
                    $doii = $this->goi->changepass($tentaikhoan, $matkhaumoi);
                    echo '<script>
                            alert("Sửa thành công!");
                            window.location.href = "http://localhost/congnghephanmem/Thongtin/hienthi";
                          </script>';
                    exit;
                } else {
                    echo '<script>
                            alert("Sửa thất bại!");
                            window.location.href = "http://localhost/congnghephanmem/Thongtin/hienthi";
                          </script>';
                    exit;
                }
            }   
        }
    }
?>