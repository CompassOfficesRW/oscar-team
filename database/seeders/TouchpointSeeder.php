<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TouchpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Touchpoint::factory()->count(5)->create();
    }
}
