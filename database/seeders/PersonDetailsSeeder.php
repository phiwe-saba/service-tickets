<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*factory(PersonalDetail::class, 50)->create()->each(function ($personalDetail){
            $personalDetail->interests()->attach(Interest::inRandomOrder()->limit(rand(1, 5))->pluck('id'));
        });*/
    }
}
