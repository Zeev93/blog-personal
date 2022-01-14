<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arrTag = ['Trending', 'Hot', 'Lately', 'News'] ;
        foreach ($arrTag as $tag) {
            Tag::create([
                'name' => $tag,
                'url' => Str::slug($tag)
            ]);
        }
    }
}
