@extends('template.default')

@section('page-title', 'ระบบจัดการ Pokedex')
@section('container-class', 'container-large')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="page-title">
            <i class="fas fa-list me-2"></i>รายการโปเกมอนทั้งหมด
        </h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('pokedex.create') }}" class="btn btn-pokemon-primary">
            <i class="fas fa-plus-circle me-2"></i>เพิ่มโปเกมอนใหม่
        </a>
    </div>
</div>

<div class="row">
    @if($pokemons->count() > 0)
        @foreach($pokemons as $pokemon)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card pokemon-card">
                <div class="pokemon-img">
                    <img src="{{ $pokemon->image_url ?? 'https://via.placeholder.com/200x200?text=No+Image' }}"
                         alt="{{ $pokemon->name }}" class="img-fluid">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $pokemon->name }}</h5>
                    <span class="type-badge"
                          style="background-color: {{ $pokemon->type == 'Fire' ? '#f08030' : ($pokemon->type == 'Water' ? '#6890f0' : ($pokemon->type == 'Grass' ? '#78c850' : ($pokemon->type == 'Electric' ? '#f8d030' : '#a8a878'))) }}; color: white;">
                        {{ $pokemon->type }}
                    </span>

                    <div class="row mt-3">
                        <div class="col-6">
                            <small class="text-muted">สายพันธุ์</small>
                            <p class="mb-1 fw-bold">{{ $pokemon->species }}</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">น้ำหนัก</small>
                            <p class="mb-1 fw-bold">{{ $pokemon->weight }} กก.</p>
                        </div>
                    </div>

                    <div class="mt-2">
                        <small class="text-muted">HP</small>
                        <div class="stats-bar">
                            <div class="stats-fill"
                                 style="width: {{ ($pokemon->hp / 500) * 100 }}%;
                                        background-color: {{ $pokemon->hp < 50 ? '#f44336' : ($pokemon->hp < 100 ? '#ff9800' : '#4caf50') }};">
                            </div>
                        </div>
                        <span class="fw-bold">{{ $pokemon->hp }}</span>
                    </div>

                    <div class="action-buttons mt-3 d-flex gap-2">
                        <a href="{{ route('pokedex.show', $pokemon) }}" class="btn btn-outline-primary btn-sm flex-fill">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pokedex.edit', $pokemon) }}" class="btn btn-outline-warning btn-sm flex-fill">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pokedex.destroy', $pokemon) }}" method="POST" class="flex-fill">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100"
                                    onclick="return confirm('แน่ใจว่าต้องการลบ {{ $pokemon->name }}?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pokemons->links() }}
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle fa-3x mb-3"></i>
                <h4>ยังไม่มีข้อมูลโปเกมอน</h4>
                <p>เริ่มต้นโดยการเพิ่มโปเกมอนใหม่</p>
                <a href="{{ route('pokedex.create') }}" class="btn btn-pokemon-primary">
                    <i class="fas fa-plus-circle me-2"></i>เพิ่มโปเกมอนใหม่
                </a>
            </div>
        </div>
    @endif
</div>

<style>
.pokemon-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    height: 100%;
}
.pokemon-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
.pokemon-img {
    height: 200px;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.pokemon-img img {
    max-height: 160px;
    max-width: 100%;
    transition: transform 0.3s;
}
.pokemon-card:hover .pokemon-img img {
    transform: scale(1.05);
}
.type-badge {
    display: inline-block;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}
.stats-bar {
    height: 8px;
    border-radius: 4px;
    margin-top: 5px;
    background-color: #e0e0e0;
    overflow: hidden;
}
.stats-fill {
    height: 100%;
    border-radius: 4px;
}
.btn-pokemon-primary {
    background: linear-gradient(135deg, #ef5350, #c62828);
    color: white;
    border: none;
    padding: 10px 20px;
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
