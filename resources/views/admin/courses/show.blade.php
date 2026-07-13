<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-text-main leading-tight">
                {{ __('Course Details') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-2xl sm:rounded-2xl p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ isset($course) ? Storage::url($course->thumbnail) : 'https://images.unsplash.com/photo-1552196563-55cd4e45efb3?q=80&w=3426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="" class="rounded-2xl object-cover w-[200px] h-[150px] ring-2 ring-accent-teal/50">
                        <div class="flex flex-col">
                            <h3 class="text-text-main text-xl font-bold">{{ $course->name ?? 'Course Title' }}</h3>
                            <p class="text-text-muted text-sm">{{ $course->category->name ?? 'Category' }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-text-muted text-sm">Students</p>
                        <h3 class="text-text-main text-xl font-bold">{{ isset($course) ? $course->students->count() : '0' }}</h3>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ isset($course) ? route('admin.courses.edit', $course) : '#' }}" class="inline-flex items-center px-4 py-2 bg-accent-amber/90 hover:bg-accent-amber text-background rounded-full font-bold text-sm transition-all duration-300">
                            Edit Course
                        </a>
                        <form action="{{ isset($course) ? route('admin.courses.destroy', $course) : '#' }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-500/90 hover:bg-rose-500 text-white rounded-full font-bold text-sm transition-all duration-300">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="my-5 border-white/10">

                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-col">
                        <h3 class="text-text-main text-xl font-bold">Course Videos</h3>
                        <p class="text-text-muted text-sm">{{ isset($course) ? $course->course_videos->count() : '0' }} Total Videos</p>
                    </div>
                    <a href="{{ isset($course) ? route('admin.course.create.video', $course->id) : '#' }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-violet rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-teal/30">
                        Add New Video
                    </a>
                </div>

                @forelse(isset($course) ? $course->course_videos : [] as $video)
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <iframe width="560" class="rounded-2xl object-cover w-[120px] h-[90px] ring-2 ring-accent-teal/50" height="315" src="https://www.youtube-nocookie.com/embed/{{ $video->path_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <div class="flex flex-col">
                            <h3 class="text-text-main text-xl font-bold">{{ $video->name }}</h3>
                            <p class="text-text-muted text-sm">{{ $course->name }}</p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.course_videos.edit', $video) }}" class="inline-flex items-center px-4 py-2 bg-accent-amber/90 hover:bg-accent-amber text-background rounded-full font-bold text-sm transition-all duration-300">
                            Edit Video
                        </a>
                        <form action="{{ route('admin.course_videos.destroy', $video) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-10 h-10 bg-rose-500/90 hover:bg-rose-500 text-white rounded-full font-bold text-sm transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.0697 5.23C19.4597 5.07 17.8497 4.95 16.2297 4.86V4.85L16.0097 3.55C15.8597 2.63 15.6397 1.25 13.2997 1.25H10.6797C8.34967 1.25 8.12967 2.57 7.96967 3.54L7.75967 4.82C6.82967 4.88 5.89967 4.94 4.96967 5.03L2.92967 5.23C2.50967 5.27 2.20967 5.64 2.24967 6.05C2.28967 6.46 2.64967 6.76 3.06967 6.72L5.10967 6.52C10.3497 6 15.6297 6.2 20.9297 6.73C20.9597 6.73 20.9797 6.73 21.0097 6.73C21.3897 6.73 21.7197 6.44 21.7597 6.05C21.7897 5.64 21.4897 5.27 21.0697 5.23Z" fill="currentColor"/>
                                    <path d="M19.2297 8.14C18.9897 7.89 18.6597 7.75 18.3197 7.75H5.67975C5.33975 7.75 4.99975 7.89 4.76975 8.14C4.53975 8.39 4.40975 8.73 4.42975 9.08L5.04975 19.34C5.15975 20.86 5.29975 22.76 8.78975 22.76H15.2097C18.6997 22.76 18.8397 20.87 18.9497 19.34L19.5697 9.09C19.5897 8.73 19.4597 8.39 19.2297 8.14ZM13.6597 17.75H10.3297C9.91975 17.75 9.57975 17.41 9.57975 17C9.57975 16.59 9.91975 16.25 10.3297 16.25H13.6597C14.0697 16.25 14.4097 16.59 14.4097 17C14.4097 17.41 14.0697 17.75 13.6597 17.75ZM14.4997 13.75H9.49975C9.08975 13.75 8.74975 13.41 8.74975 13C8.74975 12.59 9.08975 12.25 9.49975 12.25H14.4997C14.9097 12.25 15.2497 12.59 15.2497 13C15.2497 13.41 14.9097 13.75 14.4997 13.75Z" fill="currentColor"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-text-muted">No videos found.</p>
                @endforelse
                
            </div>
        </div>
    </div>
</x-app-layout>
