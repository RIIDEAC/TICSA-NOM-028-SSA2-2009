<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">PLAN INDIVIDUAL</h1>
        <p class="text-justify"><strong>INTRUCCIONES:</strong> Seleccione el paciente y responda lo que se le pregunta. Tenga en cuenta que el plan se diseña de manera automática con base en los datos proporcionados del modelo de tratamiento y de los instrumentos y pruebas aplicados, sin embargo, este sólo es una sugerencia, y siempre puede incluir, eliminar y realizar un Plan Individual considerando su experiencia y conocimientos.</p>
        <form method="POST" action="<?php echo $this->_config->obtener('app/webbase'); ?>RevisarConsejeriaPLANINDIVIDUAL/">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="NING_ID"><h3>Paciente</h3></label>
                <select data-live-search="true" id="NING_ID" name="NING_ID" class="form-control" onchange="cargarEI()" required>
                  <option value="0">Seleccione un paciente</option>
                  <?php foreach ($datos as $value) { ?>
                    <option value="<?php echo $value->NING_ID; ?>"><?php echo $value->PAC_PATERNO.' '.$value->PAC_MATERNO.' '.$value->PAC_NOMBRE; ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <input type="hidden" id="TOKEN" name="TOKEN" value="<?php echo $this->_token->generar(); ?>">
        <div id="RESPUESTA"></div> 
    </div>
<script>
  function cargarEI()
      {
        var data = 
                  {
                    "NING_ID" : document.getElementById("NING_ID").value,
                    "TOKEN" : document.getElementById("TOKEN").value
                  };

        $.ajax({
            data: data,
            url: '<?php echo $this->_config->obtener('app/webbase').'ControladorPLANCONSEJERIAINDIVIDUAL'; ?>',
            type: 'POST',
            beforeSend: function()
            {
              $("#RESPUESTA").html("Cargando");
            },
            success: function(response)
            {
              $("#RESPUESTA").html(response);
              actualizarTOKEN();
            }
        });
      }

  function actualizarTOKEN()
  {
    var TOKEN = document.getElementById("TOKEN").value;
    $.ajax({
            data: TOKEN,
            url: '<?php echo $this->_config->obtener('app/webbase').'ControladorPLANCONSEJERIAINDIVIDUAL/Token'; ?>',
            type: 'POST',
            success: function(response)
            {
              document.getElementById("TOKEN").value = (response);
            }
        });
  }
</script>