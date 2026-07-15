<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <div>
                <h2 class="font-heading font-bold text-2xl text-text-main leading-tight">
                    {{ __('Manage Teachers') }}
                </h2>
                <p class="text-text-muted text-sm mt-1">Kelola data guru pengajar di platform Anda.</p>
            </div>
            <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Teacher
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 flex items-center gap-3 px-5 py-4 rounded-2xl bg-accent-teal/10 border border-accent-teal/30 text-accent-teal text-sm font-medium">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white/5 border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
                <table class="w-full text-left table-fixed">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/[0.03]">
                            <th class="w-16 px-6 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">#</th>
                            <th class="w-24 px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Profile</th>
                            <th class="w-64 px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Teacher Info</th>
                            <th class="px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Email Address</th>
                            <th class="w-36 px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Joined Date</th>
                            <th class="w-32 px-6 py-4 text-xs font-bold text-text-muted uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($teachers ?? [] as $index => $teacher)
                        <tr class="hover:bg-white/[0.04] transition-colors duration-200 group">
                            
                            {{-- No --}}
                            <td class="px-6 py-4 align-middle">
                                <span class="text-sm font-mono text-text-muted">{{ $index + 1 }}</span>
                            </td>

                            {{-- Profile Picture --}}
                            <td class="px-4 py-4 align-middle">
                                <div class="w-12 h-12 rounded-full bg-background flex items-center justify-center border-2 border-accent-teal/40 overflow-hidden shadow-lg shadow-accent-teal/10">
                                    <img src="{{ isset($teacher->user) ? Storage::url($teacher->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($teacher->user->name ?? 'T') . '&background=random' }}" class="w-full h-full object-cover" alt="Profile">
                                </div>
                            </td>

                            {{-- Teacher Info --}}
                            <td class="px-4 py-4 align-middle">
                                <div class="flex flex-col">
                                    <span class="text-base font-bold text-text-main group-hover:text-accent-teal transition-colors">{{ $teacher->user->name ?? 'Unknown' }}</span>
                                    <span class="text-xs text-text-muted mt-0.5">{{ $teacher->user->occupation ?? 'Teacher' }}</span>
                                </div>
                            </td>

                            {{-- Email --}}
                            <td class="px-4 py-4 align-middle">
                                <span class="inline-block px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-text-muted break-all">{{ $teacher->user->email ?? '-' }}</span>
                            </td>

                            {{-- Joined Date --}}
                            <td class="px-4 py-4 align-middle">
                                <span class="text-sm text-text-muted">{{ $teacher->created_at ? $teacher->created_at->format('d M Y') : 'N/A' }}</span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4 align-middle">
                                <div class="flex flex-row gap-2 justify-end">
                                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white/5 border border-white/10 hover:bg-white/10 hover:border-white/20 text-text-muted hover:text-white rounded-full font-bold text-xs transition-all duration-300 whitespace-nowrap">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus guru ini?')" class="inline-flex items-center gap-1.5 px-4 py-2 bg-rose-500/10 border border-rose-500/30 hover:bg-rose-500 hover:border-rose-500 text-rose-400 hover:text-white rounded-full font-bold text-xs transition-all duration-300 whitespace-nowrap">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                                        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <p class="text-text-muted text-lg font-medium">Belum ada guru yang terdaftar.</p>
                                    <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all hover:-translate-y-1">
                                        Tambah Guru Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if(($teachers ?? collect())->count() > 0)
                <div class="px-6 py-4 bg-white/[0.02] border-t border-white/10 flex justify-between items-center">
                    <p class="text-xs text-text-muted">Total: <span class="font-bold text-white">{{ $teachers->count() }}</span> guru terdaftar</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
