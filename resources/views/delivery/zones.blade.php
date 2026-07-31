<section id="zones" class="container py-40">
    <div class="sec-label"><span class="sec-label-line"></span>Зоны доставки</div>
    <h2 class="fs-40 fw-bold mb-40">Карта зон доставки</h2>

    <div class="zones-layout">
        {{-- Концентрическая карта зон --}}
        <div class="zone-map-col">
            <div class="zone-map">
                <div class="zone-ring zone-ring-4">
                    <div class="zone-ring zone-ring-3">
                        <div class="zone-ring zone-ring-2">
                            <div class="zone-ring zone-ring-1">
                                <div class="zone-center">ЗАВОД</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="zone-labels">
                    <div class="zone-label zone-label-4">
                        <b>60+ км</b><span>по договорённости</span>
                    </div>
                    <div class="zone-label zone-label-3">
                        <b>40–60 км</b><span>+2500 ₽/рейс</span>
                    </div>
                    <div class="zone-label zone-label-2">
                        <b>20–40 км</b><span>+800–1500 ₽/рейс</span>
                    </div>
                    <div class="zone-label zone-label-1">
                        <b>0–20 км</b><span>Доставка включена</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Список зон --}}
        <div class="zone-list-col">
            <div class="zone-card zone-card-1">
                <span class="zone-dot"></span>
                <div class="zone-card-body">
                    <div class="zone-card-title">Зона 1 — 0–20 км</div>
                    <div class="zone-card-desc">Доставка включена в стоимость бетона</div>
                </div>
            </div>
            <div class="zone-card zone-card-2">
                <span class="zone-dot"></span>
                <div class="zone-card-body">
                    <div class="zone-card-title">Зона 2 — 20–40 км</div>
                    <div class="zone-card-desc">+800–1 500 ₽/рейс</div>
                </div>
            </div>
            <div class="zone-card zone-card-3">
                <span class="zone-dot"></span>
                <div class="zone-card-body">
                    <div class="zone-card-title">Зона 3 — 40–60 км</div>
                    <div class="zone-card-desc">+2 500 ₽/рейс</div>
                </div>
            </div>
            <div class="zone-card zone-card-4">
                <span class="zone-dot"></span>
                <div class="zone-card-body">
                    <div class="zone-card-title">Зона 4 — свыше 60 км</div>
                    <div class="zone-card-desc">По договорённости</div>
                </div>
            </div>

            <a href="/callback" class="btn btn-primary fs-16 fw-semibold br-20 mt-8 text-center">
                Узнать стоимость для моего адреса
            </a>
        </div>
    </div>
</section>
