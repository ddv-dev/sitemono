// resources/js/components/nav.js
//
// Управление мобильным меню (бургер). Работает только когда на странице
// присутствуют соответствующие элементы шапки.

export function initMobileNav() {
    const toggle = document.getElementById('navToggle');
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileMenuOverlay');

    if (!toggle || !menu) {
        return;
    }

    function openMenu() {
        toggle.classList.add('is-open');
        menu.classList.add('is-open');
        if (overlay) overlay.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        toggle.classList.remove('is-open');
        menu.classList.remove('is-open');
        if (overlay) overlay.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    function toggleMenu() {
        if (menu.classList.contains('is-open')) {
            closeMenu();
        } else {
            openMenu();
        }
    }

    toggle.addEventListener('click', toggleMenu);

    if (overlay) {
        overlay.addEventListener('click', closeMenu);
    }

    // Закрываем меню при клике по ссылке
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    // Закрытие по Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMenu();
        }
    });

    // Если экран расширили до десктопа — сбрасываем состояние
    window.addEventListener('resize', () => {
        if (window.innerWidth > 900) {
            closeMenu();
        }
    });
}

document.addEventListener('DOMContentLoaded', initMobileNav);

export default { init: initMobileNav };
