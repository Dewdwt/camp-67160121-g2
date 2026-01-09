{{-- resources/views/pokedex/create.blade.php --}}
@extends('template.default')

@section('page-title', 'เพิ่มโปเกมอนใหม่')
@section('container-class', 'container-large')

@section('content')
<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>เพิ่มโปเกมอนใหม่</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pokedex.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">ชื่อโปเกมอน *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">ประเภท *</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                        <option value="">เลือกประเภท</option>
                        <option value="Fire" {{ old('type') == 'Fire' ? 'selected' : '' }}>Fire</option>
                        <option value="Water" {{ old('type') == 'Water' ? 'selected' : '' }}>Water</option>
                        <option value="Grass" {{ old('type') == 'Grass' ? 'selected' : '' }}>Grass</option>
                        <option value="Electric" {{ old('type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                        <option value="Bug" {{ old('type') == 'Bug' ? 'selected' : '' }}>Bug</option>
                        <option value="Normal" {{ old('type') == 'Normal' ? 'selected' : '' }}>Normal</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">สายพันธุ์ *</label>
                <input type="text" class="form-control @error('species') is-invalid @enderror"
                       id="species" name="species" value="{{ old('species') }}" required>
                @error('species')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="height" class="form-label">ความสูง (เมตร) *</label>
                    <input type="number" step="0.01" min="0" class="form-control @error('height') is-invalid @enderror"
                           id="height" name="height" value="{{ old('height') }}" required>
                    @error('height')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="weight" class="form-label">น้ำหนัก (กก.) *</label>
                    <input type="number" step="0.1" min="0" class="form-control @error('weight') is-invalid @enderror"
                           id="weight" name="weight" value="{{ old('weight') }}" required>
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="hp" class="form-label">HP *</label>
                    <input type="number" min="1" max="500" class="form-control @error('hp') is-invalid @enderror"
                           id="hp" name="hp" value="{{ old('hp') }}" required>
                    <div class="stats-bar mt-2">
                        <div class="stats-fill" id="hpBar"></div>
                    </div>
                    @error('hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="attack" class="form-label">พลังโจมตี *</label>
                    <input type="number" min="1" max="300" class="form-control @error('attack') is-invalid @enderror"
                           id="attack" name="attack" value="{{ old('attack') }}" required>
                    @error('attack')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="defense" class="form-label">พลังป้องกัน *</label>
                    <input type="number" min="1" max="300" class="form-control @error('defense') is-invalid @enderror"
                           id="defense" name="defense" value="{{ old('defense') }}" required>
                    @error('defense')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">URL รูปภาพ</label>
                <input type="url" class="form-control @error('image_url') is-invalid @enderror"
                       id="image_url" name="image_url" value="{{ old('image_url') }}"
                       placeholder="https://example.com/pokemon.png">
                <div class="form-text">หากไม่กรอกจะใช้รูปภาพเริ่มต้นแบบสุ่ม</div>
                @error('image_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="fas fa-save me-2"></i>บันทึกข้อมูล
                </button>
                <a href="{{ route('pokedex.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>ยกเลิก
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hpInput = document.getElementById('hp');
        const hpBar = document.getElementById('hpBar');

        function updateHpBar() {
            const hpValue = parseInt(hpInput.value) || 0;
            const percent = Math.min((hpValue / 500) * 100, 100);
            hpBar.style.width = percent + '%';

            // เปลี่ยนสีตามค่า HP
            if (hpValue < 50) {
                hpBar.style.backgroundColor = '#f44336';
            } else if (hpValue < 100) {
                hpBar.style.backgroundColor = '#ff9800';
            } else {
                hpBar.style.backgroundColor = '#4caf50';
            }
        }

        // อัปเดตครั้งแรก
        updateHpBar();

        // อัปเดตเมื่อค่ามีการเปลี่ยนแปลง
        hpInput.addEventListener('input', updateHpBar);
    });
</script>
@endpush
