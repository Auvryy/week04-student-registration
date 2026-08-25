<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_loads_successfully(): void
    {
        $response = $this->get(route('students.create'));
        $response->assertStatus(200);
        $response->assertSee('Student Registration');
    }

    public function test_form_validation_rejects_empty_submission(): void
    {
        $response = $this->post(route('students.store'), []);
        $response->assertSessionHasErrors([
            'student_id',
            'first_name',
            'last_name',
            'email',
            'mobile_number',
            'gender',
            'date_of_birth',
            'program',
            'year_level',
            'address',
            'profile_picture',
        ]);
    }

    public function test_student_can_be_registered_with_photo_upload(): void
    {
        Storage::fake('public');

        $photo = UploadedFile::fake()->create('avatar.jpg', 150, 'image/jpeg');

        $formData = [
            'student_id'      => '2026-IT-9901',
            'first_name'      => 'Juan',
            'middle_name'     => 'Manuel',
            'last_name'       => 'Reyes',
            'email'           => 'juan.reyes@example.com',
            'mobile_number'   => '09171234567',
            'gender'          => 'Male',
            'date_of_birth'   => '2004-05-10',
            'program'         => 'BS Information Technology',
            'year_level'      => '2nd Year',
            'address'         => '123 University Street, Manila',
            'profile_picture' => $photo,
        ];

        $response = $this->post(route('students.store'), $formData);

        $this->assertDatabaseHas('students', [
            'student_id' => '2026-IT-9901',
            'email'      => 'juan.reyes@example.com',
        ]);

        $student = Student::where('student_id', '2026-IT-9901')->first();
        $this->assertNotNull($student);
        Storage::disk('public')->assertExists($student->profile_picture);

        $response->assertRedirect(route('students.create'));
        $response->assertSessionHas('success', 'Student registered successfully!');
    }
}
