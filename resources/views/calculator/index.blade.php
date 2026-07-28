<section class="calculator-section">
    <div class="calculator-container">
        <h1 class="calculator-title">Рассчитать стоимость</h1>

        <div class="calculator-wrapper">
            <div class="calculator-form">
                <form id="calculatorForm">
                    @csrf

                    <!-- ТИП РАБОТ -->
                    <div class="form-group">
                        <label class="form-label">ТИП РАБОТ</label>
                        <select name="type_id" id="typeSelect" class="form-control" required>
                            <option value="">Выберите тип</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- МАРКА БЕТОНА -->
                    <div class="form-group">
                        <label class="form-label">МАРКА БЕТОНА</label>
                        <select name="grade_id" id="gradeSelect" class="form-control" required>
                            <option value="">Выберите марку</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }} {{ $grade->class ? '(' . $grade->class . ')' : '' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ОБЪЁМ -->
                    <div class="form-group">
                        <label class="form-label">ОБЪЁМ, м³</label>
                        <div class="volume-control">
                            <button type="button" class="volume-btn" data-action="decrease">−</button>
                            <input type="number" name="volume" id="volumeInput" class="form-control volume-input" value="10" min="0.5" max="1000" step="0.5">
                            <button type="button" class="volume-btn" data-action="increase">+</button>
                        </div>
                    </div>

                    <!-- Дополнительные услуги (свитчи) -->
                    @if($services->isNotEmpty())
                        <div class="services-group">
                            @foreach($services as $service)
                                <label class="service-switch">
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}" class="service-checkbox">
                                    <span class="switch-slider"></span>
                                    <span class="service-label">{{ $service->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    @endif

                    <button type="submit" class="btn-submit">Заказать</button>
                </form>
            </div>

            <!-- Результат -->
            <div class="calculator-result" id="calculatorResult">
                <div class="result-price">
                    <span class="price-amount" id="totalPrice">— ₽</span>
                </div>
                <p class="result-note">Без учёта доставки — точная цена после звонка</p>
                
                @if($services->isNotEmpty())
                    <button class="btn-add-service" id="addServiceBtn">
                        Добавить {{ $services->first()->name }}
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>