<?php

use Illuminate\Database\Seeder;

class YearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Kontakt::select('*')->update(['ssa_year' => 6]);
        App\Medium::select('*')->update(['ssa_year' => 6]);
        App\Partner::select('*')->update(['ssa_year' => 6]);
        App\Trainer::select('*')->update(['ssa_year' => 6]);
        App\Training::select('*')->update(['ssa_year' => 6]);
        App\Participant::select('*')->update(['ssa_year' => 6]);
    }
}
