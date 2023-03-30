$(document).ready(function() {
    $("#TIPO_DOC").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "getCodigos.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1
    });
});