$(document).ready(function() {
    $('#product_table').DataTable();
    $('#descricao').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
        disableDragAndDrop: true
    });
    $('.delete-product').click(function () {
        var delete_url = $(this).data('id');
        $(".modal-footer #confirmDeleteProduct").attr("href", delete_url);
    })
} );