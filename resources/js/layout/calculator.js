document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('calculatorForm');
    const typeSelect = document.getElementById('typeSelect');
    const gradeSelect = document.getElementById('gradeSelect');
    const volumeInput = document.getElementById('volumeInput');
    const totalPriceEl = document.getElementById('totalPrice');
    const resultBlock = document.getElementById('calculatorResult');
    const addServiceBtn = document.getElementById('addServiceBtn');

    // Управление объемом
    document.querySelectorAll('.volume-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.dataset.action;
            let currentValue = parseFloat(volumeInput.value) || 0;

            if (action === 'increase') {
                currentValue = Math.min(currentValue + 0.5, 1000);
            } else if (action === 'decrease') {
                currentValue = Math.max(currentValue - 0.5, 0.5);
            }

            volumeInput.value = currentValue;
            calculatePrice();
        });
    });

    // Автоматический расчет при изменении
    typeSelect.addEventListener('change', calculatePrice);
    gradeSelect.addEventListener('change', calculatePrice);
    volumeInput.addEventListener('input', calculatePrice);
    document.querySelectorAll('.service-checkbox').forEach(cb => {
        cb.addEventListener('change', calculatePrice);
    });

    // Кнопка "Добавить автобетонасос"
    if (addServiceBtn) {
        addServiceBtn.addEventListener('click', function() {
            const firstService = document.querySelector('.service-checkbox');
            if (firstService) {
                firstService.checked = !firstService.checked;
                firstService.dispatchEvent(new Event('change'));
            }
        });
    }

    // Функция расчета
    function calculatePrice() {
        const typeId = typeSelect.value;
        const gradeId = gradeSelect.value;
        const volume = parseFloat(volumeInput.value) || 0;

        if (!typeId || !gradeId || volume <= 0) {
            totalPriceEl.textContent = '— ₽';
            return;
        }

        // Собираем данные
        const formData = new FormData();
        formData.append('type_id', typeId);
        formData.append('grade_id', gradeId);
        formData.append('volume', volume);

        document.querySelectorAll('.service-checkbox:checked').forEach(cb => {
            formData.append('services[]', cb.value);
        });

        // Отправляем запрос
        fetch('{{ route("calculator.calculate") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                totalPriceEl.textContent = data.data.formatted_total_price;
            } else {
                totalPriceEl.textContent = 'Ошибка расчета';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            totalPriceEl.textContent = 'Ошибка расчета';
        });
    }

    // Отправка формы
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Заказ отправлен! Наш менеджер свяжется с вами в ближайшее время.');
    });

    // Инициализация
    setTimeout(calculatePrice, 100);
});