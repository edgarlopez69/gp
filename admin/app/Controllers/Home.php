<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (isset($_GET["c"])) 
		{
			$data["js"] = "set-login";
			$data["css"] = "set-login";
			$data["ckie"] = $_GET["c"];
			echo view('template/head', $data);
			echo view('template/set-login', $data);
			echo view('template/foot', $data);
		}
		else
		{

			if ($this->isloged()) 
			{
				$data["js"] = "";
				$data["css"] = "";
				echo view('template/head', $data);
				echo view('template/navigation');
				echo view('pages/main');
				echo view('template/foot', $data);
			}
			else
			{
				$data["js"] = "login";
				$data["css"] = "login";
				echo view('template/head', $data);
				echo view('pages/login');
				echo view('template/foot', $data);
			}
		}
	}

	public function ventas($page = "")
	{
		if ($this->isloged()) 
		{
			$data["js"] = "";
			$data["css"] = "ventas/main";
			echo view('template/head', $data);
			echo view('template/navigation');
			if ($page == "ventas") 
			{
				$data["js"] = "ventas/ventas";
				echo view('pages/ventas/ventas');
			}
			/*else if ($page == "cupones") 
			{
				$data["js"] = "ventas/cupones";
				echo view('pages/ventas/cupones');
			}*/
			else
			{
				echo view('pages/main');
			}
			echo view('template/foot', $data);
		}
		else
		{
			echo view('template/cerrar');
		}
	}

	public function inventario($page = "")
	{
		if ($this->isloged()) 
		{
			$data["js"] = "";
			$data["css"] = "inventario/main";
			echo view('template/head', $data);
			echo view('template/navigation');
			if ($page == "productos") 
			{
				$data["js"] = "inventario/productos";
				echo view('pages/inventario/productos');
			}
			else if ($page == "categorias") 
			{
				$data["js"] = "inventario/categorias";
				echo view('pages/inventario/categorias');
			}
			else if ($page == "carrusel") 
			{
				$data["js"] = "inventario/carrusel";
				echo view('pages/inventario/carrusel');
			}
			else
			{
				echo view('pages/main');
			}
			echo view('template/foot', $data);
		}
		else
		{
			echo view('template/cerrar');
		}
	}

	public function plataforma($page = "")
	{
		if ($this->isloged()) 
		{
			$data["js"] = "";
			$data["css"] = "plataforma/main";
			echo view('template/head', $data);
			echo view('template/navigation');
			if ($page == "usuarios") 
			{
				$data["js"] = "plataforma/usuarios";
				echo view('pages/plataforma/usuarios');
			}
			else if ($page == "popup") 
			{
				$data["js"] = "plataforma/popup";
				echo view('pages/plataforma/popup');
			}
			else if ($page == "carrusel") 
			{
				$data["js"] = "plataforma/carrusel";
				echo view('pages/plataforma/carrusel');
			}
			else
			{
				echo view('pages/main');
			}
			echo view('template/foot', $data);
		}
		else
		{
			echo view('template/cerrar');
		}
	}

	public function template($page = "")
	{
		echo view('template/head');
		echo view('template/navigation');
		echo view('template/template');
		echo view('template/foot');
	}

	public function cerrar()
	{
		echo view('template/cerrar');
	}

	public function test()
	{
		$cookie = $this->getCookie("glassprotechUserData");
	}

	//--------------------------------------------------------------------

	function isloged()
	{
		$loged = false;
		if(isset($_COOKIE['glassprotechUserData']))
		{
			$loged = true;
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
