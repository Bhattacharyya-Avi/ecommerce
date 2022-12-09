<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Root',
                'slug' => Str::slug('Root'),
                'position' => 1
            ],

            [
                'name' => 'Category1',
                'slug' => Str::slug('Category1'),
                'parent_id' => 1,
                'is_parent' => 1,
                'position' => 2
            ],
        ];
        foreach ($data as $value) {
            Category::create($value);
        }
    }
}
