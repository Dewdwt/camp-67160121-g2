@extends('template.default')

@section('content')
<form action="" method="post">
    @csrf

    <div class="mb-3">
        <label for="num" class="form-label">ป้อนข้อมูลเลข</label>
        <input type="number" name="num" id="num" class="form-control">
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            ส่งข้อมูล
        </button>
    </div>
</form>
@endsection
