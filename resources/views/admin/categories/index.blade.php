<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-text-main leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30 focus:outline-none focus:ring-2 focus:ring-accent-teal focus:ring-offset-2 focus:ring-offset-background">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-2xl sm:rounded-2xl p-10">
                @forelse ($categories as $category)
                <div class="flex flex-row justify-between items-center mb-4">
                    <div class="flex flex-row items-center gap-4">
                        <img src="{{ Storage::url($category->icon) }}" class="w-[50px] h-[50px] object-cover rounded-full ring-2 ring-accent-teal/50" alt="">
                        <p class="text-lg font-semibold text-text-main">{{ $category->name }}</p>
                    </div>
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center px-4 py-2 bg-accent-amber/90 hover:bg-accent-amber text-background rounded-full font-bold text-sm transition-all duration-300">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-500/90 hover:bg-rose-500 text-white rounded-full font-bold text-sm transition-all duration-300">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-text-muted">No categories found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>