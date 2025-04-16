<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/dangnhap.scss">
</head>
<body>
<div class="container" onclick="yourFunction()">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
  <form method="POST" action="http://localhost/congnghephanmem/Home/Login">
        <h3>Đăng Nhập Tài Khoản</h3>
        <?php 
            include_once './MVC/Views/Pages/'.$data['page'].'.php';
         ?>
        <h2>&nbsp;</h2>
    </form>
    
  </div>
</div>
</body>
</html>
