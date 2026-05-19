<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Software Engineering', 'icon' => 'bi-code-slash', 'color' => '#2563eb'],
            ['name' => 'Data Science', 'icon' => 'bi-bar-chart', 'color' => '#16a34a'],
            ['name' => 'Design & UI/UX', 'icon' => 'bi-palette', 'color' => '#db2777'],
            ['name' => 'Marketing', 'icon' => 'bi-megaphone', 'color' => '#ea580c'],
            ['name' => 'Product Management', 'icon' => 'bi-kanban', 'color' => '#7c3aed'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
                'color' => $cat['color']
            ]);
        }
    }
}