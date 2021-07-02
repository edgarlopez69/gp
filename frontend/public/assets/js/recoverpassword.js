$(document).ready(function () {
    checksession();
});

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

function createRecovery()
{
    var mail = document.getElementById('email').value;
    var parametros = {
        "mail" : mail
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/token_generatePswChange', //archivo que recibe la peticion
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
                var respuesta = response.respuesta;
                if (respuesta == "Correo No Existe") 
                {
                    Swal.fire({
                    title: 'Error!',
                    text: 'Este usuario no existe',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    });
                }
                else if (respuesta == "Email no valido") 
                {
                    Swal.fire({
                    title: 'Error!',
                    text: 'Este email no es valido',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    });
                }
                else if (respuesta == "Email no enviado") 
                {
                    Swal.fire({
                    title: 'Error!',
                    text: 'Este email no se ha podido enviar',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    });
                }
                else
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Codigo de recuperación enviado.',
                        text: 'Revise su correo para continuar el proceso.',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.replace(app_root+"/");
                        }
                    });
                }
                
            }
    });
}