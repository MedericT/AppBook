
$(function() {
    /* Personnalisation des champs entity, multiple = true */
    $(".js-custom-multiple").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
});
