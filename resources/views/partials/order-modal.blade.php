<div class="order-modal-overlay" id="orderModal" aria-hidden="true">
    <div class="order-modal" role="dialog" aria-modal="true" aria-labelledby="orderModalTitle">
        <button type="button" class="order-modal-close" data-order-close aria-label="Закрыть">&times;</button>

        <div class="js-order-body">
            <h3 class="order-modal-title fs-24 fw-bold" id="orderModalTitle">Оставьте заявку</h3>
            <p class="order-modal-sub fs-14 text-muted">{{ $company->callback_note }}. Уточним детали и назовём цену.</p>

            <form class="js-order-form order-modal-form" action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="source" value="Заявка с сайта" data-order-source>

                <div class="form-group">
                    <label class="form-label">Имя</label>
                    <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                </div>
                <div class="form-group">
                    <label class="form-label">Телефон</label>
                    <input type="tel" name="phone" class="form-control" placeholder="+7 (___) ___-__-__" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Комментарий</label>
                    <textarea name="message" class="form-control" rows="2" placeholder="Объём, марка, адрес…"></textarea>
                </div>

                <button type="submit" class="btn btn-primary br-8 fw-semibold w-full text-center js-order-submit">
                    Отправить заявку
                </button>
            </form>
        </div>
    </div>
</div>
