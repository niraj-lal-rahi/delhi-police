<?php

use Illuminate\Database\Seeder;

class CourtListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            array(
                'id' => '1',
                'court_name' => 'Central Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=8',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'index'
            ),
            array(
                'id' => '2',
                'court_name' => 'East Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=3',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'east-delhi'
            ),
            array(
                'id' => '3',
                'court_name' => 'New Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=7',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'new-delhi'
            ),
            array(
                'id' => '4',
                'court_name' => 'North Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=4',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'north-delhi'
            ),
            array(
                'id' => '5',
                'court_name' => 'South Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=10',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'south-delhi'
            ),
            array(
                'id' => '6',
                'court_name' => 'West Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=9',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'west-delhi'
            ),
            array(
                'id' => '7',
                'court_name' => 'South West Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=6',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'south-west-delhi'
            ),
            array(
                'id' => '8',
                'court_name' => 'South East Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=11',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'south-east-delhi'
            ),
            array(
                'id' => '9',
                'court_name' => 'Shahadra',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=2',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'shahdra'
            ),
            array(
                'id' => '10',
                'court_name' => 'North East Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=1',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'north-east-delhi'
            ),
            array(
                'id' => '11',
                'court_name' => 'North West Delhi',
                'link' => 'https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_orderdate.php?state=D&state_cd=26&dist_cd=5',
                'created_at' => \Carbon\Carbon::now(),
                'local_link' => 'north-west-delhi'
            ),

        );
        \DB::table('court_lists')->insert($data);
    }
}
