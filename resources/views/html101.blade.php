<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <title>Workshop HTML</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f6fa;
            font-family: "Noto Sans Thai", sans-serif;
        }
        .container {
            max-width: 650px;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #2b3a55;
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
            background: #d9534f;
            color: white;
        }
        .reset:hover {
            background: #c64540;
        }
        .save {
            background: #5cb85c;
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
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Workshop #HTML - FORM</h1>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="name" placeholder="ชื่อ">
            </div>

            <div class="mb-3">
                <label for="lname" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="lname" placeholder="นามสกุล">
            </div>

            <div class="mb-3">
                <label for="bdate" class="form-label">วัน/เดือน/ปี</label>
                <input type="date" class="form-control" id="bdate">
            </div>

            <div class="mb-3">
                <label class="form-label">เพศ</label>
                <div class="gender-row">
                    <label><input type="radio" name="gender" value="ชาย" required /> ชาย</label>
                    <label><input type="radio" name="gender" value="หญิง" /> หญิง</label>
                    <label><input type="radio" name="gender" value="อื่นๆ" /> อื่นๆ</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">ที่อยู่</label>
                <textarea id="address" name="address" placeholder="เช่น บ้านเลขที่... ตำบล... อำเภอ... จังหวัด..." required></textarea>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">รูป (ไฟล์ภาพ)</label>
                <input id="photo" name="photo" type="file" accept="image/*" />
            </div>

            <div class="mb-3">
                <label for="favoriteColor" class="form-label">สีที่ชอบ</label>
                <input id="favoriteColor" name="favoriteColor" type="color" value="#0066cc" />
            </div>

            <div class="mb-3">
                <label for="music" class="form-label">แนวเพลงที่ชอบ</label>
                <select id="music" name="music" class="form-select">
                    <option value="ป๊อป">ป๊อป</option>
                    <option value="ร็อค">ร็อค</option>
                    <option value="ฮิปฮอป">ฮิปฮอป</option>
                    <option value="คลาสสิก">คลาสสิก</option>
                    <option value="ลูกทุ่ง">ลูกทุ่ง</option>
                    <option value="แจ๊ส">แจ๊ส</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
            </div>

            <div class="checkbox-row">
                <input id="consent" name="consent" type="checkbox" required />
                <label for="consent">ยินยอมให้จัดเก็บและใช้ข้อมูลส่วนตัวตามนโยบาย (checkbox ยินยอม)</label>
            </div>

            <div class="actions">
                <button type="reset" class="reset">รีเซ็ต</button>
                <button type="button" class="save" id="saveBtn">บันทึก</button>
            </div>

        </form>
    </div>
</body>
</html>