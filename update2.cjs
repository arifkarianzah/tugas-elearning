const fs = require('fs');
const file = 'resources/views/front/index.blade.php';
let content = fs.readFileSync(file, 'utf8');

// 1. Fix Body Background
content = content.replace(/<body class="[^"]*">/, '<body class="bg-background text-text-main font-sans pb-[50px] antialiased">');

// 2. Fix remaining white backgrounds and card styles
content = content.replace(/bg-white/g, 'bg-white/5 backdrop-blur-md');
content = content.replace(/border-gray-100/g, 'border-white/10');
content = content.replace(/ring-1 ring-\[#DADEE4\]/g, 'ring-1 ring-white/10');
content = content.replace(/bg-\[#FFF8F4\]/g, 'bg-white/5');

// 3. Fix Stars (Replace img with inline SVG)
const starSVG = `<svg class="w-5 h-5 text-accent-amber inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>`;
content = content.replace(/<div>\s*<img src="assets\/icon\/star\.svg" alt="star">\s*<\/div>/g, starSVG);

// 4. Fix undefined testimonials
const names = ['Arif', 'Siti', 'Budi', 'Rina', 'Andi', 'Maya', 'Doni', 'Lestari', 'Bima', 'Citra', 'Eka', 'Dina', 'Fajar', 'Gita', 'Hadi', 'Indah'];
const comments = [
  'Gaskill benar-benar membantu saya beralih karier ke dunia tech dengan mudah!',
  'Materi yang diajarkan sangat daging, mentornya juga responsif.',
  'Berkat kursus di sini, saya berhasil mendapat pekerjaan impian!',
  'Project-based learning di Gaskill bikin portofolio saya jadi standout.',
  'Sangat direkomendasikan untuk pemula yang ingin belajar coding dari nol.',
  'Harga terjangkau tapi kualitas bintang lima. Top banget!',
  'UI/UX platformnya enak, materi videonya juga HD dan jelas.',
  'Terima kasih Gaskill, sekarang saya lebih percaya diri saat interview.',
  'Materi up-to-date dan sesuai dengan kebutuhan industri saat ini.',
  'Platform belajar terbaik yang pernah saya ikuti. Sangat memuaskan!',
  'Mentor sangat sabar dan detail dalam menjelaskan materi kompleks.',
  'Komunitas di Gaskill sangat suportif, banyak teman baru dan ilmu baru.',
  'Sertifikat dari Gaskill sangat berguna untuk melamar kerja.',
  'Sistem pembelajarannya sangat terstruktur dan mudah diikuti.',
  'Belajar coding jadi tidak membosankan berkat metode belajarnya.',
  'Worth every penny! Investasi terbaik untuk karier masa depan saya.'
];

let nIdx = 0;
content = content.replace(/<p class="font-heading font-bold">[^<]*<\/p>/g, (match) => {
    // Only replace in the testimonial section (which has these specific classes)
    const name = names[nIdx % names.length];
    nIdx++;
    return `<p class="font-heading font-bold">${name}</p>`;
});

let cIdx = 0;
content = content.replace(/<p class="text-sm text-text-muted">[^<]*<\/p>/g, (match) => {
    // We only want to replace the testimonial texts, but "Join 3 million+" is also text-text-muted.
    // Let's rely on a more specific regex for the testimonial paragraph.
    // The previous text was "Gaskill has helped me..." or "undefined"
    // Wait, the Join 3 million text is text-xs, not text-sm.
    const comment = comments[cIdx % comments.length];
    cIdx++;
    return `<p class="text-sm text-text-muted leading-relaxed">${comment}</p>`;
});

// 5. Add Animations
// Add AOS CSS
if (!content.includes('aos.css')) {
    content = content.replace('</head>', '    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">\n</head>');
}

// Add AOS JS
if (!content.includes('aos.js')) {
    content = content.replace('</body>', '    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>\n    <script>AOS.init({duration: 800, once: true});</script>\n</body>');
}

// Add data-aos attributes
content = content.replace(/<div id="hero-section"/, '<div id="hero-section" data-aos="fade-in"');
content = content.replace(/<section id="Top-Categories"/, '<section id="Top-Categories" data-aos="fade-up"');
content = content.replace(/<section id="Popular-Courses"/, '<section id="Popular-Courses" data-aos="fade-up"');
content = content.replace(/<section id="Pricing"/, '<section id="Pricing" data-aos="fade-up"');
content = content.replace(/<section id="Zero-to-Success"/, '<section id="Zero-to-Success" data-aos="zoom-in"');
content = content.replace(/<section id="FAQ"/, '<section id="FAQ" data-aos="fade-up"');
content = content.replace(/<footer /, '<footer data-aos="fade-up" ');

// Add hover effects to cards
content = content.replace(/hover:-translate-y-0\.5/g, 'hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent-teal/10');
content = content.replace(/transition-all duration-300/g, 'transition-all duration-500 ease-out');

// Add pulse to glowing orbs
content = content.replace(/pointer-events-none/g, 'pointer-events-none animate-pulse');

// Fix pricing text color layout
content = content.replace(/class="font-semibold">Materials<\/p>/, 'class="font-semibold text-text-main">Materials</p>');
content = content.replace(/class="font-medium">Videos<\/p>/, 'class="font-medium text-text-main">Videos</p>');
content = content.replace(/class="font-medium">Handbook<\/p>/, 'class="font-medium text-text-main">Handbook</p>');
content = content.replace(/class="font-medium">Assets<\/p>/, 'class="font-medium text-text-main">Assets</p>');
content = content.replace(/class="font-medium">Certificates<\/p>/, 'class="font-medium text-text-main">Certificates</p>');
content = content.replace(/class="font-medium">Documentations<\/p>/, 'class="font-medium text-text-main">Documentations</p>');

// Fix "undefined" text if it was skipped
content = content.replace(/>undefined</g, '>Platform belajar skill digital terbaik untuk mempersiapkan karier masa depanmu dengan portofolio nyata dan mentor berpengalaman.<');

fs.writeFileSync(file, content);
console.log("update2 completed");
