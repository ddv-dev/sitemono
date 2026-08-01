@if ($objects->isNotEmpty())
    <section class="bg-black py-40">
        <div class="container">
            <div class="sec-label sec-label-dark"><span class="sec-label-line"></span>Кейсы</div>
            <h2 class="fs-40 fw-bold text-cream mb-40">Реализованные объекты</h2>

            <div class="b2b-cases">
                @foreach ($objects as $object)
                    <div class="dark-card">
                        <div class="dark-card-cat">{{ $object->category_badge }} · {{ $object->city }}</div>
                        <div class="dark-card-title">{{ $object->title }}</div>
                        <div class="dark-card-meta">
                            @if ($object->formatted_volume)
                                <div>Объём: {{ $object->formatted_volume }}</div>
                            @endif
                            @if ($object->marks_line)
                                <div>Марка: {{ $object->marks_line }}</div>
                            @endif
                            @if ($object->years_line)
                                <div>Год: {{ $object->years_line }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="/objects" class="btn btn-primary btn-arrow-right-white fs-16 fw-semibold br-20 mt-40 d-inline-flex">
                Все объекты
            </a>
        </div>
    </section>
@endif
