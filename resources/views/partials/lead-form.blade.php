{{-- Форма заявки (тёмная секция). Параметры: $title, $sub, $bg --}}
<section class="section {{ $bg ?? 'section--dark' }}" id="zayavka">
    <div class="container">
        <div class="split">
            <div>
                <span class="eyebrow">Заявка</span>
                <h2 class="section-title" style="margin-top:16px">{{ $title ?? 'Оставьте заявку' }}</h2>
                <p class="section-lead">{{ $sub ?? 'Перезвоним за 4 минуты. Уточним объём, марку и сроки — назовём финальную цену без скрытых наценок.' }}</p>

                <div class="feat-list" style="margin-top:34px;max-width:460px">
                    <div class="feat">
                        <span class="feat__ico">@include('icons.clock')</span>
                        <div><h4>Перезвоним за 4 минуты</h4><p>Менеджер уточнит задачу и подберёт марку бетона.</p></div>
                    </div>
                    <div class="feat">
                        <span class="feat__ico">@include('icons.doc')</span>
                        <div><h4>Паспорт качества ГОСТ</h4><p>Документы с каждой партией и машиной.</p></div>
                    </div>
                </div>
            </div>

            <form class="lead-form" data-lead-form>
                <div class="stack">
                    <div class="field">
                        <label class="field__label">Имя</label>
                        <input class="input" type="text" name="name" placeholder="Как к вам обращаться" required>
                    </div>
                    <div class="field">
                        <label class="field__label">Телефон</label>
                        <input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
                    </div>
                    <div class="field">
                        <label class="field__label">Адрес объекта или город МО</label>
                        <input class="input" type="text" name="address" placeholder="Например: Мытищи, ул. Строителей">
                    </div>
                    <button type="submit" class="btn btn--primary btn--block btn--lg">Получить расчёт стоимости →</button>
                    <label class="checkbox">
                        <input type="checkbox" required>
                        <span>Нажимая кнопку, вы соглашаетесь с политикой конфиденциальности</span>
                    </label>
                    <div class="form-success">Заявка отправлена. Перезвоним в течение 4 минут!</div>
                </div>
            </form>
        </div>
    </div>
</section>
