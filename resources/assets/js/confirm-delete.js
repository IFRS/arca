$(document).ready(function() {
    $('form.delete').on('submit', function() {
        return confirm('Você realmente deseja remover isso?\n*Essa ação não poderá ser desfeita.');
    });
});
