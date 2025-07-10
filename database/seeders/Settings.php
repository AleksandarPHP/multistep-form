<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Settings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'title' => 'Montera Termag',
            'description' => NULL,
            'keywords' => NULL,
            'phone' => NULL,
            'worktime' => NULL,
            'address' => NULL,
            'facebook' => NULL,
            'instagram' => NULL,
            'logoH' => NULL,
            'logoF' => NULL,
            'favicon' => NULL,
        ]);
    }
}
