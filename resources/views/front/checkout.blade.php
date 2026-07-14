<!doctype html>
<html class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-background text-text-main font-sans pb-[50px] antialiased min-h-screen flex flex-col justify-between">

    <nav class="max-w-[1200px] mx-auto w-full flex justify-between items-center px-4 md:px-10 relative z-10 pt-6">
        <a href="{{ route('front.index') }}" class="flex items-center gap-2">
            <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-accent-teal to-accent-violet rounded-xl shadow-lg shadow-accent-teal/30">
                <span class="font-heading font-bold text-xl text-white">A</span>
            </div>
            <span class="font-heading font-extrabold text-2xl tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white to-white/70">Alqowy</span>
        </a>
    </nav>

    <div class="flex-grow flex items-center justify-center relative w-full px-4 py-20">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-accent-amber/20 blur-[150px] rounded-full pointer-events-none animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[50%] bg-[#A855F7]/20 blur-[150px] rounded-full pointer-events-none animate-pulse"></div>

        <div class="w-full max-w-lg bg-background/20 backdrop-blur-xl border border-white/10 rounded-3xl p-8 sm:p-10 shadow-2xl relative z-10" data-aos="zoom-in">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-accent-teal to-accent-violet rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <img src="{{ asset('assets/icon/crown.svg') }}" class="w-8 h-8 brightness-0 invert" alt="icon">
                </div>
                <h1 class="font-heading font-bold text-3xl text-white">Upgrade to Pro</h1>
                <p class="text-text-muted mt-2">Dapatkan akses seumur hidup ke semua kursus</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-8 flex justify-between items-center">
                <div>
                    <p class="text-sm text-text-muted">Total Pembayaran</p>
                    <p class="font-heading font-bold text-2xl text-white">Rp 429.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-text-muted">Transfer ke:</p>
                    <p class="font-semibold text-accent-teal">BCA - 1234567890</p>
                    <p class="text-xs text-text-muted">a.n Alqowy Edu</p>
                </div>
            </div>

            <form action="{{ route('front.checkout.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="proof" class="font-medium text-sm text-white/90">Unggah Bukti Pembayaran</label>
                    <div class="relative group cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-r from-accent-teal to-accent-violet rounded-xl blur opacity-25 group-hover:opacity-50 transition-opacity"></div>
                        <input type="file" name="proof" id="proof" class="relative w-full bg-background border border-white/20 rounded-xl px-4 py-3 text-sm text-text-muted focus:outline-none focus:border-accent-teal focus:ring-1 focus:ring-accent-teal file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-white/10 file:text-white hover:file:bg-white/20 transition-all cursor-pointer" required>
                    </div>
                    @error('proof')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full text-text-main font-semibold text-lg rounded-full px-8 py-4 bg-gradient-to-r from-accent-teal to-accent-violet transition-all duration-300 hover:shadow-[0_0_20px_rgba(45,212,191,0.5)] hover:-translate-y-1 flex items-center justify-center gap-3 mt-4">
                    <span>Konfirmasi Pembayaran</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({duration: 800, once: true});</script>
</body>
</html>
