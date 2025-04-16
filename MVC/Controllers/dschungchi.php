<?php 
class dschungchi extends controller{
    private $ds;
    function __construct()
    {
        $this->ds=$this->model('chungchi');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'dsyeucau_chungchi',
            'dulieu'=>$this->ds->chungchi_yc_byMaKhoa($_SESSION['Tentaikhoan'])
        ]);
    }

}
?>