<?php 
class Danhsachtk extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('tk_m');
    }

    function Get_data(){
        $this->view('Masterlayout_admin',[
            'page'=>'Danhsachtk_v',
            'dulieu'=>$this->ds->tk_find('',''),
            'dulieutennv'=>$this->ds->tennv()
        ]);
    }
//themmoi
    function themmoi(){
        if(isset($_POST['btnSave'])){
            $tentk=$_POST['txtTentk'];
            $mk=$_POST['txtMk'];
            $loaitk=$_POST['txtLoaitk'];
            //Kiểm tra thiếu dữ liệu
            if($tentk =='' ||$mk =='' || $loaitk == ''){
                echo '<script>alert("Thiếu dữ liệu!");
                    window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
            }
            else{
                $kq1=$this->ds->check_trung($tentk);
             
                if($kq1){
                    echo '<script>alert("Trùng Tên Tài Khoản");
                    window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
                }
                else{
                    $kq=$this->ds->tk_insert($tentk,$mk,$loaitk);
                    if($kq)
                            echo '<script>alert("Thêm mới thành công!");
                            window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
                        else
                            echo '<script>alert("Thêm mới thất bại!");
                            window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
                }
            //gọi lại giao diện
            $this->view('Masterlayout_admin',[
                'page'=>'Danhsachtk_v',
                'dulieu'=>$this->ds->tk_find('',''),
                'dulieutennv'=>$this->ds->tennv()
            ]);
        }
        
    }
}

    function xoa($tentk){

        $kq=$this->ds->tk_delete($tentk);
        if($kq){
            echo '<script>alert("Xóa thành công!")</script>';
        }
        else{
            echo '<script>alert("Xóa thất bại!")</script>';
        }
        //Gọi lại giao diện
        $this->view('Masterlayout_admin',[
            'page'=>'Danhsachtk_v',
            'dulieu'=>$this->ds->tk_find('','')
        ]);
    }
    
    //sua
    function sua($tentk = null) {
        if ($tentk === null) {
            echo '<script>alert("Thiếu thông tin tài khoản cần sửa!");
            window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
            exit;
        }
    
        $this->view('Masterlayout_admin', [
            'page' => 'Danhsachtk_sua_v',
            'dulieu' => $this->ds->tk_findsua($tentk),
        ]);
    }
    
    //thaotac sua
    function suadl() {
        if (isset($_POST['btnSave'])) {
            $tentk = $_POST['txtTentk'];
            $mk = $_POST['txtMk'];
            $loaitk = $_POST['txtLoaitk'];
    
            if ($tentk == '' || $mk == '' || $loaitk == '') {
                echo '<script>alert("Thiếu dữ liệu!");
                window.location.href = "http://localhost/congnghephanmem/Danhsachtk/sua/' . $tentk . '";</script>';
                exit;
            }
    
            $kq = $this->ds->tk_update($tentk, $mk, $loaitk);
            if ($kq) {
                echo '<script>alert("Sửa thành công!");
                window.location.href = "http://localhost/congnghephanmem/Danhsachtk";</script>';
                exit;
            }
    
            // Hiển thị lại form với dữ liệu cũ nếu không thành công
            $this->view('Masterlayout_admin', [
                'page' => 'Danhsachtk_sua_v',
                'dulieu' => $this->ds->tk_findsua($tentk),
            ]);
        }
    }
   

    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $tentk=$_POST['txtTentk'];
            $loaitk=$_POST['txtLoaitk'];
           
                $dl=$this->ds->timkiem($tentk,$loaitk);
                $dl1=$this->ds->tennv();
                //Gọi lại giao diện và truyền $dl ra
                $this->view('Masterlayout_admin',[
                'page'=>'Danhsachtk_v',
                'dulieu'=>$dl,
                'dulieu1'=>$dl1,
                'loaitk'=>$loaitk,
                'tentk'=>$tentk
            ]);
             
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
                        window.location.href = "http://localhost/congnghephanmem/danhsachtk";
                      </script>';
                exit;
            }

            if ( $xacnhan != $matkhaumoi){ echo '<script> alert("Nhập lại mật khẩu còn sai nữa???"); window.location.href = "http://localhost/congnghephanmem/danhsachtk"; </script>';
                exit;
            }

           
            $doi = $this->ds->check_account($tentaikhoan, $matkhaucu, $loaitaikhoan );
            if ($doi) {
                
                $doii = $this->ds->changepass($tentaikhoan, $matkhaumoi);
                echo '<script>
                        alert("Sửa thành công!");
                        window.location.href = "http://localhost/congnghephanmem/danhsachtk";
                      </script>';
                exit;
            } else {
                echo '<script>
                        alert("Sửa thất bại!");
                        window.location.href = "http://localhost/congnghephanmem/danhsachtk";
                      </script>';
                exit;
            }
        }   
    }


}
    
?>