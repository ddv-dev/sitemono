// resources/js/calculator/calculator.js

class Calculator {
    constructor(config = {}) {
        // Конфигурация
        this.calculateUrl = config.calculateUrl || '';
        this.csrfToken = config.csrfToken || '';
        
        // DOM элементы
        this.form = document.getElementById('calculatorForm');
        this.typeSelect = document.getElementById('typeSelect');
        this.gradeSelect = document.getElementById('gradeSelect');
        this.volumeInput = document.getElementById('volumeInput');
        this.totalPriceEl = document.getElementById('totalPrice');
        this.addServiceBtn = document.getElementById('addServiceBtn');
        
        // Инициализация
        this.init();
    }

    init() {
        this.initVolumeButtons();
        this.initEvents();
        this.initAddServiceButton();
        this.firstCalculate();
    }

    // Инициализация кнопок объема
    initVolumeButtons() {
        document.querySelectorAll('.volume-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const action = e.currentTarget.dataset.action;
                let currentValue = parseFloat(this.volumeInput.value) || 0;

                if (action === 'increase') {
                    currentValue = Math.min(currentValue + 0.5, 1000);
                } else if (action === 'decrease') {
                    currentValue = Math.max(currentValue - 0.5, 0.5);
                }

                this.volumeInput.value = currentValue;
                this.calculatePrice();
            });
        });
    }

    // Инициализация событий
    initEvents() {
        // Изменение селектов и инпута
        this.typeSelect.addEventListener('change', () => this.calculatePrice());
        this.gradeSelect.addEventListener('change', () => this.calculatePrice());
        this.volumeInput.addEventListener('input', () => this.calculatePrice());
        
        // Чекбоксы услуг
        document.querySelectorAll('.service-checkbox').forEach(cb => {
            cb.addEventListener('change', () => this.calculatePrice());
        });

        // Отправка формы
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.submitForm();
        });
    }

    // Кнопка "Добавить услугу"
    initAddServiceButton() {
        if (this.addServiceBtn) {
            this.addServiceBtn.addEventListener('click', () => {
                const firstService = document.querySelector('.service-checkbox');
                if (firstService) {
                    firstService.checked = !firstService.checked;
                    firstService.dispatchEvent(new Event('change'));
                }
            });
        }
    }

    // Расчет цены
    calculatePrice() {
        const typeId = this.typeSelect.value;
        const gradeId = this.gradeSelect.value;
        const volume = parseFloat(this.volumeInput.value) || 0;

        if (!typeId || !gradeId || volume <= 0) {
            this.totalPriceEl.textContent = '— ₽';
            return;
        }

        const formData = new FormData();
        formData.append('type_id', typeId);
        formData.append('grade_id', gradeId);
        formData.append('volume', volume);

        document.querySelectorAll('.service-checkbox:checked').forEach(cb => {
            formData.append('services[]', cb.value);
        });

        // Показываем загрузку
        this.totalPriceEl.textContent = '...';

        fetch(this.calculateUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': this.csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка сервера');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                this.totalPriceEl.textContent = data.data.formatted_total_price;
            } else {
                this.totalPriceEl.textContent = 'Ошибка расчета';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            this.totalPriceEl.textContent = 'Ошибка расчета';
        });
    }

    // Отправка формы
    submitForm() {
        const data = {
            type_id: this.typeSelect.value,
            grade_id: this.gradeSelect.value,
            volume: parseFloat(this.volumeInput.value) || 0,
            total_price: this.totalPriceEl.textContent
        };

        console.log('Отправка заказа:', data);
        alert('✅ Заказ отправлен! Наш менеджер свяжется с вами в ближайшее время.');
    }

    // Первый расчет
    firstCalculate() {
        setTimeout(() => this.calculatePrice(), 100);
    }
}

export default Calculator;