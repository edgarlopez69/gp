<?php namespace App\Models;

use CodeIgniter\Model;

class admin extends Model{

    protected $table = 'usuarios';

	public function admin_CheckByID($userID)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_CheckByID('".$userID."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["usuario_tipo"] = $row->usuario_tipo;
			}
			$db->close();
			return $tokendata;
	}

	//Ventas
	public function admin_getCompras()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getCompras();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_getEnvioById($id)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getEnvioById('".$id."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_updateEnvio($id,$proveedor,$f_envio,$f_arribo,$estatus,$referencia)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_updateEnvio('".$id."','".$proveedor."','".$f_envio."','".$f_arribo."','".$estatus."','".$referencia."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_getCupones()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getCupones();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	//Inventory
	public function admin_getInventory()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getInventory();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_deleteProductByID($ProdID)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_deleteProductByID('".$ProdID."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_newProduct($id,$descript,$ext,$precio,$cant,$img1,$img2,$img3,$marca,$cats)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_newProduct('".$id."','".$descript."','".$ext."','".$precio."','".$cant."','".$img1."','".$img2."','".$img3."','".$marca."','".$cats."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_updateProduct($id,$descript,$ext,$precio,$cant,$img1,$img2,$img3,$marca,$cats)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_updateProduct('".$id."','".$descript."','".$ext."','".$precio."','".$cant."','".$img1."','".$img2."','".$img3."','".$marca."','".$cats."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_updateProdCant($id,$cant)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_updateProdCant('".$id."','".$cant."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_getCategorias()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getCategorias();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_deleteCategoriaById($catID)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_deleteCategoriaById('".$catID."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_updateCategoria($id,$nombre,$sub)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_updateCategoria('".$id."','".$nombre."','".$sub."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_newCategoria($nombre,$sub)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_newCategoria('".$nombre."','".$sub."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	//Plataforma
	public function admin_getUserData()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getUserData();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_deleteUserByID($userID)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_deleteUserByID('".$userID."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata["Mensaje"] = "Exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_changePsw($id, $newpass)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_changePsw('".$id."','".$newpass."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = "Acto";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_userUpdate($id, $tipo)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_userUpdate('".$id."','".$tipo."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = "Acto";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_newUser($mail, $password, $nombre, $tipo)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_newUser('".$mail."','".$password."','".$nombre."','".$tipo."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = "Acto";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_getPlataforma()
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getPlataforma();";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	public function admin_updateProductSlider($products)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_updateProductSlider('".$products."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = "exito";
			}
			$db->close();
			return $tokendata;
	}

	public function admin_getCompraByEnvio($proID)
	{
		$respons = array();

		$db = \Config\Database::connect();
			$sql = "CALL admin_getCompraByEnvio('".$proID."');";
			$query = $db->query($sql);
			$tokendata = array();
			foreach ($query->getResult() as $row)
			{
				$tokendata[] = $row;
			}
			$db->close();
			return $tokendata;
	}

	
}