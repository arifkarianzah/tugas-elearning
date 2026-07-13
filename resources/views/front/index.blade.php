<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Langsung pakai asset() karena CSS ada di public/css/ --}}
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black font-sans pb-[50px]">

    <div id="hero-section" class="w-full bg-[#08031A] text-white pt-6 pb-20 relative overflow-hidden font-sans">
        {{-- Optional: subtle background glowing elements to mimic neon lighting --}}
        <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-[#FF6129]/20 blur-[150px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[50%] bg-[#A855F7]/20 blur-[150px] rounded-full pointer-events-none"></div>

        <nav class="max-w-[1200px] mx-auto w-full flex justify-between items-center px-10 relative z-10">
            <a href="{{ route('front.index') }}" class="flex items-center gap-2">
                <img src="{{ asset('assets/logo/logo.svg') }}" alt="logo" class="h-10 brightness-0 invert"> 
                <span class="font-bold text-2xl tracking-wide">alqowy</span>
            </a>
            <ul class="flex items-center gap-8 text-sm text-gray-300">
                <li class="relative">
                    <a href="#" class="font-semibold text-white">Home</a>
                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-4 h-[2px] bg-[#FF6129] rounded-full"></div>
                </li>
                <li><a href="#" class="hover:text-white transition-colors">Courses</a></li>
                <li><a href="{{ route('front.pricing') }}" class="hover:text-white transition-colors">Pricing</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Benefits</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Success Stories</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
            </ul>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-white font-semibold rounded-full px-6 py-2.5 bg-gradient-to-r from-[#FF6129] to-[#F43F5E] transition-all hover:shadow-[0_0_20px_rgba(255,97,41,0.4)]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-white font-semibold rounded-full px-6 py-2.5 ring-1 ring-white/30 hover:ring-white transition-all">Sign In</a>
                    <a href="{{ route('register') }}" class="text-white font-semibold rounded-full px-6 py-2.5 bg-gradient-to-r from-[#FF6129] to-[#F43F5E] transition-all hover:shadow-[0_0_20px_rgba(255,97,41,0.4)]">Sign Up</a>
                @endauth
            </div>
        </nav>

        <div class="max-w-[1200px] mx-auto w-full flex items-center justify-between mt-20 px-10 relative z-10">
            
            {{-- Left Column --}}
            <div class="flex flex-col max-w-[600px] w-full">
                <div class="w-fit flex items-center gap-3 p-1 pr-4 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-8">
                    <div class="w-16 h-8 flex shrink-0">
                        <img src="{{ asset('assets/icon/avatar-group.png') }}" class="object-cover h-full rounded-full" alt="icon">
                    </div>
                    <p class="font-medium text-xs text-gray-300">Join 3 million+ learners worldwide <span class="text-white ml-2 opacity-50">+</span></p>
                </div>
                
                <h1 class="font-bold text-[72px] leading-[1.1] mb-6">
                    Build Future <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF8A50] to-[#E91E63] relative inline-block">
                        Career.
                        {{-- SVG underline for 'Career.' --}}
                        <svg class="absolute -bottom-2 left-0 w-[90%]" viewBox="0 0 200 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 7C45.5 -1.5 130 -2.5 198 7" stroke="url(#paint0_linear)" stroke-width="3" stroke-linecap="round"/><defs><linearGradient id="paint0_linear" x1="2" y1="7" x2="198" y2="7" gradientUnits="userSpaceOnUse"><stop stop-color="#FF8A50"/><stop offset="1" stop-color="#E91E63"/></linearGradient></defs></svg>
                    </span>
                </h1>
                
                <p class="text-gray-400 text-lg leading-relaxed mb-10 max-w-md">
                    Alqowy provides high quality online courses for you to grow your skills and build outstanding portfolio to tackle job interviews.
                </p>
                
                <div class="flex items-center gap-5 mb-16">
                    <a href="#Popular-Courses" class="flex items-center gap-3 text-white font-semibold rounded-full px-8 py-4 bg-gradient-to-r from-[#FF6129] to-[#F43F5E] transition-all hover:shadow-[0_0_20px_rgba(255,97,41,0.5)]">
                        Explore Courses
                        <div class="w-6 h-6 rounded-full bg-white flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#F43F5E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </a>
                    <a href="" class="flex items-center gap-3 text-white font-semibold rounded-full px-8 py-4 ring-1 ring-white/30 hover:ring-white transition-all bg-white/5 backdrop-blur-sm">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </div>
                        Career Guidance
                    </a>
                </div>
                
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-purple-400 shrink-0 border border-white/5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M10 16V8l6 4-6 4z"/></svg>
                        </div>
                        <span class="text-xs text-gray-400 leading-tight">Expert<br>Instructors</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-purple-400 shrink-0 border border-white/5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        </div>
                        <span class="text-xs text-gray-400 leading-tight">Lifetime<br>Access</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-purple-400 shrink-0 border border-white/5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                        </div>
                        <span class="text-xs text-gray-400 leading-tight">Certificate<br>of Completion</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-purple-400 shrink-0 border border-white/5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                        </div>
                        <span class="text-xs text-gray-400 leading-tight">Community<br>Support</span>
                    </div>
                </div>
            </div>

            {{-- Right Column (Image & Cards) --}}
            <div class="relative w-[500px] h-[550px] flex-shrink-0 mr-10 mt-10">
                <div class="absolute inset-0 bg-[#A855F7]/10 rounded-3xl overflow-hidden border border-white/10 shadow-[0_0_50px_rgba(168,85,247,0.15)] ring-1 ring-purple-500/20">
                    <img src="{{ asset('assets/photo/hero_student.png') }}" alt="Student" class="w-full h-full object-cover">
                </div>
                
                {{-- Floating Card 1 --}}
                <div class="absolute top-10 -left-12 bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex items-center gap-4 shadow-xl">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-xl leading-tight">1500+</p>
                        <p class="text-gray-300 text-xs">Online Courses</p>
                    </div>
                    {{-- Decorative graph line --}}
                    <div class="absolute -bottom-4 right-2 w-16 h-8">
                        <svg viewBox="0 0 100 30" fill="none" class="w-full h-full"><path d="M0 25C20 25 30 10 50 15C70 20 80 5 100 0" stroke="#FF8A50" stroke-width="3" stroke-linecap="round"/></svg>
                    </div>
                </div>

                {{-- Floating Card 2 --}}
                <div class="absolute bottom-12 -right-8 bg-white/10 backdrop-blur-md border border-white/20 p-4 px-6 rounded-2xl flex items-center gap-4 shadow-xl">
                    <div class="w-10 h-10 bg-[#00B67A] rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <p class="text-white font-bold text-xl">4.9/5</p>
                            <div class="flex text-yellow-400">
                                @for($i=0; $i<5; $i++)
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-400 text-xs">From 50K+ Reviews</p>
                    </div>
                </div>
            </div>
            
        </div>
        
        {{-- Logos bottom bar --}}
        <div class="max-w-[1200px] mx-auto w-full mt-24 border-t border-white/10 pt-10 px-10">
            <div class="flex justify-between items-center opacity-50 grayscale hover:grayscale-0 transition-all duration-500 mix-blend-screen">
                <img src="{{ asset('assets/icon/logo-55.svg') }}" alt="logo" class="h-8 brightness-0 invert">
                <img src="{{ asset('assets/icon/logo.svg') }}" alt="logo" class="h-8 brightness-0 invert">
                <img src="{{ asset('assets/icon/logo-54.svg') }}" alt="logo" class="h-8 brightness-0 invert">
                <img src="{{ asset('assets/icon/logo.svg') }}" alt="logo" class="h-8 brightness-0 invert">
                <img src="{{ asset('assets/icon/logo-52.svg') }}" alt="logo" class="h-8 brightness-0 invert">
                <img src="{{ asset('assets/icon/logo.svg') }}" alt="logo" class="h-8 brightness-0 invert">
            </div>
        </div>

    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Browse Courses</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-[30px]">
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Software Development</p>
            </a>
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1-1.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Digital Marketing</p>
            </a>
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1-2.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Business Intelligence</p>
            </a>
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1-3.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Freelancing Journey</p>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-[30px]">
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1-1.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Product & Customer Data Analytics</p>
            </a>
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1-4.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">UX Design <br> Copywriting</p>
            </a>
            <a href="category.html" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/Web Development 1.svg" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Software Quality Assurance</p>
            </a>
        </div>
    </section>
    <section id="Popular-Courses" class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#F5F8FA] rounded-3xl">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Courses</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Don’t Missed It, Learn Now</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
        </div>
        <div class="relative">
    <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
        <img src="{{ asset('assets/icon/arrow-right.svg') }}" alt="icon">
    </button>
    {{-- GANTI btn-prev jadi btn-next --}}
    <button class="btn-next absolute -right-[52px] top-[216px]">
        <img src="{{ asset('assets/icon/arrow-right.svg') }}" alt="icon">
    </button>
    <div id="course-slider" class="w-full">
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-1.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern JavaScript: Bikin Projek Website Seperti Twitter</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">32,280 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo1.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Angga Risky</p>
                                    <p class="text-[#6D7786]">Full-Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-2.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Full-Stack JavaScript Next JS Developer: Build Job Portal Website</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">3,069 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo2.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Hariyanto</p>
                                    <p class="text-[#6D7786]">Full-Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-3.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern JavaScript: Bikin Projek Website Seperti Twitter</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">41,070 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo3.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Muhamad Fadli</p>
                                    <p class="text-[#6D7786]">UX Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-1.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern JavaScript: Bikin Projek Website Seperti Twitter</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">32,280 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo1.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Angga Risky</p>
                                    <p class="text-[#6D7786]">Full-Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-2.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Full-Stack JavaScript Next JS Developer: Build Job Portal Website</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">3,069 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo2.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Hariyanto</p>
                                    <p class="text-[#6D7786]">Full-Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-2xl shadow-sm border border-gray-100 gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:-translate-y-0.5 hover:ring-[#FF6129] hover:bg-[#FF6129] hover:border-transparent">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="assets/thumbnail/thumbnail-3.png" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern JavaScript: Bikin Projek Website Seperti Twitter</a>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">41,070 students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="assets/photo/photo3.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">Muhamad Fadli</p>
                                    <p class="text-[#6D7786]">UX Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px]">
        <div class="relative">
            <div class="w-[355px] h-[488px]">
                <img src="assets/background/benefit_illustration.png" alt="icon">
            </div>
            <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[214px] bg-white z-10 rounded-2xl gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Materials</p>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/video-play.svg" alt="icon">
                    </div>
                    <p class="font-medium">Videos</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/note-favorite.svg" alt="icon">
                    </div>
                    <p class="font-medium">Handbook</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/3dcube.svg" alt="icon">
                    </div>
                    <p class="font-medium">Assets</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/award.svg" alt="icon">
                    </div>
                    <p class="font-medium">Certificates</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/book.svg" alt="icon">
                    </div>
                    <p class="font-medium">Documentations</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Learn From Anywhere,<br>Anytime You Want</h2>
            <p class="text-[#475466] text-lg leading-[34px]">Growing new skills would be more flexible without <br> limit we help you to access all course materials.</p>
            <a href="" class="text-white font-semibold rounded-full p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 hover:shadow-[#FF612980] w-fit">Check Pricing</a>
        </div>
    </section>
    <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-3xl">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Zero to Success People</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Happy & Success Students</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Acquiring skills and new high paying career become much easier</p>
            </div>
        </div>
        <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA] to-[#F5F8FA00]"></div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#F5F8FA]"></div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="testi-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                    <div>
                        <img src="assets/icon/medal-star.svg" alt="icon">
                    </div>
                    <p class="font-medium text-sm text-[#FF6129]">Grow Your Career</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Get Your Answers</h2>
                    <p class="text-lg text-[#475466]">It’s time to upgrade skills without limits!</p>
                </div>
                <a href="" class="text-white font-semibold rounded-full p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 hover:shadow-[#FF612980] w-fit">Contact Our Sales</a>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Can beginner join the course?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Yes, we have provided a variety range of course from beginner to intermediate level to prepare your next big career,</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">How long does the implementation take?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Do you provide the job-guarantee program?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">How to issue all course certificates?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#F5F8FA] rounded-3xl">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="assets/logo/logo-black.svg" alt="logo">
                </div>
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Products</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Online Courses</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Career Guidance</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Expert Handbook</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Interview Simulations</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Company</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">About Us</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Media Press</a>
                    </li>
                    <li class="flex items-center gap-[10px]">
                        <a href="" class="text-[#6D7786]">Careers</a>
                        <div class="gradient-badge w-fit p-[6px_10px] rounded-full border border-[#FED6AD] flex items-center">
                            <p class="font-medium text-xs text-[#FF6129]">We’re Hiring</p>
                        </div>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Developer APIs</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Resources</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Blog</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">FAQ</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Help Center</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved Alqowy BuildWithAngga 2024</p>
        </div>
    </footer>

 <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    {{-- Ganti main.js dengan asset() --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>






 
