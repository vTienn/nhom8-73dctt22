<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa chứng chỉ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
  
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 25px;
        }

   
        .form-control, .form-select {
            font-size: 16px;
            height: 40px;
            border-radius: 8px;
            padding: 10px;
            box-shadow: none;
            color: #333;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 5px rgba(72, 187, 120, 0.8);
            border-color: #4CAF50;
        }

  
        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

      
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

       
        .select-input {
            color: #555;
            font-size: 14px;
        }

    
        .hidden {
            display: none;
        }

   
        .form-group label {
            font-weight: 600;
        }
    </style>
</head>
<body>


<div class="container">

    <div class="form-container">
        <h2>Chỉnh sửa chứng chỉ</h2>
     
        <form method="post" action="http://localhost/congnghephanmem/yeucau_chungchi/suacc">
            <?php 
       
            if (isset($data['dulieu']) && mysqli_num_rows($data['dulieu']) > 0) {
                while ($row = mysqli_fetch_array($data['dulieu'])) {
            ?>
            
       
            <div class="form-group">
                <label for="txtmacc">Mã chứng chỉ</label>
                <input type="text" class="form-control" name="txtmacc" required value="<?php echo $row['MaChungChi'] ?>" readonly>
            </div>

       
            <div class="form-group">
                <label for="txttencc">Tên chứng chỉ</label>
                <input type="text" class="form-control" id="txttencc" required name="txttencc" required value="<?php echo $row['TenChungChi'] ?>">
            </div>

     
            <div class="form-group">
                <label for="slloaicc">Loại chứng chỉ</label>
                <select name="slloaicc" class="form-select select-input" id="slloaicc">
                    <option value="Ngoại ngữ" <?php echo ($row['LoaiChungChi'] == 'Ngoại ngữ') ? 'selected' : ''; ?>>Ngoại ngữ</option>
                    <option value="Tin học" <?php echo ($row['LoaiChungChi'] == 'Tin học') ? 'selected' : ''; ?>>Tin học</option>
                </select>
            </div>

   
            <div class="form-group">
                <label for="txttensv">Tên sinh viên</label>
                <input type="text" class="form-control" id="txttensv" required name="txttensv" value="<?php echo $row['TenSinhVien'] ?>">
            </div>

       
            <div class="form-group">
                <label for="txtmasv">Mã sinh viên</label>
                <input type="text" class="form-control" name="txtmasv" required value="<?php echo $row['MaSinhVien'] ?>" readonly>
            </div>

     
            <div class="form-group">
                <label for="txtngaycapcc">Ngày cấp chứng chỉ</label>
                <input type="date" class="form-control" id="txtngaycapcc" required name="txtngaycapcc" value="<?php echo $row['NgayCapChungChi'] ?>">
            </div>

    
            <div class="form-group">
                <button type="submit" name="suacc" class="btn-submit">Sửa</button>
            </div>

            <?php        
                }
            } else {
                echo "<p>Không có dữ liệu để chỉnh sửa.</p>";
            }
            ?>   
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
