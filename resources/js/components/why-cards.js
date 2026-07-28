    document.addEventListener('DOMContentLoaded', function () {
        const whyCards = document.querySelectorAll('.why-card');

        function closeAllExcept(activeCard) {
            whyCards.forEach(card => {
                if (card !== activeCard && card.classList.contains('active')) {
                    card.classList.remove('active');
                }
            });
        }

        function handleWhyCardClick(e) {
            // Проверяем, не кликнули ли по ссылке
            const targetLink = e.target.closest('.why-card-cta');
            if (targetLink) {
                e.stopPropagation();
                return;
            }

            const card = this;

            // Если карточка уже активна - закрываем
            if (card.classList.contains('active')) {
                card.classList.remove('active');
                return;
            }

            // Закрываем все остальные, открываем текущую
            closeAllExcept(card);
            card.classList.add('active');

            // Прокручиваем к карточке, если она частично скрыта
            setTimeout(() => {
                card.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'center'
                });
            }, 100);
        }

        whyCards.forEach(card => {
            card.addEventListener('click', handleWhyCardClick);
        });

        // Закрытие по Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                whyCards.forEach(c => c.classList.remove('active'));
            }
        });

        console.log('why-card готовы. Клик — расширение справа налево с переворотом.');
    });