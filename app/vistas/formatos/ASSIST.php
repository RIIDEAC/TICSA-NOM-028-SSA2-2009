<?php //echo '<pre>'; print_r($datos); die(); ?>
<html lang="es">
<header>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="<?php echo $this->_config->obtener('app/webbase'); ?>ckeditor/ckeditor.js"></script>
	<title>Resultados prueba de ASSIST</title>
</header>
<body>
	<textarea name="Editor">
		<table border="1" cellpadding="1" cellspacing="1" style="height:100%; width:100%">
			<tbody>
				<tr>
					<td rowspan="4" style="text-align:center; vertical-align:middle"><img alt="" src="http://localhost/ticsa/img/AmanecerAC.png" style="height:100px; width:100px" /></td>
					<td colspan="1" rowspan="2">
						<?php echo $datos->CENTRO->CEN_NOMBRE; ?><br />
						<?php echo $datos->CENTRO->CEN_CALLE. ' ' .$datos->CENTRO->CEN_NUMERO. ', ' .$datos->CENTRO->CEN_COLONIA. ', C.P. ' .$datos->CENTRO->CEN_CP. ' ' .$datos->CENTRO->CEN_CIUDAD. ', ' .$datos->CENTRO->CEN_ENTIDAD; ?><br />
						<?php echo $datos->CENTRO->CEN_TELEFONO. ', ' .$datos->CENTRO->CEN_CORREO. ', ' .$datos->CENTRO->CEN_WEB; ?><br />
					</td>
					<td>Revisión: <?php echo date("Y-m-d"); ?></td>
				</tr>
				<tr>
					<td>Versión: 01</td>
				</tr>
				<tr>
					<td rowspan="2" style="text-align:center">
					<h3><strong>Resultados prueba de ASSIST</strong></h3>
					</td>
					<td>Código:</td>
				</tr>
				<tr>
					<td>Página: 1 de 1</td>
				</tr>
			</tbody>
		</table>
		Expediente n&uacute;mero: <strong><?php echo $datos->FORMATO->NING_ID; ?></strong>&nbsp;
		Fecha de elaboración de la prueba: <strong><?php echo $datos->FORMATO->FECHA_CAPTURA; ?></strong>
		<hr>
		<h3>Datos del paciente:</h3>
		Nombre completo:&nbsp;<strong><?php echo $datos->FORMATO->PAC_NOMBRE.' '.$datos->FORMATO->PAC_PATERNO.' '.$datos->FORMATO->PAC_MATERNO; ?></strong>&nbsp;
		Sexo:&nbsp;<strong><?php echo $datos->FORMATO->SEX_MAY; ?></strong> 
		Fecha de nacimiento: <strong><?php echo $datos->FORMATO->PAC_FNACIMIENTO; ?></strong>&nbsp;
		Edad:<strong><?php echo $datos->FORMATO->PAC_EDAD; ?> años</strong> 
		Lugar de nacimiento: <strong><?php echo $datos->FORMATO->ENF_MAY; ?></strong> 
		Nacionalidad: <strong><?php echo $datos->FORMATO->NAC_MAY; ?></strong>&nbsp;		
		Estado civil: <strong><?php echo $datos->FORMATO->ESC_MIN; ?></strong> 
		Escolaridad: <strong><?php echo $datos->FORMATO->ESO_MIN; ?></strong> 
		Ocupación: <strong><?php echo $datos->FORMATO->OCU_MIN; ?></strong>
		<hr>
		<h3>Tabla de resultados</h3>
		<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:100%">	
		<thead>
			<tr>
				<th scope="col">Sustancia</th>
				<th scope="col">Puntos</th>
				<th scope="col">Riesgo</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($datos->RESULTADOS as $key => $value) { ?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php echo $value->PUNTOS; ?></td>
				<td><?php echo $value->RIESGO; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	Registrado por: <strong><?php echo $datos->FORMATO->USU_NOMBRE.' '.$datos->FORMATO->USU_PATERNO.' '.$datos->FORMATO->USU_MATERNO; ?></strong><br>
		Cargo: <strong><?php echo $datos->FORMATO->USU_CARGO; ?></strong><br>
		<p>&nbsp;</p>
		<p><strong>Firma: __________________________</strong></p>
	</textarea>
    <script>
            CKEDITOR.replace('Editor');
    </script>
</body>
</html>