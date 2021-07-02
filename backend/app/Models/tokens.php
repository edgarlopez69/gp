<?php namespace App\Models;

use CodeIgniter\Model;

class tokens extends Model{

    protected $table = 'tokens';

	public function token_getDataForPassRecovery($tkn_id)
	{
		$response = "";

		$db = \Config\Database::connect();
		$sql = "CALL token_getDataForPassRecovery('".$tkn_id."');";
		$query = $db->query($sql);

		$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["token_usuario"] = $row->token_usuario;
				$tokendata["token_contenido"] = $row->token_contenido;
				$tokendata["token_tipo"] = $row->token_tipo;
				$tokendata["token_expiracion"] = $row->token_expiracion;
				$tokendata["token_status"] = $row->token_status;
			}
			$db->close();
			return $tokendata;
	}

	public function token_deactivate($tkn_id)
	{
		$response = "";

		$db = \Config\Database::connect();
		$sql = "CALL token_deactivate('".$tkn_id."');";
		$query = $db->query($sql);

		$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = $row->Mensaje;
			}
			$db->close();
			return $tokendata;
	}

	public function token_isActive($tkn_id)
	{
		$response = "";

		$db = \Config\Database::connect();
		$sql = "CALL token_isActive('".$tkn_id."');";
		$query = $db->query($sql);

		$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = $row->Mensaje;
			}
			$db->close();
			return $tokendata;
	}

	public function token_addPassRecoveryToken($usrID,$infodata)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL token_addPassRecoveryToken('".$usrID."','".$infodata."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = $row->Mensaje;
				$tokendata["token_id"] = $row->token_id;
			}
			$db->close();
			return $tokendata;
	}
	public function token_changeUserPassId($userID,$newPass)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL token_changeUserPassId('".$userID."','".$newPass."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = $row->Mensaje;
			}
			$db->close();
			return $tokendata;
	}
}