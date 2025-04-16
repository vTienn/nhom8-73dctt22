<?php
    class Tracuu extends controller{
        private $goi;
        function __construct(){
         $this->goi=$this->model("OJSinhvien_m");

        }
         function Get_data(){
          $this->view("Masterlayout_SV",["page"=>"Tracuu","get"=>-1]);
        }
       
        function timkiem(){ 
            if(isset($_POST['btnTimkiem'])){
                $mt1=$_POST['txtmt1'];

                $mt=$_POST['txtmt'];
                $loai=$_POST['cb'];
                if(empty($mt1)||empty($mt)|| empty($loai)){
                    echo '<script>alert("Hãy nhập đầy đủ thông tin")</script>';
                    $this->view("Masterlayout_SV",["page"=>"Tracuu","mt"=>$mt,"mt1"=>$mt1,"cb"=>$loai,"get"=>-1]);

                }

                $dl=$this->goi->tracuuchungchi($mt1,$mt,$loai);
              $this->view("Masterlayout_SV",["page"=>"Tracuu","dulieu"=>$dl,"mt"=>$mt,"mt1"=>$mt1,"cb"=>$loai]);

            }
          
            }
          
       
    }
?>