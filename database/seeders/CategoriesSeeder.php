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
        $categories = ['Technology', 'Politics', 'Sports', 'Entertainment', 'Health', 'Fashion', 'Current Affairs',
    'Business', 'World News / International', 'Education', 'Environment', 'Crime & Law', 'Finance & Economy', 'Agriculture', 'Social Issues'];
        foreach ($categories as $cat) {
           Category::firstOrCreate(['name' => $cat]);
        }
    }
}
