<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="logo">
                    <svg class="logo__mark" viewBox="0 0 26 28" fill="none" aria-hidden="true">
                        <path d="M13 0L26 7.5V22.5L13 28L0 22.5V7.5L13 0Z" fill="currentColor"/>
                        <path d="M13 6L20 10V19L13 22L6 19V10L13 6Z" fill="#1c1c1c"/>
                    </svg>
                    <span class="logo__text">ПСМ-МОНОЛИТ</span>
                </a>
                <p class="footer-about">
                    Собственный бетонный завод в Подмосковье с 2009 года. Товарный бетон
                    М100–М500 и аренда автобетононасосов 24–52 м с доставкой по всей МО.
                </p>
            </div>

            <div class="footer-col">
                <h5>Бетон</h5>
                <ul>
                    <li><a href="{{ route('beton') }}">Купить бетон</a></li>
                    <li><a href="{{ route('nasos') }}">Аренда насоса</a></li>
                    <li><a href="{{ route('zimniy-beton') }}">Зимний бетон</a></li>
                    <li><a href="{{ route('ceny') }}">Цены</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Доставка по МО</h5>
                <ul>
                    <li><a href="{{ route('geo', 'mytishchi') }}">Мытищи</a></li>
                    <li><a href="{{ route('geo', 'balashikha') }}">Балашиха</a></li>
                    <li><a href="{{ route('geo', 'himki') }}">Химки</a></li>
                    <li><a href="{{ route('dostavka') }}">Все города →</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Компания</h5>
                <ul>
                    <li><a href="{{ route('o-zavode') }}">О заводе</a></li>
                    <li><a href="{{ route('portfolio') }}">Портфолио</a></li>
                    <li><a href="{{ route('companiyam') }}">Компаниям</a></li>
                    <li><a href="{{ route('kontakty') }}">Контакты</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} ПСМ-Монолит. Все права защищены.</span>
            <span>Работаем 24/7 · Перезвоним за 4 минуты · <a href="tel:+79915583888">8 (991) 558-38-88</a></span>
        </div>
    </div>
</footer>
