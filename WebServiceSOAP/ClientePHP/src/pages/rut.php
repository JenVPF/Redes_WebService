<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Soap</title>
       <link rel="stylesheet" href="../styles/style.css">
   </head>
   <body>
      <header> 
         <ul class="nav">
            <div class="logo">
               <img src="../../build/img/logoutem.png" alt="logoutem"> 
            </div>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="rut.php">Rut</a></li>
            <li><a href="nombre.php">Saludo</a></li>
            <li><a href="http://localhost:8080/WebServiceSoap/WebService_Redes?wsdl">Documento WSDL</a></li>
         </ul>
      </header>

      <div class="titulo">
         <h1>Verificación de Rut</h1>
      </div>

      <div class="container">
         <form name="formulario" method="POST" action="rut.php" autocomplete="off">
            <input class="input" type="text" name="rut" id="rut" placeholder="Ingrese Rut">
            <input class="btn" type="submit" name="enviar" value="Verificar">
         </form>
      </div>

      <?php
       $cliente = new SoapClient('http://localhost:8080/WebServiceSoap/WebService_Redes?wsdl');
       if(isset($_POST['enviar'])){
           $rut_ingresado = $_POST['rut'];
           $resultado = $cliente->verificador(["rut" => $rut_ingresado])->return;
           echo $resultado;
       }
       else{
           echo " ";
       }
       ?>
   </body>
</html>

