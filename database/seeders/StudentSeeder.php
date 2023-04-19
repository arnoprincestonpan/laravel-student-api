<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Dummy Data
        $s1 = new \App\Models\Student([
            'FirstName' => 'Tom',
            'LastName' => 'Max',
            'School' => 'Nursing'
        ]);
        $s1->save();

        $s2 = new \App\Models\Student([
            'FirstName' => 'Arno',
            'LastName' => 'Pan',
            'School' => 'Computing'
        ]);
        $s2 -> save();

        $s3 = new \App\Models\Student([
            'FirstName' => 'Joshua',
            'LastName' => 'Martinez',
            'School' => 'Computing'
        ]);
        $s3->save();

        $s4 = new \App\Models\Student([
            'FirstName' => 'Paul',
            'LastName' => 'Kim',
            'School' => 'Computing'
        ]);
        $s4->save();

        $s5 = new \App\Models\Student([
            'FirstName' => 'Alex',
            'LastName' => 'Rosa',
            'School' => 'Plumbing'
        ]);
        $s5->save();

        $s6 = new \App\Models\Student([
            'FirstName' => 'Natalie',
            'LastName' => 'Portman',
            'School' => 'Theatre'
        ]);
        $s6->save();

    }
}
