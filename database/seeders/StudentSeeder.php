<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storageDir = storage_path('app/public/profile_pictures');
        if (!File::exists($storageDir)) {
            File::makeDirectory($storageDir, 0755, true);
        }

        // Create a default placeholder image file if needed
        $placeholderPath = $storageDir . '/sample.png';
        if (!File::exists($placeholderPath)) {
            $svgData = '<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><rect width="200" height="200" fill="#27272a"/><circle cx="100" cy="75" r="35" fill="#f4f4f5"/><path d="M50 165 C50 120, 150 120, 150 165 Z" fill="#f4f4f5"/></svg>';
            File::put($placeholderPath, $svgData);
        }

        $records = [
            [
                'student_id'      => '2026-IT-0042',
                'first_name'      => 'Juan',
                'middle_name'     => 'Carlos',
                'last_name'       => 'Dela Cruz',
                'email'           => 'juan.delacruz@university.edu.ph',
                'mobile_number'   => '09171234567',
                'gender'          => 'Male',
                'date_of_birth'   => '2004-03-15',
                'program'         => 'BS Information Technology',
                'year_level'      => '3rd Year',
                'address'         => '142 Rizal Avenue, Manila',
                'profile_picture' => 'profile_pictures/sample.png',
            ],
            [
                'student_id'      => '2026-CS-1088',
                'first_name'      => 'Maria',
                'middle_name'     => 'Clara',
                'last_name'       => 'Santos',
                'email'           => 'maria.santos@university.edu.ph',
                'mobile_number'   => '09189876543',
                'gender'          => 'Female',
                'date_of_birth'   => '2005-07-22',
                'program'         => 'BS Computer Science',
                'year_level'      => '2nd Year',
                'address'         => 'Blk 8 Lot 15, Sunset Boulevard, Quezon City',
                'profile_picture' => 'profile_pictures/sample.png',
            ],
        ];

        foreach ($records as $record) {
            Student::firstOrCreate(['student_id' => $record['student_id']], $record);
        }
    }
}
