<?php
class PB extends controller{
    private $dspb;
    function __construct()
    {
        $this->dspb=$this->model('PB_m');
    }
    function Get_data(){
        $this->view('Masterlayout_admin',[
            'page'=>'PB_View',
            'dulieu'=>$this->dspb->pb_find('','')
        ]);
    }

    function fillter() {
        // Lấy giá trị từ form
        $ten_khoa = $_POST['ten_khoa'];  // Tên sinh viên
        $filter = $_POST['filter'];   // Lọc theo nút (ALL, K71, K72, K73, K74, K75)
    
        // Kiểm tra nếu không có dữ liệu nào được nhập hoặc chọn
        if ($ten_khoa == '' && $filter == '') {
            echo '<script>window.location.href = "http://localhost/congnghephanmem/PB";
            </script>';
        } else {
            // Xử lý lọc dữ liệu
            if ($filter == 'ALL') {
                $dl = $this->dspb->pb_find($ten_khoa, '');
            } 
            
            else {
                $dl = $this->dspb->pb_find($ten_khoa, $filter);
            }
    
            // Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout_admin', [
                'page' => 'PB_View',
                'dulieu' => $dl,
                'ten_khoa' => $ten_khoa,   // Truyền giá trị của tên sinh viên
                'filter' => $filter    // Truyền giá trị của nút lọc
            ]);
        }
    }

    function add(){
        if(isset($_POST['btnSave'])){
            $makhoa=$_POST['Makhoa'];
            $tenkhoa=$_POST['Tenkhoa'];
            $email=$_POST['Email'];

            //Kiểm tra thiếu dữ liệu      
            if($makhoa =='' ||$tenkhoa =='' ||$email =='' ){
                echo '<script>alert("Thiếu dữ liệu!");
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';
            }
            else{
                //Kiểm tra trùng mã loại
                $kq1=$this->dspb->checkmakhoa($makhoa);
                // $kq2=$this->dspb->add_tk($makhoa);
                if($kq1){
                    echo '<script>alert("Trùng mã khoa");
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';
                }
                else{
                    $kq=$this->dspb->pb_add($makhoa, $tenkhoa, $email);
                    $kq2 = $this->dspb->add_tk($makhoa);
                    if($kq && $kq2)
                        echo '<script>alert("Thêm mới thành công!");
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';
                    else
                        echo '<script>alert("Thêm mới thất bại!");
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';

                }
                    
            }
            //gọi lại giao diện
            $this->view('Masterlayout_admin',[
                'page'=>'PB_View',
                'makhoa'=>$makhoa,
                'tenkhoa'=>$tenkhoa,
                'email'=>$email
                
            ]);
        }
    }

    function sua($makhoa){
        $this->view('Masterlayout_admin',[
            'page'=>'PB_edit',
            'dulieu'=>$this->dspb->pb_find_edit($makhoa)
        ]); 
    }
    

    function edit(){
        if(isset($_POST['btnLuu'])){
            $makhoa=$_POST['makhoa'];
            $tenkhoa=$_POST['tenkhoa'];
            $email=$_POST['email'];
           
            // bắt lỗi để trống dl
            if($makhoa =='' ||$tenkhoa ==''  ||$email =='' ){
                    echo '<script>alert("Thiếu dữ liệu!");
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';
            
            }
            else{
                //gọi hàm sửa dl loaisp_update trong model loaisp_m
            $kq=$this->dspb->pb_edit($makhoa, $tenkhoa, $email);
            if($kq)
                echo '<script>alert("Sửa thành công!")</script>';
            else
                echo '<script>alert("Sửa thất bại!")</script>';
           
            //gọi lại giao diện
            $this->view('Masterlayout_PB',[
                'page'=>'PB_View',
                'dulieu'=>$this->dspb->pb_find('','')
            ]);
        } 
            }
           
    }


    function del($makhoa){
        $kq=$this->dspb->pb_del($makhoa);


        if($kq){
            echo '<script>alert("Xóa thành công!")</script>';
        }
        else{
            echo '<script>alert("Xóa thất bại!")</script>';
        }
        //Gọi lại giao diện
        $this->view('Masterlayout_admin ',[
            'page'=>'PB_View',
            'dulieu'=>$this->dspb->pb_find('','')
        ]);
        echo '<script>
                    window.location.href = "http://localhost/congnghephanmem/PB";</script>';



    }

}
?>