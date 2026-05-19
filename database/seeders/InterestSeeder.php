<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InterestSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Software Engineering' => ['Web Development', 'Mobile Apps', 'Cloud Computing', 'Cybersecurity'],
            'Data Science' => ['Machine Learning', 'Data Visualization', 'Big Data', 'Artificial Intelligence'],
            'Design & UI/UX' => ['Product Design', 'Graphic Design', 'Motion Graphics', 'User Research'],
            // AB YE DO BHI ADD HO GAYE HAIN:
            'Marketing' => ['Social Media Marketing', 'SEO / SEM', 'Email Marketing', 'Content Strategy'],
            'Product Management' => ['Product Roadmap', 'Agile / Scrum', 'User Stories', 'Market Research'],
        ];

        foreach ($data as $categoryName => $interests) {
            $category = Category::where('name', $categoryName)->first();
            if ($category) {
                foreach ($interests as $name) {
                    Interest::create([
                        'name' => $name,
                        'slug' => Str::slug($name),
                        'category_id' => $category->id
                    ]);
                }
            }
        }
    }
}