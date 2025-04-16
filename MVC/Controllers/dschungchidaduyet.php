<?php 
class dschungchidaduyet extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('chungchi');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'dschungchi',
            'dulieu'=>$this->ds->chungchi_byMaKhoa($_SESSION['Tentaikhoan'])
        ]);
    }
    function suacc_v($macc){
       
            $this->view('suacc',[
                'page'=>'suacc',
                'dulieu'=>$this->ds->chungchi_find1($macc,'')
            ]);
        
    }
    public function inchungchi($macc){
        
        $conn = mysqli_connect('localhost', 'root', '', 'cnpm');
        
      
        $sql = "SELECT * FROM chungchi WHERE MaChungChi = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $macc); 
        $stmt->execute();
        $result = $stmt->get_result();
        $chungchi = $result->fetch_all(MYSQLI_ASSOC);
        
       
        if (empty($chungchi)) {
            echo "Chứng chỉ không tồn tại!";
            return;
        }
    
       
        $this->view('Pages/inchungchi', [
            'chungchi' => $chungchi
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

  
    $this->view('Masterlayout', [
        'page' => 'dschungchi',
        'dulieu' => $this->ds->chungchi_find1('', '')
    ]);
}
function timkiem(){
    if(isset($_POST['btnSearch'])){
        $macc = $_POST['search'];
        $masv = $_POST['search'];
        $dl=$this->ds->timkiem_ccdaduyet($macc,$masv);
      
        $this->view('Masterlayout',[
            'page'=>'dschungchi',
            'dulieu'=>$dl,
            'macc'=>$macc,
            'masv'=>$masv
        ]);
    }
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
           
            $this->view('Masterlayout',[
                'page'=>'dschungchi',
                'dulieu'=>$this->ds->chungchi_find1('','')
            ]);
        }
    }
}
?>