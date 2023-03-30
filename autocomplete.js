$(function() {
  $("#TIPO_DOC").autocomplete({
    source: "getCodigos.php",
    minLength: 1
  });
});

