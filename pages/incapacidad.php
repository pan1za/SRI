<?php

include "../include/head.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistemas de Reportes | Incapacidad</title>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php
    $menuOpenRepor1 = "menu-open";
    $activeInc = "active";
    include "../include/navbar.php";
    include "../include/aside.php";
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Incapacidad</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Incapacidad</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Reportar Incapacidad</h3>
          </div>
          <div class="card-body">
            <form id="formIncapacidad" method="POST" enctype="multipart/form-data">
              <div class="card card-body w-50 offset-3">
                <div class="form-group">
                  <label>Tipo de incapacidad <b>*</b></label>
                  <select class="form-control" name="tipoIncapacidad" id="tipoIncapacidad" required>
                    <option value="" selected disabled autofocus>Seleccione una opción</option>
                    <option value='Incapacidad por enfermedad laboral'>Incapacidad por enfermedad laboral</option>
                    <option value='Incapacidad por enfermedad general'>Incapacidad por enfermedad general</option>
                    <option value='Incapacidad por maternidad'>Incapacidad por maternidad</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Día inicio incapacidad <b>*</b></label>
                  <div class="input-group date" data-target-input="nearest">
                    <input type="date" name="diaInicio" id="diaInicio" class="form-control" data-target="#reservationdate" required />
                  </div>
                </div>

                <div class="form-group">
                  <label>Día final incapacidad <b>*</b></label>
                  <div class="input-group date" data-target-input="nearest">
                    <input type="date" name="diaFinal" id="diaFinal" class="form-control" data-target="#reservationdate" required />
                  </div>
                </div>

                <div class="form-group">
                  <label>Evidencia <b>*</b></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fileEvidencia" required>
                      <label class="custom-file-label">Seleccionar archivo</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Historia clínica</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fileHistClinica" disabled requiredd>
                      <label class="custom-file-label" for="evidencia">Seleccionar archivo</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Cédula</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fileCedula">
                      <label class="custom-file-label" for="evidencia">Seleccionar archivo</label>
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
                  <button type="submit" id="enviarIncapacidad" class="btn btn-primary">Enviar</button>
                  <button type="submit" id="btn" class="btn btn-danger">Cancelar</button>
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
      bsCustomFileInput.init();
    });

    //crear funcion para que historia clinica se active cuando hayan mas de 3 dias

    $("#formIncapacidad").submit(function(event) {
      $('#enviarIncapacidad').attr("disabled", true);
      var archivo = $("#fileEvidencia").prop('files')[0];
      var formData = new FormData();
      formData.append("fileEvidencia", archivo);
      formData.append("tipoIncapacidad", $("#tipoIncapacidad").val());
      formData.append("diaInicio", $("#diaInicio").val());
      formData.append("diaFinal", $("#diaFinal").val());
      formData.append("observaciones", $("#observaciones").val());
      var ruta = "../action/guardarIncapacidad.php";

      $.ajax({
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        url: ruta,
        beforeSend: function(objeto) {
          document.getElementById('formIncapacidad').reset();
          $("#result").html("Mensaje: Cargando...");
        },
        success: function(datos) {
          $("#result").html(datos);
          $('#enviarIncapacidad').attr("disabled", false);
        }
      });
      event.preventDefault();
    });
  </script>
</body>

</html>