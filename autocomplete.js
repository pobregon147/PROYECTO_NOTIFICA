$(document).ready(function() {
    $("#ASUNTO").autocomplete({
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