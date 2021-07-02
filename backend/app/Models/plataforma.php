<?php namespace App\Models;

use CodeIgniter\Model;

class plataforma extends Model{

    protected $table = 'plataforma';
	
    public function getPopup($key){
		$keystat = "";
		$respons = array();
		$rdata = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL plataforma_getPopup();";
			$query = $db->query($sql);

			foreach ($query->getResult() as $row){
			    $rdata['popup'] = $row->plataforma_popup;
			}
			$db->close();
			$respons = $rdata['popup'];
			return $respons;
		}else{
			return $keystat;
		}	
	}

	public function getProd($key){
		$keystat = "";
		$respons = array();
		$rdata = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row){
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL plataforma_getProd();";
			$query = $db->query($sql);

			foreach ($query->getResult() as $row){
			    $rdata['articulos'] = $row->plataforma_articulos_home;
			}	
			$db->close();
			$respons = $rdata['articulos'];
			return $respons;
		}else{
			return $keystat;
		}
	}

	public function getSlid($key){
		$keystat = "";
		$respons = array();
		$rdata = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row){
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL plataforma_getSlid();";
			$query = $db->query($sql);

			foreach ($query->getResult() as $row){
			    $rdata['slider_1']= $row->plataforma_slider_1;
			    $rdata['slider_2']= $row->plataforma_slider_2;
			    $rdata['slider_3']= $row->plataforma_slider_3;
			    $rdata['slider_4']= $row->plataforma_slider_4;
			    $rdata['slider_5']= $row->plataforma_slider_5;
			}
			$db->close();
			$respons = '{"slider_1":"'.$rdata['slider_1'].'", "slider_2":"'.$rdata['slider_2'].'", "slider_3":"'.$rdata['slider_3'].'", "slider_4":"'.$rdata['slider_4'].'", "slider_5":"'.$rdata['slider_5'].'"}';
			return $respons;
		}else{
			return $keystat;
		}
	}

	public function getRawArt($key){
		$keystat = "";
		$respons = array();
		$rdata = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL articulos_getRawArt();";
			$query = $db->query($sql);
			$found = false;

			$respons = '{"articulos":[';

			foreach ($query->getResult() as $row){
				$found = true;
				$respons .= '{"id":"'.$row->articulo_identificador.'","nombre":"'.$row->articulo_descripción.'","descripcion":"'.$row->articulo_extracto.'","precio":'.$row->articulo_precio.',"cantidad":'.$row->articulo_cantidad.',"imagen_1":"'.$row->articulo_imagen_1.'","imagen_2":"'.$row->articulo_imagen_2.'","imagen_3":"'.$row->articulo_imagen_3.'","cats":"'.$row->articulo_cats.'","marca":"'.$row->articulo_marca.'"},';
			}

			if($found){
				$respons = substr($respons,0,-1);
			}

			$respons .= ']}';

			$db->close();

			return $respons;
		}else{
			return $keystat;
		}
	}

	public function getFilArt($key,$filter){
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL articulos_getFilArt('".$filter."');";
			$query = $db->query($sql);
			$found = false;

			$respons = '{"articulos":[';

			foreach ($query->getResult() as $row){
				$found = true;
				$respons .= '{"id":"'.$row->articulo_identificador.'","nombre":"'.$row->articulo_descripción.'","descripcion":"'.$row->articulo_extracto.'","precio":'.$row->articulo_precio.',"cantidad":'.$row->articulo_cantidad.',"imagen_1":"'.$row->articulo_imagen_1.'","imagen_2":"'.$row->articulo_imagen_2.'","imagen_3":"'.$row->articulo_imagen_3.'"},';
			}

			if($found){
				$respons = substr($respons,0,-1);
			}

			$respons .= ']}';

			$db->close();
			
			return $respons;
		}else{
			return $keystat;
		}
	}

	public function getProdById($key,$id){
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL articulos_getProd('".$id."');";
			$query = $db->query($sql);
			$found = false;

			$respons = '{"articulos":[';

			foreach ($query->getResult() as $row){
				$found = true;
				$respons .= '{"id":"'.$row->articulo_identificador.'","nombre":"'.$row->articulo_descripción.'","descripcion":"'.$row->articulo_extracto.'","precio":'.$row->articulo_precio.',"cantidad":'.$row->articulo_cantidad.',"imagen_1":"'.$row->articulo_imagen_1.'","imagen_2":"'.$row->articulo_imagen_2.'","imagen_3":"'.$row->articulo_imagen_3.'"},';
			}

			if($found){
				$respons = substr($respons,0,-1);
			}

			$respons .= ']}';

			$db->close();
			
			return $respons;
		}else{
			return $keystat;
		}
	}
	
	public function usuarios_login($key, $mail, $contra)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `usuarios_login`('".$mail."', '".$contra."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata[0] = $row->Mensaje;
				$userdata[1] = $row->usuario_identificador;
				$userdata[2] = $row->usuario_tipo;
			}
			$db->close();
			return $userdata;
		}else{
			return $keystat;
		}
	}

	public function usuarios_cambiarContra($key, $id, $oldcontra, $newcontra)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `usuarios_cambiarContra`('".$id."', '".$oldcontra."', '".$newcontra."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata = $row->Mensaje;
			}
			$db->close();
			return $userdata;
		}else{
			return $keystat;
		}
	}

	public function usuarios_nuevo($key, $mail, $contra, $nombre, $phone)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `usuarios_nuevo`('".$mail."', '".$contra."', '".$nombre."', '".$phone."');";
			$query = $db->query($sql);
			$response = array();
			foreach ($query->getResult() as $row)
			{
				$response[0] = $row->Mensaje;
				$response[1] = $row->usuario_identificador;
			}
			$db->close();
			return $response;
		}else{
			return $keystat;
		}
	}

	public function usuarios_nuevo_goog($key, $mail, $png, $nombre)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `usuarios_nuevo_goog`('".$mail."', '".$png."', '".$nombre."');";
			$query = $db->query($sql);
			$response = array();
			foreach ($query->getResult() as $row)
			{
				$response[0] = $row->Mensaje;
				$response[1] = $row->usuario_identificador;
			}
			$db->close();
			return $response;
		}else{
			return $keystat;
		}
	}

	public function usuarios_checarPlataforma($mail)
	{
		$response = "";

		$db = \Config\Database::connect();
		$sql = "CALL usuarios_checarPlataforma('".$mail."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $response = $row->usuario_plataforma;
		}
		$db->close();	
		return $response;
	}

	public function usuarios_checarCorreo($mail)
	{
		$response = "";

		$db = \Config\Database::connect();
		$sql = "CALL usuarios_checarCorreo('".$mail."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $response = $row->Mensaje;
		}
		$db->close();	
		return $response;
	}

	public function usuarios_idByemail($mail)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL usuarios_idByemail('".$mail."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata[0] = "Usuario";
				$userdata[1] = $row->usuario_identificador;
			}
			$db->close();
			return $userdata;
	}

	public function usuarios_nameById($id)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL usuarios_nameById('".$id."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata[0] = $row->Mensaje;
				$userdata[1] = $row->información_nombre;
			}
			$db->close();
			return $userdata;
	}

	public function informacion_modificar($info_id,$nombre,$telefono,$calle,$ne,$ni,$colonia,$cp,$municipio,$estado,$pais)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL informacion_modificar('".$info_id."','".$nombre."','".$telefono."','".$calle."','".$ne."','".$ni."','".$colonia."','".$cp."','".$municipio."','".$estado."','".$pais."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata = $row->Mensaje;
			}
			$db->close();
			return $userdata;
	}

	public function informacion_obtener($id)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL informacion_obtener('".$id."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata[0] = $row->información_nombre;
				$userdata[1] = $row->información_calle;
				$userdata[2] = $row->información_numero_externo;
				$userdata[3] = $row->información_numero_interno;
				$userdata[4] = $row->información_colonia;
				$userdata[5] = $row->información_codigo_postal;
				$userdata[6] = $row->información_municipio;
				$userdata[7] = $row->información_estado;
				$userdata[8] = $row->información_país;
				$userdata[9] = $row->información_telefono;
			}
			$db->close();
			return $userdata;
	}

	public function factura_modificar($id,$rfc,$rs,$info,$nombre)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL facturas_modificar('".$id."','".$rfc."','".$rs."','".$info."','".$nombre."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata = $row->Mensaje;
			}
			$db->close();
			return $userdata;
	}

	public function factura_obtener($id)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL facturas_obtener('".$id."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata["factura_identificador"] = $row->factura_identificador;
				$userdata["factura_nombre"] = $row->factura_nombre;
				$userdata["factura_rfc"] = $row->factura_rfc;
				$userdata["factura_razon_social"] = $row->factura_razon_social;
				$userdata["factura_información"] = $row->factura_información;
			}
			$db->close();
			return $userdata;
	}

	public function compras_insertar($key, $usuario, $articulos, $informacion, $cupon, $subtotal, $iva, $total, $factura, $plataforma, $referencia, $estatus, $env_data, $fact_data)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `compras_insertar`('".$usuario."', '".$articulos."', '".$informacion."', '".$cupon."', '".$subtotal."', '".$iva."', '".$total."', '".$factura."', '".$plataforma."', '".$referencia."', '".$estatus."', '".$env_data."', '".$fact_data."');";
			$query = $db->query($sql);
			$response = array();
			foreach ($query->getResult() as $row)
			{
				$response = $row->compra_identificador;
			}
			$db->close();
			return $response;
		}else{
			return $keystat;
		}
	}

	public function compras_getIncompletes($key)
	{
		$keystat = "";
		$respons = array();

		$db = \Config\Database::connect();
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);

		foreach ($query->getResult() as $row)
		{
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$db = \Config\Database::connect();
			$sql = "CALL `compras_getIncompletes`();";
			$query = $db->query($sql);
			$response = array();
			foreach ($query->getResult() as $row)
			{
				$response[] = $row;
			}
			$db->close();
			return $response;
		}else{
			return $keystat;
		}
	}

	public function compra_updateStatus($id,$statuse)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL compra_updateStatus('".$id."','".$statuse."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata = "Accion";
			}
			$db->close();
			return $userdata;
	}

	public function compra_getByID($id)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL compra_getByID('".$id."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata[] = $row;
			}
			$db->close();
			return $userdata;
	}

	public function compra_updateReference($id,$reference)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL compra_updateReference('".$id."','".$reference."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata = "Accion";
			}
			$db->close();
			return $userdata;
	}

	public function usuarios_getDataByID($id)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL usuarios_getDataByID('".$id."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata["usuario_correo"] = $row->usuario_correo;
				$userdata["usuario_información"] = $row->usuario_información;
				$userdata["usuario_factura"] = $row->usuario_factura;
				$userdata["usuario_carrito"] = $row->usuario_carrito;
			}
			$db->close();
			return $userdata;
	}

	public function articulos_checkExistence($id, $ammount)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL articulos_checkExistence('".$id."','".$ammount."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata["Mensaje"] = $row->Mensaje;
				$userdata["Diference"] = $row->Diference;
			}
			$db->close();
			return $userdata;
	}

	public function articulos_modifExistence($id, $ammount)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL articulos_modifExistence('".$id."','".$ammount."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata["Mensaje"] = $row->Mensaje;
			}
			$db->close();
			return $userdata;
	}

	public function compras_updateStatus($id, $status)
	{
		$keystat = "";
		$respons = array();
		$db = \Config\Database::connect();
			$sql = "CALL compras_updateStatus('".$id."','".$status."');";
			$query = $db->query($sql);
			$userdata = array();
			foreach ($query->getResult() as $row)
			{
				$userdata["Mensaje"] = $row->Mensaje;
			}
			$db->close();
			return $userdata;
	}
}