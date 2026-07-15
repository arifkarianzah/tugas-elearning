<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-main leading-tight">
            {{ __('New Course') }}
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
                
                <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_trailer" :value="__('Video Trailer URL (e.g. YouTube ID or URL)')" />
                        <x-text-input id="path_trailer" class="block mt-1 w-full" type="text" name="path_trailer" :value="old('path_trailer')" required />
                        <x-input-error :messages="$errors->get('path_trailer')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="teacher" :value="__('Teacher')" />
                        <select name="teacher_id" id="teacher_id" class="mt-1 block w-full bg-background border border-white/20 text-text-main focus:border-accent-teal focus:ring-accent-teal rounded-full px-5 py-3 shadow-inner transition-all">
                            <option value="">Choose teacher</option>
                            @forelse($teachers ?? [] as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name ?? $teacher->user->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="category" :value="__('Category')" />
                        <select name="category_id" id="category_id" class="mt-1 block w-full bg-background border border-white/20 text-text-main focus:border-accent-teal focus:ring-accent-teal rounded-full px-5 py-3 shadow-inner transition-all">
                            <option value="">Choose category</option>
                            @forelse($categories ?? [] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="mt-1 block w-full bg-background border border-white/20 text-text-main focus:border-accent-teal focus:ring-accent-teal rounded-2xl px-5 py-3 shadow-inner transition-all"></textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <hr class="my-8 border-white/10">

                    <div class="mt-6">
                        <div class="flex flex-col gap-y-5">
                            <x-input-label for="keypoints" :value="__('Keypoints')" />
                            @for ($i = 0; $i < 4; $i++)
                                <input type="text" class="block w-full bg-background border border-white/20 text-text-main focus:border-accent-teal focus:ring-accent-teal rounded-full px-5 py-3 shadow-inner transition-all" placeholder="Write your copywriting" name="course_keypoints[]">
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('course_keypoints')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30 focus:outline-none focus:ring-2 focus:ring-accent-teal focus:ring-offset-2 focus:ring-offset-background">
                            Add New Course
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
