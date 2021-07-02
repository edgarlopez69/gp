<?php namespace App\Controllers;

use App\Models\plataforma;
use App\Models\tokens;
use App\Models\admin;
use Firebase\JWT\JWT;
use \Stripe;

class backend extends BaseController
{	

	public function getProd()
	{
		$request = \Config\Services::request();
		$key = $request->getVar('key');

		$model = new plataforma();
        $result = $model->getProd($key);
        $http_origin = $_SERVER['HTTP_HOST'];
        $origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function sendMail()
	{
		$request = \Config\Services::request();
		$db = \Config\Database::connect();
		$key = $request->getVar('key');
		$sql = "CALL api_checkKey('".$key."');";
		$query = $db->query($sql);
		foreach ($query->getResult() as $row){
		    $keystat = $row->Mensaje;
		}
		$db->close();
		if($keystat == "Valid key"){
			$nombre = $request->getVar('nombre');
			$correo = $request->getVar('correo');
			$telefono = $request->getVar('telefono');
			$comentarios = $request->getVar('comentarios');
			$respuesta = "";
			$respuesta = $respuesta."Nombre: ".$nombre."<br>";
			$respuesta = $respuesta."Correo: ".$correo."<br>";
			$respuesta = $respuesta."Telefono: ".$telefono."<br>";
			$respuesta = $respuesta."Comentarios: ".$comentarios."<br>";
			$email = \Config\Services::email();

			$mensaje = $respuesta;
			$email->setFrom('webmaster_glassprotech@dsynapse.com	', 'Glass Protech');
			$email->setTo('info@glassprotech.com.mx');

			$email->setSubject('Contacto por email desde ecommerce');
			$email->setMessage($mensaje);

			$respuesta = "";
			if($email->send())
			{
				$respuesta = "Email envíado";
			}
			else
			{
				$respuesta = "Email no enviado";
			}
		}else{
			$respuesta = $keystat;
		}
		$http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($respuesta)
            ->setStatusCode(200);
	}

	public function getProdById()
	{
		$request = \Config\Services::request();
		$key = $request->getVar('key');
		$id = $request->getVar('id');

		$model = new plataforma();

		$result = $model->getProdById($key,$id);
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function usr_login()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$key = $request->getVar('key');
		$mail = $request->getVar('mail');
		$contra = $request->getVar('contra');
		$result = $model->usuarios_checarPlataforma($mail);
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$origin = "*";
		if ($result == "tradicional") {
			$result = $model->usuarios_login($key, $mail, $contra);
			if($result!='Invalid Key'){
				$result[1] = $this->encodeUserData($result[1]);
				$result = json_encode($result);
				
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
			}
			else{
				
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody('Invalid key')
					->setStatusCode(200);
			}
		}
		else
		{
			$response = "Iniciar sesion con Google";
			
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
				->setHeader('Access-Control-Allow-Headers', '*')
				->setHeader('Access-Control-Allow-Methods', 'POST')
				->setHeader('Content-Type', 'application/json')
				->setBody($response)
				->setStatusCode(200);
		}
	}

	public function usr_changeContra()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$key = $request->getVar('key');
		$id = $request->getVar('id');
		$oldcontra = $request->getVar('oldcontra');
		$newcontra = $request->getVar('newcontra');

	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$origin = "*";
		$result = $model->usuarios_cambiarContra($key, $id, $oldcontra, $newcontra);
		if($result!='Invalid Key'){

			$result = '{ "result" : "'.$result.'"}';
				
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
				->setHeader('Access-Control-Allow-Headers', '*')
				->setHeader('Access-Control-Allow-Methods', 'POST')
				->setHeader('Content-Type', 'application/json')
				->setBody($result)
				->setStatusCode(200);
		}
		else{
			$result = '{ "result" : "'.$result.'"}';
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
				->setHeader('Access-Control-Allow-Headers', '*')
				->setHeader('Access-Control-Allow-Methods', 'POST')
				->setHeader('Content-Type', 'application/json')
				->setBody($result)
				->setStatusCode(200);
		}
	}

