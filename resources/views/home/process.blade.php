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
            @include('partials.form')
        </div>
    </div>
</section>

<style>
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
