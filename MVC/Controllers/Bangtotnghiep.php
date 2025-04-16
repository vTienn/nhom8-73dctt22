<?php
    class Bangtotnghiep extends controller{
        private $degree;

        function __construct()
        {
            $this->degree=$this->model('bangtotnghiep_m');
        }

        function Get_data(){
            $khoa = $this->degree->getKhoa();

            $this->view('Masterlayout',[
                'page'=>'Bangtotnghiep_v',
                'dulieu'=>$this->degree->findByMaKhoa($_SESSION['Tentaikhoan']),
                'khoa' => $khoa
            ]);
        }

        function hienthi() {
            $this->view('Masterlayout', [
                'page' => 'hienthi'
            ]);
        }

        function inBTN($mabang){
            $tenkhoa = $this->degree->getTenKhoa($_SESSION['Tentaikhoan']);
            if (!$tenkhoa) {
                echo "Không lấy được tên khoa.";
            }
            $dl=$this->degree->bangtotnghiep_find2($mabang);

            $this->view('Pages/inBangTotNghiep', [
                'dulieu' => $dl,
                'tenkhoa' => $tenkhoa
            ]); 
        }

        function timkiem(){
            if(isset($_POST['btnTimkiem'])){
                $mabang=$_POST['txtMabang'];
                $tensv=$_POST['txtTensv'];
                if($mabang == '' && $tensv == ''){
                    echo '<script>alert("Vui lòng nhập dữ liệu");
                        window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                }
                else{
                    $dl=$this->degree->bangtotnghiep_find($mabang,$tensv);
                    //Gọi lại giao diện và truyền $dl ra
                    $this->view('Masterlayout',[
                    'page'=>'Bangtotnghiep_v',
                    'dulieu'=>$dl,
                    'mabang'=>$mabang,
                    'tensv'=>$tensv
                ]);
                }
                
            }
        }


        function themmoi(){
            if(isset($_POST['btnInsert'])){

            $_SESSION['mabang'] = $_POST['txtMabang'];
            $_SESSION['tensv'] = $_POST['txtTensv'];
            $_SESSION['masv'] = $_POST['txtMasv'];
            $_SESSION['makhoa'] = $_POST['ddlMakhoa'];
            $_SESSION['loaibang'] = $_POST['ddlLoaibang'];
            $_SESSION['xephang'] = $_POST['ddlXephang'];
            $_SESSION['ngaycap'] = $_POST['txtNgaycap'];
            
    
            $mabang = $_POST['txtMabang'];
            $tensv = $_POST['txtTensv'];
            $masv = $_POST['txtMasv'];
            $makhoa = $_POST['ddlMakhoa'];
            $loaibang = $_POST['ddlLoaibang'];
            $xephang = $_POST['ddlXephang'];
            $ngaycap = $_POST['txtNgaycap'];
            
            if($mabang =='' ||$tensv =='' ||$masv =='' ||$makhoa =='' ||$loaibang == '' || $xephang == '' || $ngaycap == ''){
                echo '<script>alert("Thiếu dữ liệu!");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
            }
            else{

                $kq=$this->degree->check_trung_mabang($mabang);
                if($kq){
                    echo '<script>alert("Trùng mã bằng");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                }
                else{

                    if (!$this->degree->checkChungChi($masv)) {
                        echo '<script>alert("Sinh viên chưa đủ điều kiện tốt nghiệp");
                            window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                    }
                    else{
                            $kq1=$this->degree->bangtotnghiep_insert($mabang,$tensv,$masv,$makhoa,$loaibang,$xephang,$ngaycap);
                            if($kq1){
                                unset($_SESSION['mabang']);
                                unset($_SESSION['tensv']);
                                unset($_SESSION['masv']);
                                unset($_SESSION['makhoa']);
                                unset($_SESSION['loaibang']);
                                unset($_SESSION['xephang']);
                                unset($_SESSION['ngaycap']);
                                echo '<script>alert("Thêm mới thành công!");
                            window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                            }
                            else
                                echo '<script>alert("Thêm mới thất bại!");
                            window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                        }
                }
            }

            // Gọi lại giao diện
            $this->view('Masterlayout', [
                'page' => 'Bangtotnghiep_v',
                'mabang' => $mabang,
                'tensv' => $tensv,
                'masv' => $masv,
                'makhoa' => $makhoa,
                'loaibang' => $loaibang,
                'xephang' => $xephang,
                'ngaycap' => $ngaycap,
            ]);

            }
        }

        function sua($mabang){
            $khoa = $this->degree->getKhoa();

            $this->view('Masterlayout',[
                'page'=>'Bangtotnghiep_sua_v',
                'dulieu'=>$this->degree-> bangtotnghiep_find2($mabang),
                'khoa' => $khoa
            ]); 
        }

        function suadl(){

            if (isset($_POST['btnSave'])) {
                $mabang = $_POST['txtMabang'];
                $tensv = $_POST['txtTensv'];
                $masv = $_POST['txtMasv'];
                $makhoa = $_POST['ddlMakhoa'];
                $loaibang = $_POST['ddlLoaibang'];
                $xephang = $_POST['ddlXephang'];
                $ngaycap = $_POST['txtNgaycap'];

        
                // Kiểm tra dữ liệu nhập vào
                if ($mabang == '' || $tensv == '' || $masv == '' || $makhoa == '' || $loaibang == '' || $xephang == '' || $ngaycap == '') {
                    
                    echo '<script>alert("Thiếu dữ liệu!");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep/sua/' . $mabang . '";</script>';
                } else {
                    // Gọi hàm sửa dữ liệu trong model
                    $kq = $this->degree->bangtotnghiep_update($mabang,$tensv,$masv,$makhoa,$loaibang,$xephang,$ngaycap);
                    if ($kq) {
                        echo '<script>alert("Sửa thành công!");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                    } else {
                        echo '<script>alert("Sửa thất bại!");
                        window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                    }
                }
        
            }
        }

        function xoa($mabang){
            $kq=$this->degree->bangtotnghiep_delete($mabang);
            if($kq){
                echo '<script>alert("Xóa thành công!");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
            }
            else{
                echo '<script>alert("Xóa thất bại!");
                    window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
            }
            //Gọi lại giao diện
            $this->view('Masterlayout',[
                'page'=>'Bangtotnghiep_v',
                'dulieu'=>$this->degree->bangtotnghiep_find2('')
            ]);
        }

        function capNhatTrangThaiBangTotNghiep()  {
            if (isset($_POST['MaBang'])) {
                $mabang = $_POST['MaBang'];
                $trangthai = "Đã nhận";
                
                // Cập nhật trạng thái
                if ($this->degree->capnhattrangthai($mabang, $trangthai)) {
                    echo '<script>
                        window.location.href = "http://localhost/congnghephanmem/Bangtotnghiep";</script>';
                } else {
                    echo '<script>alert("Cập nhật trạng thái thất bại!");</script>';
                }
            }
        }

    }
?>