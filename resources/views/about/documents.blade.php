<section class="py-40" id="documents">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Сертификаты</div>
        <h2 class="fs-40 fw-bold mb-40">Документы и сертификаты</h2>

        @php
            $docs = [
                ['ГОСТ 7473-2010', 'Соответствие стандарту'],
                ['Лицензия лаборатории', 'Аккредитация'],
                ['Сертификаты на сырьё', 'Щебень, цемент, песок'],
                ['Свидетельство о регистрации', 'ОГРН, ИНН'],
            ];
        @endphp

        <div class="docs-grid">
            @foreach ($docs as [$title, $subtitle])
                <div class="doc-card">
                    <svg class="doc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                        <path d="M14 2v6h6" />
                        <path d="M9 13h6M9 17h6" />
                    </svg>
                    <div class="doc-title">{{ $title }}</div>
                    <div class="doc-sub">{{ $subtitle }}</div>
                </div>
            @endforeach
        </div>

        <a href="#" class="btn btn-primary btn-arrow-right-white fs-16 fw-semibold br-20 mt-40 doc-download">
            Скачать полный пакет документов
        </a>
    </div>
</section>
