<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Form Example</title>
    <!-- Liên kết tới Bootstrap CSS nếu bạn sử dụng các lớp của Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS để căn giữa form */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Chiều cao của viewport để căn giữa theo chiều dọc */
        }
        .form-group {
            width: 100%;
            width: 400px; /* Đặt chiều rộng tối đa cho form */
            padding: 40px; /* Thêm khoảng đệm */
            border: 2px solid #ccc; /* Thêm viền nếu muốn */
            border-radius: 20px; /* Bo tròn các góc */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Thêm đổ bóng */
            background-color: #f8f9fa; /* Đặt màu nền */
        }
        .form-group label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        .dd2 {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 8px;
            box-sizing: border-box;
        }
        .btn-primary {
            width: 100%;
            max-width: 200px;
            margin-top: 20px;
            padding: 12px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="form-container" style="background-image: url('http://localhost/congnghephanmem/Public/picture/nen.jpg'); background-size: cover; padding: 20px; border-radius: 10px; height: 1200px;">
        <form method="post" action="http://localhost/congnghephanmem/Bangtotnghiep/suadl" >
            <div class="form-group">
                <?php 
                if(isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0){
                    while($row = mysqli_fetch_array($data['dulieu'])){
                ?>
                <label>Mã bằng</label>
                <input style="width: 280px" type="text" name="txtMabang" value="<?php echo $row['MaBang'] ?>" readonly />
                <label>Tên sinh viên</label>
                <input style="width: 280px" type="text" name="txtTensv" value="<?php echo $row['TenSinhVien'] ?>" />
                <label>Mã sinh viên</label>
                <input style="width: 280px" type="text" name="txtMasv" value="<?php echo $row['MaSinhVien'] ?>" />
                <label>Mã khoa</label>
                <select class="form-control dd2" name="ddlMakhoa">
                    <option value="">---Chọn khoa---</option>
                    <?php
                        if(isset($data['khoa']) && mysqli_num_rows($data['khoa']) > 0){
                            while($r4 = mysqli_fetch_assoc($data['khoa'])){
                                $selected = $r4['MaKhoa'] == $row['MaKhoa'] ? 'selected' : '';
                                echo '<option value="'.$r4['MaKhoa'].'" '.$selected.'>'.$r4['TenKhoa'].'</option>';
                            }
                        }
                    ?>
                </select>
                <label>Loại bằng</label>
                    <select class="form-control dd2" name="ddlLoaibang">
                        <option value="">---Chọn loại bằng---</option>
                        <?php
                            $loaiBang = ['Cử nhân', 'Kỹ sư', 'Thạc sĩ'];
                            foreach ($loaiBang as $lb) {
                            $selected = $lb == $row['LoaiBang'] ? 'selected' : '';
                                echo '<option value="'.$lb.'" '.$selected.'>'.$lb.'</option>';
                            }
                            ?>
                    </select>

                <label>Xếp hạng</label>
                    <select class="form-control dd2" name="ddlXephang">
                        <option value="">---Chọn xếp hạng---</option>
                        <?php
                            $xephang = ['Xuất sắc', 'Giỏi', 'Khá', 'Trung bình'];
                            foreach ($xephang as $xh) {
                            $selected = $xh == $row['XepHang'] ? 'selected' : '';
                                echo '<option value="'.$xh.'" '.$selected.'>'.$xh.'</option>';
                            }
                            ?>
                    </select> 
            
                <label>Ngày cấp</label>
                    <input style="width: 280px" type="date" name="txtNgaycap" value="<?php echo $row['NgayCapBang'] ?>" />
                <?php        
                    }
                }
                ?>
                <br>
                <button style="text-align: center" type="submit" class="btn btn-dark" name="btnSave">Lưu</button>
            </div>
        </form>
    </div>
</body>
</html>
