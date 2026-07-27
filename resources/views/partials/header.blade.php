<header class="header column">
    <div class="container">
        <a href="/" class="logo">
            <img src="{{ asset('images/base/logo.svg') }}" alt="ПСМ - Монолиг. Завод бетона и насосов">
        </a>

        <nav>
            <ul class="nav-links">
                <li><a href="/" class="{{ request()->routeIs('/') ? 'active' : '' }}">Бетон</a></li>
                <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
                <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
                <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
                <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
            </ul>
        </nav>

        <div class="nav-actions">
            <a href="/callback" class="btn btn-primary fw-semibold">Заказать звонок</a>
        </div>
    </div>

    <div class="smm-line">
        <div class="smm-content items-center jc-sb pi-80">
            <div class=" d-flex smm-content-left gap-10">
                <a href="tel:89915583888" class="text-white fw-bold fs-20">8 (991) 558-38-88</a>
                <span class="fs-14 text-white d-flex items-center">Перезвоним за 4 минуты</span>
            </div>
            <div class="smm-content-right">
                <button class="btn text-primary fs-18 fw-semibold btn-arrow-right">Заказать бетон</button>
            </div>
        </div>
    </div>
</header>
