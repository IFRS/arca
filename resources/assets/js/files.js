$(document).ready(function() {
    $('fieldset.arquivos').on('change', '.form-control-file', function(e) {
        var fileName = '';
        var $input	 = $(this),
			$label	 = $input.next('label'),
			labelVal = $label.html();

        if (this.arquivo && this.arquivo.length > 1)
            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
        else if (e.target.value)
            fileName = e.target.value.split( '\\' ).pop();
        if (fileName)
            $label.html(fileName);
        else
            $label.html(labelVal);
    });

    $('fieldset.arquivos')
    .on('focus', '.form-control-file', function() {
        $(this).addClass('has-focus');
    })
    .on('blur', '.form-control-file', function(){
        $(this).removeClass('has-focus');
    });
});
