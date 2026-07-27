{{-- Аккордеон вопросов. Параметр: $items = [[вопрос, ответ], ...] --}}
<div class="faq">
    @foreach ($items as [$q, $a])
        <div class="faq__item">
            <button class="faq__q" type="button">
                <span>{{ $q }}</span>
                <span class="ic">@include('icons.plus')</span>
            </button>
            <div class="faq__a">
                <div class="faq__a-inner">{{ $a }}</div>
            </div>
        </div>
    @endforeach
</div>
