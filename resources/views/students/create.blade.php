@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <h1 class="text-xl font-bold text-[#111] tracking-tight">Student Registration</h1>
        <p class="text-xs text-[#6b7280] mt-1">Enter the student's personal and academic details below to create a record in the database.</p>
    </div>

    <div class="bg-white border border-[#e5e7eb] rounded-lg shadow-sm">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-8">
            @csrf

            <!-- Section 1: Identification -->
            <div>
                <div class="border-b border-[#e5e7eb] pb-2 mb-4">
                    <h2 class="text-xs font-semibold uppercase tracking-wider text-[#374151]">1. Student Identification</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="sm:col-span-3">
                        <label for="student_id" class="block text-xs font-medium text-[#374151] mb-1">Student ID <span class="text-red-500">*</span></label>
                        <input type="text"
                               name="student_id"
                               id="student_id"
                               value="{{ old('student_id') }}"
                               placeholder="e.g. 2026-IT-0101"
                               class="w-full px-3 py-2 border {{ $errors->has('student_id') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('student_id')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="first_name" class="block text-xs font-medium text-[#374151] mb-1">First Name <span class="text-red-500">*</span></label>
                        <input type="text"
                               name="first_name"
                               id="first_name"
                               value="{{ old('first_name') }}"
                               placeholder="Juan"
                               class="w-full px-3 py-2 border {{ $errors->has('first_name') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('first_name')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="middle_name" class="block text-xs font-medium text-[#374151] mb-1">Middle Name <span class="text-[#9ca3af] font-normal">(Optional)</span></label>
                        <input type="text"
                               name="middle_name"
                               id="middle_name"
                               value="{{ old('middle_name') }}"
                               placeholder="Santos"
                               class="w-full px-3 py-2 border border-[#d1d5db] rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('middle_name')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-xs font-medium text-[#374151] mb-1">Last Name <span class="text-red-500">*</span></label>
                        <input type="text"
                               name="last_name"
                               id="last_name"
                               value="{{ old('last_name') }}"
                               placeholder="Dela Cruz"
                               class="w-full px-3 py-2 border {{ $errors->has('last_name') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('last_name')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-xs font-medium text-[#374151] mb-1">Date of Birth <span class="text-red-500">*</span></label>
                        <input type="date"
                               name="date_of_birth"
                               id="date_of_birth"
                               value="{{ old('date_of_birth') }}"
                               class="w-full px-3 py-2 border {{ $errors->has('date_of_birth') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] focus:outline-none focus:border-[#111]">
                        @error('date_of_birth')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-medium text-[#374151] mb-1">Gender <span class="text-red-500">*</span></label>
                        <div class="flex items-center space-x-6 pt-2">
                            @foreach(['Male', 'Female', 'Other'] as $genderOption)
                                <label class="flex items-center text-xs text-[#374151] cursor-pointer">
                                    <input type="radio"
                                           name="gender"
                                           value="{{ $genderOption }}"
                                           {{ old('gender') === $genderOption ? 'checked' : '' }}
                                           class="mr-2 text-[#111] focus:ring-0">
                                    <span>{{ $genderOption }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('gender')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Academic Info -->
            <div>
                <div class="border-b border-[#e5e7eb] pb-2 mb-4">
                    <h2 class="text-xs font-semibold uppercase tracking-wider text-[#374151]">2. Academic Enrollment</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="program" class="block text-xs font-medium text-[#374151] mb-1">Degree Program <span class="text-red-500">*</span></label>
                        <select name="program"
                                id="program"
                                class="w-full px-3 py-2 border {{ $errors->has('program') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] bg-white focus:outline-none focus:border-[#111]">
                            <option value="">Select Program</option>
                            <option value="BS Information Technology" {{ old('program') === 'BS Information Technology' ? 'selected' : '' }}>BS Information Technology</option>
                            <option value="BS Computer Science" {{ old('program') === 'BS Computer Science' ? 'selected' : '' }}>BS Computer Science</option>
                            <option value="BS Information Systems" {{ old('program') === 'BS Information Systems' ? 'selected' : '' }}>BS Information Systems</option>
                        </select>
                        @error('program')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="year_level" class="block text-xs font-medium text-[#374151] mb-1">Year Level <span class="text-red-500">*</span></label>
                        <select name="year_level"
                                id="year_level"
                                class="w-full px-3 py-2 border {{ $errors->has('year_level') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] bg-white focus:outline-none focus:border-[#111]">
                            <option value="">Select Year Level</option>
                            <option value="1st Year" {{ old('year_level') === '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_level') === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_level') === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_level') === '4th Year' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        @error('year_level')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Contact Details -->
            <div>
                <div class="border-b border-[#e5e7eb] pb-2 mb-4">
                    <h2 class="text-xs font-semibold uppercase tracking-wider text-[#374151]">3. Contact and Address</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-medium text-[#374151] mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="student@example.com"
                               class="w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('email')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="mobile_number" class="block text-xs font-medium text-[#374151] mb-1">Mobile Phone Number <span class="text-red-500">*</span></label>
                        <input type="text"
                               name="mobile_number"
                               id="mobile_number"
                               value="{{ old('mobile_number') }}"
                               placeholder="09171234567"
                               class="w-full px-3 py-2 border {{ $errors->has('mobile_number') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
                        @error('mobile_number')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address" class="block text-xs font-medium text-[#374151] mb-1">Residential Address <span class="text-red-500">*</span></label>
                        <textarea name="address"
                                  id="address"
                                  rows="2"
                                  placeholder="House number, Street, Barangay, City, Province"
                                  class="w-full px-3 py-2 border {{ $errors->has('address') ? 'border-red-400 bg-red-50/20' : 'border-[#d1d5db]' }} rounded text-sm text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 4: Picture Upload -->
            <div>
                <div class="border-b border-[#e5e7eb] pb-2 mb-4">
                    <h2 class="text-xs font-semibold uppercase tracking-wider text-[#374151]">4. Identification Photo</h2>
                </div>
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <div class="w-24 h-24 border border-dashed border-[#d1d5db] rounded bg-[#f9fafb] flex items-center justify-center overflow-hidden flex-shrink-0" id="preview-box">
                        <span class="text-[10px] text-[#9ca3af] text-center px-1" id="preview-placeholder">No file chosen</span>
                        <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                    </div>
                    <div class="flex-1">
                        <label for="profile_picture" class="block text-xs font-medium text-[#374151] mb-1">Upload Photo <span class="text-red-500">*</span></label>
                        <input type="file"
                               name="profile_picture"
                               id="profile_picture"
                               accept="image/jpeg,image/png,image/jpg"
                               class="block w-full text-xs text-[#4b5563] file:mr-3 file:py-1.5 file:px-3 file:rounded file:border file:border-[#d1d5db] file:text-xs file:font-medium file:bg-white file:text-[#111] hover:file:bg-[#f3f4f6] cursor-pointer">
                        <p class="text-[11px] text-[#6b7280] mt-1">Accepts JPG, JPEG, or PNG. Maximum file size: 2MB.</p>
                        @error('profile_picture')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submission Actions -->
            <div class="border-t border-[#e5e7eb] pt-4 flex items-center justify-between">
                <a href="{{ route('students.index') }}" class="text-xs text-[#6b7280] hover:text-[#111]">Cancel</a>
                <button type="submit" class="px-5 py-2 bg-[#111] text-white text-xs font-medium rounded hover:bg-[#27272a] transition-colors">
                    Submit Registration
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const fileInput = document.getElementById('profile_picture');
    const imagePreview = document.getElementById('image-preview');
    const previewPlaceholder = document.getElementById('preview-placeholder');

    if (fileInput) {
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    previewPlaceholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    }
</script>
@endpush
@endsection
