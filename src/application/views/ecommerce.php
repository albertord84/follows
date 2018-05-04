<script>
    // se debe indicar después de crear el objeto de seguimiento
    // y antes de usar la función específica de comercio electrónico
    ga('require', 'ecommerce');
    
    ga('ecommerce:addTransaction', {
        'id': user_id,               // Transaction ID. Required.
        'affiliation': SERVER_NAME,  // Affiliation or store name.
        'revenue': total_value,      // Grand Total.
        'currency': 'BRL'            // local currency code.
    });
    
    ga('ecommerce:addItem', {
        'id': user_id,               // Transaction ID. Required.
        'name': plane_id,            // Product name. Required.
        'category': 'Plano',         // Category or variation.
        'price': total_value,        // Unit price.
        'quantity': '1',             // Quantity.
        'currency': 'BRL'            // local currency code.
    });
    
    ga('ecommerce:send');
</script>

