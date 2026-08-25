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

        $records = [
            [
                'student_id'      => '2026-IT-0042',
                'first_name'      => 'Sophia',
                'middle_name'     => 'Marie',
                'last_name'       => 'Alcantara',
                'email'           => 'sophia.alcantara@example.com',
                'mobile_number'   => '09178234561',
                'gender'          => 'Female',
                'date_of_birth'   => '2004-04-18',
                'program'         => 'BS Information Technology',
                'year_level'      => '3rd Year',
                'address'         => 'Unit 402, Cedar Residences, Taft Avenue, Manila',
                'profile_picture' => 'profile_pictures/student1.jpg',
            ],
            [
                'student_id'      => '2026-CS-1088',
                'first_name'      => 'Carlos',
                'middle_name'     => 'Miguel',
                'last_name'       => 'Santos',
                'email'           => 'carlos.santos@example.com',
                'mobile_number'   => '09189876543',
                'gender'          => 'Male',
                'date_of_birth'   => '2005-08-22',
                'program'         => 'BS Computer Science',
                'year_level'      => '2nd Year',
                'address'         => 'Blk 8 Lot 15, Sunset Boulevard, Quezon City',
                'profile_picture' => 'profile_pictures/student2.jpg',
            ],
            [
                'student_id'      => '2026-IS-2041',
                'first_name'      => 'Elena',
                'middle_name'     => 'Grace',
                'last_name'       => 'Villanueva',
                'email'           => 'elena.villanueva@example.com',
                'mobile_number'   => '09223334455',
                'gender'          => 'Female',
                'date_of_birth'   => '2003-11-09',
                'program'         => 'BS Information Systems',
                'year_level'      => '4th Year',
                'address'         => '12 Green Meadows, Ortigas Center, Pasig City',
                'profile_picture' => 'profile_pictures/student3.jpg',
            ],
            [
                'student_id'      => '2026-IT-3195',
                'first_name'      => 'Marcus',
                'middle_name'     => 'David',
                'last_name'       => 'Reyes',
                'email'           => 'marcus.reyes@example.com',
                'mobile_number'   => '09195556677',
                'gender'          => 'Male',
                'date_of_birth'   => '2006-02-14',
                'program'         => 'BS Information Technology',
                'year_level'      => '1st Year',
                'address'         => '78 Katipunan Avenue, Loyola Heights, Quezon City',
                'profile_picture' => 'profile_pictures/student4.jpg',
            ],
        ];

        foreach ($records as $record) {
            Student::updateOrCreate(['student_id' => $record['student_id']], $record);
        }
    }
}
