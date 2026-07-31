<section class="py-40 bg-cream">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Форма связи</div>
        <h2 class="fs-40 fw-bold mb-40">Напишите нам</h2>

        <form class="contact-form" action="" method="POST">
            <div class="contact-form-row">
                <div class="form-group flex-1">
                    <label class="form-label">Имя</label>
                    <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                </div>
                <div class="form-group flex-1">
                    <label class="form-label">Телефон</label>
                    <input type="tel" name="phone" class="form-control" placeholder="+7 (___) ___-__-__">
                </div>
            </div>

            <div class="contact-form-row">
                <div class="form-group flex-1">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email@example.ru">
                </div>
                <div class="form-group flex-1">
                    <label class="form-label">Тип обращения</label>
                    <select name="topic" class="form-control">
                        <option>Заказ бетона</option>
                        <option>Аренда насоса</option>
                        <option>Доставка</option>
                        <option>Сотрудничество</option>
                        <option>Другое</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Сообщение</label>
                <textarea name="message" class="form-control" rows="4" placeholder="Опишите ваш запрос..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-arrow-right-white br-20 fs-16 fw-semibold contact-form-submit">
                Отправить сообщение
            </button>

            <p class="fs-12 text-muted contact-form-consent">
                Нажимая кнопку, вы соглашаетесь с
                <a href="#" class="text-primary">политикой обработки персональных данных</a>
            </p>
        </form>
    </div>
</section>
