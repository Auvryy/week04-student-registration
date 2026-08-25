@extends('layouts.app')

@section('title', 'Student Directory')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100 mb-1.5">
                <i class="fa-solid fa-database text-[10px]"></i>
                <span>{{ $students->total() }} Enrolled Students</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Student Directory</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Manage and inspect all verified student registrations and uploaded profiles.</p>
        </div>
        <div>
            <a href="{{ route('students.create') }}" class="px-4 py-2.5 bg-indigo-600 text-white text-xs font-bold rounded-xl hover:bg-indigo-700 active:scale-95 transition-all shadow-xs hover:shadow inline-flex items-center space-x-1.5">
                <i class="fa-solid fa-plus text-[10px]"></i>
                <span>Register Student</span>
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white border border-slate-200/90 rounded-2xl p-3 shadow-2xs">
        <form action="{{ route('students.index') }}" method="GET" class="flex gap-2">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by student ID, name, or email address..."
                       class="w-full pl-9 pr-3.5 py-2 border border-slate-300 rounded-xl text-xs text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-3 focus:ring-indigo-500/10 transition-all">
            </div>
            <button type="submit" class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-slate-800 active:scale-95 transition-all">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" class="px-3 py-2 text-xs font-semibold text-slate-500 hover:text-slate-900 flex items-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Student Table Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl shadow-xs overflow-hidden">
        @if($students->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200/80 bg-slate-50/75 text-slate-600 font-bold uppercase tracking-wider text-[11px]">
                            <th class="py-3.5 px-4">Student</th>
                            <th class="py-3.5 px-4">Student ID</th>
                            <th class="py-3.5 px-4">Program & Standing</th>
                            <th class="py-3.5 px-4">Contact</th>
                            <th class="py-3.5 px-4">Date Registered</th>
                            <th class="py-3.5 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($students as $student)
                            <tr class="hover:bg-slate-50/75 transition-colors group">
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-xl border border-slate-200 overflow-hidden bg-slate-100 flex-shrink-0 shadow-2xs group-hover:scale-105 transition-transform duration-200">
                                            @if($student->profile_picture)
                                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-[10px] text-slate-400">N/A</div>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('students.show', $student->id) }}" class="font-bold text-slate-900 hover:text-indigo-600 transition-colors block">
                                                {{ $student->full_name }}
                                            </a>
                                            <span class="text-[11px] text-slate-400 capitalize block">{{ $student->gender }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 font-mono font-bold text-indigo-900">
                                    <span class="px-2.5 py-1 rounded-lg bg-indigo-50 border border-indigo-100/80">
                                        {{ $student->student_id }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">
                                    <div class="font-semibold">{{ $student->program }}</div>
                                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-800 border border-amber-200/60">
                                        {{ $student->year_level }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-slate-600">
                                    <div class="font-mono text-xs">{{ $student->email }}</div>
                                    <div class="text-[11px] text-slate-400 font-mono mt-0.5">{{ $student->mobile_number }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-slate-500 font-mono text-[11px]">{{ $student->created_at->format('M d, Y') }}</td>
                                <td class="py-3.5 px-4 text-right">
                                    <a href="{{ route('students.show', $student->id) }}" class="px-3 py-1.5 bg-slate-100 text-slate-800 rounded-xl text-xs font-semibold hover:bg-indigo-50 hover:text-indigo-700 hover:border-indigo-200 border border-transparent transition-all inline-flex items-center space-x-1">
                                        <span>View</span>
                                        <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                {{ $students->links() }}
            </div>
        @else
            <div class="p-12 text-center text-xs text-slate-500">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mx-auto mb-3 text-lg">
                    <i class="fa-regular fa-folder-open"></i>
                </div>
                <p class="font-bold text-slate-800 text-sm mb-1">No student records found</p>
                <p class="mb-4 text-slate-500">There are currently no students matching your query in the registry.</p>
                <a href="{{ route('students.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-xs font-bold rounded-xl hover:bg-indigo-700 active:scale-95 transition-all inline-flex items-center space-x-1.5 shadow-xs">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>Register First Student</span>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
