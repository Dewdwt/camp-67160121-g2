<!DOCTYPE html>
<html>
    <head>
        <!-- กำหนดชุดอักขระและ metadata -->
    <meta charset="UTF-8" />
    <title>Workshop HTML</title>

    <!-- โหลด Bootstrap สำหรับตกแต่ง UI -->
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- โหลดฟอนต์ภาษาไทย -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS สำหรับตกแต่งเพิ่มเติม -->
    <style>
        body {
            background: #cdced0ff; /* พื้นหลังโทนอ่อน */
            font-family: "Noto Sans Thai", sans-serif; /* ใช้ฟอนต์ไทย */
        }
        .container {
            max-width: 650px; /* ความกว้างสูงสุด */
            background: white;
            padding: 30px;
            border-radius: 18px; /* มุมโค้ง */
            box-shadow: 0 6px 20px rgba(0,0,0,0.1); /* เงาการ์ด */
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #2b3a55; /* โทนสีน้ำเงินกรม */
        }
        textarea {
            width: 100%;
            height: 110px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
        }
        .reset {
            background: #d9534f; /* ปุ่มรีเซ็ตสีแดง */
            color: white;
        }
        .reset:hover {
            background: #c64540;
        }
        .save {
            background: #5cb85c; /* ปุ่มบันทึกสีเขียว */
            color: white;
        }
        .save:hover {
            background: #4cae4c;
        }
        .checkbox-row {
            margin-top: 15px;
        }
        select, input[type="color"] {
            margin-top: 5px;
        }
        .form-label {
            font-weight: 600;
        }
        .gender-row label {
            margin-right: 15px; /* เว้นระยะตัวเลือกเพศ */
        }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Default Template</h1>
            @yield('content')
        </div>
        @stack('scripts')

        
    </body>
</html>