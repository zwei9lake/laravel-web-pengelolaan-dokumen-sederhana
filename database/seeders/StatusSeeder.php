<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
        	'nama' => ('Belum Diterima'),
        ]);

        Status::create([
        	'nama' => ('Diterima'),
        ]);
    }
}
