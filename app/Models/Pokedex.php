<?php
// app/Models/Pokedex.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;

    // ระบุชื่อตารางให้ชัดเจน
    protected $table = 'pokedexs'; // หรือ 'pokedexes' ตามที่ migration สร้าง

    protected $fillable = [
        'name',
        'type',
        'species',
        'height',
        'weight',
        'hp',
        'attack',
        'defense',
        'image_url'
    ];
}
