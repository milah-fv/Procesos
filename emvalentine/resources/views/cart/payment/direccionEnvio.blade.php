<div class="col-md-7">
    <div class="ckeckout-left-sidebar">
        <!-- Start Checkbox Area -->
        <div class="checkout-form" style="margin-bottom:30px">
            <h2 class="section-title-3"><i class="ti-truck"></i> MÉTODO DE ENVÍO</h2>
        </div>
        <!-- End Checkbox Area -->
        <ul class="nav nav-pills nav-address-shipping ptb--20 nav-justified payment_address" id="myTab" role="tablist">
           
            <li class="nav-item text-center">
                <input type="radio" value="store_pickup" name="shipping" id="shop" checked>
                <label class="nav-link" for="shop" id="store_pickup"><i class="ti-home"></i> Recoger en Tienda (Huancayo)</label>
            </li>
        </ul>
        <div class="tab-content">
            
            <div class="tab-pane fade in active pb--20" id="profile2" role="tabpanel">
                <p> <b>Acercate a nuestra tienda con tu niño(a), y por tu compra obtén un paseo en la moto totalmente gratis!</b></p><br>
                <p> Para poder recoger tus artículos en la tienda El Pibe, debes traer tu DNI o algun documento de identificación y alguno de los siguienets documentos <br> 1. El numero de tu pedido<br> 2. Una captura de pantalla del recibo de compra enviado a tu correo <br>3. El recibo de compra enviado a tu correo impreso.</p><br>
                <p>Horarios de atencion: Lunes a Domingo<br>- 10:00 am a 1:00 pm <br>- 04:00 pm a 10:00 pm</p><br>
                <span>Para mas información lee nuestros <b><a href="javascript:void(0)">Terminos de Envio & Entrega</a><b></span>
            </div>
                <div class="chekbox_pib">
                    <input type="checkbox" id="person">
                    <label for="person" >Quiero que otra persona lo recoja por mi</label>
                </div>
                <div class="row panel-collapse collapse pt--30" id="addCustomerPanel" role="tabpanel">
                    @component('components.input', ['name' => 'order_name','title' => 'Nombre','col' => 'col-md-6'])
                    @endcomponent

                    @component('components.input', ['name' => 'order_paternal_surname','title' => 'Apellidos','col' => 'col-md-6'])
                    @endcomponent


                    @component('components.input', ['name' => 'order_num_document','title' => 'Numero de documento','col' => 'col-md-6'])
                    @slot('attributes')
                    onkeypress= "return soloNumeros(event)"
                    @endslot
                    @endcomponent
                </div>  
            </div>
        <hr>
    </div>
    
    @include('cart.payment.metodoPago')    
</div>