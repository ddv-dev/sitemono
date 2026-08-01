// resources/js/components/reveal.js
//
// Плавное появление блоков при прокрутке. Класс .reveal добавляется здесь,
// поэтому при отключённом JS контент остаётся видимым.

const SELECTORS = [
    '.container h1',
    '.container h2',
    '.hero-block-content',
    '.panel-white',
    '.choose-card',
    '.qualities-card',
    '.terms-card',
    '.cars-card',
    '.zone-card',
    '.obj-card',
    '.b2b-card',
    '.doc-card',
    '.autopark-card',
    '.dark-card',
    '.contact-card',
    '.lab-stat',
    '.photo-ph',
    '.step',
].join(',');

export function initReveal() {
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const els = document.querySelectorAll(SELECTORS);

    if (reduced || !('IntersectionObserver' in window)) {
        return; // без анимации — контент просто виден
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

    // Небольшой каскад для соседних элементов одного контейнера
    const counters = new Map();

    els.forEach((el) => {
        const parent = el.parentElement;
        const idx = counters.get(parent) || 0;
        counters.set(parent, idx + 1);

        el.style.transitionDelay = Math.min(idx * 70, 350) + 'ms';
        el.classList.add('reveal');
        observer.observe(el);
    });
}

document.addEventListener('DOMContentLoaded', initReveal);

export default { init: initReveal };
