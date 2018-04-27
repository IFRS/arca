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
    toolbar: [
        'undo redo | bold italic | alignleft aligncenter alignright alignnone | bullist numlist | link unlink',
        'formatselect | table tablemergecells tablesplitcells'
    ],
    block_formats: 'Paragraph=p;Header 1=h3;Header 2=h4;Header 3=h5',
    language: 'pt_BR',
    branding: false
});
