<?php

use Illuminate\Database\Seeder;
use App\Konten;

class KontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=5; $i++){
            Konten::insert([
                'judul' => Str::random(10),
                'harga' => mt_rand(10000, 99999),
                'url_photo' => Str::random(10),
            ]);
        }
    }
}
