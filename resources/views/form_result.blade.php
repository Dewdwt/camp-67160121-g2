@extends('template.default')

@section('content')
<div class="container mt-5">
    <h2>ข้อมูลที่ส่งมา</h2>

    <ul class="list-group">
        <li class="list-group-item">ชื่อ: {{ $data->name }}</li>
        <li class="list-group-item">นามสกุล: {{ $data->lname }}</li>
        <li class="list-group-item">วันเกิด: {{ $data->bdate }}</li>
        <li class="list-group-item">เพศ: {{ $data->gender }}</li>
        <li class="list-group-item">ที่อยู่: {{ $data->address }}</li>
        <li class="list-group-item">แนวเพลง: {{ $data->music }}</li>
        <li class="list-group-item">
            สีที่ชอบ:
            <span style="background: {{ $data->favoriteColor }};
                         padding: 5px 20px;
                         display: inline-block;"></span>
        </li>
    </ul>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">กลับ</a>
</div>
@endsection
