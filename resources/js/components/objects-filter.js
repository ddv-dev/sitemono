// resources/js/components/objects-filter.js
//
// Фильтрация карточек объектов по категории на странице «Объекты».

export function initObjectsFilter() {
    const filter = document.getElementById('objFilter');
    const grid = document.getElementById('objGrid');
    if (!filter || !grid) {
        return;
    }

    const buttons = filter.querySelectorAll('.filter-btn');
    const cards = grid.querySelectorAll('.obj-card');
    const empty = document.getElementById('objEmpty');

    filter.addEventListener('click', (e) => {
        const btn = e.target.closest('.filter-btn');
        if (!btn) return;

        buttons.forEach((b) => b.classList.remove('active'));
        btn.classList.add('active');

        const value = btn.dataset.filter;
        let visible = 0;

        cards.forEach((card) => {
            const match = value === 'all' || card.dataset.category === value;
            card.hidden = !match;
            if (match) visible += 1;
        });

        if (empty) empty.hidden = visible !== 0;
    });
}

document.addEventListener('DOMContentLoaded', initObjectsFilter);

export default { init: initObjectsFilter };
