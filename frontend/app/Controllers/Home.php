<?php namespace App\Controllers;

class Home extends BaseController
{
	// Pagina principal
	public function index(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = 'home';

		// Carga javascript para la pagina
		$data['js'] = 'home';

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/home', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de contacto
	public function contacto(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "contacto";

		// Carga javascript para la pagina
		$data['js'] = "contacto";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/contacto', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de peliculas
	public function peliculas(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "productos";

		// Carga javascript para la pagina
		$data['js'] = "productos";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/peliculas', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de herramientas
	public function herramientas(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "productos";

		// Carga javascript para la pagina
		$data['js'] = "productos";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/herramientas', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de productos
	public function productos($prodID = ""){
		
		// Relative Uri Helper
		$data['rel_uri'] = base_url();
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				//$data['rel_uri'] .= '../';
			}
		}

		
		if ($prodID == "") 
		{
			// Carga estilos para la pagina
			$data['css'] = "productos";

			// Carga javascript para la pagina
			$data['js'] = "productos";

			// Carga de vistas de la función
			echo view('templates/header', $data);
			echo view('templates/navigation', $data);
			echo view('pages/productos', $data);
			echo view('templates/footer', $data);
		}
		else
		{
			// Carga estilos para la pagina
			$data['css'] = "producto";

			// Carga javascript para la pagina
			$data['js'] = "producto";

			// Carga de vistas de la función
			echo view('templates/header', $data);
			echo view('templates/navigation', $data);
			$data['prodID'] = $prodID;
			echo view('pages/producto', $data);
			echo view('templates/footer', $data);
		}
		
	}

	// Pagina de promociones
	public function promociones(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "productos";

		// Carga javascript para la pagina
		$data['js'] = "promociones";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/promociones', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de servicio
	public function servicio(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "servicio";

		// Carga javascript para la pagina
		$data['js'] = "servicio";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/servicio', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de distribuidores
	public function distribuidores(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "distribuidores";

		// Carga javascript para la pagina
		$data['js'] = "distribuidores";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/distribuidores', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de carrito
	public function carrito(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = "carrito";

		// Carga javascript para la pagina
		$data['js'] = "carrito";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/carrito', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de login
	public function login(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = 'login';

		// Carga javascript para la pagina
		$data['js'] = 'login';

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/login', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de Soporte
	public function soporte(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la página
		$data['css'] = "soporte";

		// Carga javascript para la página
		$data['js'] = "soporte";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/soporte', $data);
		echo view('templates/footer', $data);
	}

	// ! Pagina de Aprende más 
	public function aprende(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la página
		$data['css'] = "aprende-mas";

		// Carga javascript para la página
		$data['js'] = "aprende-mas";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/aprende-mas', $data);
		echo view('templates/footer', $data);
	}

	// ! Pagina de Quiénes somos
	public function nosotros(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la página
		$data['css'] = "quienes_somos";

		// Carga javascript para la página
		$data['js'] = "quienes_somos";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/quienes_somos', $data);
		echo view('templates/footer', $data);
	}

	// ! Pagina de Productos-marcas
	public function productos_marcas(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la página
		$data['css'] = "productos_marcas";

		// Carga javascript para la página
		$data['js'] = "productos_marcas";

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/productos_marcas', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de registro
	public function register(){
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = 'register';

		// Carga javascript para la pagina
		$data['js'] = 'register';

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		echo view('pages/register', $data);
		echo view('templates/footer', $data);
	}

	// Pagina de recuperación de contraseña
	public function recoverpassword($id = "")
	{
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = ['main','recoverpassword'];

		// Carga javascript para la pagina
		$data['js'] = ['main','recoverpassword'];

		// Carga de vistas de la función
		echo view('templates/header', $data);
		if ($id == "confirm") {
			$request = \Config\Services::request();
			$c = $request->getVar('c');
			$data['c'] = $c;
			$data['js'] = ['main','recoverpassword-confirm'];
			echo view('pages/recoverpassword-confirm', $data);
		}
		else if ($id == "change") {
			$request = \Config\Services::request();
			$c = $request->getVar('c');
			$data['c'] = $c;
			$data['js'] = ['main','recoverpassword-change'];
			echo view('pages/recoverpassword-change', $data);
		}
		else
		{
			echo view('pages/recoverpassword', $data);
		}
		
		echo view('templates/footer', $data);
	}

	// Pagina para cambiar datos de usuario
	public function userdata(){
		if ($this->isLoged()) 
		{
			// Relative Uri Helper
			$data['rel_uri'] = '';
			if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
				for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
					$data['rel_uri'] .= '../';
				}
			}

			// Carga estilos para la pagina
			$data['css'] = 'userdata';

			// Carga javascript para la pagina
			$data['js'] = 'userdata';

			// Carga de vistas de la función
			echo view('templates/header', $data);
			echo view('templates/navigation', $data);
			echo view('pages/userdata', $data);
			echo view('templates/footer', $data);
		}
		else
		{
			echo view('templates/cerrar');
		}
		
	}

	public function transaccion($exito ="")
	{
		
		// Relative Uri Helper
		$data['rel_uri'] = '';
		if((substr_count($_SERVER['REQUEST_URI'],'/'))>1){
			for ($i=1; $i < substr_count($_SERVER['REQUEST_URI'],'/'); $i++) { 
				$data['rel_uri'] .= '../';
			}
		}

		// Carga estilos para la pagina
		$data['css'] = 'transaccion';

		// Carga javascript para la pagina
		$data['js'] = 'transaccion';

		// Carga de vistas de la función
		echo view('templates/header', $data);
		echo view('templates/navigation', $data);
		if ($exito == "exitosa") 
		{
			echo view('pages/transaccionexitosa', $data);
		}
		else if($exito == "fallida")
		{
			echo view('pages/transaccionfallida', $data);
		}
		echo view('templates/footer', $data);
	}

	public function cerrar()
	{
		echo view('templates/cerrar');
	}

	public function changePopup()
	{
		$target_file = "assets/img/popup/popup.png";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$result = "";

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
		    $result = "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    $result = "File is not an image.";
		    $uploadOk = 0;
		  }

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
		  $result = "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  $result = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    $result = "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ha sido subido.";
		    $result = '{"status":"ok", "result": "'.$result.'"}';
		  } else {
		    $result = "Hubo un error al subir el archivo.";
		    $result = '{"status":"error", "result": "'.$result.'" }';
		  }
		}

		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function changeSliders()
	{
		$slider_no = $_GET["s"];
		$target_file = "assets/img/sliders/slider_".$slider_no.".png";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$result = "";

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
		    $result = "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    $result = "File is not an image.";
		    $uploadOk = 0;
		  }

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
		  $result = "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  $result = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    $result = "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ha sido subido.";
		    $result = '{"status":"ok", "result": "'.$result.'"}';
		  } else {
		    $result = "Hubo un error al subir el archivo.";
		    $result = '{"status":"error", "result": "'.$result.'" }';
		  }
		}

		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	public function changeProduct()
	{
		$file_name = basename($_FILES["fileToUpload"]["name"]);
		$target_file = "assets/img/productos/".$file_name;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$result = "";
		
		$fileExistence = true;
		while ($fileExistence) 
		{
			// Check if file already exists
			if (file_exists($target_file)) 
			{
				$file_name = "extra_".$file_name;
				$target_file = "assets/img/productos/".$file_name;
			}
			else
			{
				$fileExistence = false;
			}
		}
		

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
		    $result = "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    $result = "File is not an image.";
		    $uploadOk = 0;
		  }



		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
		  $result = "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		
		if ($uploadOk == 0) {
		  $result = "Sorry, your file was not uploaded.";

		    $result = '{"status":"error", "result": "'.$result.'", "file":"" }';
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    $result = "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ha sido subido.";
		    $result = '{"status":"ok", "result": "'.$result.'", "file":"'.$file_name.'"}';
		  } else {
		    $result = "Hubo un error al subir el archivo.";
		    $result = '{"status":"error", "result": "'.$result.'", "file":"" }';
		  }
		}
		

		return $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'POST')
            ->setHeader('Content-Type', 'application/json')
            ->setBody($result)
            ->setStatusCode(200);
	}

	function isLoged()
	{
		$loged = false;
		if(isset($_COOKIE['GlassProtechUserData']))
		{
			$loged =true;
		}
		return $loged;
	}

	function getCookie($cookie)
	{
		$ck = "";
		if(isset($_COOKIE[$cookie]))
		{
			$ck = $_COOKIE[$cookie];
		}

		return $ck;
	}
}
