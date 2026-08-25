@extends('layouts.app')

@section('title', 'Student Profile - ' . $student->full_name)

@section('content')
<div class="max-w-3xl mx-auto space-y-6 animate-fade-in">
    <!-- Breadcrumb & Actions -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2 text-xs text-slate-500">
            <a href="{{ route('students.index') }}" class="hover:text-indigo-600 font-semibold transition-colors flex items-center space-x-1">
                <i class="fa-solid fa-users text-[10px]"></i>
                <span>Directory</span>
            </a>
            <span>/</span>
            <span class="text-slate-900 font-bold">{{ $student->full_name }}</span>
        </div>
        <div class="flex items-center space-x-2">
            <a href="{{ route('students.index') }}" class="px-3.5 py-2 border border-slate-200 bg-white rounded-xl text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-all shadow-2xs">
                Back to Directory
            </a>
            <a href="{{ route('students.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-xs font-bold hover:bg-indigo-700 active:scale-95 transition-all shadow-xs flex items-center space-x-1.5">
                <i class="fa-solid fa-plus text-[10px]"></i>
                <span>Register Another</span>
            </a>
        </div>
    </div>

    <!-- Main Profile Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl shadow-xs overflow-hidden">
        <!-- Top Profile Banner -->
        <div class="p-6 sm:p-8 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <div class="w-28 h-28 border-2 border-white/20 rounded-2xl overflow-hidden bg-slate-800 flex-shrink-0 shadow-md">
                @if($student->profile_picture)
                    <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-xs text-slate-400">No Photo</div>
                @endif
            </div>
            <div class="flex-1 text-center sm:text-left space-y-1.5">
                <div class="inline-flex items-center space-x-1 px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-white/10 text-indigo-200 border border-white/10">
                    <i class="fa-solid fa-id-badge text-[10px]"></i>
                    <span>{{ $student->student_id }}</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight text-white">{{ $student->full_name }}</h1>
                <p class="text-xs text-slate-300 font-medium">
                    <i class="fa-solid fa-graduation-cap text-indigo-300 mr-1 text-[11px]"></i>
                    {{ $student->program }} &bull; <span class="text-indigo-300 font-semibold">{{ $student->year_level }}</span>
                </p>
                <p class="text-xs text-slate-400 font-mono pt-1">
                    <i class="fa-regular fa-envelope mr-1 text-[11px]"></i>
                    {{ $student->email }}
                </p>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="p-6 sm:p-8 space-y-6">
            <!-- Academic Information -->
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2 mb-3 flex items-center space-x-1.5">
                    <i class="fa-solid fa-book-open-reader text-indigo-600"></i>
                    <span>Academic Summary</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Student ID Number</span>
                        <span class="font-mono font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->student_id }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Enrolled Program</span>
                        <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->program }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Year Standing</span>
                        <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->year_level }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Enrollment Timestamp</span>
                        <span class="font-mono font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->created_at->format('M d, Y h:i A') }}</span>
                    </div>
                </div>
            </div>

            <!-- Personal Details -->
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2 mb-3 flex items-center space-x-1.5">
                    <i class="fa-regular fa-user text-indigo-600"></i>
                    <span>Personal & Contact Information</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Full Legal Name</span>
                        <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->full_name }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Gender</span>
                        <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->gender }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Date of Birth</span>
                        <span class="font-bold text-slate-900 text-sm mt-0.5 block">
                            {{ $student->date_of_birth ? $student->date_of_birth->format('F d, Y') : 'N/A' }}
                        </span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100">
                        <span class="text-[11px] text-slate-500 font-medium block">Mobile Number</span>
                        <span class="font-mono font-bold text-slate-900 text-sm mt-0.5 block">{{ $student->mobile_number }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50/75 border border-slate-100 sm:col-span-2">
                        <span class="text-[11px] text-slate-500 font-medium block">Complete Residential Address</span>
                        <span class="font-medium text-slate-900 text-xs sm:text-sm mt-0.5 block leading-relaxed">{{ $student->address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
