@extends('template.default')

@section('page-title', 'ข้อมูล ' . $pokedex->name)
@section('container-class', 'container-large')

@section('content')
<div class="card border-0 shadow">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h5 class="mb-0">
            <i class="fas fa-info-circle me-2"></i>ข้อมูล {{ $pokedex->name }}
        </h5>
        <div>
            <a href="{{ route('pokedex.edit', $pokedex) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit me-1"></i>แก้ไข
            </a>
            <form action="{{ route('pokedex.destroy', $pokedex) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('แน่ใจว่าต้องการลบ {{ $pokedex->name }}?')">
                    <i class="fas fa-trash me-1"></i>ลบ
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5 text-center">
                <div class="pokemon-img mb-3">
                    <img src="{{ $pokedex->image_url ?? 'https://via.placeholder.com/300x300?text=No+Image' }}"
                         alt="{{ $pokedex->name }}" class="img-fluid" style="max-height: 250px;">
                </div>
                <h2 class="fw-bold">{{ $pokedex->name }}</h2>
                <span class="type-badge fs-5"
                      style="background-color: {{ $pokedex->type == 'Fire' ? '#f08030' : ($pokedex->type == 'Water' ? '#6890f0' : ($pokedex->type == 'Grass' ? '#78c850' : ($pokedex->type == 'Electric' ? '#f8d030' : '#a8a878'))) }}; color: white;">
                    {{ $pokedex->type }}
                </span>
            </div>

            <div class="col-md-7">
                <h5 class="border-bottom pb-2 mb-3">ข้อมูลทั่วไป</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>สายพันธุ์:</strong>
                        <p class="fs-5">{{ $pokedex->species }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>ความสูง:</strong>
                        <p class="fs-5">{{ $pokedex->height }} เมตร</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>น้ำหนัก:</strong>
                        <p class="fs-5">{{ $pokedex->weight }} กก.</p>
                    </div>
                    <div class="col-md-6">
                        <strong>วันที่เพิ่ม:</strong>
                        <p class="fs-5">{{ $pokedex->created_at ? $pokedex->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>
                </div>

                <h5 class="border-bottom pb-2 mb-3">ค่าสถานะ</h5>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>HP:</strong>
                        <span>{{ $pokedex->hp }}</span>
                    </div>
                    <div class="stats-bar mt-1">
                        <div class="stats-fill"
                             style="width: {{ ($pokedex->hp / 500) * 100 }}%;
                                    background-color: {{ $pokedex->hp < 50 ? '#f44336' : ($pokedex->hp < 100 ? '#ff9800' : '#4caf50') }};">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>พลังโจมตี:</strong>
                        <span>{{ $pokedex->attack }}</span>
                    </div>
                    <div class="stats-bar mt-1">
                        <div class="stats-fill"
                             style="width: {{ ($pokedex->attack / 300) * 100 }}%;
                                    background-color: #f08030;">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>พลังป้องกัน:</strong>
                        <span>{{ $pokedex->defense }}</span>
                    </div>
                    <div class="stats-bar mt-1">
                        <div class="stats-fill"
                             style="width: {{ ($pokedex->defense / 300) * 100 }}%;
                                    background-color: #6890f0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('pokedex.index') }}" class="btn btn-pokemon-primary">
                <i class="fas fa-arrow-left me-2"></i>กลับไปหน้ารายการ
            </a>
        </div>
    </div>
</div>

<style>
.pokemon-img {
    height: 250px;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border-radius: 10px;
}
.type-badge {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 600;
}
.stats-bar {
    height: 10px;
    border-radius: 5px;
    background-color: #e0e0e0;
    margin-top: 5px;
    overflow: hidden;
}
.stats-fill {
    height: 100%;
    border-radius: 5px;
}
.btn-pokemon-primary {
    background: linear-gradient(135deg, #ef5350, #c62828);
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-pokemon-primary:hover {
    background: linear-gradient(135deg, #c62828, #ef5350);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(239, 83, 80, 0.4);
}
</style>
@endsection
