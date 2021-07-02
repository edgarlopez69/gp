getUserId();



function changePsw()
{
	var userid = document.getElementById('usr_id').value;
  var oldcontra = document.getElementById('oldpsw').value;
	var contra = document.getElementById('psw').value;
	var contra2 = document.getElementById('psw2').value;
	if (contra == contra2) 
	{
		if (userid != "" && contra != "") 
		{
			var parametros = {
          "key" : api_key,
          "id" : userid,
	        "oldcontra" : oldcontra,
	        "newcontra" : contra
		    };
		   
		    $.ajax({
		            data:  parametros, //datos que se envian a traves de ajax 
		            url:   api_dev + 'home/usr_changeContra', //archivo que recibe la peticion
		            type:  'post', //método de envio
		            beforeSend: function () {
		                    Swal.fire({
		                                title: 'Procesando información',
		                                html: 'Un momento porfavor, estamos procesando su información',
		                                onBeforeOpen: () => {
		                                    Swal.showLoading();
		                            	}
		                        	});
		            },
		            success:  function (response) 
                { //una vez que el archivo recibe el request lo procesa y lo devuelve
                  if (response.result == "Contraseña Actualizada") 
                  {
                     Swal.fire({
                            icon: 'success',
                            title: 'Contraseña actualizada',
                            text: 'Proceso exitoso',
                            showCloseButton: true,
                            confirmButtonText: 'Ok',
                        onClose: () => {
                            document.getElementById('oldpsw').value = "";
                            document.getElementById('psw').value = "";
                            document.getElementById('psw2').value = "";
                        }
                        }, function (isConfirm) {
                            document.getElementById('oldpsw').value = "";
                            document.getElementById('psw').value = "";
                            document.getElementById('psw2').value = "";
                        });  
                  }
                  else
                  {
                    Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.result,
                            showCloseButton: true,
                            confirmButtonText: 'Ok'
                    });
                  }     
		            }
		    });
		    
		}
		else
		{
			Swal.close();
	        Swal.fire({
	                icon: 'error',
	                title: 'Error',
	                text: 'Los campos están vacios',
	                showCloseButton: true,
	                confirmButtonText: 'Ok'
	        });
		}
	}
	else
	{
		Swal.close();
        Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Las contraseñas no coinciden.',
                showCloseButton: true,
                confirmButtonText: 'Ok'
        });
	}
	
}

function getUserId()
{
	var cookie = getCookie("GlassProtechUserData");
	if(cookie != "")
    {
    	
    	var parametros = {
        "jwt" : cookie
	    };
	    $.ajax({
	            data:  parametros, //datos que se envian a traves de ajax 
	            url:   api_dev + 'home/decodeUserData', //archivo que recibe la peticion
	            type:  'post', //método de envio
	            beforeSend: function () {
	            },
	            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	                   document.getElementById("usr_id").value = response["id"];
	                   setSendingInfo(response);
                     setFacturingInfo(response);
	                   
	            }
	    });
    }
    else
    {

    }
}

function getCookie(cname) 
{
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setSendingInfo(user_identification)
{
	var parametros = 
	{
        "id" : user_identification["id"],
	};
	$.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/informacion_obtener', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            		

                   document.getElementById('nombre').value = ""+response[0];
                   document.getElementById('calle').value = ""+response[1];
                   document.getElementById('ne').value = ""+response[2];
                   document.getElementById('ni').value = ""+response[3];
                   document.getElementById('colonia').innerHTML = `<option selected value="${response[4]}">${response[4]}</option>`;
                   document.getElementById('cp').value = ""+response[5];
                   document.getElementById('municipio').value = ""+response[6];
                   document.getElementById('estado').value = ""+response[7];
                   document.getElementById('pais').value = ""+response[8];
                   document.getElementById('telefono').value = ""+response[9];
            }
    });
}

function updateSending()
{
	var info_id = document.getElementById('usr_id').value;
	var nombre = document.getElementById('nombre').value;
  var telefono = document.getElementById('telefono').value;
	var calle = document.getElementById('calle').value;
	var ne = document.getElementById('ne').value;
	var ni = document.getElementById('ni').value;
	var colonia = document.getElementById('colonia').value;
	var cp = document.getElementById('cp').value;
	var municipio = document.getElementById('municipio').value;
	var estado = document.getElementById('estado').value;
	var pais = document.getElementById('pais').value;

	var parametros = 
	{
        "info_id" : info_id,
        "nombre" : nombre,
        "telefono" : telefono,
        "calle" : calle,
        "ne" : ne,
        "ni" : ni,
        "colonia" : colonia,
        "cp" : cp,
        "municipio" : municipio,
        "estado" : estado,
        "pais" : pais,
	};
	$.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/informacion_modificar', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {
            	Swal.fire({
                            title: 'Procesando información',
                            html: 'Un momento porfavor, estamos procesando su información',
                            onBeforeOpen: () => {
                            Swal.showLoading();
                       	}
                   	});
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                   Swal.fire({
                            icon: 'success',
                            title: 'Datos actualizados',
                            text: 'Proceso exitoso',
                            showCloseButton: true,
                            confirmButtonText: 'Ok',
                        onClose: () => {
                            //location.replace(app_root+"/");
                        }
                        }, function (isConfirm) {
                            //location.replace(app_root+"/");
                        });
                   
            }
    });
}

