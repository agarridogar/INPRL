<?php
/*session_start();*/
$cod=$_POST['codparte'];
$dni=$_POST['dni'];
$baja=$_POST['baja'];
/*$nombre=$_POST['nombre'];*/
$sexo=$_POST['sexo'];
$gravedad=$_POST['gravedad'];
$comunidad=$_POST['comunidad'];
$sector=$_POST['sector'];

$i=0;
$link = mysqli_connect('localhost', 'root', '', 'parteaccidente') or die ("problemas al conectar");
/*$link = mysqli_connect('sql203.260mb.net', 'n260m_21275877', 'Punkpunk', 'n260m_21275877_proyecto2_db') or die ("problemas al conectar");*/
$sql="SELECT parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo, trabajador.com_autonoma, trabajador.sector FROM parte, trabajador WHERE 1"; 


/* no hosting están e mayúsculas senon non funcionan SELECT Parte.cod_parte, Parte.Tipo_lesion, Parte.dni, Parte.Fecha_accidente, Parte.Hora_accidente, Parte.Causa_accidente, Parte.Partes_cuerpo_lesionado, Parte.Gravedad, Parte.Baja, Trabajador.nombre, Trabajador.sexo FROM Parte, Trabajador WHERE sexo='mujer';*/
if($sexo!=""){ //a partir de aqui probas de concatenacion
        $sql .= " and sexo = '$sexo'";
     }
if($baja!=""){ 
        $sql .= " and baja = '$baja'";
        
     }
if($gravedad!=""){ 
        $sql .= " and gravedad = '$gravedad'";
        
     }
if($dni!=""){ 
        $sql .= " and trabajador.dni ='$dni'";
       
}if($cod!=""){ 
        $sql .= " and cod_parte ='$cod'";
    
}if($comunidad!=""){ 
        $sql .= " and com_autonoma ='$comunidad'";

}if($sector!=""){ 
        $sql .= " and sector ='$sector'";
       
}$sql .=" and trabajador.dni = parte.dni";


$consulta=mysqli_query($link,$sql) or die ("problemas al conectar esta consulta");
$filas=mysqli_num_rows($consulta);/*retorna  numero de filas da consulta*/

 while( $i < $filas ){
        $resultado[$i]=mysqli_fetch_assoc($consulta);
   
     $i++;}
     /*}if($sexo!=""){ //a partir de aqui probas de concatenacion
        $sql .= " and sexo = :sexo";
        $arr[] = ":sexo => $sexo";
     }elseif($baja!=""){ 
        $sql .= " and baja = :baja";
        $arr[] = ":baja => $baja";
     }elseif($gravedad!=""){ 
        $sql .= " and gravedad = :gravedad";
        $arr[] = ":gravedad => $gravedad";
     }elseif($dni!=""){ 
        $sql .= " and dni = :dni";
        $arr[] = ":dni => $dni";*/
     /*else{
        echo " <script>
             alert('No hay resultados');
             window.location= 'buscador2_cod_html.php'
             </script>";
    }*/
/*$stmt = $link->prepare($sql); 
$stmt->execute($arr);*/

 
/*
(trabajador.sexo='$sexo' OR parte.baja='$baja' OR parte.gravedad='$gravedad' OR parte.dni='$dni') AND parte.dni=trabajador.dni 

TODO $sql="SELECT parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo FROM parte, trabajador WHERE parte.dni=trabajador.dni && trabajador.sexo='$sexo' && parte.baja='$baja' && parte.gravedad='$gravedad' && parte.dni='$dni' ";
CONSULTA QUE FUNCIONA BUSCANDO X DNI $sql="SELECT
    parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo FROM
    parte, trabajador WHERE parte.dni ='$dni' AND trabajador.dni='$dni'";*/
     
/* CONSULTA QUE FUNCIONA BUSCANDO POR BAJA $sql="SELECT parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo FROM parte, trabajador WHERE parte.dni=trabajador.dni and parte.baja='$baja'";*/

/* CONSULTA FUNCIONA BUSCA POR SEXO $sql="SELECT parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo FROM parte, trabajador WHERE parte.dni=trabajador.dni and trabajador.sexo='$sexo'";*/
     
     
/*SELECT parte.cod_parte, parte.Tipo_lesion, parte.dni, parte.Fecha_accidente, parte.Hora_accidente, parte.Causa_accidente, parte.Partes_cuerpo_lesionado, parte.Gravedad, parte.Baja, trabajador.nombre, trabajador.sexo
FROM parte,trabajador
INNER JOIN parte ON parte.dni =trabajador.dni' and 
AND parte.baja='$baja'*/

   
?>
<!DOCTYPE html>
<html>
     <link rel="stylesheet" type="text/css" href="estilos.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway|Abril+Fatface" rel="stylesheet">
    <meta charset="utf-8" />
	<meta name="description" content="INPRL" />
<head>
    <title></title>
</head>
<body style="background-color:#D1EEEB;">
    <div class="menuContainer">
            <div class="menu">
                <ul class="nav">
                    <li> <a href="index.html">Volver a El INPRL</a></li>
                </ul>
            </div>
        </div>
    <h1 align="center" style="font-size:30px; text-align:center; color:#06827C; padding: 50px 0 80px 0;">RELACIÓN PARTES DE ACCIDENTE</h1>
    <table  width="70%" border="0px" align="center" style="padding: 50px 0 80px 0; background-color:#D1EEEB;">
    

    <tr align="center" >
        <td style="Background-color:darkgrey;">Codigo del parte</td>
        <td style="Background-color:darkgrey;">DNI</td>
        <td style="Background-color:darkgrey;">Nombre del trabajador</td>
        <td style="Background-color:darkgrey;">Sexo</td>
        <td style="Background-color:darkgrey;">Comunidad Autónoma</td>
        <td style="Background-color:darkgrey;">Dia del accidente</td>
        <td style="Background-color:darkgrey;">Hora del accidente</td>
        <td style="Background-color:darkgrey;">Tipo de lesión</td>
        <td style="Background-color:darkgrey;">Causa de la lesión</td>
        <td style="Background-color:darkgrey;">Partes del cuerpo lesionadas</td>
        <td style="Background-color:darkgrey;">Gravedad</td>
        <td style="Background-color:darkgrey;">Baja</td>
        <td style="Background-color:darkgrey;">Sector</td>
    </tr>
    <?php
        $i=0;
      while($i < $filas ){
        ?>
            <tr>
                <td><?php echo $resultado[$i]["cod_parte"];?></td>
                <td><?php echo $resultado[$i]["dni"];?></td>
                <td><?php echo $resultado[$i]["nombre"];?></td>
                <td><?php echo $resultado[$i]["sexo"];?></td>
                <td><?php echo $resultado[$i]["com_autonoma"];?></td>
                <td><?php echo $resultado[$i]["Fecha_accidente"];?></td>
                <td><?php echo $resultado[$i]["Hora_accidente"];?></td>
                <td><?php echo $resultado[$i]["Tipo_lesion"];?></td>
                <td><?php echo $resultado[$i]["Causa_accidente"];?></td>
                <td><?php echo $resultado[$i]["Partes_cuerpo_lesionado"];?></td>
                <td><?php echo $resultado[$i]["Gravedad"];?></td>
                <td><?php echo $resultado[$i]["Baja"];?></td>
                <td><?php echo $resultado[$i]["sector"];?></td>
            </tr>
            <?php
          $i++;
      }

     ?>
        
    </table>

</body>
</html>