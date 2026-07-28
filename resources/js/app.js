// resources/js/app.js

import './components/why-cards';

// Импортируем калькулятор
import Calculator from './calculator/calculator.js';
import { initCalculator } from './calculator/init.js';

// Экспортируем для глобального использования
window.Calculator = Calculator;
window.initCalculator = initCalculator;

// Инициализация при загрузке
document.addEventListener('DOMContentLoaded', function () {
    // Если есть форма калькулятора - инициализируем
    if (document.getElementById('calculatorForm')) {
        initCalculator();
    }
});