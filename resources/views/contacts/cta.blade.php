<section class="bg-black py-40">
    <div class="container phone-cta-inner">
        <div class="phone-cta-text">
            <div class="phone-cta-label">Работаем круглосуточно</div>
            <a href="tel:{{ $company->phone_tel }}" class="phone-cta-num">{{ $company->phone }}</a>
            <div class="phone-cta-sub">{{ $company->callback_note }}. Работаем 24/7.</div>
        </div>
        <button type="button" class="btn btn-primary btn-arrow-right-white fs-18 fw-semibold br-20 phone-cta-btn"
            data-order="Заказать бетон">
            Заказать бетон
        </button>
    </div>
</section>
