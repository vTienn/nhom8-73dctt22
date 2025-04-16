 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cnpm"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy mã sinh viên từ yêu cầu GET
if (isset($_GET['masv'])) {
    $masv = $_GET['masv'];

    // Truy vấn cơ sở dữ liệu để tìm kiếm tên sinh viên
    $sql = "SELECT HoTen FROM sinhvien WHERE MaSinhVien = ?";
    $stmt = $conn->prepare($sql);
    
    // Kiểm tra xem câu lệnh SQL có thành công không
    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . $conn->error);  // Hiển thị lỗi nếu câu lệnh không được chuẩn bị
    }

    $stmt->bind_param("s", $masv); // "s" là kiểu dữ liệu String

    if (!$stmt->execute()) {
        die('Lỗi khi thực thi câu lệnh: ' . $stmt->error);  // Kiểm tra lỗi khi execute
    }

    $stmt->bind_result($tensv);

    // Kiểm tra nếu có kết quả
    if ($stmt->fetch()) {
        echo $tensv;  // Trả về tên sinh viên
    } else {
        echo "Không tìm thấy sinh viên với mã " . $masv; // Nếu không tìm thấy
    }

    $stmt->close();
}
$conn->close();
?> 
