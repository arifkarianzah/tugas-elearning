const fs = require('fs');
let content = fs.readFileSync('update2.cjs', 'utf8');
content = content.replace("fs.writeFileSync(file, content);", "content = content.replace(/text-\\\\[72px\\\\]/g, 'text-5xl md:text-[60px]');\nfs.writeFileSync(file, content);");
fs.writeFileSync('update2.cjs', content);
