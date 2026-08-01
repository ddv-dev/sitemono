<section>
    <div class="d-flex row container bg-black items-center gap-20 jc-center">
        <div class="py-40 column gap-10">
            <span class="fs-16 text-muted">{{ $company->callback_note }}</span>
            <a class="fs-30 text-cream" href="tel:{{ $company->phone_tel }}">{{ $company->phone }}</a>
            <a class="fs-20 text-muted" href="mailto:{{ $company->email }}">{{ $company->email }}</a>
            <span class="fs-12 text-muted">Работаем 24/7 · Производство и доставка по всему МО</span>
        </div>
        <button class="btn btn-primary btn-arrow-right-white fs-18 fw-semibold br-20" data-order="Заказать бетон">Заказать
            бетон</button>
    </div>
</section>
