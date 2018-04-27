$(document).ready(function() {
    var fields = 0;
    var template = $('fieldset.files > .form-group:first').clone();

    $('#buttonAddFile').on('click', function(e) {
        fields++

        var html = template.clone().find('input').each(function() {
            var id = this.id;
            var newId = id + fields;
            $(this).closest('.form-group').find('label[for='+id+']').first().attr('for', newId);
            this.id = newId;
        })
        .end()
        .hide()
        .fadeIn(500)
        .appendTo('fieldset.files');

        e.preventDefault();

        return false;
    });

    $('fieldset.files').on('click', '.btn-removeFile', function (e) {
       $(this).closest('.form-group').fadeOut(500, function() {
           $(this).remove();
       });

       e.preventDefault();

       return false;
    });

    $('fieldset.files').on('change', '.form-control-file', function(e) {
        var fileName = '';
        var $input	 = $(this),
			$label	 = $input.next('label'),
			labelVal = $label.html();

        if (this.files && this.files.length > 1)
            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
        else if (e.target.value)
            fileName = e.target.value.split( '\\' ).pop();
        if (fileName)
            $label.html(fileName);
        else
            $label.html(labelVal);
    });

    $('fieldset.files')
    .on('focus', '.form-control-file', function() {
        $(this).addClass('has-focus');
    })
    .on('blur', '.form-control-file', function(){
        $(this).removeClass('has-focus');
    });
});
