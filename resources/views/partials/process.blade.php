{{-- resources/views/partials/process.blade.php --}}

<section class="py-40">
    <div class="d-flex row container gap-40">
        <div class="flex-1 gap-6 column">
            <div class="fs-40 fw-bold">Этапы работы</div>
            <p class="fs-20 fw-medium">От звонка до бетона в опалубке</p>
            @php
                $steps = [
                    [
                        'number' => '01',
                        'title' => 'Звонок или заявка на сайте',
                        'description' =>
                            'Позвоните нам или оставьте заявку. Менеджер перезвонит в течение 4 минут, уточнит задачу и подберёт оптимальную марку бетона для вашего объекта.',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Расчёт и согласование',
                        'description' =>
                            'Мы рассчитываем стоимость, объём и сроки поставки. Согласовываем все детали с вами — чтобы вы знали точную цену и график работ.',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Производство под ваш заказ',
                        'description' =>
                            'Запускаем производство бетона на нашем заводе строго по вашему заказу. В каждой партии — паспорт качества и соответствие ГОСТ.',
                    ],
                    [
                        'number' => '04',
                        'title' => 'Доставка с документами',
                        'description' =>
                            'Доставляем бетон точно в назначенное время. Вместе с грузом передаём все документы: накладную, паспорт качества и сертификаты.',
                    ],
                ];
            @endphp

            @foreach ($steps as $index => $step)
                <div class=" mt-20 process-step {{ $loop->first ? 'open' : '' }}">
                    <div class="step-header">
                        <span class="step-number">{{ $step['number'] }}</span>
                        <span class="step-title">{{ $step['title'] }}</span>
                        <span class="step-toggle">+</span>
                    </div>
                    <div class="step-content">
                        <p>{{ $step['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>



        <div class="d-flex flex-1">
            @include('partials.main_form')
        </div>
    </div>
</section>

<style>
    .process-step {
        border-bottom: 1px solid #e9eef4;
        transition: background 0.3s ease;
        padding: 4px 0;
    }

    .process-step:last-child {
        border-bottom: none;
    }

    .step-header {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 20px;
        cursor: pointer;
        user-select: none;
        transition: background 0.2s ease;
        border-radius: 8px;
    }

    .step-header:hover {
        background: var(--color-gray-cream);
    }

    .step-number {
        font-weight: 700;
        color: var(--color-text-muted);
    }

    .step-title {
        font-size: 18px;
        font-weight: 600;
        color: #1c2a3a;
        flex: 1;
    }

    .step-toggle {
        font-size: 24px;
        color: #a0b8d0;
        transition: transform 0.3s ease;
        flex-shrink: 0;
        width: 32px;
        text-align: center;
    }

    .process-step.open .step-toggle {
        transform: rotate(45deg);
    }

    .step-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.4s ease;
        padding: 0 56px 0 48px;
    }

    .process-step.open .step-content {
        max-height: 300px;
        padding: 0 56px 20px 48px;
    }

    .step-content p {
        font-size: 15px;
        line-height: 1.6;
        color: #4a5b6e;
        margin: 0;
    }

    @media (max-width: 600px) {
        .step-header {
            padding: 14px 0;
            gap: 12px;
        }

        .step-title {
            font-size: 15px;
        }

        .step-content {
            padding: 0 16px 0 36px;
        }

        .process-step.open .step-content {
            padding: 0 16px 16px 36px;
        }

        .step-toggle {
            font-size: 20px;
            width: 24px;
        }
    }
</style>

@push('scripts')
    <script type="module">
        import {
            initProcessSteps,
            toggleStepWithClose
        } from '{{ asset('js/components/process-steps.js') }}';

        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.process-step');
            steps.forEach(step => {
                const header = step.querySelector('.step-header');
                if (header) {
                    header.addEventListener('click', function(e) {
                        toggleStepWithClose(this);
                    });
                }
            });
        });
    </script>
@endpush
