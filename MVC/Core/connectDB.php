<?php
    class connectDB{
        public $con;
        function __construct(){
            $this->con=mysqli_connect('localhost','root','','cnpm');
            //tránh lỗi font
            mysqli_query($this->con,"SET NAMES 'utf8'");
        }
    }
?>