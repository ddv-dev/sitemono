<header class="header column">
    <div class="container">
        <a href="/" class="logo">
            <img src="{{ asset('images/base/logo.svg') }}" alt="ПСМ - Монолиг. Завод бетона и насосов">
        </a>

        <nav class="main-nav">
            <ul class="nav-links">
                <li><a href="/concrete" class="{{ request()->routeIs('concrete') ? 'active' : '' }}">Бетон</a></li>
                <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
                <li><a href="/delivery" class="{{ request()->routeIs('delivery') ? 'active' : '' }}">Доставка</a></li>
                <li><a href="/objects" class="{{ request()->routeIs('objects') ? 'active' : '' }}">Объекты</a></li>
                <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
                <li><a href="/companies" class="{{ request()->routeIs('companies') ? 'active' : '' }}">Компаниям</a></li>
                <li class="nav-dropdown-item">
                    <a href="/about" class="nav-dropdown-trigger {{ request()->routeIs('about', 'contacts') ? 'active' : '' }}">
                        О заводе
                        <svg class="nav-caret" viewBox="0 0 12 8" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m1 1 5 5 5-5" />
                        </svg>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
                        <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="nav-actions">
            <button type="button" class="btn btn-primary fw-semibold br-6" data-order="Заказать звонок">Заказать
                звонок</button>
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
                <a href="tel:{{ $company->phone_tel }}" class="text-white fw-bold fs-20">{{ $company->phone }}</a>
                <span class="fs-14 text-white d-flex items-center">{{ $company->callback_note }}</span>
            </div>
            <div class="smm-content-right">
                <button class="btn text-primary fs-18 fw-semibold btn-arrow-right br-6" data-order="Заказать бетон">Заказать
                    бетон</button>
            </div>
        </div>
    </div>
</header>

{{-- Мобильное меню (скрыто на десктопе) --}}
<div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <nav>
        <ul class="mobile-nav-links">
            <li><a href="/concrete" class="{{ request()->routeIs('concrete') ? 'active' : '' }}">Бетон</a></li>
            <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
            <li><a href="/delivery" class="{{ request()->routeIs('delivery') ? 'active' : '' }}">Доставка</a></li>
            <li><a href="/objects" class="{{ request()->routeIs('objects') ? 'active' : '' }}">Объекты</a></li>
            <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
            <li><a href="/companies" class="{{ request()->routeIs('companies') ? 'active' : '' }}">Компаниям</a></li>
            <li class="mobile-nav-group">
                <span class="mobile-nav-grouptitle">О заводе</span>
                <ul class="mobile-subnav">
                    <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
                    <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="mobile-menu-footer">
        <a href="tel:{{ $company->phone_tel }}" class="text-primary fw-bold fs-22">{{ $company->phone }}</a>
        <span class="fs-14 text-muted">{{ $company->callback_note }}</span>
        <button type="button" class="btn btn-primary fw-semibold br-6 w-full text-center" data-order="Заказать звонок">Заказать
            звонок</button>
    </div>
</div>

<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
