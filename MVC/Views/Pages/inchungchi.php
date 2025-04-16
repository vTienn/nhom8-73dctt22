<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chứng Chỉ</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .certificate-container {
            width: 70%;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #FFA500; 
            border-radius: 8px;
            position: relative;
            text-align: center; 
        }
        .logo {
            position: absolute;
            top: 20px; 
            left: 50%; 
            transform: translateX(-50%);
            width: 150px;
            height: 70px;
        }
        .header {
            margin-top: 80px;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 40px;
            font-weight: bold;
            color: #FFA500; /* Màu cam cho tiêu đề */
            margin: 0;
        }
        .header h2 {
            font-size: 24px;
            color: #FFA500;
            margin-top: 10px;
        }
        .content {
            margin: 30px 0;
            padding: 20px;
            border: 1px dashed #FFA500; 
            border-radius: 8px;
        }
        .content p {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
        .footer p {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        .footer .signature {
            margin-top: 30px;
            font-size: 20px;
            font-weight: normal;
            color: #FFA500;
        }
        .footer .date {
            font-size: 16px;
            margin-top: 10px;
        }
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
            }
            .certificate-container {
                width: 100%;
                padding: 20px;
                border: none;
                box-shadow: none;
            }
            .content {
                margin: 20px 0;
                padding: 15px;
            }
            .footer .signature,
            .footer .date {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
  
        <img src="http://localhost/congnghephanmem/Public/picture/utt.png" alt="Logo Trường" class="logo">

        <div class="header">
            <h1>Trường Công Nghệ Giao Thông Vận Tải</h1>
            <h2>Chứng Chỉ Hoàn Thành Khóa Học</h2>
        </div>

        <?php if (isset($data['chungchi']) && !empty($data['chungchi'])): ?>
            <?php foreach ($data['chungchi'] as $item): ?>
                <div class="content">
                    <p><strong>Mã Sinh Viên:</strong> <?php echo $item['MaSinhVien']; ?></p>
                    <p><strong>Tên Sinh Viên:</strong> <?php echo $item['TenSinhVien']; ?></p>
                    <p><strong>Mã Chứng Chỉ:</strong> <?php echo $item['MaChungChi']; ?></p>
                    <p><strong>Tên Chứng Chỉ:</strong> <?php echo $item['TenChungChi']; ?></p>
                    <p><strong>Loại Chứng Chỉ:</strong> <?php echo $item['LoaiChungChi']; ?></p>
                    <p><strong>Ngày Cấp:</strong> <?php echo date("d/m/Y", strtotime($item['NgayCapChungChi'])); ?></p>
                    <p><strong>Được cấp chứng chỉ sau khi hoàn thành khóa học tại Trường Công Nghệ Giao Thông Vận Tải</strong></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chứng chỉ không tìm thấy.</p>
        <?php endif; ?>

        <div class="footer">
            <p>Ngày cấp: <?php echo date("d/m/Y"); ?></p>
            <div class="signature">Giám đốc Trường</div>
            <div class="date">Ngày: <?php echo date("d/m/Y"); ?></div>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
