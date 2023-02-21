<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO DE NOTIFICACIONES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalusuario">Registrar usuario</button>

<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Registrar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="procesar_registro.php">

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            </div>
      </div>    

      <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="genero">Género:</label>
            <select id="genero" name="genero" class="form-control">
              <option selected>Choose...</option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <option value="otro">Otro</option>
            </select><br>
            </div>
      </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
        
       </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldatos">Registrar datos</button>

<div class="modal fade" id="modaldatos" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Registrar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" action="procesar_datos.php">

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group col-md-6">
            <button type="button" class="btn btn-primary" onclick="buscarNombre(document.getElementById('id').value)">Buscar</button>
            </div><br>

            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text">Usuario:</span>
              </div>
              <input type="text" id="nombre" name="nombre" class="form-control" disabled required >
              <input type="text" id="apellido" name="apellido" class="form-control" disabled required ><br>
            </div>
      </div>

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="distrito">Distrito:</label>
            <input type="text" id="distrito" name="distrito" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="fecha">Fecha de Nacimiento:</label>
            <input type="date" id="fecha" name="fecha" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="comentario">Comentario:</label>
            <input type="text" id="comentario" name="comentario" required><br>
            </div>
      </div>    
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
      </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script>
  function buscarNombre() {
    var id = document.getElementById('id').value;

    if (id != '') {
        // Llama a la función buscarNombre en PHP
        $.ajax({
            type: "POST",
            url: "procesar_datos.php",
            data: { id: id, funcion: "buscarNombre" },
            success: function(response) {
                // Muestra la respuesta de PHP
                $("#resultado").html(response);
            }
        });
    } else {
        alert("Por favor, ingresa un ID.");
    }
}

</script>

</body>
</html>


