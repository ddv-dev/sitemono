<section class="py-40">
    <div class="container">
        <div class="contacts-info">
            {{-- Контактные карточки --}}
            <div class="contact-cards">
                <div class="contact-card">
                    <div class="contact-ico contact-ico-accent">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </div>
                    <div class="contact-card-body">
                        <div class="contact-label">Телефон</div>
                        <a href="tel:{{ $company->phone_tel }}" class="contact-value fs-28">{{ $company->phone }}</a>
                        <div class="contact-note">{{ $company->callback_note }}</div>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-ico contact-ico-dark">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                        </svg>
                    </div>
                    <div class="contact-card-body">
                        <div class="contact-label">WhatsApp / Telegram</div>
                        <a href="tel:{{ $company->phone_tel }}" class="contact-value fs-18">{{ $company->phone }}</a>
                        <div class="contact-note">Принимаем заявки в мессенджерах</div>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-ico contact-ico-light">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                            <path d="m22 6-10 7L2 6" />
                        </svg>
                    </div>
                    <div class="contact-card-body">
                        <div class="contact-label">Email</div>
                        <a href="mailto:{{ $company->email }}" class="contact-value fs-18">{{ $company->email }}</a>
                        <div class="contact-note">Для деловой переписки</div>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-ico contact-ico-light">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </div>
                    <div class="contact-card-body">
                        <div class="contact-label">Режим работы</div>
                        <div class="contact-value fs-18">{{ $company->work_hours }}</div>
                        <div class="contact-note">{{ $company->production_note }}</div>
                    </div>
                </div>
            </div>

            {{-- Адрес + карта --}}
            <div class="contact-address">
                <div class="contact-label">Адрес завода</div>
                <div class="contact-address-text fs-18 fw-bold">
                    {{ $company->production_address }}
                </div>
           <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A290124b5923cf8d87c76549d919d17848ab51993f2e33bd3615af110013a271e&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>
