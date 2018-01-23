var $form = $('#checkout-form');

$form.submit(function(event) {
    $form.append($('<input type="hidden" name="checkToken" />').val(token));
    return true;
});


