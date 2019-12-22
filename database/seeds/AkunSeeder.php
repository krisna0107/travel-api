<?php

use Illuminate\Database\Seeder;
use App\Akun;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::insert([
            'email' => 'krisnayanajavista@gmail.com',
        ]);
    }
}
