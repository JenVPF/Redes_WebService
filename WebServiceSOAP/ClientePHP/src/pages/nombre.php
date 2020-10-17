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
            <h1>Generación Saludo</h1>
        </div>

        <div class="container">
        <form action="nombre.php" name="formulario2" method="POST" autocomplete="off">
        <div class="logmod__heading">
            <h2>Ingrese correctamente los datos:</h2>

        
        <div class="prueba">
            <input class="input" type="text" name="apellido_p" id="apellido_p" placeholder="Apellido Paterno">
            <input class="input" type="text" name="apellido_m" id="apellido_m" placeholder="Apellido Materno">
            <input class="input" type="text" name="nombre" id="nombre" placeholder="Nombres">
            <select class="select" name="genero" id="genero">
                <option name="M" value="M">M</option>
                <option name="F" value="F">F</option>
            </select>
        </div>
        </div>


        <div class="nav li">
            <input class="btn" type="submit" name="Enviar" value="Enviar">
            <!--<input type="submit" name="enviar" id="enviar">
        -->
            
        </form>

        </div>
        <?php
        $cliente = new SoapClient('http://localhost:8080/WebServiceSoap/WebService_Redes?WSDL');
        if(isset($_POST['enviar'])){
            $nombre_ingresado = $_POST['nombre'];
            $apellido_p_ingresado = $_POST['apellido_p'];
            $apellido_m_ingresado = $_POST['apellido_m'];
            $genero_ingresado = $_POST['genero'];
            $resultado = $cliente->saludo(["nombre" => $nombre_ingresado,
                                            "apellido_p" => $apellido_p_ingresado, 
                                            "apellido_m" => $apellido_m_ingresado,
                                            "genero" => $genero_ingresado
                                            ])->return;
            echo $resultado;
        }
        else{
            echo " ";
        }
        ?>
    </body>
</html>
