<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Book::create([
        'title' => 'كتاب البداية',
        'description' => 'وصف الكتاب الأول',
        'author_id' => 1,   // بناءً على المؤلفين اللي دخلناهم
        'category_id' => 1,
        'cover_image' => null,
        ]);

        \App\Models\Book::create([
        'title' => 'التكنولوجيا الحديثة',
        'description' => 'وصف الكتاب الثاني',
        'author_id' => 2,
        'category_id' => 2,
        'cover_image' => null,
        ]);
    }
}
