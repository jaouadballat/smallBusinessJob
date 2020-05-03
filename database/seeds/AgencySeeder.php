<?php

use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Agency::class, 10)->create()->each(function ($a) {
            $a->jobs()->saveMany(factory(\App\Models\Job::class, 3)->make());
        });
    }
}
