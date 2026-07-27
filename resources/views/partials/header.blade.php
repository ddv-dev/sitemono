<header class="header column">
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

    <div class="ssm-line">
        <div>
    <a href="tel:89915583888">8 (991) 558-38-88</a> 
<span class=""></span>
        </div>
    </div>
</header>