<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-text-main leading-tight">
                {{ __('Manage Teachers') }}
            </h2>
            <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30 focus:outline-none focus:ring-2 focus:ring-accent-teal focus:ring-offset-2 focus:ring-offset-background">
                Add New
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-2xl sm:rounded-2xl p-10 flex flex-col gap-y-5">
                @forelse($teachers ?? [] as $teacher)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ isset($teacher->user) ? Storage::url($teacher->user->avatar) : 'https://images.unsplash.com/photo-1552196563-55cd4e45efb3?q=80&w=3426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px] ring-2 ring-accent-teal/50">
                        <div class="flex flex-col">
                            <h3 class="text-text-main text-xl font-bold">{{ $teacher->user->name ?? 'Unknown Teacher' }}</h3>
                            <p class="text-text-muted text-sm">{{ $teacher->user->occupation ?? 'Teacher' }}</p>
                        </div>
                    </div> 
                    <div class="hidden md:flex flex-col">
                        <p class="text-text-muted text-sm">Joined Date</p>
                        <h3 class="text-text-main text-xl font-bold">{{ $teacher->created_at->format('d M Y') ?? '12 Jan 2024' }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-500/90 hover:bg-rose-500 text-white rounded-full font-bold text-sm transition-all duration-300">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-text-muted">No teachers found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
