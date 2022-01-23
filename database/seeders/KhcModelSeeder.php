<?php

namespace Database\Seeders;

use App\Models\KhcModel;
use Illuminate\Database\Seeder;

class KhcModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KhcModel::factory()->create();
    }
}
