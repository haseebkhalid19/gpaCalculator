<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transcript;
use Faker\Factory as Faker;

class TranscriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 20; $i++) {
            $transcript = new Transcript;
            $transcript->course = $faker->word;
            $transcript->maxMarks =100;
            $transcript->marksObtained = $faker->randomNumber;
            $transcript->creditHours = 3;
            $transcript->gradePoints = 10.5;
            $transcript->save();
        }
    }
}
