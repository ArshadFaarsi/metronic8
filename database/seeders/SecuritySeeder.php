<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;
use Illuminate\Database\Seeder;

class SecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create(['description'=> 'This panel provide facility to handle the whole site']);
        PrivacyPolicy::create(['description'=> 'This panel provide facility to handle the whole site']);
        TermCondition::create(['description'=> 'This panel provide facility to handle the whole site']);
        TermCondition::create(['description'=> 'This panel provide facility to handle the whole site']);
    }
}
