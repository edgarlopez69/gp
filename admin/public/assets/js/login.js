$(document).ready(function () {
        checksession();
        invitado();
        login();
});

function invitado() {
        $('#invitado').click(function () {
                location.replace('/');
        });
}

function login() {
        $('#login').click(function () {
                var mail = $('#correo').val();
                var contra = $('#contraseña').val();
                if (validate(mail, contra) === 0) {
                        $('#invalid_correo').hide();
                        $('#invalid_contra').hide();
                        var parametros = {
                                "key": api_key,
                                "mail": mail,
                                "contra": contra
                        };
                        $.ajax({
                                data: parametros, //datos que se envian a traves de ajax 
                                url: api_dev + 'home/usr_login', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        Swal.fire({
                                                title: 'Procesando información',
                                                html: 'Un momento porfavor, estamos procesando su información',
                                                onBeforeOpen: () => {
                                                        Swal.showLoading();
                                                }
                                        });
                                },
                                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                        var backup = response;
                                        var response = response.slice(0, -265);
                                        if(response!=='Invalid key'){
                                                response = backup;
                                                if (response[0] === "Login exitoso") {
                                                        Swal.close();

                                                        var today = new Date();
                                                        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                                                        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                                        var dateTime = date + ' ' + time;
                                                        
                                                        if (response[2] == "1") 
                                                        {
                                                                Swal.fire({
                                                                        icon: 'error',
                                                                        title: 'Login fallido',
                                                                        text: 'Usuario invalido',
                                                                        showCloseButton: true,
                                                                        confirmButtonText: 'Ok'
                                                                });
                                                        }
                                                        else
                                                        {
                                                                document.cookie = "glassprotechUserData=" + response[1] + ";expires=" + dateTime + "; path=/";
                                                                Swal.fire({
                                                                        icon: 'success',
                                                                        title: 'Login exitoso',
                                                                        text: 'Bienvenido, administrador',
                                                                        showCloseButton: true,
                                                                        confirmButtonText: 'Continuar',
                                                                        onClose: () => {
                                                                                location.replace(app_root+"/");
                                                                        }
                                                                });
                                                        }
                                                        
                                                } else {
                                                        Swal.close();
                                                        Swal.fire({
                                                                icon: 'error',
                                                                title: 'Login fallido',
                                                                text: 'No se pudo inicar sesión porfavor confirme sus datos',
                                                                showCloseButton: true,
                                                                confirmButtonText: 'Ok'
                                                        });
                                                }
                                        }
                                }
                        });
                } else if (validate(mail, contra) === 1) {
                        $('#invalid_correo').show();
                } else if (validate(mail, contra) === 10) {
                        $('#invalid_contra').show();
                } else if (validate(mail, contra) === 11) {
                        $('#invalid_correo').show();
                        $('#invalid_contra').show();
                }
        });
}

function validate(mail, contra) {
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var result = 0;
        if (!(re.test(mail))) {
                result += 1;
        }
        if (!(contra)) {
                result += 10;
        }
        return result;
}

function checksession(){
        var cookie = getCookie("glassprotechUserData");
        if(cookie !== ''){
                location.replace('/');
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