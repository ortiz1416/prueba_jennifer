<?php
$conexion = mysqli_connect("localhost", "root", "", "vehiculos");

$marca= $_POST['id_tip_marca'];

$sql="SELECT destino.id_destino, destino.destino FROM marca INNER JOIN destino ON marca.id_tip_marca = destino.id_tip_marca
AND marca.id_tip_marca= '$marca'";

$result = mysqli_query($conexion, $sql);
$cadena = "<label>vehiculo</label>";
while ($ver = mysqli_fetch_assoc($result)) {
    $cadena .= '<option value=' . $ver['id_destino'] . '>' . $ver['destino'] . '</option>';
}
echo $cadena . "</select>";

?>
