const fs = require('fs');
const file = 'resources/views/front/index.blade.php';
let content = fs.readFileSync(file, 'utf8');

// Colors replacement
content = content.replace(/text-black/g, 'text-text-main');
content = content.replace(/bg-\[#08031A\]/g, 'bg-background');
content = content.replace(/bg-white/g, 'bg-background');
content = content.replace(/text-gray-300/g, 'text-text-muted');
content = content.replace(/text-gray-400/g, 'text-text-muted');
content = content.replace(/text-\[#6D7786\]/g, 'text-text-muted');
content = content.replace(/text-\[#475466\]/g, 'text-text-muted');
content = content.replace(/bg-\[#F5F8FA\]/g, 'bg-white/5');
content = content.replace(/ring-\[#DADEE4\]/g, 'ring-white/10');
content = content.replace(/ring-\[#FF6129\]/g, 'ring-accent-teal');
content = content.replace(/border-\[#FED6AD\]/g, 'border-accent-violet/50');
content = content.replace(/text-\[#FF6129\]/g, 'text-accent-teal');
content = content.replace(/bg-\[#FF6129\]/g, 'bg-accent-amber');
content = content.replace(/bg-\[#FFF8F4\]/g, 'bg-white/5');
content = content.replace(/border-\[#FF6129\]/g, 'border-accent-teal');
content = content.replace(/bg-gradient-to-r from-\[#FF6129\] to-\[#F43F5E\]/g, 'bg-accent-amber text-[#12141C]');
content = content.replace(/from-\[#FF8A50\] to-\[#E91E63\]/g, 'from-accent-teal to-accent-violet');
content = content.replace(/text-white/g, 'text-text-main');
content = content.replace(/bg-\[#A855F7\]\/10/g, 'bg-accent-violet/10');
content = content.replace(/ring-purple-500\/20/g, 'ring-accent-violet/20');
content = content.replace(/shadow-\[0_0_50px_rgba\(168,85,247,0\.15\)\]/g, 'shadow-[0_0_50px_rgba(167,139,250,0.15)]');

// Typography
content = content.replace(/font-sans/g, 'font-sans'); // keep sans
content = content.replace(/font-bold/g, 'font-heading font-bold');

// Copy & Branding
content = content.replace(/alqowy/g, 'Gaskill');
content = content.replace(/Alqowy/g, 'Gaskill');
content = content.replace(/Build Future <br>\s*<span/g, 'Skill yang Kamu Pelajari Hari Ini, <br>\n<span');
content = content.replace(/Career\./g, 'Bisa Jadi Karier 6 Bulan Lagi.');
content = content.replace(/Gaskill provides high quality online courses for you to grow your skills and build outstanding portfolio to tackle job interviews\./g, 'Platform belajar skill digital terbaik untuk mempersiapkan karier masa depanmu dengan portofolio nyata dan mentor berpengalaman.');

// Assets Replace
content = content.replace(/hero_student\.png/g, 'hero_webdev.png');
content = content.replace(/benefit_illustration\.png/g, 'modern_workspace.png');
content = content.replace(/logo\.svg/g, 'gaskill_logo.png');
content = content.replace(/logo-black\.svg/g, 'gaskill_logo.png');
content = content.replace(/logo-55\.svg/g, 'gaskill_logo.png');
content = content.replace(/logo-54\.svg/g, 'gaskill_logo.png');
content = content.replace(/logo-52\.svg/g, 'gaskill_logo.png');

// Navbar logo fixes
content = content.replace(/<span class="font-heading font-bold text-2xl tracking-wide">Gaskill<\/span>/g, '<span class="font-heading font-bold text-2xl tracking-wide text-text-main">Gaskill</span>');
content = content.replace(/<img src="\{\{ asset\('assets\/logo\/gaskill_logo\.png'\) \}\}" alt="logo" class="h-10 brightness-0 invert">/g, '<img src="{{ asset(\'assets/logo/gaskill_logo.png\') }}" alt="logo" class="h-10">');

// Testimonials Fix
// We have 8 blocks of Shayna. We will use replace with function to iterate.
let avatarCount = 1;
const names = ['Arif', 'Siti', 'Budi', 'Rina', 'Andi', 'Maya', 'Doni', 'Lestari'];
const comments = [
  'Gaskill benar-benar membantu saya beralih karier ke dunia tech dengan mudah!',
  'Materi yang diajarkan sangat daging, mentornya juga responsif.',
  'Berkat kursus di sini, saya berhasil mendapat pekerjaan impian!',
  'Project-based learning di Gaskill bikin portofolio saya jadi standout.',
  'Sangat direkomendasikan untuk pemula yang ingin belajar coding dari nol.',
  'Harga terjangkau tapi kualitas bintang lima. Top banget!',
  'UI/UX platformnya enak, materi videonya juga HD dan jelas.',
  'Terima kasih Gaskill, sekarang saya lebih percaya diri saat interview.'
];
let i = 0;
content = content.replace(/<img src=\"assets\/photo\/photo4\.png\"/g, () => {
    const avatar = (i % 4) + 1;
    const res = `<img src="assets/photo/avatar_${avatar}.png"`;
    i++;
    return res;
});
let j = 0;
content = content.replace(/<p class=\"font-heading font-bold\">Shayna<\/p>/g, () => {
    const res = `<p class="font-heading font-bold">${names[j]}</p>`;
    j++;
    return res;
});
let k = 0;
content = content.replace(/<p class=\"text-sm text-text-muted\">Gaskill has helped me to grow from zero to perfect career, thank you!<\/p>/g, () => {
    const res = `<p class="text-sm text-text-muted">${comments[k]}</p>`;
    k++;
    return res;
});

// Fix Footer Credit
content = content.replace(/All Rights Reserved Gaskill BuildWithAngga 2024/g, 'Developed by Arifka Rianzah (Sistem Informasi | Fullstack Laravel & Tailwind)');

fs.writeFileSync(file, content);
console.log("Replaced successfully");
