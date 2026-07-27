{{-- Калькулятор стоимости бетона --}}
<div class="calc" data-calc>
    <div class="calc__grid">
        <div class="field">
            <label class="field__label">Тип работ</label>
            <select class="select" data-calc-type>
                <option>Фундамент</option>
                <option>Стяжка пола</option>
                <option>Перекрытие</option>
                <option>Отмостка / дорожка</option>
                <option>Монолитные стены</option>
            </select>
        </div>
        <div class="field">
            <label class="field__label">Марка бетона</label>
            <select class="select" data-calc-grade>
                <option value="4900">М100 В7.5 — от 4 900 ₽/м³</option>
                <option value="5200">М150 В12.5 — от 5 200 ₽/м³</option>
                <option value="5600" selected>М200 В15 — от 5 600 ₽/м³</option>
                <option value="5900">М250 В20 — от 5 900 ₽/м³</option>
                <option value="6200">М300 В22.5 — от 6 200 ₽/м³</option>
                <option value="6600">М350 В25 — от 6 600 ₽/м³</option>
                <option value="7200">М400 В30 — от 7 200 ₽/м³</option>
                <option value="8100">М500 В40 — от 8 100 ₽/м³</option>
            </select>
        </div>
        <div class="field">
            <label class="field__label">Объём, м³</label>
            <input class="input" type="number" min="1" value="10" data-calc-volume>
        </div>
        <a href="{{ route('callback') }}" class="btn btn--dark btn--lg">Заказать</a>
    </div>

    <div class="calc__result">
        <div>
            <div class="calc__result-label">Ориентировочная стоимость</div>
            <div class="calc__sum" data-calc-sum>56 000 <small>₽</small></div>
            <div class="calc__note">Без учёта доставки — точная цена после звонка</div>
        </div>
        <label class="calc__addon">
            <input type="checkbox" data-calc-addon>
            <span>Добавить автобетононасос (+350 ₽/м³)</span>
        </label>
    </div>
</div>
