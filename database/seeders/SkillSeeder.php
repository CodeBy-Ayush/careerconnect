<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = ['PHP', 'Laravel', 'JavaScript', 'React', 'Vue.js', 'Python', 'SQL', 'Figma', 'SEO', 'Agile'];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
                'slug' => Str::slug($skill)
            ]);
        }
    }
}