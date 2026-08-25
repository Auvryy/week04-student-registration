@extends('layouts.app')

@section('title', 'Student Directory')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-50 text-orange-700 border border-orange-100 mb-1.5">
                <i class="fa-solid fa-database text-[10px]"></i>
                <span>{{ $students->total() }} Enrolled Students</span>
            </div>
            <h1 class="text-2xl font-bold text-stone-900 tracking-tight">Student Directory</h1>
            <p class="text-xs sm:text-sm text-stone-500 mt-0.5">Manage and inspect all verified student registrations and uploaded profiles.</p>
        </div>
        <div class="flex items-center space-x-2">
            <form action="{{ route('students.reset-database') }}" method="POST" onsubmit="return confirm('Reset database to default sample records? Any newly registered students will be reloaded.');">
                @csrf
                <button type="submit" class="px-3.5 py-2.5 border border-stone-200 bg-white hover:bg-stone-50 text-stone-600 hover:text-stone-900 text-xs font-semibold rounded-xl transition-all shadow-2xs inline-flex items-center space-x-1.5">
                    <i class="fa-solid fa-rotate-left text-[10px] text-stone-400"></i>
                    <span>Reset Defaults</span>
                </button>
            </form>
            <a href="{{ route('students.create') }}" class="px-4 py-2.5 bg-orange-600 text-white text-xs font-bold rounded-xl hover:bg-orange-700 active:scale-95 transition-all shadow-xs hover:shadow inline-flex items-center space-x-1.5">
                <i class="fa-solid fa-plus text-[10px]"></i>
                <span>Register Student</span>
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white border border-stone-200/90 rounded-2xl p-3 shadow-2xs">
        <form action="{{ route('students.index') }}" method="GET" class="flex gap-2">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by student ID, name, or email address..."
                       class="w-full pl-9 pr-3.5 py-2 border border-stone-300 rounded-xl text-xs text-stone-900 placeholder:text-stone-400 focus:outline-none focus:border-orange-500 focus:ring-3 focus:ring-orange-500/10 transition-all">
            </div>
            <button type="submit" class="px-4 py-2 bg-stone-900 text-white rounded-xl text-xs font-bold hover:bg-stone-800 active:scale-95 transition-all">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" class="px-3 py-2 text-xs font-semibold text-stone-500 hover:text-stone-900 flex items-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Student Table Card -->
    <div class="bg-white border border-stone-200/90 rounded-2xl shadow-xs overflow-hidden">
        @if($students->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="border-b border-stone-200/80 bg-stone-50/75 text-stone-600 font-bold uppercase tracking-wider text-[11px]">
                            <th class="py-3.5 px-4">Student</th>
                            <th class="py-3.5 px-4">Student ID</th>
                            <th class="py-3.5 px-4">Program & Standing</th>
                            <th class="py-3.5 px-4">Contact</th>
                            <th class="py-3.5 px-4">Date Registered</th>
                            <th class="py-3.5 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($students as $student)
                            <tr class="hover:bg-stone-50/75 transition-colors group">
                                <td class="py-3.5 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-xl border border-stone-200 overflow-hidden bg-stone-100 flex-shrink-0 shadow-2xs group-hover:scale-105 transition-transform duration-200">
                                            @if($student->profile_picture)
                                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-[10px] text-stone-400">N/A</div>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('students.show', $student->id) }}" class="font-bold text-stone-900 hover:text-orange-600 transition-colors block">
                                                {{ $student->full_name }}
                                            </a>
                                            <span class="text-[11px] text-stone-400 capitalize block">{{ $student->gender }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3.5 px-4 font-mono font-bold text-orange-950">
                                    <span class="px-2.5 py-1 rounded-lg bg-orange-50 border border-orange-100/80">
                                        {{ $student->student_id }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-stone-700">
                                    <div class="font-semibold">{{ $student->program }}</div>
                                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-800 border border-amber-200/60">
                                        {{ $student->year_level }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-stone-600">
                                    <div class="font-mono text-xs">{{ $student->email }}</div>
                                    <div class="text-[11px] text-stone-400 font-mono mt-0.5">{{ $student->mobile_number }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-stone-500 font-mono text-[11px]">{{ $student->created_at->format('M d, Y') }}</td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end space-x-1.5">
                                        <a href="{{ route('students.show', $student->id) }}" class="px-2.5 py-1.5 bg-stone-100 text-stone-800 rounded-lg text-xs font-semibold hover:bg-orange-50 hover:text-orange-700 hover:border-orange-200 border border-transparent transition-all inline-flex items-center space-x-1">
                                            <span>View</span>
                                            <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $student->full_name }}?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1.5 text-stone-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors" title="Delete Student Record">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-stone-100 bg-stone-50/50">
                {{ $students->links() }}
            </div>
        @else
            <div class="p-12 text-center text-xs text-stone-500">
                <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center mx-auto mb-3 text-lg">
                    <i class="fa-regular fa-folder-open"></i>
                </div>
                <p class="font-bold text-stone-800 text-sm mb-1">No student records found</p>
                <p class="mb-4 text-stone-500">There are currently no students matching your query in the registry.</p>
                <div class="flex items-center justify-center gap-2">
                    <form action="{{ route('students.reset-database') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3.5 py-2 border border-stone-200 bg-white hover:bg-stone-50 text-stone-700 text-xs font-bold rounded-xl transition-all shadow-2xs">
                            Load Default Students
                        </button>
                    </form>
                    <a href="{{ route('students.create') }}" class="px-4 py-2 bg-orange-600 text-white text-xs font-bold rounded-xl hover:bg-orange-700 active:scale-95 transition-all inline-flex items-center space-x-1.5 shadow-xs">
                        <i class="fa-solid fa-plus text-[10px]"></i>
                        <span>Register First Student</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
