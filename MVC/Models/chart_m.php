<?php
class chart_m extends connectDB {

    public function sinhvienchuacapbang() {
        $sql = "SELECT 
        CASE 
        WHEN b.MaSinhVien IS NOT NULL THEN 'Sinh viên có bằng'
        ELSE 'Sinh viên không có bằng'
        END AS sv,
        COUNT(*) AS SoLuong
        FROM sinhvien sv
        LEFT JOIN bangtotnghiep b ON sv.MaSinhVien = b.MaSinhVien
        GROUP BY sv;
        ";
        
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($this->con)); 
        }
    
        $data1 = [
            "x" => [],
            "y" => []
        ];
    
        while ($row = $result->fetch_assoc()) {
            $data1["x"][] = $row["sv"];
            $data1["y"][] = $row["SoLuong"];
        }
    
        return $data1;
    }
    
    

    public function loaibang() {

        $sql = "SELECT 
        LoaiBang AS LoaiBang, 
        COUNT(*) AS SoLuong
        FROM bangtotnghiep
        GROUP BY LoaiBang;";
        $result = mysqli_query($this->con, $sql);

       
        $data = [
            "a" => [],
            "b" => []
        ];

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $data["a"][] = $row["LoaiBang"];
                $data["b"][] = $row["SoLuong"];
            }
        }
        
        return $data;
    }

    public function getGroupedBarData() {
        $sql = "SELECT 
                    YEAR(NgayCapBang) AS Nam,
                    SUM(CASE WHEN LoaiBang = 'Thạc sĩ' THEN 1 ELSE 0 END) AS SoLuongThacSi,
                    SUM(CASE WHEN LoaiBang = 'Kỹ sư' THEN 1 ELSE 0 END) AS SoLuongKySu,
                    SUM(CASE WHEN LoaiBang = 'Cử nhân' THEN 1 ELSE 0 END) AS SoLuongCuNhan
                FROM bangtotnghiep
                GROUP BY YEAR(NgayCapBang)
                ORDER BY Nam;"; 
        $result = mysqli_query($this->con, $sql);
    
        $data = [
            "labels" => [],
            "data1" => [],
            "data2" => [],
            "data3" => [],
        ];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data["labels"][] = $row["Nam"];
                $data["data1"][] = $row["SoLuongCuNhan"];
                $data["data2"][] = $row["SoLuongKySu"];
                $data["data3"][] = $row["SoLuongThacSi"];
            }
        }
    
        return $data;
    }
    
}
?>
