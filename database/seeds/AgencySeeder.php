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

        $caterories = factory(\App\models\Category::class, 4)->create();

        \App\Models\Job::all()->each(function ($job) use ($caterories) {
            $job->categories()->attach(
                $caterories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
