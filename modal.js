// Obtener el botón que abre el modal
var btnModal = document.getElementById("btn-modal");

// Obtener el contenedor del modal
var modal = document.getElementById("modal");

// Cuando el usuario hace clic en el botón, mostrar el modal
btnModal.onclick = function() {
  modal.style.display = "block";
}

// Cuando el usuario hace clic fuera del modal, ocultarlo
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
