{{-- Телефон-баннер --}}
<section class="cta-phone">
    <div class="container">
        <div>
            <a href="tel:+79915583888" class="cta-phone__num">8 (991) 558-38-88</a>
            <div class="cta-phone__meta">{{ $note ?? 'Перезвоним за 4 минуты · Работаем и принимаем заявки 24/7' }}</div>
        </div>
        <a href="{{ route('callback') }}" class="btn btn--primary btn--lg">Заказать звонок</a>
    </div>
</section>
