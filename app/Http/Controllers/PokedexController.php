<?php
// app/Http/Controllers/PokedexController.php

namespace App\Http\Controllers;

// เพิ่ม use นี้ด้านบน
use App\Models\Pokedex;  // ← ต้องมีบรรทัดนี้
use Database\Seeders\PokedexSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokedexController extends Controller
{
    /**
     * แสดงรายการโปเกมอนทั้งหมด
     */
    public function index()
    {
        // ใช้ Pokedex model ในการดึงข้อมูล
        $pokemons = Pokedex::orderBy('id', 'desc')->paginate(12);
        return view('pokedex.index', compact('pokemons'));
    }

    /**
     * แสดงฟอร์มสร้างโปเกมอนใหม่
     */
    public function create()
    {
        $types = ['Fire', 'Water', 'Grass', 'Electric', 'Bug', 'Normal', 'Poison', 'Ground', 'Fairy', 'Psychic', 'Rock', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying', 'Fighting', 'Ghost'];
        return view('pokedex.create', compact('types'));
    }

    /**
     * บันทึกโปเกมอนใหม่
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'hp' => 'required|integer|min:1|max:500',
            'attack' => 'required|integer|min:1|max:300',
            'defense' => 'required|integer|min:1|max:300',
            'image_url' => 'nullable|url',
        ]);

        // ถ้าไม่มีรูปให้ใช้รูปเริ่มต้น
        if (!$validated['image_url']) {
            $validated['image_url'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/' . rand(1, 151) . '.png';
        }

        Pokedex::create($validated);

        return redirect()->route('pokedex.index')
            ->with('success', 'เพิ่มโปเกมอนใหม่เรียบร้อยแล้ว!');
    }

    /**
     * แสดงข้อมูลโปเกมอน
     */
    public function show(Pokedex $pokedex)
    {
        return view('pokedex.show', compact('pokedex'));
    }

    /**
     * แสดงฟอร์มแก้ไขโปเกมอน
     */
    public function edit(Pokedex $pokedex)
    {
        $types = ['Fire', 'Water', 'Grass', 'Electric', 'Bug', 'Normal', 'Poison', 'Ground', 'Fairy', 'Psychic', 'Rock', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying', 'Fighting', 'Ghost'];
        return view('pokedex.edit', compact('pokedex', 'types'));
    }

    /**
     * อัปเดตข้อมูลโปเกมอน
     */
    public function update(Request $request, Pokedex $pokedex)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'hp' => 'required|integer|min:1|max:500',
            'attack' => 'required|integer|min:1|max:300',
            'defense' => 'required|integer|min:1|max:300',
            'image_url' => 'nullable|url',
        ]);

        $pokedex->update($validated);

        return redirect()->route('pokedex.index')
            ->with('success', 'อัปเดตข้อมูลโปเกมอนเรียบร้อยแล้ว!');
    }

    /**
     * ลบโปเกมอน
     */
    public function destroy(Pokedex $pokedex)
    {
        $pokedex->delete();

        return redirect()->route('pokedex.index')
            ->with('success', 'ลบโปเกมอนเรียบร้อยแล้ว!');
    }
}
