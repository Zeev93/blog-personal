<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrCategory = ['Anime', 'Political', 'Science', 'Sci-Fi', 'Cultural', 'Sports', 'International', 'E-Sports'] ;
        foreach ($arrCategory as $category) {
            Category::create([
                'name' => $category,
                'url' => Str::slug($category)
            ]);
        }
    }
}
