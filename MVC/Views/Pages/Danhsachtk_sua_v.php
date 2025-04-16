<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phu_sua.css">

</head>
<body>
<header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Quản Lý Tài Khoản</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right" style="width:150px; margin-right: 100px;">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>

      <button type="button" class="w3-button w3-white" onclick="openModal()" data-toggle="modalx" data-target="#myModal" ><i class="fa fa-diamond w3-margin-right"></i>Thêm Mới</button>

      <div>
      <form action="http://localhost/congnghephanmem/Danhsachtk/timkiem" method="post">
        <div class="form-inline">
        <label style="width:150px; margin-left: 0px;">Tên Tài Khoản</label>
        <input style="width:240px;" type="text" class="form-control" name="txtTentk" value="<?php if(isset($data['Loaitaikhoan'])) echo $data['Loaitaikhoan'] ?>">
        <label style="width:150px;">Loại Tài Khoản</label>
        <select style = "width: 200px" type="text" name="txtLoaitk" class="w3-button w3-white">
                    <option value="">--Tất Cả Tài Khoản-- </option>
                    <option value="<?php  echo 'User' ?>">Sinh Viên</option>
                    <option value="<?php  echo 'Department' ?>">Phòng Ban</option>
                    <option value="<?php  echo 'Admin' ?>">Admin</option>
                   </select>
        <button type="submit" class="w3-button w3-white" name="btnTimkiem">Tìm kiếm</button>
      </div>
      </form>
      </div>
    </div>
    </div>
</header>

<div class="form-container">
        <form method="post" action="http://localhost/congnghephanmem/Danhsachtk/suadl">
            <div class="form-group">
                <?php 
                if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                    while ($row = mysqli_fetch_array($data['dulieu'])) {
                ?>
                <label>Tên Tài Khoản</label>
                <input type="text" class="form-control" name="txtTentk" value="<?php echo $row['Tentaikhoan'] ?>" readonly>
                <label>Mật Khẩu</label>
                <input type="text" class="form-control" name="txtMk" value="<?php echo $row['Matkhau'] ?>">
                <label>Loại Tài Khoản</label>
                <select type="text" name="txtLoaitk" class="form-control">
                    <option value="">----Chọn Loại Tài Khoản----</option>
                    <option value="User" <?php if($row['Loaitaikhoan'] == 'User') echo 'selected'; ?>>Sinh Viên</option>
                    <option value="Department" <?php if($row['Loaitaikhoan'] == 'Department') echo 'selected'; ?>>Phòng Ban</option>
                    <option value="Admin" <?php if($row['Loaitaikhoan'] == 'Admin') echo 'selected'; ?>>Admin</option>
                </select>
                <?php        
                    }
                }
                ?>
                <br>
                <button type="submit" class="btn btn-dark" name="btnSave">Lưu</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

