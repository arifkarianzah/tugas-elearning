<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <div>
                <h2 class="font-heading font-bold text-2xl text-text-main leading-tight">
                    {{ __('Manage Categories') }}
                </h2>
                <p class="text-text-muted text-sm mt-1">Kelola semua kategori kursus Anda di sini.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

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
                            <th class="w-12 px-6 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">#</th>
                            <th class="w-20 px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Icon</th>
                            <th class="px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Name</th>
                            <th class="px-4 py-4 text-xs font-bold text-text-muted uppercase tracking-widest">Slug</th>
                            <th class="w-44 px-6 py-4 text-xs font-bold text-text-muted uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($categories as $index => $category)
                        <tr class="hover:bg-white/[0.04] transition-colors duration-200 group">
                            
                            {{-- No --}}
                            <td class="px-6 py-4">
                                <span class="text-sm font-mono text-text-muted">{{ $index + 1 }}</span>
                            </td>

                            {{-- Icon --}}
                            <td class="px-4 py-4">
                                <div class="w-12 h-12 rounded-full bg-background flex items-center justify-center border-2 border-accent-teal/40 overflow-hidden shadow-lg shadow-accent-teal/10">
                                    <img src="{{ Storage::url($category->icon) }}" class="w-full h-full object-cover" alt="{{ $category->name }}">
                                </div>
                            </td>

                            {{-- Name --}}
                            <td class="px-4 py-4">
                                <span class="text-base font-bold text-text-main group-hover:text-accent-teal transition-colors">{{ $category->name }}</span>
                            </td>

                            {{-- Slug --}}
                            <td class="px-4 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-text-muted whitespace-nowrap">{{ $category->slug }}</span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex flex-row gap-2 justify-end">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-accent-amber/10 border border-accent-amber/30 hover:bg-accent-amber hover:border-accent-amber text-accent-amber hover:text-background rounded-full font-bold text-xs transition-all duration-300 whitespace-nowrap">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="inline-flex items-center gap-1.5 px-4 py-2 bg-rose-500/10 border border-rose-500/30 hover:bg-rose-500 hover:border-rose-500 text-rose-400 hover:text-white rounded-full font-bold text-xs transition-all duration-300 whitespace-nowrap">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                                        <svg class="w-10 h-10 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    </div>
                                    <p class="text-text-muted text-lg font-medium">Belum ada kategori.</p>
                                    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all hover:-translate-y-1">
                                        Tambah Kategori Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($categories->count() > 0)
                <div class="px-6 py-4 bg-white/[0.02] border-t border-white/10 flex justify-between items-center">
                    <p class="text-xs text-text-muted">Total: <span class="font-bold text-white">{{ $categories->count() }}</span> kategori</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>