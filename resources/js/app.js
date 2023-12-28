import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();



if (localStorage.dark == 1) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}


document.querySelectorAll(".setMode").forEach(item =>
    item.addEventListener("click", () => {
            if (localStorage.dark == 1) {
                localStorage.dark = 0;
                document.documentElement.classList.remove('dark');
            } else {
                localStorage.dark = 1;
                document.documentElement.classList.add('dark');
            }
        })
    )
