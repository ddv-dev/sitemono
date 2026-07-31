<section class="py-40">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Реквизиты</div>
        <h2 class="fs-40 fw-bold mb-40">Реквизиты компании</h2>

        @php
            $requisites = [
                'Полное наименование' => 'ООО «ПСМ МОНОЛИТ»',
                'ИНН / КПП' => '5032335231 / 503201001',
                'Расчётный счёт' => '40702810902980003479',
                'Банк' => 'АО «АЛЬФА-БАНК» г. Москва',
                'БИК' => '044525593',
                'Корр. счёт' => '30101810200000000593',
                'Юр. адрес' => '143180, МО, г. Звенигород, ул. Почтовая, д. 41, корп. 2, пом. 2, оф. 11',
                'Адрес производства' => 'МО, Одинцовский район, Луцинское шоссе, 3А',
                'E-mail' => 'info@rsmmonolit.ru',
            ];
        @endphp

        <div class="req-wrap">
            <table class="req-table">
                <tbody>
                    @foreach ($requisites as $label => $value)
                        <tr>
                            <td class="req-label">{{ $label }}</td>
                            <td class="req-value">{{ $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
