<?php
    require_once("conexion/conexion.php"); 
    $conexion = new Database();
    $con = $conexion->conectar();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text">vehiculos Registrados</h1>
    <br>
    <div class="text-center">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="../index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        </div>
        
    </div>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Telefono</th>
                <th>Destino</th>
                <th>Marca</th>
                
            </tr>
        </thead>
        <tbody>

            <?php
            $consulta = "SELECT * FROM prestamo, destino, marca WHERE prestamo.id_destino = marca.id_destino AND marca.id_tip_marca = destino.id_tip_marca";
            $resultado = $con->query($consulta);

            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["documento"] . '</td>
                    <td>' . $fila["nombre"] . '</td>
                    <td>' . $fila["telefono"] . '</td>
                    <td>' . $fila["marca"] . '</td>
                    <td>' . $fila["destino"] . '</td>
                    
                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>