// resources/js/calculator/init.js

import Calculator from './calculator.js';

export function initCalculator(config = {}) {
    const calculatorForm = document.getElementById('calculatorForm');
    if (!calculatorForm) {
        console.warn('Калькулятор не найден на странице');
        return null;
    }

    const calculateUrl = config.calculateUrl || calculatorForm.dataset.calculateUrl || window.calculateUrl;
    const csrfToken = config.csrfToken || calculatorForm.dataset.csrfToken || window.csrfToken || document.querySelector('meta[name="csrf-token"]')?.content;

    if (!calculateUrl) {
        console.error('URL для расчета не найден');
        return null;
    }

    if (!csrfToken) {
        console.error('CSRF токен не найден');
        return null;
    }

    return new Calculator({
        calculateUrl: calculateUrl,
        csrfToken: csrfToken
    });
}

// Автоматическая инициализация
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('calculatorForm')) {
        initCalculator();
    }
});