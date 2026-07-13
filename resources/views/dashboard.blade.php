<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-main leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Section -->
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-2xl sm:rounded-2xl mb-8">
                <div class="p-8 flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-violet">Welcome back, {{ Auth::user()->name }}!</h3>
                        <p class="text-text-muted mt-2 text-lg">Here's what's happening in your Alqowy platform today.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-20 h-20 bg-gradient-to-br from-accent-teal to-accent-violet rounded-full flex items-center justify-center opacity-80">
                            <span class="text-3xl font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @hasrole('owner')
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Courses -->
                <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-lg rounded-2xl p-6 transition-all hover:scale-105 hover:bg-white/10">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-text-muted font-semibold uppercase tracking-wider text-sm">Total Courses</h4>
                        <div class="w-10 h-10 bg-accent-teal/20 rounded-full flex items-center justify-center text-accent-teal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-text-main">{{ $stats['courses'] ?? 0 }}</div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-lg rounded-2xl p-6 transition-all hover:scale-105 hover:bg-white/10">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-text-muted font-semibold uppercase tracking-wider text-sm">Categories</h4>
                        <div class="w-10 h-10 bg-accent-violet/20 rounded-full flex items-center justify-center text-accent-violet">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-text-main">{{ $stats['categories'] ?? 0 }}</div>
                </div>

                <!-- Total Teachers -->
                <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-lg rounded-2xl p-6 transition-all hover:scale-105 hover:bg-white/10">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-text-muted font-semibold uppercase tracking-wider text-sm">Teachers</h4>
                        <div class="w-10 h-10 bg-accent-amber/20 rounded-full flex items-center justify-center text-accent-amber">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-text-main">{{ $stats['teachers'] ?? 0 }}</div>
                </div>

                <!-- Total Students -->
                <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-lg rounded-2xl p-6 transition-all hover:scale-105 hover:bg-white/10">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-text-muted font-semibold uppercase tracking-wider text-sm">Students</h4>
                        <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center text-blue-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-text-main">{{ $stats['students'] ?? 0 }}</div>
                </div>
            </div>
            @endhasrole
        </div>
    </div>
</x-app-layout>
