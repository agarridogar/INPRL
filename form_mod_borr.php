<html>
  <link rel="stylesheet" type="text/css" href="estilos.css" />
  
   <link href="https://fonts.googleapis.com/css?family=Raleway|Abril+Fatface" rel="stylesheet">
    <meta charset="utf-8" />
	<meta name="description" content="INPRL" />
     
    <head>
       
        <style>
        body{
          background-color:#06827C;
      }
         form{
         margin: 0 auto;
         width:45%;
         margin-bottom: 20px;
         padding: 10px 20px;
         border-radius: 7px;
         background-color:D1EEEB;
         box-sizing:border-box;
         margin-top:10px;
         text-align: center;
              
        }
        input,textarea,select{
         width: 100%;
         margin-bottom: 20px;
         margin-top: 20px;
         padding: 7px;
         box-sizing:border-box;
         font-size: 17px;
         border: none;
        }

        form p{
         color:#06827C;
         font-size: 40px;
         margin-bottom: 20px;
         /*display:inline-block;*/
         font-family: 'Raleway';
        }
      form h3{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         /*display:inline-block;*/
         font-family: 'Raleway';
          text-align:center;
      }
      form h1{
          color:#06827C;
         font-size: 19px;
         margin-bottom:10px;
       
         font-family: 'Raleway';
          text-align:left; 
      }
        textarea{
         max-height: 200px;
         min-height:100px;
         max-width: 100%;
        }
       

        @media (max-width:480px){

          form{
           width:50%;
              height:100%;
         } 

        }
      
      .menuContainer {
            
        }
        
        .menu {
            margin:center;
            width:100%;
            font-family:'Raleway';
           
            
        }
        ul{
            list-style:none;
        }
        .nav li a {
            background-color:#06827C;
            color:white;
            text-decoration:none;
            padding: 10px 15px;
            display:block;
            margin-top:0px;
           
            
        }
        .nav li a:hover{ 
            background-color:darkgray;
            
        }
      
            .formulario{
            width: 100%;
	        margin: auto;
	        padding: 50px 0 80px 0;
           	height: 100%; 	
            border: 0; 
            background-color:#06827C; 
            font-family:'Raleway'; 
            font-size:30px; 
            color:white;
            
            
        }
       label{
         color:#06827C;
         font-size: 16px;
         margin-bottom:5px;
         font-family: 'Raleway';
         text-align:left;
      }
       
        </style>
   
    </head>
    <body>
          <div class="menuContainer">
            <div class="menu">
                <ul class="nav">
                    <li> <a href="index.html">Volver a El INPRL</a></li>
                </ul>
            </div>
        </div>
        
        
       
           
       
<?php
        
  session_start();
        
        
$cod= $_POST['codparte'];
/*collemos o dni do usuario de insertar_login.php*/ 
$dniverif=$_SESSION['dniverificado'];

/*$link = mysqli_connect('localhost', 'root', '', 'parteaccidente') or die ("problemas al conectar");*/
$link = mysqli_connect('sql203.260mb.net', 'n260m_21275877', 'Punkpunk', 'n260m_21275877_proyecto2_db') or die ("problemas al conectar");
$codtabla=mysqli_query($link,"select DNI, Causa_accidente, Fecha_accidente, Hora_accidente, Tipo_lesion, Gravedad, Baja, Partes_cuerpo_lesionado from Parte where cod_parte='$cod' and DNI='$dniverif'");/*poñemos  este $dniverif para comprobar que o usuario rexitrsdo e o mesmo que o do parte que queremos ver*/
       
$dato=mysqli_num_rows($codtabla);
mysqli_close($link);       
       
    if( $dato >0 ){
        $resultado=mysqli_fetch_assoc($codtabla);
        /*echo " <script>
             alert('Puede modificar el parte elegido.');
             window.location= 'modifform.php'
             </script>";*/
    }else{
        echo " <script>
             alert('El num. de parte pertenece a otro trabajador o no existe.');
             window.location= 'buscador_cod_html.php'
             </script>";
    }
   
        $_SESSION['cod']=$_POST['codparte'];
        
      
        
    
   
        
        
 ?>  
        <form method='post' action='modifform.php'>
            <p>Modificación partes</p>
                <label>DNI:</label><input type='text' id='dnid' name='dni' size='30' value="<?php echo $resultado["DNI"]; ?>" readonly="readonly">
                <label>Fecha del accidente:</label><input type='date' id='fecha' name='Fecha_accidente' size='30' value="<?php echo $resultado["Fecha_accidente"]; ?>">
                <label>Hora del accidente:</label><input type='time' id='hora' name='Hora_accidente' size='30' value="<?php echo $resultado["Hora_accidente"]; ?>">
                <label>Causa</label><input type='text' id='causa' name='Causa_accidente' size='30' value="<?php echo $resultado["Causa_accidente"]; ?>">
                <label>Tipo lesion:</label><input type='text' id='tipo' name='Tipo_lesion' size='30' value="<?php echo $resultado["Tipo_lesion"]; ?>">
                <label>Partes del cuerpo lesionadas:</label><input type='text' id='partes' name='Partes_lesionadas' size='30' value="<?php echo $resultado["Partes_cuerpo_lesionado"]; ?>">
                <h1> Gravedad: </h1>
                <?php if($resultado["Gravedad"] == "Baja"){ ?>
                    <label>Baja</label><input type='radio' id='grav' name='gravedad' value="Baja" checked> <br>
                    <label>Normal</label><input type='radio' id='grav' name='gravedad' value="Normal"> <br>
                    <label>Alta</label><input type='radio' id='grav' name='gravedad' value="Alta" > <br>
                <?php }elseif($resultado["Gravedad"] == "Normal"){ ?>
                    <label>Baja</label><input type='radio' id='grav' name='gravedad' value="Baja"> <br>
                    <label>Normal</label><input type='radio' id='grav' name='gravedad' value="Normal" checked> <br>
                    <label>Alta</label><input type='radio' id='grav' name='gravedad' value="Alta" > <br>
                <?php }else{?>
                    <label>Baja</label><input type='radio' id='grav' name='gravedad' value="Baja"> <br>
                    <label>Normal</label><input type='radio' id='grav' name='gravedad' value="Normal" > <br>
                    <label>Alta</label><input type='radio' id='grav' name='gravedad' value="Alta" checked> <br>
                <?php } ?>
                <h1> Baja: </h1>
                <?php if($resultado["Baja"] == "Si"){ ?>
                <label>Si</label><input type='radio' id='grav' name='baja' value="Si" checked> <br>
                <label>No</label><input type='radio' id='grav' name='baja' value="No"> <br> 
                
                <?php }else{ ?>
                <label>No</label><input type='radio' id='grav' name='baja' value="No" checked> <br> 
                <label>Si</label><input type='radio' id='grav' name='baja' value="Si"> <br>
                <?php } ?>
            
            
               
                <input type="submit" name="evento" value="Modificar"/>
                <input type="submit" name="evento" value="Borrar"/>
            
        </form>
        
  
               
            
    
</body>
</html>   