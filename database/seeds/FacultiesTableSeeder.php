<?php

use Illuminate\Database\Seeder;
use App\Faculty;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[ 'naziv' => 'Akademija likovnih umjetnosti'],				
        		[ 'naziv' => 'Akademija scenskih umjetnosti'],				
        		[ 'naziv' => 'American University in BiH'],				
        		[ 'naziv' => 'Arhitektonski fakultet'],				
        		[ 'naziv' => 'Ekonomski fakultet'],				
        		[ 'naziv' => 'Elektrotehnički fakultet'],		
        		[ 'naziv' => 'Fakultet islamskih nauka'],				
        		[ 'naziv' => 'Fakultet političkih nauka'],				
        		[ 'naziv' => 'Fakultet sporta i tjelesnog odgoja'],				
        		[ 'naziv' => 'Fakultet za kriminalistiku, kriminologiju i sigurnosne studije'],				
        		[ 'naziv' => 'Fakultet za saobraćaj i komunikacije'],				
				[ 'naziv' => 'Fakultet za upravu'],				
				[ 'naziv' => 'Fakultet zdravstvenih studija'],				
				[ 'naziv' => 'Farmaceutski fakultet'],				
				[ 'naziv' => 'Filozofski fakultet'],				
				[ 'naziv' => 'Građevinski fakultet'],				
				[ 'naziv' => 'International Burch University'],				
				[ 'naziv' => 'International University of Sarajevo'],				
				[ 'naziv' => 'Katolički bogoslovni fakultet'],				
				[ 'naziv' => 'Mašinski fakultet'],				
				[ 'naziv' => 'Medicinski fakultet'],				
				[ 'naziv' => 'Muzička akademija'],				
				[ 'naziv' => 'Pedagoški fakultet'],				
				[ 'naziv' => 'Poljoprivredno-prehrambeni fakultet'],				
				[ 'naziv' => 'Pravni fakultet'],				
				[ 'naziv' => 'Prirodno-matematički fakultet'],				
				[ 'naziv' => 'Sarajevo School of Science and Technology'],				
				[ 'naziv' => 'Stomatološki fakultet sa klinikama'],				
				[ 'naziv' => 'Šumarski fakultet'],				
				[ 'naziv' => 'Veterinarski fakultet']
    	];


    	foreach ($data as $fakultet) {
    		Faculty::create($fakultet);
    	}
        
    }
}
