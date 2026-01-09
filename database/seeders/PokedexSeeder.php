<?php
// database/seeders/PokedexSeeder.php
namespace Database\Seeders;

use App\Models\Pokedex;
use Illuminate\Database\Seeder;

class PokedexSeeder extends Seeder
{
    public function run()
    {
        $pokemons = [
            [
                'name' => 'Pikachu',
                'type' => 'Electric',
                'species' => 'Mouse Pokémon',
                'height' => 0.4,
                'weight' => 6.0,
                'hp' => 35,
                'attack' => 55,
                'defense' => 40,
                'image_url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/25.png'
            ],
            [
                'name' => 'Charizard',
                'type' => 'Fire',
                'species' => 'Flame Pokémon',
                'height' => 1.7,
                'weight' => 90.5,
                'hp' => 78,
                'attack' => 84,
                'defense' => 78,
                'image_url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/6.png'
            ],
            // เพิ่มข้อมูลอื่นๆ ตามต้องการ
        ];

        foreach ($pokemons as $pokemon) {
            Pokedex::create($pokemon);
        }
    }
}
