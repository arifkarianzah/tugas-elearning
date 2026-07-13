<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-main leading-tight">
            {{ __('Add Video to Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden p-10 shadow-2xl sm:rounded-2xl">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-rose-500 text-white px-5 mb-4 font-medium shadow-md">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ isset($course) ? Storage::url($course->thumbnail) : 'https://images.unsplash.com/photo-1552196563-55cd4e45efb3?q=80&w=3426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px] ring-2 ring-accent-teal/50">
                        <div class="flex flex-col">
                            <h3 class="text-text-main text-xl font-bold">{{ $course->name ?? 'Course Name' }}</h3>
                            <p class="text-text-muted text-sm">{{ $course->category->name ?? 'Category' }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-text-muted text-sm">Teacher</p>
                        <h3 class="text-text-main text-xl font-bold">{{ $course->teacher->user->name ?? 'Annima Poppo' }}</h3>
                    </div>
                </div>

                <hr class="my-8 border-white/10">
                
                <form method="POST" action="{{ isset($course) ? route('admin.course.store.video', $course->id) : '#' }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="path_video" :value="__('Youtube Video ID')" />
                        <x-text-input id="path_video" class="block mt-1 w-full" type="text" name="path_video" :value="old('path_video')" required autofocus autocomplete="path_video" />
                        <x-input-error :messages="$errors->get('path_video')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30 focus:outline-none focus:ring-2 focus:ring-accent-teal focus:ring-offset-2 focus:ring-offset-background">
                            Add New Video
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
