<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Education',
            'Health',
            'Environment',
            'Poverty Relief',
            'Human Rights',
            'Disaster Relief',
            'Community Development',
            'Youth Empowerment',
            'Women Empowerment',
            'Technology',
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['name' => $tag], ['slug' => Str::slug($tag)]);
        }
    }
}
