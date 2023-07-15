<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'phones',
            'info' => 'Category of all phones, and accessories for them.',
            'parent_id' => 0,
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'smartphones',
            'info' => 'Only smartphones.',
            'parent_id' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'accessories',
            'info' => 'Accessories for phones.',
            'parent_id' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Cases',
            'info' => 'Smartphone cases.',
            'parent_id' => 3,
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'computers',
            'info' => 'Everything for pcs and laptops.',
            'parent_id' => 0,
            'created_at' => Carbon::now()
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
