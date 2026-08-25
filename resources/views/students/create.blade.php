@extends('layouts.app')

@section('title', 'Student Registration')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-50 text-orange-700 border border-orange-100 mb-1.5">
                <i class="fa-solid fa-file-signature text-[10px]"></i>
                <span>CCS Enrollment Portal</span>
            </div>
            <h1 class="text-2xl font-bold text-stone-900 tracking-tight">Student Registration</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-0.5">Please provide accurate academic and personal details to register a new student.</p>
        </div>
        <div>
            <a href="{{ route('students.index') }}" class="px-3.5 py-2 rounded-xl border border-stone-200 bg-white text-stone-600 hover:text-stone-900 hover:bg-stone-50 text-xs font-semibold transition-all inline-flex items-center space-x-1.5 shadow-2xs">
                <i class="fa-solid fa-arrow-left text-[11px]"></i>
                <span>View Directory</span>
            </a>
        </div>
    </div>

    <!-- Registration Form Card -->
    <div class="bg-white border border-stone-200/90 rounded-2xl shadow-xs overflow-hidden transition-all">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-8" id="studentForm">
            @csrf

            <!-- Section 1: Personal Identification -->
            <div>
                <div class="flex items-center space-x-2.5 pb-2.5 mb-5 border-b border-stone-100">
                    <div class="w-6 h-6 rounded-lg bg-orange-50 text-orange-700 text-xs font-bold flex items-center justify-center">
                        <i class="fa-regular fa-id-card text-[11px]"></i>
                    </div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-stone-800">1. Student Identification</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <!-- Student ID -->
                    <div class="sm:col-span-3">
                        <label for="student_id" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Student ID Number <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="text"
                               name="student_id"
                               id="student_id"
                               value="{{ old('student_id') }}"
                               placeholder="e.g. 2026-IT-0101"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('student_id') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all font-mono">
                        @error('student_id')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            First Name <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="text"
                               name="first_name"
                               id="first_name"
                               value="{{ old('first_name') }}"
                               placeholder="Juan"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('first_name') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all">
                        @error('first_name')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Middle Name -->
                    <div>
                        <label for="middle_name" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Middle Name <span class="text-stone-400 font-normal">(Optional)</span>
                        </label>
                        <input type="text"
                               name="middle_name"
                               id="middle_name"
                               value="{{ old('middle_name') }}"
                               placeholder="Santos"
                               class="w-full px-3.5 py-2.5 border border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10 rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all">
                        @error('middle_name')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Last Name <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="text"
                               name="last_name"
                               id="last_name"
                               value="{{ old('last_name') }}"
                               placeholder="Dela Cruz"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('last_name') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all">
                        @error('last_name')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Date of Birth <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="date"
                               name="date_of_birth"
                               id="date_of_birth"
                               value="{{ old('date_of_birth') }}"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('date_of_birth') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 focus:outline-none transition-all">
                        @error('date_of_birth')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Gender Selection -->
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Gender <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <div class="grid grid-cols-3 gap-2.5 pt-0.5">
                            @foreach(['Male', 'Female', 'Other'] as $genderOption)
                                <label class="flex items-center justify-center p-2.5 border rounded-xl cursor-pointer text-xs font-medium transition-all {{ old('gender') === $genderOption ? 'border-orange-500 bg-orange-50/50 text-orange-950 font-bold' : ($errors->has('gender') ? 'border-rose-300 bg-rose-50/20 text-stone-700' : 'border-stone-200 hover:bg-stone-50 text-stone-700') }}">
                                    <input type="radio"
                                           name="gender"
                                           value="{{ $genderOption }}"
                                           {{ old('gender') === $genderOption ? 'checked' : '' }}
                                           class="mr-2 text-orange-600 focus:ring-0">
                                    <span>{{ $genderOption }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('gender')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Academic Program Information -->
            <div>
                <div class="flex items-center space-x-2.5 pb-2.5 mb-5 border-b border-stone-100">
                    <div class="w-6 h-6 rounded-lg bg-orange-50 text-orange-700 text-xs font-bold flex items-center justify-center">
                        <i class="fa-solid fa-graduation-cap text-[11px]"></i>
                    </div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-stone-800">2. Academic Information</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="program" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Degree Program <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <select name="program"
                                id="program"
                                class="w-full px-3.5 py-2.5 border {{ $errors->has('program') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 bg-white focus:outline-none transition-all">
                            <option value="">Select Degree Program</option>
                            <option value="BS Information Technology" {{ old('program') === 'BS Information Technology' ? 'selected' : '' }}>BS Information Technology (BSIT)</option>
                            <option value="BS Computer Science" {{ old('program') === 'BS Computer Science' ? 'selected' : '' }}>BS Computer Science (BSCS)</option>
                            <option value="BS Information Systems" {{ old('program') === 'BS Information Systems' ? 'selected' : '' }}>BS Information Systems (BSIS)</option>
                        </select>
                        @error('program')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="year_level" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Year Level <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <select name="year_level"
                                id="year_level"
                                class="w-full px-3.5 py-2.5 border {{ $errors->has('year_level') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 bg-white focus:outline-none transition-all">
                            <option value="">Select Year Standing</option>
                            <option value="1st Year" {{ old('year_level') === '1st Year' ? 'selected' : '' }}>1st Year</option>
                            <option value="2nd Year" {{ old('year_level') === '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3rd Year" {{ old('year_level') === '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4th Year" {{ old('year_level') === '4th Year' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        @error('year_level')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Contact & Address Information -->
            <div>
                <div class="flex items-center space-x-2.5 pb-2.5 mb-5 border-b border-stone-100">
                    <div class="w-6 h-6 rounded-lg bg-orange-50 text-orange-700 text-xs font-bold flex items-center justify-center">
                        <i class="fa-solid fa-address-book text-[11px]"></i>
                    </div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-stone-800">3. Contact & Address Details</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="email" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Email Address <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               placeholder="student@example.com"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('email') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all">
                        @error('email')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="mobile_number" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Mobile Phone Number <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="text"
                               name="mobile_number"
                               id="mobile_number"
                               value="{{ old('mobile_number') }}"
                               placeholder="09171234567"
                               class="w-full px-3.5 py-2.5 border {{ $errors->has('mobile_number') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all font-mono">
                        @error('mobile_number')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address" class="block text-xs font-semibold text-stone-700 mb-1.5">
                            Complete Residential Address <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <textarea name="address"
                                  id="address"
                                  rows="2"
                                  placeholder="House No., Street Name, Barangay, City, Province"
                                  class="w-full px-3.5 py-2.5 border {{ $errors->has('address') ? 'border-rose-400 bg-rose-50/20 ring-2 ring-rose-100' : 'border-stone-300 hover:border-stone-400 focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10' }} rounded-xl text-sm text-stone-900 placeholder:text-stone-400 focus:outline-none transition-all">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 4: Profile Picture Upload -->
            <div>
                <div class="flex items-center space-x-2.5 pb-2.5 mb-5 border-b border-stone-100">
                    <div class="w-6 h-6 rounded-lg bg-orange-50 text-orange-700 text-xs font-bold flex items-center justify-center">
                        <i class="fa-solid fa-camera text-[11px]"></i>
                    </div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-stone-800">4. Student Profile Photo</h2>
                </div>

                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 p-4 sm:p-5 border {{ $errors->has('profile_picture') ? 'border-rose-300 bg-rose-50/20' : 'border-stone-200 bg-stone-50/50' }} rounded-2xl transition-all">
                    <!-- Photo Preview -->
                    <div class="w-24 h-24 border border-stone-300 rounded-xl bg-white flex items-center justify-center overflow-hidden flex-shrink-0 shadow-2xs" id="preview-box">
                        <div id="preview-placeholder" class="text-center px-1 text-stone-400">
                            <i class="fa-regular fa-image text-lg mb-1 block"></i>
                            <span class="text-[10px] block">No Photo</span>
                        </div>
                        <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                    </div>

                    <!-- File Picker -->
                    <div class="flex-1 w-full space-y-1.5">
                        <label for="profile_picture" class="block text-xs font-semibold text-stone-700">
                            Select Photo File <span class="text-rose-500 font-bold">*</span>
                        </label>
                        <input type="file"
                               name="profile_picture"
                               id="profile_picture"
                               accept="image/jpeg,image/png,image/jpg"
                               class="block w-full text-xs text-stone-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                        <p class="text-[11px] text-stone-500">Allowed formats: JPG, JPEG, PNG. Maximum size: 2MB.</p>
                        @error('profile_picture')
                            <p class="text-xs text-rose-600 mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="border-t border-stone-100 pt-5 flex items-center justify-between">
                <a href="{{ route('students.index') }}" class="text-xs font-semibold text-stone-500 hover:text-stone-800 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-orange-600 text-white text-xs font-bold rounded-xl hover:bg-orange-700 active:scale-95 transition-all duration-150 shadow-xs hover:shadow flex items-center space-x-2">
                    <span>Submit Registration</span>
                    <i class="fa-solid fa-arrow-right text-[11px]"></i>
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
