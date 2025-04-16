<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bằng Tốt Nghiệp</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
      }
      .certificate {
        width: 800px;
        height: 600px;
        border: 10px solid #d1a546;
        padding: 20px;
        margin: 50px auto;
        background-color: #fff;
        position: relative;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
      .certificate h1,
      .certificate h2 {
        text-align: center;
        color: #d35400;
        margin: 0;
      }
      .certificate h1 {
        font-size: 24px;
        margin-bottom: 10px;
      }
      .certificate h2 {
        font-size: 18px;
      }
      .certificate img {
        display: block;
        margin: 20px auto;
        width: 30%;
        border-radius: 10px;
      }
      .certificate .info {
        margin: 20px 0;
        text-align: left;
      }
      .certificate .info p {
        margin: 10px 0;
        font-size: 16px;
      }
      .signature {
        position: absolute;
        bottom: 100px;
        right: 30px;
        text-align: center;
      }
      .signature span {
        display: block;
      }
      
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const today = new Date();
            const formattedDate = `Hà Nội, ngày ${today.getDate()} tháng ${today.getMonth() + 1} năm ${today.getFullYear()}`;
            document.getElementById("current-date").innerText = formattedDate;
        });
    </script>
  </head>
  <body>
    <div class="certificate">
      <h1>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h1>
      <h2>Độc lập - Tự do - Hạnh phúc</h2>
      <br />
      <h2>BẰNG TỐT NGHIỆP</h2>

      <img src="http://localhost/congnghephanmem/Public/picture/utt.png" alt="Logo" />

      <?php if (isset($data['dulieu']) && !empty($data['dulieu'])): ?>
            <?php foreach ($data['dulieu'] as $item): ?>
                    <div class="info">
                        <p><strong>Mã sinh viên:</strong> <?php echo $item['MaSinhVien']; ?></p>
                        <p><strong>Họ và tên:</strong> <?php echo $item['TenSinhVien']; ?></p>
                        <p><strong>Khoa:</strong> <?php echo isset($data['tenkhoa']) ? $data['tenkhoa'] : 'Không xác định'; ?></p>
                        <p><strong>Loại bằng:</strong> <?php echo $item['LoaiBang']; ?></p>
                        <p><strong>Xếp hạng:</strong> <?php echo $item['XepHang']; ?></p>
                        <p><strong>Ngày cấp:</strong> <?php echo $item['NgayCapBang']; ?></p>
                    </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không tìm thấy.</p>
        <?php endif; ?>

      <div class="signature">
      <span id="current-date"></span>
        <span>KT. GIÁM ĐỐC SỞ GIÁO DỤC VÀ ĐÀO TẠO</span>
        <span>(Ký, ghi rõ họ tên, đóng dấu)</span>
      </div>

    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
  </body>
</html>
