@extends('layouts.app')

@section('title', 'Student Directory')

@section('content')
<div class="space-y-6">
    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-[#111] tracking-tight">Student Directory</h1>
            <p class="text-xs text-[#6b7280] mt-1">Listing of all registered students stored in the database.</p>
        </div>
        <div>
            <a href="{{ route('students.create') }}" class="px-3.5 py-2 bg-[#111] text-white text-xs font-medium rounded hover:bg-[#27272a] transition-colors inline-block">
                + Register New Student
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white border border-[#e5e7eb] rounded-lg p-3">
        <form action="{{ route('students.index') }}" method="GET" class="flex gap-2">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Search by student ID, name, or email..."
                   class="flex-1 px-3 py-1.5 border border-[#d1d5db] rounded text-xs text-[#111] placeholder-[#9ca3af] focus:outline-none focus:border-[#111]">
            <button type="submit" class="px-3.5 py-1.5 bg-[#f3f4f6] border border-[#d1d5db] text-[#374151] rounded text-xs font-medium hover:bg-[#e5e7eb] transition-colors">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" class="px-3 py-1.5 text-xs text-[#6b7280] hover:text-[#111] flex items-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Student Table -->
    <div class="bg-white border border-[#e5e7eb] rounded-lg shadow-sm overflow-hidden">
        @if($students->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="border-b border-[#e5e7eb] bg-[#fafafa] text-[#6b7280] font-medium">
                            <th class="py-3 px-4">Photo</th>
                            <th class="py-3 px-4">Student ID</th>
                            <th class="py-3 px-4">Full Name</th>
                            <th class="py-3 px-4">Program & Year</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Date Registered</th>
                            <th class="py-3 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f3f4f6]">
                        @foreach($students as $student)
                            <tr class="hover:bg-[#fafafa] transition-colors">
                                <td class="py-3 px-4">
                                    <div class="w-9 h-9 rounded border border-[#e5e7eb] overflow-hidden bg-[#f3f4f6]">
                                        @if($student->profile_picture)
                                            <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->full_name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[10px] text-[#9ca3af]">N/A</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-4 font-mono font-medium text-[#111]">{{ $student->student_id }}</td>
                                <td class="py-3 px-4 font-medium text-[#111]">{{ $student->full_name }}</td>
                                <td class="py-3 px-4 text-[#4b5563]">
                                    <div>{{ $student->program }}</div>
                                    <span class="text-[10px] text-[#6b7280]">{{ $student->year_level }}</span>
                                </td>
                                <td class="py-3 px-4 text-[#4b5563] font-mono">{{ $student->email }}</td>
                                <td class="py-3 px-4 text-[#6b7280] font-mono">{{ $student->created_at->format('M d, Y') }}</td>
                                <td class="py-3 px-4 text-right">
                                    <a href="{{ route('students.show', $student->id) }}" class="px-2.5 py-1 bg-[#f3f4f6] text-[#111] border border-[#e5e7eb] rounded text-xs hover:bg-[#e5e7eb] transition-colors inline-block font-medium">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3 border-t border-[#e5e7eb] bg-[#fafafa]">
                {{ $students->links() }}
            </div>
        @else
            <div class="p-12 text-center text-xs text-[#6b7280]">
                <p class="font-medium text-[#374151] mb-1">No student records found.</p>
                <p class="mb-4">There are currently no students registered in the system.</p>
                <a href="{{ route('students.create') }}" class="px-3.5 py-1.5 bg-[#111] text-white text-xs font-medium rounded hover:bg-[#27272a] transition-colors inline-block">
                    Register First Student
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
