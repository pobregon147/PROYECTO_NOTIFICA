// Obtener el elemento de entrada y la tabla
var input = document.getElementById("searchInput");
var table = document.getElementById("searchResults");

// Agregar un evento "keyup" al input
input.addEventListener("keyup", function() {
  // Obtener el valor del input de búsqueda
  var searchText = input.value.toLowerCase();

  // Iterar a través de las filas de la tabla
  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var rd = row.cells[3].textContent.toLowerCase();
    var nombre = row.cells[9].textContent.toLowerCase();

    // Ocultar la fila si no coincide con el valor de búsqueda
    if (rd.indexOf(searchText) === -1 && nombre.indexOf(searchText) === -1) {
      row.style.display = "none";
    } else {
      row.style.display = "";
    }
  }
});