function setFacturingInfo(user_identification)
{
  var parametros = 
  {
        "id" : user_identification["id"],
  };
  $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/factura_obtener', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                  
                  
                  var obj = JSON.parse(response["factura_información"]);
                  
                  document.getElementById('nombre-fact').value = ""+response.factura_nombre;
                  document.getElementById('rfc-fact').value = ""+response.factura_rfc;
                  document.getElementById('rs-fact').value = ""+response.factura_razon_social;

                  if (obj["email"] != undefined) 
                  {
                    
                     
                      document.getElementById('email-fact').value = ""+obj["email"];
                     document.getElementById('calle-fact').value = ""+obj["calle"];
                     document.getElementById('ne-fact').value = ""+obj["ne"];
                     document.getElementById('ni-fact').value = ""+obj["ni"];
                     document.getElementById('colonia-fact').innerHTML = `<option selected value="${obj["colonia"]}">${obj["colonia"]}</option>`;
                     document.getElementById('cp-fact').value = ""+obj["cp"];
                     document.getElementById('municipio-fact').value = ""+obj["municipio"];
                     document.getElementById('estado-fact').value = ""+obj["estado"];
                     document.getElementById('pais-fact').value = ""+obj["pais"];
                  }
                   
            }
    });
}

function updateFacturing()
{
  var id = document.getElementById('usr_id').value;
  var nombre = document.getElementById('nombre').value;
  var email = document.getElementById('email-fact').value;
  var rfc = document.getElementById('rfc-fact').value;
  var rs = document.getElementById('rs-fact').value;

  var calle = document.getElementById('calle-fact').value;
  var ne = document.getElementById('ne-fact').value;
  var ni = document.getElementById('ni-fact').value;
  var colonia = document.getElementById('colonia-fact').value;
  var cp = document.getElementById('cp-fact').value;
  var municipio = document.getElementById('municipio-fact').value;
  var estado = document.getElementById('estado-fact').value;
  var pais = document.getElementById('pais-fact').value;

   var info = 
  {
        "email" : email,
        "calle" : calle,
        "ne" : ne,
        "ni" : ni,
        "colonia" : colonia,
        "cp" : cp,
        "municipio" : municipio,
        "estado" : estado,
        "pais" : pais
  };

  var parametros = 
  {
        "id" : id,
        "nombre" : nombre,
        "rfc" : rfc,
        "rs" : rs,
        "info" : JSON.stringify(info)
  };
  $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/factura_modificar', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {
              Swal.fire({
                            title: 'Procesando información',
                            html: 'Un momento porfavor, estamos procesando su información',
                            onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                   Swal.fire({
                            icon: 'success',
                            title: 'Datos actualizados',
                            text: 'Proceso exitoso',
                            showCloseButton: true,
                            confirmButtonText: 'Ok',
                        onClose: () => {
                            //location.replace(app_root+"/");
                        }
                        }, function (isConfirm) {
                            //location.replace(app_root+"/");
                        });
                   
            }
    });
}


function validarCPenvio(fact) {
  var endpoint_sepomex  = "https://api-sepomex.hckdrk.mx/query/";
  var method_sepomex = 'info_cp/';
  var cp = document.getElementById('cp').value;
  var variable_string = '?type=simplified';
  var url = endpoint_sepomex + method_sepomex + cp + variable_string;

  $.get(url, { userId : 1234 }, function(resp) {
    if(fact === "-fact"){
      var pais = document.getElementById('pais-fact');
      var estado = document.getElementById('estado-fact');
      var municipio = document.getElementById('municipio-fact');
      var colonia = document.getElementById('colonia-fact');
    } else {
      var pais = document.getElementById('pais');
      var estado = document.getElementById('estado');
      var municipio = document.getElementById('municipio');
      var colonia = document.getElementById('colonia');
    }
    

    pais.value = resp.response.pais;
    estado.value = resp.response.estado;
    municipio.value = resp.response.municipio;

    pais.disabled = true;
    estado.disabled = true;
    municipio.disabled = true;

    var newOptionsColonia = "<option selected>Colonia</option>";
    for (const i in resp.response.asentamiento) {
      newOptionsColonia = newOptionsColonia + `<option value="${resp.response.asentamiento[i]}">${resp.response.asentamiento[i]}</option>`;
    }
    colonia.innerHTML =newOptionsColonia;
  }); 

}