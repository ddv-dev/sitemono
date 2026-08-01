<section class="py-40">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Реквизиты</div>
        <h2 class="fs-40 fw-bold mb-40">Реквизиты компании</h2>

        @php
            $requisites = [
                'Полное наименование' => $company->legal_name,
                'ИНН / КПП' => $company->inn_kpp,
                'Расчётный счёт' => $company->account,
                'Банк' => $company->bank,
                'БИК' => $company->bik,
                'Корр. счёт' => $company->corr_account,
                'Юр. адрес' => $company->legal_address,
                'Адрес производства' => $company->production_address,
                'E-mail' => $company->req_email,
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
