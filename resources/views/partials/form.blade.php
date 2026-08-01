   <div class="panel panel-black p-40 w-full d-flex jc-center column items-center " style="height: fit-content;">

       <div class="">
           <span class="d-flex column gap-8">
               <div class="fs-26 fw-bold text-cream">
                   Оставьте заявку
               </div>
               <p class="fs-16 text-cream">{{ $company->callback_note }}. Уточним объём, марку и сроки. Назовём
                   финальную цену.</p>
           </span>
           <div class="">
               <form class="js-order-form" action="{{ route('orders.store') }}" method="POST"
                   data-success-text="Заявка принята! Перезвоним в течение 4 минут.">
                   @csrf
                   <input type="hidden" name="source" value="Заявка — Оставьте заявку">
                   <div class="row gap-20 py-20">
                       <input type="text" name="name" class="input-black d-flex flex-1" placeholder="Имя">
                       <input type="tel" name="phone" class="input-black d-flex flex-1" placeholder="Номер телефона"
                           required>
                   </div>
                   <input type="text" name="address" class="input-black d-flex flex-1" placeholder="Адрес доставки">
                   <div class="row gap-20 py-20 items-center">

                       <input type="submit" class="btn btn-primary btn-arrow-right-white br-8"
                           value="Получить расчёт стоимости">
                       <span class="fs-12  text-muted">Нажимая кнопку, вы соглашаетесь с <a href=""
                               class="text-primary" style="opacity: 0.8"> политикой
                               конфиденциальности</a></span>
                   </div>
               </form>

           </div>
       </div>
   </div>
