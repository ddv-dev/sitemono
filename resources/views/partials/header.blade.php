<header class="header">
    <div class="container">
        <!-- Логотип -->
        <a href="/" class="logo">ПСМ</a>

        <!-- Навигация -->
        <nav>
            <ul class="nav-links">
                <li><a href="/" class="{{ request()->routeIs('/') ? 'active' : '' }}">Бетон</a></li>
                <li><a href="/pumps" class="{{ request()->routeIs('pumps') ? 'active' : '' }}">Насосы</a></li>
                <li><a href="/prices" class="{{ request()->routeIs('prices') ? 'active' : '' }}">Цены</a></li>
                <li><a href="/about" class="{{ request()->routeIs('about') ? 'active' : '' }}">О заводе</a></li>
                <li><a href="/contacts" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Контакты</a></li>
            </ul>
        </nav>

        <!-- Кнопка -->
        <div class="nav-actions">
            <a href="/callback" class="btn-primary">Заказать звонок</a>
        </div>
    </div>
</header>