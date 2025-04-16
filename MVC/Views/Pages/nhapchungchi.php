<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập chứng chỉ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfT3Q7fPj2GLkA0fZzGFMf5d4hB6hpzz9Y0o0uYy/6E2A4p8niU5KtPvlbD" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #45a049;
            cursor: pointer;
        }
        .form-control {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        select.form-control {
            background-color: #fff;
        }
        .form-group input[type="date"] {
            padding: 10px;
        }
        .form-control::placeholder {
            color: #777;
        }
        .dd2 {
            width: 100%;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .form-actions button {
            width: 48%;
        }

        @media (max-width: 768px) {
            .form-actions {
                flex-direction: column;
            }
            .form-actions button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nhập thông tin chứng chỉ</h2>
    
        <form method="post" action="http://localhost/congnghephanmem/yeucau_chungchi/themmoi" id="searchForm">
       
            <div class="form-group">
                <label for="txtmacc">Mã chứng chỉ</label>
                <input type="text" class="form-control dd2" name="txtmacc" id="txtmacc" placeholder="Nhập mã chứng chỉ" required>

                <label for="txttencc">Tên chứng chỉ</label>
                <input type="text" class="form-control dd2" name="txttencc" id="txttencc" placeholder="Nhập tên chứng chỉ" required>

                <label for="slloaicc">Loại chứng chỉ</label>
                <select name="slloaicc" class="form-control dd2" id="slloaicc">
                    <option value="Ngoại ngữ">Ngoại ngữ</option>
                    <option value="Tin học">Tin học</option>
                </select>

                <label for="txttensv">Tên sinh viên</label>
                <input type="text" class="form-control dd2" name="txttensv" id="txttensv" placeholder="Nhập tên sinh viên" readonly>

                <label for="txtmasv">Mã sinh viên</label>
                <input type="text" class="form-control dd2" name="txtmasv" id="txtmasv" placeholder="Nhập mã sinh viên" required>

                <label for="txtngaycapcc">Ngày cấp chứng chỉ</label>
                <input type="date" class="form-control dd2" name="txtngaycapcc" id="txtngaycapcc" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name="btnyeucau">Thêm chứng chỉ</button>
                
              
                <button type="button" class="btn btn-primary" id="btnTimKiem">Tìm sinh viên</button>
            </div>

        </form>
    </div>  
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGgVSLQb2IVg8FqFCh8k0g3rU5sX6tG7r9eZV+hIIIAv8Zz9" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-cu5l2nmgO1l7lq9Olms3nmOhpH2dR70VwF3rgn3z5TxsRm4SRlrVlfdYce64rZpD" crossorigin="anonymous"></script>

    <script>
       
        document.getElementById('btnTimKiem').addEventListener('click', function() {
            var masv = document.getElementById("txtmasv").value;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://localhost/congnghephanmem/search.php?masv=" + masv, true);
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("txttensv").value = xhttp.responseText; 
                }
            };
            xhttp.send();
        });
    </script>

</body>
</html>
