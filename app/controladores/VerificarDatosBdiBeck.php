<?php
namespace app\controladores;
use \app\modelos\limpiar\Post;
use \app\modelos\redirigir\Redirigir;
use \app\modelos\token\Token;
use \app\modelos\paciente\RegistrarBdiBeck;
/**
 * 
 */
class VerificarDatosBdiBeck
{
	private $_post,
			$_redirigir,
			$_token,
			$_Bdibeck;
	
	public function __construct
	(
		Post $Post, 
		Redirigir $Redirigir, 
		Token $Token,
		RegistrarBdiBeck $RegistrarBdiBeck
	)
	{
		$this->_post = $Post;
		$this->_redirigir = $Redirigir;
		$this->_token = $Token;
		$this->_Bdibeck = $RegistrarBdiBeck;
		$this->Comprobacion();
	}

	public function Index(): void
	{
		if($this->_Bdibeck->registrar($this->_post))
		{
			$this->_redirigir->a('RegistroRealizado/');
		}

		$this->_redirigir->a('Inicio', 'Error');
	}

	public function Comprobacion(): void
	{
		if(!$this->_post = $this->_post->limpiar())
		{
			$this->_redirigir->a('Inicio', 'Post');
		}
		
		if(!$this->_token->verificar())
		{
			$this->_redirigir->a('Inicio','Token');
		}
	}
}