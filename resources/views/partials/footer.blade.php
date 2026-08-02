<footer class="ftr bg-black">
    <div class="container">
        <div class="ftr-top">
            <div class="ftr-brand-col">
                <div class="ftr-brand fs-24 fw-bold text-cream">ПСМ Монолит</div>
                <a href="tel:{{ $company->phone_tel }}" class="ftr-phone fs-30 fw-bold text-cream">{{ $company->phone }}</a>
                <div class="ftr-address fs-14 text-muted">{{ $company->address_short }}</div>
            </div>

            <div class="ftr-col">
                <div class="ftr-col-head">Бетон</div>
                <ul>
                    <li><a href="/concrete">М200</a></li>
                    <li><a href="/concrete">М300</a></li>
                    <li><a href="/concrete">М350</a></li>
                    <li><a href="/concrete">М400</a></li>
                    <li><a href="/concrete">Зимний</a></li>
                </ul>
            </div>

            <div class="ftr-col">
                <div class="ftr-col-head">Доставка по МО</div>
                <ul>
                    <li><a href="/delivery">Одинцово</a></li>
                    <li><a href="/delivery">Истра</a></li>
                    <li><a href="/delivery">Наро-Фоминск</a></li>
                    <li><a href="/delivery">Тучково</a></li>
                    <li><a href="/delivery">Руза</a></li>
                    <li><a href="/delivery">Калюбакино</a></li>
                </ul>
            </div>

            <div class="ftr-col">
                <div class="ftr-col-head">Компания</div>
                <ul>
                    <li><a href="/about">О заводе</a></li>
                    <li><a href="/about">Сертификаты</a></li>
                    <li><a href="/about">Отзывы</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    <li><a href="/sitemap">Карта сайта</a></li>
                </ul>
            </div>
        </div>

        <div class="ftr-bottom">
            <span class="fs-14 text-muted">© {{ date('Y') }} ПСМ-Монолит. Все права защищены.</span>
            <a href="tel:{{ $company->phone_tel }}" class="fs-14 text-muted">{{ $company->phone }}</a>
        </div>
    </div>
</footer>
