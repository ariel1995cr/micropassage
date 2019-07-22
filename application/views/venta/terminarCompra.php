<form action="/PassageSystem/index.php/Ventas/VentaExitosa" method="POST">
    <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
        data-access-token= “TEST-7666547261035560-061917-b3827db4841fb02755468af4d6bd24a1-134046859”
        data-preference-id="<?php echo $preference->id; ?>">
    </script>

    <input name="ButacasCompradas" value='<?php echo $datosCompra?>' hidden>
</form>