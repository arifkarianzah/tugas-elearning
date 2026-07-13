<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" style="background-color: #4338ca; color: white; font-weight: bold; padding: 12px 24px; border-radius: 9999px; text-decoration: none;">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                @forelse ($categories as $category)
                <div class="flex flex-row justify-between items-center mb-4">
                    <div class="flex flex-row items-center gap-4">
                        <img src="{{ Storage::url($category->icon) }}" class="w-[50px] h-[50px] object-cover rounded-full" alt="">
                        <p class="text-lg font-semibold">{{ $category->name }}</p>
                    </div>
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" style="background-color: #facc15; color: white; font-weight: bold; padding: 8px 16px; border-radius: 9999px; text-decoration: none;">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #ef4444; color: white; font-weight: bold; padding: 8px 16px; border-radius: 9999px; border: none; cursor: pointer;">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <p>No categories found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>