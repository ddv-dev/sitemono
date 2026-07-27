/* ============================================================
   ПСМ-Монолит — интерактив
   ============================================================ */
(function () {
    'use strict';

    /* --- Мобильное меню --- */
    var menu = document.getElementById('mobileMenu');
    function openMenu() { if (menu) { menu.classList.add('is-open'); document.body.style.overflow = 'hidden'; } }
    function closeMenu() { if (menu) { menu.classList.remove('is-open'); document.body.style.overflow = ''; } }
    document.querySelectorAll('[data-menu-open]').forEach(function (b) { b.addEventListener('click', openMenu); });
    document.querySelectorAll('[data-menu-close]').forEach(function (b) { b.addEventListener('click', closeMenu); });
    if (menu) { menu.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', closeMenu); }); }

    /* --- FAQ аккордеон --- */
    document.querySelectorAll('.faq__q').forEach(function (q) {
        q.addEventListener('click', function () {
            var item = q.closest('.faq__item');
            var ans = item.querySelector('.faq__a');
            var open = item.classList.toggle('is-open');
            ans.style.maxHeight = open ? ans.scrollHeight + 'px' : null;
        });
    });

    /* --- Калькулятор стоимости --- */
    document.querySelectorAll('[data-calc]').forEach(function (calc) {
        var grade = calc.querySelector('[data-calc-grade]');
        var volume = calc.querySelector('[data-calc-volume]');
        var addon = calc.querySelector('[data-calc-addon]');
        var out = calc.querySelector('[data-calc-sum]');
        var PUMP_PER_M3 = 350;

        function fmt(n) { return n.toLocaleString('ru-RU'); }
        function recalc() {
            var price = grade ? parseFloat(grade.value) || 0 : 0;
            var vol = volume ? parseFloat(volume.value) || 0 : 0;
            var sum = price * vol;
            if (addon && addon.checked) { sum += vol * PUMP_PER_M3; }
            if (out) { out.innerHTML = fmt(Math.round(sum)) + ' <small>₽</small>'; }
        }
        [grade, volume].forEach(function (el) { if (el) { el.addEventListener('input', recalc); el.addEventListener('change', recalc); } });
        if (addon) { addon.addEventListener('change', recalc); }
        recalc();
    });

    /* --- Фильтр портфолио --- */
    document.querySelectorAll('[data-portfolio]').forEach(function (root) {
        var chips = root.querySelectorAll('[data-filter]');
        var cards = root.querySelectorAll('[data-cat]');
        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                var f = chip.getAttribute('data-filter');
                chips.forEach(function (c) { c.classList.remove('chip--solid'); });
                chip.classList.add('chip--solid');
                cards.forEach(function (card) {
                    var show = f === 'all' || card.getAttribute('data-cat') === f;
                    card.style.display = show ? '' : 'none';
                });
            });
        });
    });

    /* --- Формы: имитация отправки --- */
    document.querySelectorAll('[data-lead-form]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var ok = form.querySelector('.form-success');
            if (ok) { ok.classList.add('is-visible'); }
            form.querySelectorAll('input, textarea, select').forEach(function (el) {
                if (el.type !== 'checkbox') { el.value = ''; }
            });
        });
    });
})();
