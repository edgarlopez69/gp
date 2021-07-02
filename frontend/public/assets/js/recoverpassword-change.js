$(document).ready(function () {
    checksession();
});

decode();
var tkn_id = "";
var code = "";

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
                console.log(response);
                tkn_id = response["tkn_id"];
                code = response["code"];
                
            }
    });
}

function sendRecoveryCode()
{
    var newPass = document.getElementById('psw').value;
    var newPass2 = document.getElementById('psw2').value;
    if (newPass == "" || newPass2 == "" || code == "" || tkn_id == "") 
    {
        Swal.fire({
                title: 'Error!',
                text: 'Alguno de los campos está vacio.',
                icon: 'error',
                confirmButtonText: 'Ok'
                });
    }
     else if (newPass != newPass2) 
    {
        Swal.fire({
                title: 'Error!',
                text: 'Las contraseñas no coinciden.',
                icon: 'error',
                confirmButtonText: 'Ok'
                });
    }
    else
    {
        var parametros = {
        "code" : code,
        "newPass" : newPass,
        "tkn_id" : tkn_id
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax 
                url:   api_dev + 'home/token_getDataForPassRecovery', //archivo que recibe la peticion
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
                        if (response != "Codigo Expirado" || response != "Codigo Expirado") 
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login exitoso',
                                text: 'Exito al cambiar la contraseña.',
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                            onClose: () => {
                                location.replace(app_root+"/");
                            }
                            }, function (isConfirm) {
                                location.replace(app_root+"/");
                            });
                        }
                        else
                        {
                            Swal.fire({
                                title: 'Error!',
                                text: 'El código no es valido. Vuela a pedir un código.',
                                icon: 'error',                  
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                            onClose: () => {
                                location.replace(app_root+"/");
                            }
                            }, function (isConfirm) {
                                location.replace(app_root+"/");
                            });
                        }
                        
                }
        });
        
    }
    
}