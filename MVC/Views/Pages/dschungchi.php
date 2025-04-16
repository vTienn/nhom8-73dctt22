<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chứng chỉ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
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
        .search-bar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
  <form method="post" action="http://localhost/congnghephanmem/dschungchidaduyet/timkiem">
<div class="container">
    <h2>Danh sách chứng chỉ</h2>

    <div class="search-bar">
      
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm chứng chỉ hoặc sinh viên..." name="search" id="searchInput">
                <button class="btn btn-outline-success" type="submit" name="btnSearch">
                    Tìm kiếm
                </button>
            </div>
       
    </div>

 
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
                <th>Hành động</th>
                <th>Cấp </th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) >= 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($data['dulieu'])) {
                ?>
                <tr>
                    <td><?php echo (++$i) ?></td>
                    <td><?php echo $row['MaChungChi'] ?></td>
                    <td><?php echo $row['TenChungChi'] ?></td>
                    <td><?php echo $row['LoaiChungChi'] ?></td>
                    <td><?php echo $row['TenSinhVien'] ?></td>
                    <td><?php echo $row['MaSinhVien'] ?></td>
                    <td><?php echo $row['NgayCapChungChi'] ?></td>
                        
                    <td>
              <a href="http://localhost/congnghephanmem/dschungchidaduyet/suacc_v/<?php echo $row['MaChungChi'] ?>" class="btn btn-outline-danger">Sửa</a>
              <a href="http://localhost/congnghephanmem/dschungchidaduyet/xoa/<?php echo $row['MaChungChi'] ?>" class="btn btn-outline-primary">Xóa</a>
             
            </td>
            <td>
            <?php if ($row['LoaiChungChi'] != 'Khác') { ?>
            <a href="http://localhost/congnghephanmem/dschungchidaduyet/inchungchi/<?php echo $row['MaChungChi']; ?>" class="btn btn-outline-primary">In</a>
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
</form>
</body>
</html>
