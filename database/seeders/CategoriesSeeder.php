<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Technology', 'Politics', 'Sports', 'Entertainment', 'Health'];
        foreach ($categories as $cat) {
           Category::create(['name' => $cat]);
        }
    }
}
