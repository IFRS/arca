$(document).ready(function() {
    $('form.delete').on('submit', function() {
        return confirm('Você realmente deseja REMOVER isso?');
    });

    $('form.restore').on('submit', function() {
        return confirm('Você realmente deseja RECUPERAR isso?');
    });

    $('form.destroy').on('submit', function() {
        return confirm('Você realmente deseja DELETAR PERMANENTEMENTE isso?\n*ESSA AÇÃO NÃO PODERÁ SER DESFEITA.');
    });
});
