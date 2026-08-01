@if ($documents->isNotEmpty())
    <section class="py-40" id="documents">
        <div class="container">
            <div class="sec-label"><span class="sec-label-line"></span>Сертификаты</div>
            <h2 class="fs-40 fw-bold mb-40">Документы и сертификаты</h2>

            <div class="docs-grid">
                @foreach ($documents as $document)
                    @php $isLink = filled($document->file_url); @endphp
                    <{{ $isLink ? 'a' : 'div' }} class="doc-card"
                        @if ($isLink) href="{{ $document->file_url }}" target="_blank" rel="noopener" download @endif>
                        <svg class="doc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <path d="M14 2v6h6" />
                            <path d="M9 13h6M9 17h6" />
                        </svg>
                        <div class="doc-title">{{ $document->title }}</div>
                        @if ($document->subtitle)
                            <div class="doc-sub">{{ $document->subtitle }}</div>
                        @endif
                    </{{ $isLink ? 'a' : 'div' }}>
                @endforeach
            </div>
        </div>
    </section>
@endif
