@extends('template.default')

@section('content')
<div class="container mt-5">
    <h1>Workshop #HTML - FORM</h1>

    <!-- เพิ่มส่วนเล็กๆ สำหรับ Pokedex -->
    <div class="text-center mb-4">
        <a href="{{ route('pokedex.index') }}" class="btn btn-sm btn-outline-danger mb-2"
           style="border-radius: 20px; padding: 8px 20px;">
            <i class="fas fa-dragon me-1"></i> ไปยังระบบ Pokedex
        </a>
        <p class="text-muted small">ระบบจัดการข้อมูลโปเกมอน (CRUD System)</p>
    </div>

    <!-- ฟอร์มหลัก (โค้ดเดิมทั้งหมด) -->
    <form class="row g-3 needs-validation"
          action="{{ route('form.result') }}"
          method="POST"
          enctype="multipart/form-data"
          novalidate>
        @csrf

        <!-- ชื่อ -->
        <div class="col-md-6">
            <label for="name" class="form-label">ชื่อ</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback">กรุณากรอกชื่อ</div>
        </div>

        <!-- นามสกุล -->
        <div class="col-md-6">
            <label for="lname" class="form-label">นามสกุล</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
        </div>

        <!-- วันเกิด -->
        <div class="col-md-6">
            <label for="bdate" class="form-label">วัน/เดือน/ปีเกิด</label>
            <input type="date" class="form-control" id="bdate" name="bdate" required>
            <div class="invalid-feedback">กรุณาเลือกวันเกิด</div>
        </div>

        <!-- เพศ -->
        <div class="col-md-6">
            <label class="form-label d-block">เพศ</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="ชาย" required>
                <label class="form-check-label">ชาย</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="หญิง">
                <label class="form-check-label">หญิง</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="อื่นๆ">
                <label class="form-check-label">อื่นๆ</label>
            </div>

            <div class="invalid-feedback d-block">กรุณาเลือกเพศ</div>
        </div>

        <!-- ที่อยู่ -->
        <div class="col-12">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            <div class="invalid-feedback">กรุณากรอกที่อยู่</div>
        </div>

        <!-- อัปโหลดรูป -->
        <div class="col-md-6">
            <label for="photo" class="form-label">รูปภาพ</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
            <div class="invalid-feedback">กรุณาอัปโหลดรูปภาพ</div>
        </div>

        <!-- สีที่ชอบ -->
        <div class="col-md-6">
            <label for="favoriteColor" class="form-label">สีที่ชอบ</label>
            <input type="color" class="form-control form-control-color"
                   id="favoriteColor" name="favoriteColor" value="#0066cc">
        </div>

        <!-- แนวเพลง -->
        <div class="col-md-6">
            <label for="music" class="form-label">แนวเพลงที่ชอบ</label>
            <select class="form-select" id="music" name="music" required>
                <option value="" disabled selected>เลือก...</option>
                <option>ป๊อป</option>
                <option>ร็อค</option>
                <option>ฮิปฮอป</option>
                <option>คลาสสิก</option>
                <option>ลูกทุ่ง</option>
                <option>แจ๊ส</option>
                <option>อื่นๆ</option>
            </select>
            <div class="invalid-feedback">กรุณาเลือกแนวเพลง</div>
        </div>

        <!-- ยินยอม -->
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                <label class="form-check-label" for="consent">
                    ยินยอมให้จัดเก็บและใช้ข้อมูลส่วนตัว
                </label>
                <div class="invalid-feedback">ต้องยินยอมก่อนส่งข้อมูล</div>
            </div>
        </div>

        <!-- ปุ่ม -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit">บันทึก</button>
            <button class="btn btn-secondary" type="reset">รีเซ็ต</button>
        </div>
    </form>

    <!-- เพิ่มลิงก์ Pokedex ที่ด้านล่างแบบไม่รบกวนฟอร์มเดิม -->
    <div class="mt-5 pt-4 border-top text-center">
        <h5 class="text-muted mb-3">ระบบอื่นๆ ใน Workshop</h5>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('pokedex.index') }}" class="btn btn-sm btn-danger">
                <i class="fas fa-dragon me-1"></i> Pokedex System
            </a>
            <a href="/mycontroller" class="btn btn-sm btn-primary">
                <i class="fas fa-cogs me-1"></i> MyController
            </a>
            <a href="/flight" class="btn btn-sm btn-success">
                <i class="fas fa-plane me-1"></i> Flight
            </a>
        </div>
        <p class="text-muted small mt-2">Pokedex System: ระบบจัดการข้อมูลโปเกมอนแบบครบ CRUD</p>
    </div>
</div>

<!-- Bootstrap Validation Script (โค้ดเดิม) -->
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

<!-- เพิ่มสไตล์เล็กน้อยสำหรับปุ่ม Pokedex -->
<style>
.btn-outline-danger {
    border-color: #ef5350;
    color: #ef5350;
}
.btn-outline-danger:hover {
    background-color: #ef5350;
    color: white;
}
</style>
@endsection
