    <section class="calculator-section py-40 section-bottom" id="calculator">
        <div class="container">
            <h2 class="fs-40 fw-bold  mb-32">Рассчитать стоимость</h2>


            <div class="panel panel-white ">

                <div class="column w-full ">
                    <form id="calculatorForm" data-calculate-url="{{ route('calculator.calculate') }}"
                        data-csrf-token="{{ csrf_token() }}">
                        @csrf
                        <div class="d-flex gap-40 column">
                            <div class="row gap-30 items-center">

                                <div class="form-group flex-1">
                                    <label class="form-label">ТИП РАБОТ</label>
                                    <select name="type_id" id="typeSelect" class="form-control" required>
                                        <option value="">Выберите тип</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group flex-1">
                                    <label class="form-label">МАРКА БЕТОНА</label>
                                    <select name="grade_id" id="gradeSelect" class="form-control" required>
                                        <option value="">Выберите марку</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                {{ $grade->class ? '(' . $grade->class . ')' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">ОБЪЁМ, м³</label>
                                    <div class="volume-control">
                                        <button type="button" class="volume-btn" data-action="decrease">−</button>
                                        <input type="number" name="volume" id="volumeInput"
                                            class="form-control volume-input" value="10" min="0.5"
                                            max="1000" step="0.5">
                                        <button type="button" class="volume-btn" data-action="increase">+</button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-a br-8">Заказать</button>

                            </div>
                            <div class="row">


                                <div class="calculator-result" id="calculatorResult">
                                    <div class="result-price">
                                        <span class="price-amount" id="totalPrice">— ₽</span>
                                    </div>
                                    <p class="result-note">Без учёта доставки — точная цена после звонка</p>
                                </div>

                            </div>
                            <div class="row">
                                @if ($services->isNotEmpty())
                                    <div class="services-group">
                                        @foreach ($services as $service)
                                            <label class="service-switch">
                                                <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                                    class="service-checkbox">
                                                <span class="switch-slider"></span>
                                                <span class="service-label">{{ $service->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
