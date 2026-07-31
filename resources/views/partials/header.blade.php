<header class="header column">
    <div class="container">
        <a href="/" class="logo">
            <img src="{{ asset('images/base/logo.svg') }}" alt="ПСМ - Монолиг. Завод бетона и насосов">
        </a>

        <nav class="main-nav">
            <ul class="nav-links">
                <li><a href="/concrete" class="{{ request()->routeIs('/concrete') ? 'active' : '' }}">Бетон</a></li>
                <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
                <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
                <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
                <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
            </ul>
        </nav>

        <div class="nav-actions">
            <a href="/callback" class="btn btn-primary fw-semibold br-6">Заказать звонок</a>
        </div>

        <button type="button" class="nav-toggle" id="navToggle" aria-label="Открыть меню" aria-expanded="false"
            aria-controls="mobileMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="smm-line">
        <div class="smm-content items-center jc-sb pi-80">
            <div class=" d-flex smm-content-left gap-10">
                <a href="tel:89915583888" class="text-white fw-bold fs-20">8 (991) 558-38-88</a>
                <span class="fs-14 text-white d-flex items-center">Перезвоним за 4 минуты</span>
            </div>
            <div class="smm-content-right">
                <button class="btn text-primary fs-18 fw-semibold btn-arrow-right br-6">Заказать бетон</button>
            </div>
        </div>
    </div>
</header>

{{-- Мобильное меню (скрыто на десктопе) --}}
<div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <nav>
        <ul class="mobile-nav-links">
            <li><a href="/concrete" class="{{ request()->routeIs('/concrete') ? 'active' : '' }}">Бетон</a></li>
            <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
            <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
            <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
            <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
        </ul>
    </nav>

    <div class="mobile-menu-footer">
        <a href="tel:89915583888" class="text-primary fw-bold fs-22">8 (991) 558-38-88</a>
        <span class="fs-14 text-muted">Перезвоним за 4 минуты</span>
        <a href="/callback" class="btn btn-primary fw-semibold br-6 w-full text-center">Заказать звонок</a>
    </div>
</div>

<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
