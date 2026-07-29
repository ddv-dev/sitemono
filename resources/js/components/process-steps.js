
// resources/js/components/process-steps.js

/**
 * Инициализация аккордеона для процесса работы
 */
export function initProcessSteps() {
    const steps = document.querySelectorAll('.process-step');
    
    steps.forEach(step => {
        const header = step.querySelector('.step-header');
        if (header) {
            // Удаляем inline onclick, если он есть
            header.removeAttribute('onclick');
            // Добавляем обработчик через addEventListener
            header.addEventListener('click', function(e) {
                toggleStep(this);
            });
        }
    });
}

/**
 * Переключение состояния шага
 */
export function toggleStep(headerElement) {
    if (!headerElement) return;
    
    const step = headerElement.closest('.process-step');
    if (!step) return;
    
    step.classList.toggle('open');
}

/**
 * Закрывает все шаги кроме переданного
 */
export function closeOtherSteps(activeStep) {
    if (!activeStep) return;
    
    const allSteps = document.querySelectorAll('.process-step');
    allSteps.forEach(step => {
        if (step !== activeStep) {
            step.classList.remove('open');
        }
    });
}

/**
 * Альтернативный вариант: переключение с закрытием других
 */
export function toggleStepWithClose(headerElement) {
    if (!headerElement) return;
    
    const currentStep = headerElement.closest('.process-step');
    if (!currentStep) return;
    
    const allSteps = document.querySelectorAll('.process-step');
    
    // Закрываем все шаги
    allSteps.forEach(step => {
        if (step !== currentStep) {
            step.classList.remove('open');
        }
    });
    
    // Переключаем текущий
    currentStep.classList.toggle('open');
}

// Автоматическая инициализация при загрузке DOM
document.addEventListener('DOMContentLoaded', function() {
    // Инициализируем только если есть элементы
    if (document.querySelector('.process-step')) {
        initProcessSteps();
    }
});

// Экспорт по умолчанию для удобства
export default {
    init: initProcessSteps,
    toggle: toggleStep,
    toggleWithClose: toggleStepWithClose,
    closeOthers: closeOtherSteps
};