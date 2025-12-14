@extends('template.default')

@section('content')
<div class="container mt-5">
    <h1>Workshop #HTML - FORM</h1>

    <!-- ฟอร์มหลัก -->
    <form class="row g-3 needs-validation" novalidate>

        <!-- ชื่อ -->
        <div class="col-md-6">
            <label for="name" class="form-label">ชื่อ</label>
            <input type="text" class="form-control" id="name" placeholder="ชื่อ" required>
            <div class="invalid-feedback">
                กรุณากรอกชื่อ
            </div>
        </div>

        <!-- นามสกุล -->
        <div class="col-md-6">
            <label for="lname" class="form-label">นามสกุล</label>
            <input type="text" class="form-control" id="lname" placeholder="นามสกุล" required>
            <div class="invalid-feedback">
                กรุณากรอกนามสกุล
            </div>
        </div>

        <!-- วันเกิด -->
        <div class="col-md-6">
            <label for="bdate" class="form-label">วัน/เดือน/ปีเกิด</label>
            <input type="date" class="form-control" id="bdate" required>
            <div class="invalid-feedback">
                กรุณาเลือกวันเกิด
            </div>
        </div>

        <!-- เพศ -->
        <div class="col-md-6">
            <label class="form-label d-block">เพศ</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="ชาย" required>
                <label class="form-check-label" for="male">ชาย</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="หญิง">
                <label class="form-check-label" for="female">หญิง</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="อื่นๆ">
                <label class="form-check-label" for="other">อื่นๆ</label>
            </div>
            <div class="invalid-feedback d-block">
                กรุณาเลือกเพศ
            </div>
        </div>

        <!-- ที่อยู่ -->
        <div class="col-12">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" rows="3" required></textarea>
            <div class="invalid-feedback">
                กรุณากรอกที่อยู่
            </div>
        </div>

        <!-- อัปโหลดรูป -->
        <div class="col-md-6">
            <label for="photo" class="form-label">รูป (ไฟล์ภาพ)</label>
            <input class="form-control" type="file" id="photo" accept="image/*" required>
            <div class="invalid-feedback">
                กรุณาอัปโหลดรูปภาพ
            </div>
        </div>

        <!-- สีที่ชอบ -->
        <div class="col-md-6">
            <label for="favoriteColor" class="form-label">สีที่ชอบ</label>
            <input class="form-control form-control-color" type="color" id="favoriteColor" value="#0066cc">
        </div>

        <!-- แนวเพลงที่ชอบ -->
        <div class="col-md-6">
            <label for="music" class="form-label">แนวเพลงที่ชอบ</label>
            <select class="form-select" id="music" required>
                <option selected disabled value="">เลือก...</option>
                <option>ป๊อป</option>
                <option>ร็อค</option>
                <option>ฮิปฮอป</option>
                <option>คลาสสิก</option>
                <option>ลูกทุ่ง</option>
                <option>แจ๊ส</option>
                <option>อื่นๆ</option>
            </select>
            <div class="invalid-feedback">
                กรุณาเลือกแนวเพลง
            </div>
        </div>

        <!-- checkbox ยินยอม -->
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="consent" required>
                <label class="form-check-label" for="consent">
                    ยินยอมให้จัดเก็บและใช้ข้อมูลส่วนตัว
                </label>
                <div class="invalid-feedback">
                    ต้องยินยอมก่อนส่งข้อมูล
                </div>
            </div>
        </div>

        <!-- ปุ่ม -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit">บันทึก</button>
            <button class="btn btn-secondary" type="reset">รีเซ็ต</button>
        </div>

    </form>
</div>

<!-- Bootstrap Validation Script -->
<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
@endsection
