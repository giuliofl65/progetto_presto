<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'collezionismo',
        'libri e riviste',
        'elettrodomestici',
        'strumenti musicali',
        'telefonia e accessori',
        'casa e giardino',
        'merchandising film e serie tv',
        'console e videogiochi',
        'sport e tempo libero',
        'moda e accessori',
    ];

    public function run(): void
    {
        foreach ($this->categories as $category){
            Category::create([
                'name' => $category
            ]);
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
