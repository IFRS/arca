require('tinymce');
require('tinymce/themes/modern');
require('tinymce-i18n/langs/pt_BR');

require('tinymce/plugins/lists');
require('tinymce/plugins/link');
require('tinymce/plugins/table');

tinymce.init({
    selector: 'textarea.editable',
    plugins: "lists link table",
    menubar: false,
    language: 'pt_BR',
});
