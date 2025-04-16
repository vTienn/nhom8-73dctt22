<?php 
class chungchi_gvs extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('chungchi');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'chungchi_gv',
            'dulieu'=>$this->ds->chungchi_find('','')
        ]);
    }
    function themmoi()
    {
        if (isset($_POST['btnyeucau'])) {
            $macc = $_POST['txtmacc'];
            $tencc = $_POST['txttencc'];
            $loaicc = $_POST['slloaicc'];
            $tensv = $_POST['txttensv'];
            $masv = $_POST['txtmasv'];
            $ngaycapcc = $_POST['txtngaycapcc'];

            $sql = "SELECT COUNT(*) FROM sinhvien WHERE MaSinhVien = ?";
            $stmt = $this->ds->con->prepare($sql);
            $stmt->bind_param("s", $masv);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
    
            if ($count == 0) {
                echo '<script>alert("Mã sinh viên không tồn tại!")</script>';
                $this->view('chungchi_gv', [
                    'page' => 'chungchi_gv',
                    'macc' => $macc,
                    'tencc' => $tencc,
                    'loaicc' => $loaicc,
                    'tensv' => $tensv,
                    'masv' => $masv,
                    'ngaycapcc' => $ngaycapcc
                ]);
                return;
                
            }
        
            $kq1 = $this->ds->checktrungmacc_gv($macc);
            if ($kq1) {
                echo '<script>alert("Trùng mã chứng chỉ!")</script>';
            } else {
              
                $kq = $this->ds->insertcc_gv($macc, $tencc, $loaicc, $tensv, $masv, $ngaycapcc);
                if ($kq) {

                    echo '<script>alert("Thêm mới thành công!")</script>';      
            }
            else {
                 
                        echo '<script>alert("Thêm chứng chỉ thất bại, vui lòng thử lại!")</script>';
                    }
   
          
            $this->view('Masterlayout', [
                'page' => 'chungchi_gv',
                'macc' => $macc,
                'tencc' => $tencc,
                'loaicc' => $loaicc,
                'tensv' => $tensv,
                'masv' => $masv,
                'ngaycapcc' => $ngaycapcc
            ]);
            } 
        }

        
    }
    function getStudentName()
    {
     
        if (isset($_GET['studentId'])) {
            $masv = $_GET['studentId']; 
    
         
            $kq = $this->ds->timkiem_sv($masv);
    
            if ($kq) {
               
                echo json_encode(['name' => $kq['HoTen']]); 
            } else {
             
                echo json_encode(['name' => '']);
            }
        } else {

            echo json_encode(['name' => '']);
        }
    }
    
    function timkiem_sv($masv){
        $this->view('Masterlayout',[
            'page'=>'chungchi_gv',
            'dulieu'=>$this->ds->timkiem_sv('$masv','')
        ]);
    }

}
?>