 <?php
    session_start();

    $dni=$_POST['dni'];/*cóllese do name do input*/
    $causa=$_POST['Causa_accidente'];
    $hora= $_POST['Hora_accidente'];
    $fecha= $_POST['Fecha_accidente'];
    $tipo= $_POST['Tipo_lesion'];
    $partes=$_POST['Partes_lesionadas'];
    $Gravedad =$_POST['gravedad'];
    $Baja =$_POST['baja'];
    $cod=$_SESSION['cod'];
    $evento=$_POST['evento'];
    

    /*$link = mysqli_connect('localhost', 'root', '', 'parteaccidente') or die ("problemas al conectar");*/
    $link = mysqli_connect('sql203.260mb.net', 'n260m_21275877', 'Punkpunk', 'n260m_21275877_proyecto2_db') or die ("problemas al conectar");

   
     if($evento == "Modificar"){ 
        $sql="UPDATE Parte SET Hora_accidente='$hora', Fecha_accidente='$fecha', Causa_accidente='$causa', Tipo_lesion='$tipo', Partes_cuerpo_lesionado='$partes', Gravedad='$Gravedad', Baja='$Baja' WHERE cod_parte='$cod'"; 
        
        $modificar=mysqli_query($link, $sql) or die ("problemas al conectar");
        echo "<script>
                window.location= 'buscador_cod_html.php'
                alert('Datos MODIFICADOS correctamente!');
                 </script>";
    }elseif($evento=="Borrar"){
        $que="DELETE FROM Parte WHERE cod_parte='$cod'";
        $borrar=mysqli_query($link, $que) or die ("problemas al conectar");
        echo "<script>
                window.location= 'buscador_cod_html.php'
                alert('Datos ELIMINADOS correctamente!');
                 </script>";
    }else{
        echo "Error ocurrido al modificar datos en el sistema. Contacte con el administrador.";
    }
    mysqli_close($link);
      
        
   

?>