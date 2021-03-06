<?php
namespace app\controladores;
use \app\modelos\entradas\Entrada;
use \app\modelos\token\{GenerarToken,RevisarToken};
use \app\modelos\redirigir\Redirigir;
use \app\nucleo\{Config};
use \app\modelos\vista\Vista;
use \app\modelos\aportaciones\ObtenerAportacionesPacienteporNING_ID;


class ControladorAPORTACIONES
{
	public function __construct
	(
		RevisarToken $RevisarToken, 
		GenerarToken $GenerarToken,
		Entrada $Entrada,
		Redirigir $Redirigir,
		Config $Config,
		Vista $Vista,
		ObtenerAportacionesPacienteporNING_ID $ObtenerAportacionesPacienteporNING_ID
	)
	{
		$this->_entrada = $Entrada;
		$this->_revisartoken = $RevisarToken;
		$this->_generartoken = $GenerarToken;
		$this->_redirigir = $Redirigir;
		$this->_config = $Config;
		$this->_vista = $Vista;
		$this->_aportaciones = $ObtenerAportacionesPacienteporNING_ID;
	}

	public function Index()
	{
		if(!$this->_entrada->existe())
		{
			$this->_redirigir->a($this->_config->obtener('dir/salir'));
		}

		if($this->_revisartoken->revisar($_POST['TOKEN']))
		{
			if($_POST['NING_ID'] !== '0')
			{				
				if($aportaciones = $this->_aportaciones->obtener($_POST['NING_ID']))
				{
					$this->_vista->ver('visualizar/TabladeAportaciones', $aportaciones);
				}
				else
				{
					$this->_vista->ver('plantilla/noExistenRegistros');
				}
				
			}
			
		}
	}

	//CONTROL DE RENOVACION DE TOKEN
	public function Token()
	{
		if(!$this->_entrada->existe())
		{
			$this->_redirigir->a($this->_config->obtener('dir/salir'));
		}

		echo $this->_generartoken->generar();
	}
}