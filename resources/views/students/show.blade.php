@extends('layouts.app')

@section('title', 'Student Profile - ' . $student->full_name)

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Action Bar -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-xs text-[#6b7280] font-mono uppercase tracking-wider">Student Profile</span>
            <h1 class="text-xl font-bold text-[#111] mt-0.5">{{ $student->full_name }}</h1>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{ route('students.index') }}" class="px-3 py-1.5 border border-[#d1d5db] rounded text-xs font-medium text-[#374151] hover:bg-[#f3f4f6] transition-colors">
                Back to Directory
            </a>
            <a href="{{ route('students.create') }}" class="px-3.5 py-1.5 bg-[#111] text-white rounded text-xs font-medium hover:bg-[#27272a] transition-colors">
                Register Another
            </a>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white border border-[#e5e7eb] rounded-lg shadow-sm overflow-hidden">
        <!-- Top Section with Avatar & Core Info -->
        <div class="p-6 sm:p-8 border-b border-[#e5e7eb] flex flex-col sm:flex-row items-center sm:items-start gap-6 bg-[#fafafa]">
            <div class="w-28 h-28 border border-[#d1d5db] rounded-lg overflow-hidden bg-white flex-shrink-0 shadow-sm">
                @if($student->profile_picture)
                    <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-xs text-[#9ca3af]">No Photo</div>
                @endif
            </div>
            <div class="flex-1 text-center sm:text-left space-y-1">
                <div class="inline-block px-2 py-0.5 border border-[#d1d5db] bg-white rounded text-xs font-mono text-[#374151]">
                    ID: {{ $student->student_id }}
                </div>
                <h2 class="text-lg font-bold text-[#111]">{{ $student->full_name }}</h2>
                <p class="text-xs text-[#4b5563]">{{ $student->program }} &bull; <span class="font-medium">{{ $student->year_level }}</span></p>
                <p class="text-xs text-[#6b7280] font-mono pt-1">{{ $student->email }}</p>
            </div>
        </div>

        <!-- Detailed Breakdown -->
        <div class="p-6 sm:p-8 space-y-6">
            <!-- Academic Information -->
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-[#374151] border-b border-[#e5e7eb] pb-2 mb-3">Academic Information</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-[#6b7280] block">Student ID Number</span>
                        <span class="font-mono font-medium text-[#111] text-sm">{{ $student->student_id }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Enrolled Degree Program</span>
                        <span class="font-medium text-[#111] text-sm">{{ $student->program }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Current Year Standing</span>
                        <span class="font-medium text-[#111] text-sm">{{ $student->year_level }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Record Registered On</span>
                        <span class="font-mono text-[#111] text-sm">{{ $student->created_at->format('M d, Y h:i A') }}</span>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-[#374151] border-b border-[#e5e7eb] pb-2 mb-3">Personal & Contact Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-[#6b7280] block">Full Name</span>
                        <span class="font-medium text-[#111] text-sm">{{ $student->full_name }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Gender</span>
                        <span class="font-medium text-[#111] text-sm">{{ $student->gender }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Date of Birth</span>
                        <span class="font-medium text-[#111] text-sm">{{ $student->date_of_birth ? $student->date_of_birth->format('F d, Y') : 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="text-[#6b7280] block">Mobile Phone Number</span>
                        <span class="font-mono font-medium text-[#111] text-sm">{{ $student->mobile_number }}</span>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="text-[#6b7280] block">Complete Residential Address</span>
                        <span class="font-medium text-[#111] text-sm leading-relaxed">{{ $student->address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
