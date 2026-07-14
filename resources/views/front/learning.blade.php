<!doctype html>
<html class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-background text-text-main font-sans antialiased min-h-screen flex flex-col">

    <nav class="w-full flex justify-between items-center px-4 md:px-10 py-4 bg-background/80 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
        <a href="{{ route('front.index') }}" class="flex items-center gap-2">
            <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-accent-teal to-accent-violet rounded-lg shadow-lg shadow-accent-teal/30">
                <span class="font-heading font-bold text-lg text-white">A</span>
            </div>
            <span class="font-heading font-extrabold text-xl tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white to-white/70">Alqowy</span>
        </a>
        <a href="{{ route('front.details', $course->slug) }}" class="flex items-center gap-2 text-sm font-medium text-text-muted hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Course</span>
        </a>
    </nav>

    <div class="flex-grow w-full max-w-[1400px] mx-auto flex flex-col lg:flex-row h-full">
        
        {{-- Video Player Area --}}
        <div class="w-full lg:w-3/4 flex flex-col border-r border-white/10">
            <div class="w-full aspect-video bg-black relative">
                @if(str_contains($courseVideo->path_video, 'youtube.com') || str_contains($courseVideo->path_video, 'youtu.be'))
                    @php
                        // Coba extract video ID jika memungkinkan, ini cara simple
                        $url = $courseVideo->path_video;
                        if(str_contains($url, 'youtu.be/')) {
                            $vidId = explode('youtu.be/', $url)[1];
                        } elseif(str_contains($url, 'watch?v=')) {
                            $vidId = explode('watch?v=', $url)[1];
                            $vidId = explode('&', $vidId)[0];
                        } else {
                            $vidId = $url; // default fallback
                        }
                    @endphp
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $vidId }}?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                    {{-- Jika video path bukan youtube, misal storage local atau iframe tag langsung --}}
                    <iframe src="{{ $courseVideo->path_video }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                @endif
            </div>
            <div class="p-6 md:p-10 flex flex-col gap-4">
                <h1 class="font-heading font-bold text-3xl text-white">{{ $courseVideo->name }}</h1>
                <p class="text-text-muted text-lg">Modul dari kursus <span class="font-semibold text-accent-teal">{{ $course->name }}</span></p>
                
                <div class="flex items-center gap-4 mt-4 pt-6 border-t border-white/10">
                    <div class="w-12 h-12 rounded-full overflow-hidden border border-white/10 shrink-0">
                        <img src="{{ Storage::url($course->teacher->user->avatar ?? 'images/avatar-default.png') }}" class="w-full h-full object-cover" alt="teacher">
                    </div>
                    <div class="flex flex-col">
                        <p class="font-semibold text-white">{{ $course->teacher->user->name ?? 'Instructor' }}</p>
                        <p class="text-sm text-text-muted">Teacher</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar Video List --}}
        <div class="w-full lg:w-1/4 flex flex-col bg-background/50 backdrop-blur-md h-full lg:min-h-[calc(100vh-65px)]">
            <div class="p-6 border-b border-white/10">
                <h3 class="font-heading font-bold text-xl text-white">Course Modules</h3>
                <p class="text-sm text-text-muted mt-1">{{ $course->videos->count() }} Videos</p>
            </div>
            <div class="flex flex-col p-4 gap-3 overflow-y-auto">
                @foreach($course->videos as $index => $video)
                    <a href="{{ route('front.learning', [$course->slug, $video->id]) }}" class="flex items-center gap-4 p-4 rounded-xl border {{ $courseVideo->id == $video->id ? 'bg-accent-teal/10 border-accent-teal' : 'bg-white/5 border-white/10 hover:bg-white/10 hover:border-white/20' }} transition-all">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 {{ $courseVideo->id == $video->id ? 'bg-accent-teal text-[#12141C]' : 'bg-background text-text-muted shadow-inner' }} font-bold text-sm">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col">
                            <p class="font-medium text-sm {{ $courseVideo->id == $video->id ? 'text-accent-teal' : 'text-white/90' }}">{{ $video->name }}</p>
                        </div>
                        @if($courseVideo->id == $video->id)
                            <div class="ml-auto w-2 h-2 rounded-full bg-accent-teal animate-pulse"></div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

    </div>

</body>
</html>
