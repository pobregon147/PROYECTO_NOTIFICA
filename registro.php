<?php
require 'conexion.php';
require 'getCodigos.php';

try {
    $stmt = $conn->query("SELECT * FROM registros");
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$N_CARGOS = $_POST['N_CARGOS']; // suponiendo que estás pasando el ID desde el formulario
$NUM_RD = $_POST['NUM_RD'];
$NOMBRES = $_POST['NOMBRES'];

$stmt = $conn->prepare("SELECT NUM_RD, NOMBRES FROM registros WHERE N_CARGOS = :N_CARGOS");
$stmt->bindParam(':N_CARGOS', $N_CARGOS);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$nombre = $result['NUM_RD'];
$apellido = $result['NOMBRES'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO DE NOTIFICACIONES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/jquery-ui-1.13.2.custom/jquery-ui.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
            <label for="NOMBRES">Usuario:</label>
            <input type="text" id="NOMBRES" name="NOMBRES" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="DIRECCION">Direccion:</label>
            <input type="text" id="DIRECCION" name="DIRECCION" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="DISTRITO">Distrito:</label>
            <input type="text" id="DISTRITO" name="DISTRITO" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="IE">IE:</label>
            <input type="text" id="IE" name="IE"><br>
            </div>
      </div>    

      <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="TIPO_DOC">Documento:</label>
            <input type="text" id="TIPO_DOC" name="TIPO_DOC" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="AREA">Area:</label>
            <input type="text" id="AREA" name="AREA"><br>
            </div>
      </div>

      <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="NUM_RD">N° Documento:</label>
            <input type="numb" id="NUM_RD" name="NUM_RD" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="FECHA_DOC">Fecha:</label>
            <input type="date" id="FECHA_DOC" name="FECHA_DOC" required><br>
            </div>
      </div>

      <div class="form-row"> 
            <div class="form-group col-md-6">
            <label for="EXPEDIENTE">Expediente:</label>
            <input type="text" id="EXPEDIENTE" name="EXPEDIENTE" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="ASUNTO">Asunto:</label>
            <input type="text" id="ASUNTO" name="ASUNTO" required><br>
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

      <div class="form-row ">
        <div class="form-group col-md-6">
            <label for="N_CARGOS">N° de Cargo:</label>
            <input type="num" id="N_CARGOS" name="N_CARGOS" required><br>
        </div>
      </div>
      
      <div class="form-row ">
        <div class="form-group col-md-6">
            <?php if(isset($nombre) && isset($apellido)): ?>
            <input type="text" id="nombre" name="nombre" required><?php echo $nombre ?><br>
            <input type="text" id="apellido" name="apellido" required><?php echo $apellido ?><br>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="NOTIFICADOR">Notificador:</label>
            <input type="text" id="direNOTIFICADORccion" name="NOTIFICADOR" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="FECHA_NOTI">Fecha de Notificacion:</label>
            <input type="date" id="FECHA_NOTI" name="FECHA_NOTI" required><br>
            </div>
      </div>

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="RELACION">Relacion:</label>
            <input type="text" id="RELACION" name="RELACION" required><br>
            </div>

            <div class="form-group col-md-6">
            <label for="ESTADO">Estado:</label>
            <input type="text" id="ESTADO" name="ESTADO" required><br>
            </div>
      </div>    

      <div class="form-row">        
            <div class="form-group col-md-6">
            <label for="OBSERVACION">Observacion:</label>
            <input type="text" id="OBSERVACION" name="OBSERVACION" required><br>
            </div>
      </div>   
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
      </form>
      </div>
    </div>
  </div>
</div>

<input type="text" id="searchInput" placeholder="Buscar por nombre"><br>
<label for="TIPO_DOC">Documento:</label>
            <input type="text" id="TIPO_DOC" name="TIPO_DOC" required><br>
<table id="searchResults">
    <thead>
        <tr>
            <th>N_CARGOS</th>
            <th>FECHA_DOC</th>
            <th>TIPO_DOC</th>
            <th>NUM_RD</th>
            <th>EXPEDIENTE</th>
            <th>ASUNTO</th>
            <th>AREA</th>
            <th>DIRECCION</th>
            <th>DISTRITO</th>
            <th>NOMBRES</th>
            <th>IE</th>
            <th>NOTIFICADOR</th>
            <th>FECHA_NOTI</th>
            <th>RELACION</th>
            <th>ESTADO</th>
            <th>OBSERVACION</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?= $registro['N_CARGOS'] ?></td>
                <td><?= date('d-M-Y', strtotime($registro['FECHA_DOC'])) ?></td>
                <td><?= $registro['TIPO_DOC'] ?></td>
                <td><?= $registro['NUM_RD'] ?></td>
                <td><?= $registro['EXPEDIENTE'] ?></td>
                <td><?= $registro['ASUNTO'] ?></td>
                <td><?= $registro['AREA'] ?></td>
                <td><?= $registro['DIRECCION'] ?></td>
                <td><?= $registro['DISTRITO'] ?></td>
                <td><?= $registro['NOMBRES'] ?></td>
                <td><?= $registro['IE'] ?></td>
                <td><?= $registro['NOTIFICADOR'] ?></td>
                <td><?= date('d-M-Y', strtotime($registro['FECHA_NOTI'])) ?></td>
                <td><?= $registro['RELACION'] ?></td>
                <td><?= $registro['ESTADO'] ?></td>
                <td><?= $registro['OBSERVACION'] ?></td>
                <td><button id="registrarNotificacionButton" onclick="registrarNotificacion()">Notivirtual</button></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="busqueda.js"></script>
<script>$(document).ready(function() {
    var tipo_doc_list = <?php echo json_encode($tipo_doc_list); ?>;
    $('#TIPO_DOC').autocomplete({
        source: tipo_doc_list
    });
});</script>
<script src="llenarnoti.js"></script>
</body>
</html>


