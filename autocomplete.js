<script>
$(function() {
  $("#TIPO_DOC").autocomplete({
    source: "get_autocomplete_values.php",
    minLength: 1
  });
});
</script>
