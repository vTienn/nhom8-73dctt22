<!DOCTYPE html>
<html>
<head>
<title>UTT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phu1.css">

<link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phu4.css">
<link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phuchangepass.css">



<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>


<body class="w3-light-grey w3-content" style="max-width:100%">

<div class="admin-layout">
<div class=" w3-light-grey w3-content sidebar"  style="max-height:100%" >
<button class="toggle-btn" id="toggleSidebar">
<img src="http://localhost/congnghephanmem/Public/picture/utt.png" style="width:100%;" class="w3-round"></button>
<ul class="sidebar-menu">
                <li  class="w3-bar-item w3-button w3-padding">
                  <a href="http://localhost/congnghephanmem/Danhsachtk" style="text-decoration: none;">
                  <i class="icon fa fa-user fa-fw w3-margin-right"></i>
                  <span class="menu-text">Quản Lý Tài Khoản</span>
                  </a>
                    
                </li>
                
                <li  class="w3-bar-item w3-button w3-padding">
                  <a href="http://localhost/congnghephanmem/PB" style="text-decoration: none;">
                  <i class="icon fa fa-user fa-fw w3-margin-right"></i>
                  <span class="menu-text">Quản Lý Phòng Ban</span>
                  </a>
                    
                </li>
                <li class="w3-bar-item w3-button w3-padding">
                    <a href="http://localhost/congnghephanmem/Thongke" style="text-decoration: none;">
                    <i class="icon fa fa-th-large fa-fw w3-margin-right"></i>
                    <span class="menu-text">Thống Kê</span>
                    </a>
                </li>
                <li class="w3-bar-item w3-button w3-padding">
                <a href="" style="text-decoration: none;" onclick="showModal(event)">
                <i class="icon fa fa-th-large fa-fw w3-margin-right"></i> 
                <span class="menu-text">Đổi Mật Khẩu</span>
                </a>
                </li>
                <li class="w3-bar-item w3-button w3-padding">
                    <a href="http://localhost/congnghephanmem/Login" style="text-decoration: none;">
                    <i class="icon fa fa-th-large fa-fw w3-margin-right"></i>
                    <span class="menu-text">Đăng Xuất</span>
                    </a>
                </li>
            </ul>
</div>
 
<div class="main-content w3-main">
    <div style= "height: 100%">
        <?php include_once './MVC/Views/Pages/'.$data['page'].'.php'; ?>
    </div>
</div>
</div>


  

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
<script src="http://localhost/congnghephanmem/Public/js/phu1.js"></script>
<script src="http://localhost/congnghephanmem/Public/js/phumaster.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<div id="passwordModal" class="modal_changePass" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 8px; z-index: 1000;">
<button class="close-btn" onclick="closeModal()">×</button>
    <div class="change-password-container">
        <h1><b>Đổi mật khẩu</b></h1>
    <form action="http://localhost/congnghephanmem/danhsachtk/changepass" method="POST">
    <?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $tenTaiKhoan = $_SESSION['Tentaikhoan'] ?? "Không xác định"; 
    $loaitaikhoan = $_SESSION['Loaitaikhoan'] ?? "Không xác định"; 
    ?>
    <h2><?php echo htmlspecialchars($tenTaiKhoan) ?></h2>
    <input style="display: none;" type="text" id="current-password" name="tentk" value = "<?php echo $tenTaiKhoan ?>">
    <input style="display: none;" type="text" id="current-password" name="loaitk" value = "<?php echo $loaitaikhoan ?>">
    
    <div class="form-group">
        <label for="current-password">Mật khẩu hiện tại</label>
        <input type="password" id="current-password" name="current_password">
    </div>
    <div class="form-group">
        <label for="new-password">Mật khẩu mới</label>
        <input type="password" id="new-password" name="new_password">
    </div>
    <div class="form-group">
        <label for="confirm-password">Xác nhận mật khẩu mới</label>
        <input type="password" id="confirm-password" name="confirm_password">
    </div>
    <button type="submit" class="btn" name="btnChange">Đổi mật khẩu</button>
</form>

    </div>
</div>

<!-- Overlay -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="closeModal()"></div>
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
