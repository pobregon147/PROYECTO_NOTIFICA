
    document.getElementById("registrarNotificacion").addEventListener("click", function() {
        //Obtener los valores a registrar
        const notificador = "PEDRO OBREGON";
        const fechaNoti = new Date().toISOString().slice(0, 10);
        const estado = "NOTIFICADO";
        const direccion = "CORREO ELECTRONICO";
        const distrito = "CORREO ELECTRONICO";
        
        //Enviar los valores al servidor mediante una petición AJAX
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //Mostrar mensaje de éxito si el registro fue exitoso
                alert("Notificación registrada con éxito");
            }
        };
        xhttp.open("POST", "LLENARNOTI.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("notificador=" + notificador + "&fecha_noti=" + fechaNoti + "&estado=" + estado + "&direccion=" + direccion + "&distrito=" + distrito);
    });


