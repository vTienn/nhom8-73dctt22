<?php 
class yeucau_chungchi extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('OJSinhvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout_SV',[
            'page'=>'svnopchungchi'
        ]);
    }
    function Get_data1(){
        $this->view('Masterlayout_SV',[
            'page'=>'dsyeucau_chungchi_sv',
            'dulieu'=>$this->ds->chungchi_find1($_SESSION['Tentaikhoan'])
        ]);
    }
    function xoa($macc){
  
        if (empty($macc)) {
            echo '<script>alert("Mã chứng chỉ không hợp lệ hoặc không được cung cấp!")</script>';
        
            return;
        }
    
       
        $kq = $this->ds->delete_cc($macc);
    
        if ($kq) {
            echo '<script>alert("Xóa thành công!")</script>';
            
        } else {
            echo '<script>alert("Xóa thất bại!")</script>';
        }
        $this->view('Masterlayout_SV',[
            'page'=>'dsyeucau_chungchi_sv',
            'dulieu'=>$this->ds->chungchi_find1($_SESSION['Tentaikhoan'])
        ]);
    }    
    function themmoi(){
        if(isset($_POST['btnyeucau'])){
            $macc = $_POST['txtmacc'];
            $tencc = $_POST['txttencc'];
            $loaicc = $_POST['slloaicc'];
            $tensv = $_POST['txttensv'];
            $masv = $_POST['txtmasv'];
            $ngaycapcc = $_POST['txtngaycapcc'];
            $trangthai = !empty($trangthai) ? $trangthai : 'Chờ duyệt';
        
            $kq1=$this->ds->checktrungmacc($macc);
            
            if($kq1){
                echo '<script>alert("Trùng mã chứng chỉ!")</script>';
                $this->view('Masterlayout_SV',[
                    'page'=>'svnopchungchi',
                    'macc'=>$macc,
                    'tencc'=>$tencc,
                    'loaicc'=>$loaicc,
                    'tensv'=>$tensv,
                    'masv'=>$masv,
                    'ngaycapcc'=>$ngaycapcc,
                ]);
            }
           
            else{         
                $kq=$this->ds->insertcc($macc,$tencc,$loaicc,$tensv,$masv,$ngaycapcc,$trangthai);
                if($kq)
                    echo '<script>alert("Thêm mới thành công!")</script>';
                else
                    echo '<script>alert("Thêm mới thất bại!")</script>';
                    $this->view('Masterlayout_SV',[
                        'page'=>'svnopchungchi'                       
                    ]);
            }
         
            
        }
    }
    function suacc_v($macc){     
        $this->view('Masterlayout_SV',[ 
            'page'=>'suayeucaucc',
            'dulieu'=>$this->ds->chungchi_find($macc)
        ]);
    
}
function suacc(){
    if(isset($_POST['suacc'])){
        $macc = $_POST['txtmacc'];
        $tencc = $_POST['txttencc'];
        $loaicc = $_POST['slloaicc'];
        $tensv = $_POST['txttensv'];
        $masv = $_POST['txtmasv'];
        $ngaycapcc = $_POST['txtngaycapcc'];
     
        $kq=$this->ds->sua_chungchi($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc);
        if($kq)
            echo '<script>alert("Sửa thành công!")</script>';
        else
            echo '<script>alert("Sửa thất bại!")</script>';
       
            $this->view('Masterlayout_SV',[
                'page'=>'dsyeucau_chungchi_sv',
                'dulieu'=>$this->ds->chungchi_find1($_SESSION['Tentaikhoan'])
            ]);
    }
}

    
}
?>
