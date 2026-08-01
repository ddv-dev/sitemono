// resources/js/components/order.js
//
// Единый модуль заявок: модальное окно, валидация телефона и отправка
// всех форм-заявок на /orders (заказы приходят в админку).

function digits(v) {
    return (v || '').replace(/\D+/g, '');
}

export function isValidPhone(v) {
    const d = digits(v);
    return d.length === 11 || d.length === 10;
}

// Форматирование в +7 (XXX) XXX-XX-XX
function formatPhone(value) {
    let d = digits(value);
    if (d.length === 0) return '';
    if (d[0] === '8') d = '7' + d.slice(1);
    if (d[0] !== '7') d = '7' + d;
    d = d.slice(0, 11);

    let out = '+7';
    if (d.length > 1) out += ' (' + d.slice(1, 4);
    if (d.length >= 4) out += ') ' + d.slice(4, 7);
    if (d.length >= 7) out += '-' + d.slice(7, 9);
    if (d.length >= 9) out += '-' + d.slice(9, 11);
    return out;
}

function attachPhoneInputs(root = document) {
    root.querySelectorAll('input[type="tel"]').forEach((input) => {
        if (input.dataset.phoneBound) return;
        input.dataset.phoneBound = '1';
        input.addEventListener('input', () => {
            input.value = formatPhone(input.value);
            input.classList.remove('is-invalid');
        });
    });
}

function csrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.content : '';
}

function setError(form, text) {
    let box = form.querySelector('.form-error');
    if (!box) {
        box = document.createElement('div');
        box.className = 'form-error';
        form.prepend(box);
    }
    box.textContent = text;
}

function clearError(form) {
    const box = form.querySelector('.form-error');
    if (box) box.remove();
}

function showSuccess(form) {
    const msg = form.dataset.successText || 'Заявка принята! Перезвоним в течение 4 минут.';
    const wrap = document.createElement('div');
    wrap.className = 'form-success';
    wrap.innerHTML = `<div class="form-success-icon">✓</div><p>${msg}</p>`;
    form.replaceWith(wrap);
}

async function submitOrderForm(form) {
    clearError(form);

    const phone = form.querySelector('input[type="tel"], input[name="phone"]');
    if (phone && !isValidPhone(phone.value)) {
        phone.classList.add('is-invalid');
        setError(form, 'Укажите корректный номер телефона.');
        phone.focus();
        return;
    }

    const submitBtn = form.querySelector('[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    try {
        const res = await fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken(),
                Accept: 'application/json',
            },
            body: new FormData(form),
        });

        if (res.ok) {
            showSuccess(form);
            return;
        }

        const data = await res.json().catch(() => ({}));
        const firstError = data.errors ? Object.values(data.errors)[0][0] : 'Не удалось отправить заявку. Попробуйте ещё раз.';
        setError(form, firstError);
    } catch (e) {
        setError(form, 'Ошибка сети. Попробуйте ещё раз.');
    } finally {
        if (submitBtn) submitBtn.disabled = false;
    }
}

function bindOrderForm(form) {
    if (form.dataset.bound) return;
    form.dataset.bound = '1';
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        submitOrderForm(form);
    });
}

function initOrderForms(root = document) {
    attachPhoneInputs(root);
    root.querySelectorAll('.js-order-form').forEach(bindOrderForm);
}

// ---- Модальное окно ----
function initOrderModal() {
    const overlay = document.getElementById('orderModal');
    if (!overlay) return;

    const body = overlay.querySelector('.js-order-body');
    const originalHTML = body.innerHTML; // чтобы восстановить свежую форму после успеха

    function open(source, message) {
        // Восстанавливаем форму (на случай, если ранее показали «успех»)
        body.innerHTML = originalHTML;

        const titleEl = body.querySelector('.order-modal-title');
        const sourceEl = body.querySelector('[data-order-source]');
        const msgEl = body.querySelector('textarea[name="message"]');

        if (sourceEl && source) sourceEl.value = source;
        if (titleEl) titleEl.textContent = message ? 'Оформить заказ' : (source || 'Оставьте заявку');
        if (msgEl && message) msgEl.value = message;

        initOrderForms(body);

        overlay.classList.add('is-open');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        const phone = body.querySelector('input[type="tel"]');
        if (phone) setTimeout(() => phone.focus(), 50);
    }

    function close() {
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Доступ извне (например, из калькулятора)
    window.PSMOrderModal = { open, close };

    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('[data-order]');
        if (trigger) {
            e.preventDefault();
            open(trigger.dataset.order);
            return;
        }
        if (e.target.closest('[data-order-close]') || e.target === overlay) {
            close();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') close();
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initOrderForms();
    initOrderModal();
});

export default { initOrderForms, initOrderModal };
