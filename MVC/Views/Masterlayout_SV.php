<!DOCTYPE html>
<html>
<head>
<title>UTT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phuchangepass.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="http://localhost/congnghephanmem/Public/picture/utt.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Quản lý</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="http://localhost/congnghephanmem/Profile" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Thông tin cá nhân</a> 
    <a href="http://localhost/congnghephanmem/Tracuu" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Tra cứu </a>
    <a href="http://localhost/congnghephanmem/yeucau_chungchi" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Nộp chứng chỉ</a> 
    <a href=""  onclick="showModal(event)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"> <i class="icon fa fa-th-large fa-fw w3-margin-right"></i> Đổi Mật Khẩu</a>
    <a href="http://localhost/congnghephanmem/Login" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Đăng Xuất</a>

  </div>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Xin chào !</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Design</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Photos</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Art</button>
    </div>
    </div>
  </header>
  
  <div style= "height: 500px">
               <?php 
                    include_once './MVC/Views/Pages/'.$data['page'].'.php';
               ?>
        </div>

  

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>


<div id="passwordModal" class="modal_changePass" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 8px; z-index: 1000;">
<button class="close-btn" onclick="closeModal()">×</button>  
<div class="change-password-container">
<form action="http://localhost/congnghephanmem/Profile/changepass" method="POST">
    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
        }
        $tenTaiKhoan = $_SESSION['Tentaikhoan'] ?? "Không xác định"; 
        $loaitaikhoan = $_SESSION['Loaitaikhoan'] ?? "Không xác định"; 
    ?>
  
    <input style="display: none;" type="text" id="current-password" name="tentk" value = "<?php echo $tenTaiKhoan ?>">
    <input style="display: none;" type="text" id="current-password" name="loaitk" value = "<?php echo $loaitaikhoan ?>">
        <h1>Đổi mật khẩu</h1>
        
          <div class="form-group">
                <label for="current-password">Mật khẩu hiện tại</label>
                <input type="password" id="current-password" name="current_password" >
            </div>
            <div class="form-group">
                <label for="new-password">Mật khẩu mới</label>
                <input type="password" id="new-password" name="new_password" >
            </div>
            <div class="form-group">
                <label for="confirm-password">Xác nhận mật khẩu mới</label>
                <input type="password" id="confirm-password" name="confirm_password" >
            </div>
            <button type="submit" class="btn" name = "btnChange">Đổi mật khẩu</button>

        </form>
    </div>
</div>

<!-- Overlay -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 110%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closeModal()"></div>
<script>
function showModal(event) {
  event.preventDefault(); 
  document.getElementById("passwordModal").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function closeModal() {
  document.getElementById("passwordModal").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
</script>


</body>
</html>
