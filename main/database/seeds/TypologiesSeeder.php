<?php

use Illuminate\Database\Seeder;
use App\Typology;

class TypologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Typology::class, 50) -> create();
    }
}
