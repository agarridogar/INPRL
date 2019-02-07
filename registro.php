<?php
    $DNI = $_POST['DNI'];
    $Fecha_accidente = $_POST['Fecha_accidente'];
    $Hora_accidente = $_POST['Hora_accidente'];
    $Causa_accidente = $_POST['Causa_accidente'];
    $Tipo_lesion = $_POST['Tipo_lesion'];
    $Partes_cuerpo_lesionado= $_POST['Partes_cuerpo_lesionado'];
    $Gravedad = $_POST['Gravedad'];
    $Baja = $_POST['Baja'];
    $consultadni="SELECT DNI from Trabajador where dni= '$DNI'";
    $reqlen =strlen($DNI) * strlen($Fecha_accidente) * strlen($Hora_accidente) * strlen($Causa_accidente) * strlen($Tipo_lesion) * strlen($Partes_cuerpo_lesionado) * strlen($Gravedad)  * strlen($Baja);
    if ($reqlen > 0) {
    $link = mysqli_connect('sql203.260mb.net', 'n260m_21275877', 'Punkpunk', 'n260m_21275877_proyecto2_db') or die ("problemas al conectar");
    /*$link = mysqli_connect('localhost', 'root', '', 'parteaccidente') or die ("problemas al conectar");*/

    $query="INSERT INTO Parte (DNI, Fecha_accidente, Hora_accidente, Causa_accidente, Tipo_lesion, Partes_cuerpo_lesionado, Gravedad, Baja) VALUES('$DNI', '$Fecha_accidente', '$Hora_accidente', '$Causa_accidente', '$Tipo_lesion', '$Partes_cuerpo_lesionado', '$Gravedad', '$Baja');";
    $resultadodni= mysqli_query($link, $consultadni);
        if (mysqli_num_rows($resultadodni)>0){
            $resultado= mysqli_query ($link, $query); 
            if($resultado)
                echo "<script>
                alert('Formulario enviado con exito');
                window.location= 'formularioparte.php'
                 </script>";
            else{
                echo "<script>
                alert('Error al realizar la consulta.');
                window.location= 'formularioparte.php'
                </script>";
            }        
        }else{ 
     
            echo "<script>
                alert('El trabajador no existe en nuestra base de datos.');
                window.location= 'formularioparte.php'
                </script>";

        }
            mysqli_close($link);
    }else{
        echo "<script>
                alert('Algun campo está vacio.');
                window.location= 'formularioparte.php'
              </script>";
        
    }

?>