isloged();
function isloged()
{
  var cookie = getCookie("glassprotechUserData");
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
                                    document.getElementById("nav-brand").innerHTML = str.toUpperCase();
                                  }
                                  
                                }
                                
                        });
  document.getElementById("cerrar-li").style.display = "block";
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