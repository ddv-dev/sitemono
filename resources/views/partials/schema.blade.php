@php
    $brand = $brand ?? config('seo.brand', 'ПСМ-Монолит');
    $routeName = $routeName ?? request()->route()?->getName();
    $home = url('/');
    $phoneIntl = '+7' . substr(preg_replace('/\D+/', '', (string) ($company->phone ?? '')), -10);

    // Организация / локальный бизнес
    $organization = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => $home . '#organization',
        'name' => $company->legal_name ?: $brand,
        'alternateName' => $brand,
        'url' => $home,
        'image' => asset('images/base/logo.svg'),
        'telephone' => $phoneIntl,
        'email' => $company->email,
        'priceRange' => 'от 5 600 ₽/м³',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $company->production_address,
            'addressRegion' => 'Московская область',
            'addressCountry' => 'RU',
        ],
        'areaServed' => [
            '@type' => 'AdministrativeArea',
            'name' => 'Московская область',
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '00:00',
            'closes' => '23:59',
        ],
    ];

    // Сайт
    $website = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $home . '#website',
        'url' => $home,
        'name' => config('seo.site_name', $brand),
        'inLanguage' => 'ru-RU',
        'publisher' => ['@id' => $home . '#organization'],
    ];

    // Хлебные крошки
    $labels = [
        'home' => 'Главная',
        'concrete' => 'Бетон',
        'pumps' => 'Насосы',
        'delivery' => 'Доставка',
        'objects' => 'Объекты',
        'prices' => 'Цены',
        'about' => 'О заводе',
        'companies' => 'Компаниям',
        'contacts' => 'Контакты',
    ];

    $crumbs = [['name' => 'Главная', 'url' => $home]];
    if ($routeName && $routeName !== 'home' && isset($labels[$routeName])) {
        $crumbs[] = ['name' => $labels[$routeName], 'url' => url()->current()];
    }

    $breadcrumbs = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($crumbs)->map(fn ($c, $i) => [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $c['name'],
            'item' => $c['url'],
        ])->all(),
    ];

    $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
@endphp

<script type="application/ld+json">{!! json_encode($organization, $flags) !!}</script>
<script type="application/ld+json">{!! json_encode($website, $flags) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbs, $flags) !!}</script>
