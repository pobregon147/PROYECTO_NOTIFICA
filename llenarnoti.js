function registrarNotificacion() {
  // Obtener la fila que contiene el botón
  const fila = event.target.parentNode.parentNode;
  
  // Obtener los datos necesarios de la fila
  const correo = fila.cells[7].innerText;
  const distrito = fila.cells[8].innerText;
  
  // Obtener la fecha actual
  const fechaActual = new Date().toLocaleDateString();
  
  // Crear un objeto con los datos a enviar
  const datos = {
    direccion: correo,
    distrito: distrito,
    notificador: 'PEDRO OBREGON',
    fecha_noti: fechaActual,
    estado: 'NOTIFICADO'
  };
  
  // Enviar los datos al servidor utilizando AJAX
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'LLENARNOTI.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      // La respuesta del servidor se recibió correctamente
      alert('Notificación registrada correctamente');
    }
  };
  xhr.send(JSON.stringify(datos));
  
  // Actualizar los valores de la fila en la tabla
  fila.cells[7].innerText = 'CORREO';
  fila.cells[8].innerText = 'CORREO';
  fila.cells[11].innerText = 'PEDRO OBREGON';
  fila.cells[12].innerText = fechaActual;
  fila.cells[14].innerText = 'NOTIFICADO';
}

  


