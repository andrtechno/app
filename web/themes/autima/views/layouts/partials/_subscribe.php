<div class="delivery-subscribe gradient">


    <div class="" id="ajax-subscribe">

        <form class="" name="subscribe-form" onsubmit="return false;"
              onkeypress="if(event.keyCode===13){subscribeSubmit('#subscribe-form', '#ajax-subscribe')}"
              id="subscribe-form" action="/delivery/subscribe.action" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 text-center text-lg-left mb-3 mb-lg-0">
                        <div class="text">
                            <strong>Подписаться на рассылку</strong>
                            <div>Чтоб быть в курсе всех наших новостей</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
                        <label class="sr-only required" for="Delivery_name">Ваше Имя <span
                                    class="required">*</span></label> <input class="form-control" placeholder="Ваше Имя"
                                                                             name="Delivery[name]" id="Delivery_name"
                                                                             type="text" maxlength="100"/>
                        <div class="invalid-feedback" id="Delivery_name_em_" style="display:none"></div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
                        <label class="sr-only required" for="Delivery_email">Ваш E-mail <span class="required">*</span></label>
                        <input class="form-control" placeholder="Ваш E-mail" name="Delivery[email]" id="Delivery_email"
                               type="text" maxlength="100"/>
                        <div class="invalid-feedback" id="Delivery_email_em_" style="display:none"></div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 d-flex align-items-center">

                        <a href="javascript:void(0)" class="btn btn-warning m-auto"
                           onclick="subscribeSubmit('#subscribe-form','#ajax-subscribe')">Подписаться</a>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