	public function usr_register()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$key = $request->getVar('key');
		$mail = $request->getVar('mail');
		$contra = $request->getVar('contra');
		$nombre = $request->getVar('nombre');
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$result = $model->usuarios_checarCorreo($mail);
		if ($result == "Correo No Existe") 
		{
			$result = $model->usuarios_nuevo($key, $mail, $contra, $nombre);
			if($result!='Invalid Key'){
				$result[1] = $this->encodeUserData($result[1]);
				$result = json_encode($result);
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
			}else{
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
			}
		}
		else
		{
			$result='Correo ya usado';
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
		}		
	}

	public function generatePswChange()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$tokens = new tokens();
		
		$mail = $request->getVar('mail');
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "*";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$result = $model->usuarios_checarCorreo($mail);
		if ($result == "Correo No Existe")
		{
			$result = '{"respuesta":"Correo No Existe"}';
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
		}
		else
		{
			$user_id = $model->usuarios_idByemail($mail);
			$codigo = $this->generateRandomString();

			$infodata = '{ "codigo" :"'.$codigo.'"}';
			$result = $tokens->token_addPassRecoveryToken($user_id[1], $infodata);
			if ($result["Mensaje"]== "Token Inserted") 
			{
				$key = 'uXR6vZCjQ9';
				$token = array(
				    'code' => $codigo,
				    'tkn_id' => $result["token_id"]
				);
				$token = json_encode($token);
				$jwt = JWT::encode($token, $key);

				$data["code"] = $jwt;
				$viewtext = view('templates/mail', $data);
			

				$mensaje = $viewtext;


				$email = \Config\Services::email();
				$email->setFrom('webmaster_glassprotech@dsynapse.com	', 'Glass Protech');
				$email->setTo($mail);

				$email->setSubject('Contacto por email desde ecommerce');
				$email->setMessage($mensaje);

				$respuesta = "";
				if($email->send())
				{
					$respuesta = '{"respuesta":"Email envíado"}';
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setHeader('Content-Type', 'application/json')
						->setBody($respuesta)
						->setStatusCode(200);
				}
				else
				{
					$respuesta = '{"respuesta":"Email no enviado"}';
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setHeader('Content-Type', 'application/json')
						->setBody($respuesta)
						->setStatusCode(200);
				}
			}
			else
			{
				$respuesta = '{"respuesta":"Email no valido"}';
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setHeader('Content-Type', 'application/json')
						->setBody($respuesta)
						->setStatusCode(200);
			}

			
			
			
		}	
	}

	public function getDataForPassRecovery()
	{
		$request = \Config\Services::request();
		$tokens = new tokens();
		
		$tkn_id = $request->getVar('tkn_id');
		$code = $request->getVar('code');
		$newPass = $request->getVar('newPass');

        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "*";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$result = $tokens->token_getDataForPassRecovery($tkn_id);
		$contenido = $result["token_contenido"];

		$contenido = json_encode($contenido);
		$contenido = json_decode($contenido);
		$contenido = json_decode($contenido);

		$time = strtotime($result["token_expiracion"]);

		$curtime = time();
		if ($curtime <= $time) 
		{
			//var_dump($contenido);
			if (is_object($contenido)) 
			{
				if($code == $contenido->codigo && $result["token_status"] == 0 )
				{
					$result = $tokens->token_changeUserPassId($result["token_usuario"],$newPass);
					$tokens->token_deactivate($tkn_id);
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setBody($result["Mensaje"])
						->setStatusCode(200);
				}
				else
				{
					$result = "Codigo Invalido";
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setBody($result)
						->setStatusCode(200);
				}
			}
			else
			{
				$result = "Codigo Invalido";
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setBody($result)
					->setStatusCode(200);
			}
			
		}
		else
		{
			$tokens->token_deactivate($tkn_id);
			$result = "Codigo Expirado";
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setBody($result)
					->setStatusCode(200);
		}				
	}

	public function checkToken()
	{
		$request = \Config\Services::request();
		$tokens = new tokens();
		
		$tkn_id = $request->getVar('tkn_id');
		$code = $request->getVar('code');

        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "*";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		$result = $tokens->token_getDataForPassRecovery($tkn_id);
		$contenido = $result["token_contenido"];

		$contenido = json_encode($contenido);
		$contenido = json_decode($contenido);
		$contenido = json_decode($contenido);

		$time = strtotime($result["token_expiracion"]);

		$curtime = time();
		if ($curtime <= $time) 
		{
			//var_dump($contenido);
			
			if (is_object($contenido)) 
			{
				if($code == $contenido->codigo && $result["token_status"] == 0 )
				{
					$result = "Codigo Valido";
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setBody($result)
						->setStatusCode(200);
				}
				else
				{
					$result = "Codigo Invalido";
					return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
						->setHeader('Access-Control-Allow-Headers', '*')
						->setHeader('Access-Control-Allow-Methods', 'POST')
						->setBody($result)
						->setStatusCode(200);
				}
			}
			else
			{
				$result = "Token no existe";
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setBody($result)
					->setStatusCode(200);
			}
		}
		else
		{
			$tokens->token_deactivate($tkn_id);
			$result = "Codigo Expirado";
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setBody($result)
					->setStatusCode(200);
		}				
	}

	public function usr_goog_login()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$key = $request->getVar('key');
		$url = $request->getVar('url');
		$mail = $request->getVar('mail');
		$nombre = $request->getVar('nombre');
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}

		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}

		$result = $model->usuarios_checarCorreo($mail);
		if ($result == "Correo No Existe") 
		{
			$result = $model->usuarios_nuevo_goog($key, $mail, $url, $nombre);
			if($result!='Invalid key'){
				$result[1] = $this->encodeUserData($result[1]);
				$result = json_encode($result);
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
			}else{
				return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
			}
		}
		else
		{

			$result = $model->usuarios_idByemail($mail);
			$result[1] = $this->encodeUserData($result[1]);
			$result = json_encode($result);
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
					->setHeader('Access-Control-Allow-Headers', '*')
					->setHeader('Access-Control-Allow-Methods', 'POST')
					->setHeader('Content-Type', 'application/json')
					->setBody($result)
					->setStatusCode(200);
		}
	}

	public function getNameById()
	{
		$request = \Config\Services::request();
		$id = $request->getVar('id');

		$model = new plataforma();

		$result = $model->usuarios_nameById($id);
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($result[1])
            ->setStatusCode(200);
	}

	public function informacion_modificar()
	{
		$request = \Config\Services::request();
		$info_id = $request->getVar('info_id');
		$nombre = $request->getVar('nombre');
		$calle = $request->getVar('calle');
		$ne = $request->getVar('ne');
		$ni = $request->getVar('ni');
		$colonia = $request->getVar('colonia');
		$cp = $request->getVar('cp');
		$municipio = $request->getVar('municipio');
		$estado = $request->getVar('estado');
		$pais = $request->getVar('pais');

		$model = new plataforma();

		$result = $model->informacion_modificar($info_id,$nombre,$calle,$ne,$ni,$colonia,$cp,$municipio,$estado,$pais);
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function informacion_obtener()
	{
		$request = \Config\Services::request();
		$id = $request->getVar('id');

		$model = new plataforma();

		$result = $model->informacion_obtener($id);
		$result = json_encode($result);
		
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function factura_modificar()
	{
		$request = \Config\Services::request();
		$id = $request->getVar('id');
		$rfc = $request->getVar('rfc');
		$rs = $request->getVar('rs');
		$info = $request->getVar('info');
		$nombre = $request->getVar('nombre');

		$model = new plataforma();

		$result = $model->factura_modificar($id,$rfc,$rs,$info,$nombre);
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function factura_obtener()
	{
		$request = \Config\Services::request();
		$id = $request->getVar('id');

		$model = new plataforma();

		$result = $model->factura_obtener($id);
		$result = json_encode($result);
		
        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function compras_insertar()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$key = "testKey";
		$usuario = $request->getVar('usuario');
		$userInformation = $model->usuarios_getDataByID($usuario);

		$articulos = $request->getVar('articulos');
		$informacion = $userInformation["usuario_información"];
		$cupon = "1";
		$subtotal = $request->getVar('subtotal');
		$iva = $request->getVar('iva');
		$total = $request->getVar('total');
		$factura = $userInformation["usuario_factura"];
		$plataforma = $request->getVar('plataforma');
		$referencia = $request->getVar('referencia');
		$estatus = $request->getVar('estatus');

        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}

		$result = $model->compras_insertar($key, $usuario, $articulos, $informacion, $cupon, $subtotal, $iva, $total, $factura, $plataforma, $referencia, $estatus);
		if($result!='Invalid Key'){

			$ammountInCents = (intval($total) * 100);
			$mailForReceipt = $userInformation["usuario_correo"];

			$stripe = new \Stripe\StripeClient(
			  'sk_test_51Hci5rHPPpKZkxpSysXCUKJ6IrFr3DNdYBQF5vADBqIXpSorU2yGXPLAgudliQcBhA4t57eoDp7cpetWMzWkSVi400SG4bftf0'
			);
			$resp = $stripe->paymentIntents->create([
			  'amount' => $ammountInCents,
			  'currency' => 'mxn',
			  'payment_method_types' => ['card'],
			  'receipt_email' => $mailForReceipt,
			]);
			return $this->response->setHeader('Access-Control-Allow-Origin', "*")
				->setHeader('Access-Control-Allow-Headers', '*')
				->setHeader('Access-Control-Allow-Methods', 'POST')
				->setBody($resp["client_secret"])
				->setStatusCode(200);
		}else{
			return $this->response->setHeader('Access-Control-Allow-Origin', $origin)
				->setHeader('Access-Control-Allow-Headers', '*')
				->setHeader('Access-Control-Allow-Methods', 'POST')
				->setBody($result)
				->setStatusCode(200);
		}
	}

	public function compras_newOrder()
	{
		$request = \Config\Services::request();
		$model = new plataforma();

		$key = $request->getVar('key');
		$usuario = $request->getVar('usuario');
		$email = $request->getVar('email');
		$articulos = $request->getVar('articulos');
		$factura = $request->getVar('factura');
		$sending = $request->getVar('sending');


		$subtotal = 0;

		$itemData = [];

		$itemErrors = [];

		$order = 0;
		foreach ($articulos as $articulo) 
		{
			$itemName = $articulo["nombre"];
			$itemAmount = (float) $articulo["precio"];
			$itemQuantity =  (int) $articulo["articulos"];
			$subtotal = $subtotal + ($itemAmount * $itemQuantity);
			$itemAmount = $itemAmount * 100;
			$itemID = $articulo["id"];
		    
		    $itemData[] = 
			[
		      	'price_data' => 
		      	[
		        	'currency' => 'mxn',
		        	'product_data' => 
		        	[
		        	  'name' => $itemName,
		        	],
		        	'unit_amount' => $itemAmount,
		      	],
		    	  'quantity' => $itemQuantity,
		    ];

		    $existence = $model->articulos_checkExistence($itemID, $itemQuantity);

			if ($existence["Mensaje"] == "Invalid") 
			{
				$itemErrors[] =
				[
					"id" => $articulo["id"],
					"order" => $order,
					"name" => $articulo["nombre"],
					"diference" => $existence["Diference"]
				];
			}
			$order ++;
		}
			
		if (empty($itemErrors)) 
		{
			$itemData[] = 
			[
		      	'price_data' => 
		      	[
		        	'currency' => 'mxn',
		        	'product_data' => 
		        	[
		        	  'name' => "Envío",
		        	],
		        	'unit_amount' => 15000,
		      	],
		    	  'quantity' => 1,
		    ];

			$iva = $subtotal * .16;
			$total = $subtotal + $iva;
			$total = $total + 150;

			\Stripe\Stripe::setApiKey('sk_test_51Hci5rHPPpKZkxpSysXCUKJ6IrFr3DNdYBQF5vADBqIXpSorU2yGXPLAgudliQcBhA4t57eoDp7cpetWMzWkSVi400SG4bftf0');

			$session = \Stripe\Checkout\Session::create([
		    'payment_method_types' => ['card'],
		    'line_items' => $itemData,
		    'mode' => 'payment',
		    'success_url' => 'https://store.glassprotech.com/transaccion/exitosa',
		    'cancel_url' => 'https://store.glassprotech.com/transaccion/fallida',
			]);
			

			try 
			{
				$userInformation = $model->usuarios_getDataByID($usuario);
				
				$insOrder = $model->compras_insertar("testKey", $usuario, json_encode($articulos),  $userInformation["usuario_información"], 1, $subtotal, $iva, $total, $userInformation["usuario_factura"], "CARD", $session->payment_intent, "Incomplete", json_encode($sending), json_encode($factura));
				foreach ($articulos as $articulo) 
				{
					$itemQuantity =  (int) $articulo["articulos"];
					$itemQuantity = 0 - $itemQuantity;
					$ModInst = $model->articulos_modifExistence($articulo["id"], $itemQuantity);
				} 
			} 
			catch (Exception $e) 
			{
				var_dump($e);
			}
			$sendMail = "";
			$sendMail = $this->sendReceipt($email, $articulos, $sending, $factura);
			$return = '{"estado":"exito","id": "'.$session->id.'","mail":"'.$sendMail.'"}';
		}
		else
		{
			$return = '{"estado":"fallo","errorItems": '.json_encode($itemErrors).' }';
		} 
		return $this->response->setHeader('Access-Control-Allow-Origin', "*")
			->setHeader('Access-Control-Allow-Headers', '*')
			->setHeader('Access-Control-Allow-Methods', 'POST')
			->setHeader('Content-Type', 'application/json')
			->setBody($return)
			->setStatusCode(200);

	}

	public function compras_oxxo()
	{
		$request = \Config\Services::request();
		$model = new plataforma();

		$key = $request->getVar('key');
		$usuario = $request->getVar('usuario');
		$articulos = $request->getVar('articulos');
		$email = $request->getVar('email');
		$factura = $request->getVar('factura');
		$sending = $request->getVar('sending');

		$subtotal = 0;

		$itemErrors = [];

		$order = 0;
		foreach ($articulos as $articulo) 
		{
			$itemAmount = (float) $articulo["precio"];
			$itemQuantity =  (int) $articulo["articulos"];
			$itemID = $articulo["id"];

			$existence = $model->articulos_checkExistence($itemID, $itemQuantity);

			if ($existence["Mensaje"] == "Invalid") 
			{
				$itemErrors[] =
				[
					"id" => $articulo["id"],
					"order" => $order,
					"name" => $articulo["nombre"],
					"diference" => $existence["Diference"]
				];
			}


			$subtotal = $subtotal + ($itemAmount * $itemQuantity);
			$order += 1;
		}
		
		if (empty($itemErrors)) 
		{
			$iva = $subtotal * .16;
			$total = $subtotal + $iva;
			$total = $total + 150;

			$totalModified = $total * 100;
		    $stripe = new \Stripe\StripeClient
		    (
			  'sk_test_51Hci5rHPPpKZkxpSysXCUKJ6IrFr3DNdYBQF5vADBqIXpSorU2yGXPLAgudliQcBhA4t57eoDp7cpetWMzWkSVi400SG4bftf0'
			);

		    
			$payment_intent = $stripe->paymentIntents->create([
			  'amount' => $totalModified,
			  'currency' => 'mxn',
			  'payment_method_types' => ['oxxo'],
			  'receipt_email' => $email,
			]);

			
			$userInformation = $model->usuarios_getDataByID($usuario);
			try 
			{
				$insOrder = $model->compras_insertar("testKey", $usuario, json_encode($articulos),  $userInformation["usuario_información"], 1, $subtotal, $iva, $total, $userInformation["usuario_factura"], "OXXO", $payment_intent["id"], "Incomplete", json_encode($sending), json_encode($factura));
				foreach ($articulos as $articulo) 
				{
					$itemQuantity =  (int) $articulo["articulos"];
					$itemQuantity = 0 - $itemQuantity;
					$ModInst = $model->articulos_modifExistence($articulo["id"], $itemQuantity);
				}
				
			} 
			catch (Exception $e) 
			{
				//var_dump($e);
			}
			
			$sendMail = $this->sendReceipt($email, $articulos, $sending, $factura);
			$return = '{"estado":"exito","clientSecret": "'.$payment_intent["client_secret"].'","mail":"'.$sendMail.'"}';
		}
		else
		{
			$return = '{"estado":"fallo","errorItems": '.json_encode($itemErrors).' }';
		}
		
		return $this->response->setHeader('Access-Control-Allow-Origin', "*")
			->setHeader('Access-Control-Allow-Headers', '*')
			->setHeader('Access-Control-Allow-Methods', 'POST')
			->setHeader('Content-Type', 'application/json')
			->setBody($return)
			->setStatusCode(200);
	}

	function sendReceipt($mail, $content, $sending, $facture)
	{
		
		$data["code"] = $content;
		$data["send"] = $sending;
		$data["fact"] = $facture;
		$viewtext = view('templates/receipt', $data);

		$mensaje = $viewtext;
		
		$email = \Config\Services::email();
		$email->setFrom('webmaster_glassprotech@dsynapse.com	', 'Glass Protech');
		$email->setTo($mail);

		$email->setSubject('Recibo de compra');
		$email->setMessage($mensaje);
		
		$respuesta = "";
		if($email->send())
		{
			$respuesta = "exito";
		}
		else
		{
			$respuesta = "fallo";
		}
		return $respuesta;
	}

	public function usuarios_getEmail()
	{
		$request = \Config\Services::request();
		$model = new plataforma();
		$usuario = $request->getVar('usuario');

		$return = $model->usuarios_getDataByID($usuario);
		$return = '{"email":"'.$return["usuario_correo"].'"}';
		return $this->response->setHeader('Access-Control-Allow-Origin', "*")
			->setHeader('Access-Control-Allow-Headers', '*')
			->setHeader('Access-Control-Allow-Methods', 'POST')
			->setHeader('Content-Type', 'application/json')
			->setBody($return)
			->setStatusCode(200);

	}

	public function options(): Response{
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
        return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setStatusCode(200);
    }

    function encodeUserData($id)
	{
		$key = 'uXR6vZCjQ9';
		$token = array(
		    'id' => $id
		);
		$token = json_encode($token);
		$jwt = JWT::encode($token, $key);
		return $jwt;
	}

	function decodeforID($jwt)
	{
		$request = \Config\Services::request();
 
		$key = 'uXR6vZCjQ9';

		$data = JWT::decode($jwt, $key, array('HS256'));

		$decoded_array = (array) $data;

		$result = $decoded_array[0];
		return json_decode($result)->id;
	}

	public function decodeUserData()
	{
		$request = \Config\Services::request();
		$jwt = $request->getVar('jwt');
 
		$key = 'uXR6vZCjQ9';

		$data = JWT::decode($jwt, $key, array('HS256'));

		$decoded_array = (array) $data;

		$result = $decoded_array[0];
		//$result = $jwt;
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function compras_status_evaluate()
	{
		$request = \Config\Services::request();
		$model = new plataforma();

		$response = "";
		$arrayIncompletes = $model->compras_getIncompletes("testKey");
		for ($i=0; $i < count($arrayIncompletes) ; $i++) { 
			$plataform = $arrayIncompletes[$i]->compra_plataforma;
			$id = $arrayIncompletes[$i]->compra_referencia;

			$stripe = new \Stripe\StripeClient(
				'sk_test_51Hci5rHPPpKZkxpSysXCUKJ6IrFr3DNdYBQF5vADBqIXpSorU2yGXPLAgudliQcBhA4t57eoDp7cpetWMzWkSVi400SG4bftf0'
			);
			$response = $stripe->paymentIntents->retrieve(
				$id,
				[]
			);
			if ($response["canceled_at"] == NULL) 
			{
				if ($response["status"] == "succeeded") 
				{
					$model->compras_updateStatus($arrayIncompletes[$i]->compra_identificador,"succeeded");
				}
			}
			else
			{
				$model->compras_updateStatus($arrayIncompletes[$i]->compra_identificador,"cancelled");

				$objectArticles = json_decode($arrayIncompletes[$i]->compra_articulos);

				for ($j=0; $j < count($objectArticles); $j++) 
				{ 
					$objectItem = $objectArticles[$i];

					$numeItems = (int) $objectItem->articulos;
					
					$model->articulos_modifExistence($objectItem->id,$numeItems);
				}
			}
		}	
	}


	//admin processes
	public function admin_checkifIs()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$result = '{"status":"ok", "desc":"admin"}';
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}
		//Ventas
	public function admin_getCompras()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_getCompras();
			$result = '{"status":"ok", "inventory":'.json_encode($inventory).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_getEnvioById()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$prodID = $request->getVar('id');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_getEnvioById($prodID);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_updateEnvio()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');

		$enID = $request->getVar('id');
		$proveedor = $request->getVar('proveedor');
		$f_envio = $request->getVar('f_envio');
		$f_arribo = $request->getVar('f_arribo');
		$estatus = $request->getVar('estatus');
		$referencia = $request->getVar('seguimiento');

		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_updateEnvio($enID,$proveedor,$f_envio,$f_arribo,$estatus,$referencia);
			$mailsend = $this->admin_sendMail($enID,$proveedor,$f_envio,$f_arribo,$estatus,$referencia);
			$result = '{"status":"ok", "desc":'.json_encode($desc).', "mailsend" : "'.$mailsend.'"}';
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	function admin_sendMail($enID,$proveedor,$f_envio,$f_arribo,$estatus,$referencia)
	{
		$request = \Config\Services::request();
		$model = new admin();


		$desc = $model->admin_getEnvioById($enID);
		$jsonProcessed = json_decode($desc[0]->envio_datos);

		$data["proveedor"] = $proveedor;
		$data["f_envio"] = $f_envio;
		$data["f_arribo"] = $f_arribo;
		$data["estatus"] = $estatus;
		$data["referencia"] = $referencia;
		$viewtext = view('templates/sendUpdate', $data);

		$mensaje = $viewtext;
		
		$email = \Config\Services::email();
		$email->setFrom('webmaster_glassprotech@dsynapse.com	', 'Glass Protech');
		$email->setTo($jsonProcessed->email);

		$email->setSubject('Actualización de envio');
		$email->setMessage($mensaje);
		
		$respuesta = "";
		if($email->send())
		{
			$respuesta = "exito";
		}
		else
		{
			$respuesta = "fallo";
		}
		return $respuesta;
	}

	public function admin_getCupones()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_getCupones();
			$result = '{"status":"ok", "inventory":'.json_encode($inventory).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}
		//Inventory
	
    public function admin_getInventory()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_getInventory();
			$result = '{"status":"ok", "inventory":'.json_encode($inventory).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_deleteProductByID()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$prodID = $request->getVar('prodID');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_deleteProductByID($prodID);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_newProduct()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$prodID = $request->getVar('prodID');
		$descript = $request->getVar('descript');
		$ext = $request->getVar('ext');
		$precio = $request->getVar('precio');
		$cant = $request->getVar('cant');
		$img1 = $request->getVar('img1');
		$img2 = $request->getVar('img2');
		$img3 = $request->getVar('img3');;
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_newProduct($prodID,$descript,$ext,$precio,$cant,$img1,$img2,$img3);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_updateProduct()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$prodID = $request->getVar('prodID');
		$descript = $request->getVar('descript');
		$ext = $request->getVar('ext');
		$precio = $request->getVar('precio');
		$cant = $request->getVar('cant');
		$img1 = $request->getVar('img1');
		$img2 = $request->getVar('img2');
		$img3 = $request->getVar('img3');;
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_updateProduct($prodID,$descript,$ext,$precio,$cant,$img1,$img2,$img3);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_updateProdCant()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$prodID = $request->getVar('prodID');
		$cant = $request->getVar('cant');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_updateProdCant($prodID,$cant);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}
		//Plataforma
	public function admin_getUserData()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_getUserData();
			$result = '{"status":"ok", "inventory":'.json_encode($inventory).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_deleteUserByID()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$userID = $request->getVar('userID');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_deleteUserByID($userID);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_changePsw()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$newpass = $request->getVar('newpass');
		$userID = $request->getVar('id');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_changePsw($userID,$newpass);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_userUpdate()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$tipo = $request->getVar('tipo');
		$userID = $request->getVar('id');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$desc = $model->admin_userUpdate($userID,$tipo);
			$result = '{"status":"ok", "desc":'.json_encode($desc).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_usr_register()
	{
		$request = \Config\Services::request();
		$admin = new admin();
		$model = new plataforma();

		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);
		
		$tipo = $request->getVar('tipo');
		$mail = $request->getVar('mail');
		$contra = $request->getVar('contra');
		$nombre = $request->getVar('nombre');

		$result = "";

        $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}

		$user_type = $admin->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$result = $model->usuarios_checarCorreo($mail);
			if ($result == "Correo No Existe") 
			{
				$result = $admin->admin_newUser($mail, $contra, $nombre, $tipo);
				$result = '{"status":"ok", "desc": "'.$result[0].'"}';
			}
			else
			{
				$result='Correo ya usado';
				$result = '{"status":"used", "desc":"'.$result.'"}';
			}		
		
			
			//var_dump($inventory);
		}

		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_getPlataforma()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_getPlataforma();
			$result = '{"status":"ok", "inventory":'.json_encode($inventory).'}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function admin_updateProductSlider()
	{
		$request = \Config\Services::request();
		$model = new admin();
		$cookie = $request->getVar('cookie');
		$products = $request->getVar('products');

		$id = $this->decodeforID($cookie);

		$user_type = $model->admin_CheckByID($id);

		if ($user_type['usuario_tipo'] == "1") 
		{
			$result = '{"status":"error","desc":"no admin"}';
		}
		else if($user_type['usuario_tipo'] == "2")
		{
			$inventory = $model->admin_updateProductSlider($products);
			$result = '{"status":"ok", "inventory":"exito"}';
			//var_dump($inventory);
		}
		
	    $http_origin = $_SERVER['HTTP_HOST'];
		$origin = "";
		if ($http_origin == "store.glassprotech.com" || $http_origin == "glassprotech.com")
		{  
		    $origin = $http_origin;
		}
		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}
	//admin processes
}
