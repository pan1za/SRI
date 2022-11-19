<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Recargo</title>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    <?php
    $menuOpenRepor3 = "menu-open";
    $activeRecar = "active";
    include "../include/navbar.php";
    include "../include/aside.php";
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Recargo</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Recargo</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Reportar recargo</h3>
          </div>
          <div class="card-body">
            <form id="formRecargo" method="POST">
              <div class="card card-body w-50 offset-3">
                <div class="form-group">
                  <label>Recargo a reconocer <b>*</b></label>
                  <select name="tipoRecargo" id="tipoRecargo" class="form-control" required>
                    <option value="" selected disabled autofocus>Seleccione una opción</option>, y
                    <option value="Recargo nocturno">Recargo nocturno</option>
                    <option value="Recargo nocturno dominical/festivo ordinario">Recargo nocturno dominical/festivo ordinario</option>
                    <option value="Recargo nocturno dominical/festivo">Recargo nocturno dominical/festivo</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jornada">Jornada <b>*</b></label>
                  <select name="jornada" id="jornada" class="form-control">
                    <option value="Nocturna" selected>Nocturna</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Fecha: <b>*</b></label>
                  <div class="input-group date" data-target-input="nearest">
                    <input type="date" name="fechaRecargo" class="form-control" required />
                  </div>
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Desde: <b>*</b></label>
                    <div class="input-group date" data-target-input="nearest">
                      <input type="time" name="inicioRecargo" class="form-control" required />
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Hasta: <b>*</b></label>
                    <div class="input-group date" data-target-input="nearest">
                      <input type="time" name="finalRecargo" class="form-control" required />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Observaciones</label>
                  <div class="">
                    <textarea class="form-control" rows="3" name="observaciones" id="observaciones" placeholder="Escriba algo si es necesario"></textarea>
                  </div>
                </div>
                <div class="ml-auto">
                  <p>Obligatorio (<b>*</b>)</p>
                </div>

                <div class="ml-auto">
                  <button type="submit" id="enviarRecargo" class="btn btn-primary">Enviar</button>
                  <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>

                <div class="ml-auto" id="result"></div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>

    <?php
    include "../include/footer.php";
    ?>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>

  </div>

  <?php
  include "../include/scripts.php";
  ?>

  <script>
    $(function() {
      bsCustomFileInput.init()
    });

    $("#formRecargo").submit(function(event) {
      $('#enviarRecargo').attr("disabled", true);

      var parametros = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "../action/guardarRecargo.php",
        data: parametros,
        beforeSend: function(objeto) {
          document.getElementById('formRecargo').reset();
          $("#result").html("Mensaje: Cargando...");
        },
        success: function(datos) {
          $("#result").html(datos);
          $('#enviarRecargo').attr("disabled", false);
        }
      });
      event.preventDefault();
    })
  </script>
</body>

</html>