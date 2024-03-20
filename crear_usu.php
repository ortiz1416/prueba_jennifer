<?php
require 'conexion/conexion.php';
$db = new Database();
$con = $db->conectar();



?>


<!--  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formulario con Javascript</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <main>
        <form class="formulario" method="POST" autocomplete="off" id="formulario">
            <!-- div para capturar el documento -->

            <div class="formulario__grupo" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Documento *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El documento tiene que ser de 6 a 11 dígitos y solo puede contener numeros.</p>
            </div>

            <!-- div para capturar el nombre -->

            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombres *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" onkeyup="mayus(this);" name="nombre" id="nombre" placeholder="Nombres">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El usuario tiene que ser de 3 a 20 dígitos y solo puede contener letras</p>
            </div>


           
            <!-- Grupo: telefono -->
            <div class="formulario__grupo-input"  id="grupo__telefono">
                    <label for="telefono" class="formulario__label">Telefono *</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" name="telefono" id="telefono" placeholder="Telefono">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El telefono tiene que ser de 10 a 12 dígitos Alfanumericos.</p>
                </div>


            

            <div class="formulario__grupo-input" id="grupo__marca">
            <label for="id_tip_marca" class="formulario__label">Tipo de Marca *</label>
            <div class="formulario__grupo-select">
                <select name="id_tip_marca" id="id_tip_marca" class="formulario__select" required>
                    <option value="">Seleccione el Tipo_Marca</option>
                    <?php
                    /*Consulta para mostrar las opciones en el select */
                    $statement = $con->prepare('SELECT * from marca');
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=" . $row['id_tip_marca'] . ">" . $row['marca'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="formulario__grupo-input" id="select2lista">
                <label for="depor" class="formulario__label">Destino *</label>
                <select name="id_destino" id="id_destino" class="formulario__select" required>
                </select>
            </div>
        </div>

            


            <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__grupo-terminos" id="grupo__terminos">
                <label class="formulario__label">
                    <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                    Acepto los Terminos y Condiciones
                </label>
            </div>

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <p class="text-center">

            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar">Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>


        </form>
    </main>
    <script src="js/jquery.js"></script>
    <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_tip_marca').val(0);
            recargarLista();

            $('#id_tip_marca').change(function(){
                recargarLista();
            });
        });
    </script>

<script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"vehiculos.php",
                data:"id_tip_marca=" + $('#id_tip_marca').val(),
                success:function(r){
                    $('#id_destino').html(r);
                }
            });
         }
    </script>

    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        function minus(e) {
            e.value = e.value.toLowerCase();
        }
    </script>


</body>

</html>