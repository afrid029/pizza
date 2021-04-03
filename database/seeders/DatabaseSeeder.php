<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admins')->insert([
            'username'=>'testuser',
            'password'=>Hash::make('test@123')
        ]);

        DB::table('suppliers')->insert([
            'supid'=>001,
            'name'=>'Afrid'
        ]);
        DB::table('suppliers')->insert([
            'supid'=>002,
            'name'=>'Aneeque'
        ]);
        DB::table('suppliers')->insert([
            'supid'=>003,
            'name'=>'Sanoos'
        ]);
        DB::table('suppliers')->insert([
            'supid'=>004,
            'name'=>'Abdullah'
        ]);

        DB::table('pizzas')->insert([
            'type'=>'chicken',
            'size'=>'large',
            'price'=> 1500
        ]);
        DB::table('pizzas')->insert([
            'type'=>'chicken',
            'size'=>'medium',
            'price'=> 1000
        ]);
        DB::table('pizzas')->insert([
            'type'=>'chicken',
            'size'=>'small',
            'price'=> 800
        ]);
        DB::table('pizzas')->insert([
            'type'=>'beef',
            'size'=>'large',
            'price'=> 1200
        ]);
        DB::table('pizzas')->insert([
            'type'=>'beef',
            'size'=>'medium',
            'price'=> 1000
        ]);
        DB::table('pizzas')->insert([
            'type'=>'beef',
            'size'=>'small',
            'price'=> 800
        ]);
        DB::table('pizzas')->insert([
            'type'=>'veg',
            'size'=>'large',
            'price'=> 1000
        ]);
        DB::table('pizzas')->insert([
            'type'=>'veg',
            'size'=>'medium',
            'price'=> 900
        ]);
        DB::table('pizzas')->insert([
            'type'=>'veg',
            'size'=>'small',
            'price'=> 700
        ]);
    }
}
