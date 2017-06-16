$(document).ready(function() {
    $('form.delete').on('submit', function() {
        return confirm('Você realmente deseja remover isso?');
    });
    $('form.destroy').on('submit', function() {
        return confirm('Você realmente deseja remover isso?\n*ESSA AÇÃO NÃO PODERÁ SER DESFEITA.');
    });
});
