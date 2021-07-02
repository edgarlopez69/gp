document.getElementById("sesion-button").style.display = "block";
document.getElementById("perfil-button").style.display = "none";
isloged();
function isloged()
{
  var cookie = getCookie("GlassProtechUserData");
    if(cookie != "")
    {
      var parametros = {
                          "jwt": cookie
                       };
                      $.ajax({
                        data: parametros, //datos que se envian a traves de ajax 
                        url: api_dev + 'home/decodeUserData', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        
                                },
                                success: function (response) 
                                { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  var id = JSON.stringify(response);
                                  id = JSON.parse(id);
                                        processLoged(id["id"]);
                                        isAdmin();
                                             
                                }
                                
                        });
    }
    else
    {
        
    }
    
}

function processLoged(id)
{
  var parametros = {
                          "id": id
                       };
                      $.ajax({
                        data: parametros, //datos que se envian a traves de ajax 
                        url: api_dev + 'home/getNameById', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        
                                },
                                success: function (response) 
                                { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  var responsedata = response;
                                  var res = responsedata.split(" ");
                                  if (response =! "") 
                                  {
                                    var str = res[0];
                                    document.getElementById("sesion_text_span").innerHTML = str.toUpperCase();
                                  }
                                  
                                }
                                
                        });
  document.getElementById("sesion-button").style.display = "none";
  document.getElementById("perfil-button").style.display = "block";
}

function isAdmin()
{
      var parametros = {
        "cookie" : getCookie("GlassProtechUserData")

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_checkifIs', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () 
            {

            },
            success:  function (response) 
            { //una vez que el archivo recibe el request lo procesa y lo devuelve

                if (response.status == "error") 
                {
                }
                else if (response.status == "ok") 
                {
                  var linkContent  = "";
                  document.getElementById("admin-link").style.display  = "";
                  document.getElementById("admin-link").href  = "https://admin.glassprotech.com.mx?c="+getCookie("GlassProtechUserData");
                }

            }
    });
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


// Burguer Menu Toggle
function burguerToggleMenu () {
  let menuOff = document.querySelector('.burguer-menu-off')
  let menuAct = document.querySelector('.burguer-menu-active')

  if (menuOff) {
    menuOff.classList.remove("burguer-menu-off")
    menuOff.classList.add("burguer-menu-active")

    return 1
  }
  
  if (menuAct) {
    menuAct.classList.remove("burguer-menu-active")
    menuAct.classList.add("burguer-menu-off")
  
    return 1
  }
}

// Validación Inicio sesión para Menú Burguer
document.getElementById("sesion-button").style.display = "block";
document.getElementById("perfil-button").style.display = "none";
isloged();

function isloged()
{
  var cookie = getCookie("GlassProtechUserData");
    if(cookie != "")
    {
      var parametros = {
                          "jwt": cookie
                       };
                      $.ajax({
                        data: parametros, //datos que se envian a traves de ajax 
                        url: api_dev + 'home/decodeUserData', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        
                                },
                                success: function (response) 
                                { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  var id = JSON.stringify(response);
                                  id = JSON.parse(id);
                                        processLoged(id["id"]);
                                        isAdmin();
                                             
                                }
                                
                        });
    }
    else
    {
        
    }
    
}

function processLoged(id)
{
  var parametros = {
                          "id": id
                       };
                      $.ajax({
                        data: parametros, //datos que se envian a traves de ajax 
                        url: api_dev + 'home/getNameById', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        
                                },
                                success: function (response) 
                                { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  var responsedata = response;
                                  var res = responsedata.split(" ");
                                  if (response =! "") 
                                  {
                                    var str = res[0];
                                    document.getElementById("sesion_text_span2").innerHTML = str.toUpperCase();
                                  }
                                  
                                }
                                
                        });
  document.getElementById("sesion-button").style.display = "none";
  document.getElementById("perfil-button").style.display = "block";
}

function isAdmin()
{
      var parametros = {
        "cookie" : getCookie("GlassProtechUserData")

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_checkifIs', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () 
            {

            },
            success:  function (response) 
            { //una vez que el archivo recibe el request lo procesa y lo devuelve

                if (response.status == "error") 
                {
                }
                else if (response.status == "ok") 
                {
                  var linkContent  = "";
                  document.getElementById("admin-link2").style.display  = "";
                  document.getElementById("admin-link2").href  = "https://admin.glassprotech.com.mx?c="+getCookie("GlassProtechUserData");
                }

            }
    });
}