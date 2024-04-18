$(document).ready(function() {
    $('.increment-btn').click(function() {
        var input = $(this).prev('.quantity-input');
        var newValue = parseInt(input.val()) + 1;
        input.val(newValue);
    });

    $('.decrement-btn').click(function() {
        var input = $(this).next('.quantity-input');
        var newValue = parseInt(input.val()) - 1;
        if (newValue >= 0) {
            input.val(newValue);
        }
    });
});
