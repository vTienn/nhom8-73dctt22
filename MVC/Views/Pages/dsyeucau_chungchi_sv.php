<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chứng chỉ</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 30px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-outline-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-outline-primary:hover {
            background-color: #45a049;
            color: white;
        }
        .btn-outline-danger {
            background-color: #e74a3b;
            color: white;
        }
        .btn-outline-danger:hover {
            background-color: #d93c2c;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f1f1;
        }
        .table th {
            background-color: #4CAF50;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Quản lý chứng chỉ1</h2>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã chứng chỉ</th>
                    <th>Tên chứng chỉ</th>
                    <th>Loại chứng chỉ</th>
                    <th>Tên sinh viên</th>
                    <th>Mã sinh viên</th>
                    <th>Ngày cấp chứng chỉ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                $i = 0;
                while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                   
                    $isProcessed = false; 

                 
                    if ($row['Trangthai'] == 'Đã duyệt' ) {
                        $isProcessed = true; 
                    }
                    ?>
                    <tr>
                        <td><?php echo (++$i) ?></td>
                        <td><?php echo $row['MaChungChi'] ?></td>
                        <td><?php echo $row['TenChungChi'] ?></td>
                        <td><?php echo $row['LoaiChungChi'] ?></td>
                        <td><?php echo $row['TenSinhVien'] ?></td>
                        <td><?php echo $row['MaSinhVien'] ?></td>
                        <td><?php echo $row['NgayCapChungChi'] ?></td>
                        <td><?php echo $row['Trangthai'] ?></td>
                        <td style="display: flex; " >
                            <?php if (!$isProcessed) { ?>
                                <form style="margin-right:5px;"method="POST" action="http://localhost/congnghephanmem/yeucau_chungchi/suacc_v/<?php echo $row['MaChungChi'] ?>">
                                    <button type="submit" name="xacnhan" class="btn btn-outline-primary">Sửa</button>
                                </form>

                             
                                <form method="POST" action="http://localhost/congnghephanmem/yeucau_chungchi/xoa/<?php echo $row['MaChungChi'] ?>">        
                                    <button  onclick="return confirm('Bạn có thực sự muốn xóa?')" type="submit" name="huybo" class="btn btn-outline-danger">Xóa</button>
                                </form>
                               
                            <?php } else { ?>
                                <span>Đã xử lý </span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<?php

if (isset($_POST['xacnhan']) && isset($_POST['macc'])) {
    $macc = $_POST['macc'];

    
    $con = mysqli_connect("localhost", "root", "", "cnpm");

   
    $query = "SELECT * FROM pheduyetchungchi WHERE MaChungChi = '$macc'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      
        $row = mysqli_fetch_assoc($result);

       
        $insertQuery = "INSERT INTO chungchi (MaChungChi, TenChungChi, LoaiChungChi, TenSinhVien, MaSinhVien, NgayCapChungChi) 
                        VALUES ('" . $row['MaChungChi'] . "', '" . $row['TenChungChi'] . "', '" . $row['LoaiChungChi'] . "', 
                                '" . $row['TenSinhVien'] . "', '" . $row['MaSinhVien'] . "', '" . $row['NgayCapChungChi'] . "')";

        if (mysqli_query($con, $insertQuery)) {
            
              $updateQuery = "UPDATE pheduyetchungchi SET Trangthai = 'Đã duyệt' WHERE MaChungChi = '$macc'";
            mysqli_query($con, $updateQuery);

          
            echo "<script>alert('Chứng chỉ đã được duyệt và thêm vào bảng chungchi.'); window.location.href='';</script>";
        } else {
            echo "Lỗi khi thêm vào bảng chungchi: " . mysqli_error($con);
        }
    } else {
        echo "Không tìm thấy chứng chỉ với mã: " . $macc;
    }

    mysqli_close($con); 
}

if (isset($_POST['huybo']) && isset($_POST['macc'])) {
    $macc = $_POST['macc'];
    
    
    $con = mysqli_connect("localhost", "root", "", "cnpm");

 
    $query = "UPDATE pheduyetchungchi SET Trangthai = 'Từ chối' WHERE MaChungChi = '$macc'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Chứng chỉ đã bị hủy bỏ.'); window.location.href='';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($con);
    }
}
?>


</body>
</html>
