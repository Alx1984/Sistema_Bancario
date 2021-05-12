<?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
  header('location: index.php');
} 

?>
<html lang="es">

<head>

  </script>
  <title>Banco Azul</title>

  <link rel="icon" type="image/png" href="imagenes/alaLogo.png" />


  <link href="static/css/style.css" rel="stylesheet">

  <style>
    #home-box {
      display: block;
      background: #D2D2D2;
      color: #fff;
      -webkit-border-top-left-radius: 3px;
      -webkit-border-top-right-radius: 3px;
      -moz-border-radius-topleft: 3px;
      -moz-border-radius-topright: 3px;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
    }

    #home-box .content {
      padding: 25px 30px;
      line-height: 22px;
    }

    #home-box .content h1 {
      font-size: 26px;
      font-weight: normal;
      line-height: 32px;
      text-align: center;
      margin-top: 0px;
      margin-bottom: 5px;

    }

     /* The Modal (background) */
     .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal Content Box */
    .modal-content {
      background-color: #fefefe;
      margin: 4% auto 15% auto;
      border: 1px solid #888;
      width: 30%;
      padding-bottom: 20px;
    }
  </style>




</head>

<body class="bg-light">


<main role="main" class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-3 p-3 bg-white rounded box-shadow box-style">
          <div id="home-box">
            <div class="content">
              <h1 style="font-size:x-large; color:black; ">Banco Azul</h1>
              <p class="mt-3 text-left"><img src="imagenes/bancoAzul.png" width="500" class="img-fluid float-left" alt="LikeFans">
              <h5 style="color:black; ">
                Somos el Banco de salvadoreños que, a través de servicios financieros y atención personalizada, impulsa los grandes comienzos y contribuye al desarrollo de nuestro país.</h5>
              </p>
              <div class="row">
                <div class="col">
                  <a class="nav-link" onclick="document.getElementById('modal2-wrapper').style.display='block'"><button class="btn btn-warning">Registrar Cliente</button></a>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!----REGISTRO ---->

  <div id="modal2-wrapper" class="modal">

    <form class="modal-content animate" action="bancoregistro.php" method="POST">

      <div class="imgcontainer">
        <span onclick="document.getElementById('modal2-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
        <img src="imagenes/Banco-Tarjeta.png" width="200" alt="LikeFans" class="LikeFans">
        <h1 style="text-align:center">Banco Azul</h1>
      </div>

      <div class="container">
        <div class="col-sm-12 my-1">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text "><img src="imagenes/user.png" width="20"></div>
            </div>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="">
          </div>
        </div>
        <div class="col-sm-12 my-1">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><img src="imagenes/pass.png" width="20"></div>
            </div>
            <input type="text" name="pass" class="form-control" placeholder="Digite su NIT" required="">
          </div>
        </div>
        <div class="col-sm-12 my-1">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><img src="imagenes/pass.png" width="20"></div>
            </div>
            <input type="text" name="rpass" class="form-control" placeholder="Vuelva a digitar su NIT" required="">
          </div>
        </div>
        <div class="col">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text "><img src="imagenes/identidad.png" width="20"></div>
            </div>
            <select class="form-control" name="tipoUsuario" required="">
              <option value="cliente">Cliente</option>
              <option value="administrador">Administrador</option>
            </select>
          </div>
        </div>

        <input type="checkbox" style="margin:15px 15px;">Recordarme
        <button type="submit" class="btn btn-warning">Registro</button>

      </div>

    </form>

  </div>
    <!----FIN REGISTRO ---->

  <main role="main" class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-3 p-3 bg-white rounded box-shadow box-style">
          <div id="home-box">
            <div class="content">


              <center>

                <?php

                require("bancoconexion.php");
                $sql = ("SELECT * FROM cliente");

                $query = mysqli_query($conexion, $sql);

                echo " <table class='table table-striped table-sm table-responsive-sm'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";

                echo "<th>Codigo</th>";
                echo "<th>Nombre</th>";
                echo "<th>NIT</th>";
                echo "<th>Rol</th>";
                echo "<th>Editar</th>";
                echo "<th>Borrar</th>";
                echo "</tr>";
                echo "<tr>";
                ?>

                <?php
                while ($arreglo = mysqli_fetch_array($query)) {
                  echo "<tbody class='table-warning text-dark'>";
                  echo "<td>$arreglo[0]</td>";
                  echo "<td>$arreglo[1]</td>";
                  echo "<td>$arreglo[2]</td>";
                  echo "<td>$arreglo[3]</td>";


                  echo "<td><a href='actualizarcuenta.php?id=$arreglo[0]'><img src='imagenes/modificar.png' width='60' class='img-rounded'></td>";
                  echo "<td><a href='bancoborrar.php?id=$arreglo[0]'><img src='imagenes/tarjetaborrar.svg' width='60' class='img-rounded'/></a></td>";



                  echo "</tr>";
                }
                

                ?>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <br>
  <br>
  <br>

  <main role="main" class="container">
    <div class="row">
      <div class="col-12">
        <div class="my-3 p-3 bg-white rounded box-shadow box-style">
          <div id="home-box">
            <div class="content">


              <center>

                <?php

                require("bancoconexion.php");
                $sql = ("SELECT cuenta.ncta, cuenta.cod_cliente, cliente.nombre_cliente, SUM(transacciones.monto) AS Saldo
                 FROM cuenta, transacciones, cliente WHERE cuenta.ncta=transacciones.ncta and cliente.cod_cliente=cuenta.cod_cliente GROUP by transacciones.ncta");

                $query = mysqli_query($conexion, $sql);

                echo " <table class='table table-striped table-sm table-responsive-sm'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";

                echo "<th>N.Cuenta</th>";
                echo "<th>Codigo Cliente</th>";
                echo "<th>Nombre</th>";
                echo "<th>Saldo</th>";
                echo "</tr>";
                echo "<tr>";


                ?>

                <?php
                while ($arreglo = mysqli_fetch_array($query)) {
                  echo "<tbody class='table-warning text-dark'>";
                  echo "<td>$arreglo[0]</td>";
                  echo "<td>$arreglo[1]</td>";
                  echo "<td>$arreglo[2]</td>";
                  echo "<td>$arreglo[3]</td>";
                  echo "</tr>";
                }

                ?>
              </center>


            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <center><a href="desconectar.php"><button class="btn btn-danger">Salir</button></a></center>


</body>

</html>