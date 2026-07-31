{{-- resources/views/partials/faq.blade.php --}}

@php
    use App\Services\FaqService;
    $faqService = app(FaqService::class);
    
    // Если передана конкретная тема
    if (isset($faqTheme)) {
        $faqs = $faqService->getFaqsByThemeSlug($faqTheme);
        $theme = $faqService->getThemeBySlug($faqTheme);
        $showTitle = $showTitle ?? true;
    } 
    // Если передан список тем
    elseif (isset($themes)) {
        $themes = $themes;
        $showTitle = $showTitle ?? true;
    } 
    // Показываем все темы
    else {
        $themes = $faqService->getThemes();
        $showTitle = $showTitle ?? true;
    }
@endphp

{{-- Если передана конкретная тема --}}
@if(isset($faqTheme) && isset($faqs) && $faqs->count() > 0)
    <div class="faq-section">
        @if($showTitle && isset($theme))
            <div class="faq-header d-flex align-items-center gap-10 mb-20">
                @if($theme->icon)
                    <i class="{{ $theme->icon }} fs-2 text-primary"></i>
                @endif
                <h3 class="h4 fw-bold mb-0">{{ $theme->name }}</h3>
                @if($theme->description)
                    <p class="text-muted ms-3 mb-0 small">{{ $theme->description }}</p>
                @endif
            </div>
        @endif

        <div class="accordion" id="faqAccordion{{ isset($faqTheme) ? $faqTheme : 'default' }}">
            @foreach($faqs as $index => $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#faqCollapse{{ $faq->id }}" 
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                aria-controls="faqCollapse{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="faqCollapse{{ $faq->id }}" 
                         class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                         aria-labelledby="faqHeading{{ $faq->id }}" 
                         data-bs-parent="#faqAccordion{{ isset($faqTheme) ? $faqTheme : 'default' }}">
                        <div class="accordion-body">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{-- Если переданы темы с FAQ --}}
@elseif(isset($themes) && $themes->count() > 0)
    <div class="faq-wrapper">
        @foreach($themes as $theme)
            <div class="faq-section mb-40">
                @if($showTitle)
                    <div class="faq-header d-flex align-items-center gap-10 mb-20">
                        @if($theme->icon)
                            <i class="{{ $theme->icon }} fs-2 text-primary"></i>
                        @endif
                        <h2 class="h3 fw-bold mb-0">{{ $theme->name }}</h2>
                        @if($theme->description)
                            <p class="text-muted ms-3 mb-0 small">{{ $theme->description }}</p>
                        @endif
                    </div>
                @endif

                <div class="accordion" id="faqAccordion{{ $theme->id }}">
                    @foreach($theme->activeFaqs as $index => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                                <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#faqCollapse{{ $faq->id }}" 
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                        aria-controls="faqCollapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $faq->id }}" 
                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                 aria-labelledby="faqHeading{{ $faq->id }}" 
                                 data-bs-parent="#faqAccordion{{ $theme->id }}">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@else
    <div class="alert alert-info text-center py-5">
        <i class="bi bi-info-circle" style="font-size: 2rem;"></i>
        <p class="mt-3 mb-0">Вопросы и ответы временно не доступны</p>
    </div>
@endif

@push('styles')
<style>
    .faq-section {
        margin-bottom: 2rem;
    }
    .faq-header {
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 1rem;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>
@endpush