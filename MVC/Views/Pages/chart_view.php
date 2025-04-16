<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <link rel="stylesheet" href="http://localhost/congnghephanmem/Public/css/phuthongke.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="bao">
    <div class="includem">
        <div class="chart-box red-box">
            <h3>Biểu đồ Thống kê số lượng bằng tốt nghiệp theo loại bằng</h3>
            <canvas id="chart1"></canvas>
        </div>
        <div class="chart-box green-box">
            <h3>Biểu đồ Thống kê số lượng Sinh Viên Đã Có Bằng</h3>
            <canvas id="chart2"></canvas>
        </div>
    </div>
    <div class="includem2">
        <div class="chart-box">
            <canvas id="chart3"></canvas>
        </div>
    </div>
</div>


  <script src="public/js/chart.js"></script>
  <script src="public/js/barchart.js"></script>
  <script>
      const dataFromPHP1 = <?php echo json_encode($data['dulieu1']); ?>;
      const dataFromPHP = <?php echo json_encode($data['dulieu']); ?>;

    drawPieChart('chart1', dataFromPHP.a, dataFromPHP.b);
    drawPieChart('chart2', dataFromPHP1.x, dataFromPHP1.y);

      const groupedData = <?php echo json_encode($data['groupedData']); ?>;

    drawGroupedBarChart('chart3',
        groupedData.labels,  // Nhãn nhóm
        groupedData.data1,   // Dữ liệu cột 1
        groupedData.data2,   // Dữ liệu cột 2
        groupedData.data3    // Dữ liệu cột 3
);
  </script>
</body>

</html>
