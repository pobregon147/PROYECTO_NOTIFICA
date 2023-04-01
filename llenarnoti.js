function llenarDatos(btn) {
    var row = btn.parentNode.parentNode;
    row.querySelector('td:nth-child(12)').textContent = 'PEDRO OBREGON'; // NOTIFICADOR
    row.querySelector('td:nth-child(14)').textContent = new Date().toLocaleDateString(); // FECHA_NOTI
    row.querySelector('td:nth-child(15)').textContent = 'NOTIFICADO'; // ESTADO
    row.querySelector('td:nth-child(8)').textContent = 'CORREO ELECTRONICO'; // DIRECCION
    row.querySelector('td:nth-child(9)').textContent = 'CORREO ELECTRONICO'; // DISTRITO
}
