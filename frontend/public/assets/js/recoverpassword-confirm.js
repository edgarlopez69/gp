$(document).ready(function () {
    checksession();
    
    //checkToken();
});

decode();

function checksession(){
        var cookie = getCookie("GlassProtechUserData");
        if(cookie !== ''){
                location.replace(app_root+'/');
        }
}

function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
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

function decode()
{
    var jwt = document.getElementById('code').value;
    var parametros = {
        "jwt" : jwt
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/decodeUserData', //archivo que recibe la peticion
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
                Swal.close();
                checkToken(response["tkn_id"], response["code"]);
                
            }
    });
}

function checkToken(tkn_id, code)
{
    var parametros = {
        "tkn_id" : tkn_id,
        "code" : code
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/token_checkToken', //archivo que recibe la peticion
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
                Swal.close();
                if (!response.includes("Codigo Valido")) 
                {
                    Swal.fire({
                    title: 'Error!',
                    text: "Codigo invalido",
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    onClose: () => {
                            location.replace(app_root+"/");
                        }
                    });
                }
                else
                {
                    var jwt = document.getElementById('code').value;
                    Swal.fire({
                        icon: 'success',
                        title: 'Codigo validado',
                        text: 'A continuación cambiará la contraseña',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.replace(app_root+"/recover-password/change?c="+jwt);
                        }
                    }, function (isConfirm) {
                        location.replace(app_root+"/recover-password/change?c="+jwt);
                    });
                }
                
                
            }
    });
}

