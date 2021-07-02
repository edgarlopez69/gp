$(document).ready(function (){
    checksession();
    register();
});

function register(){
    $('#register').click(function (){    
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var contraseña = $('#contraseña').val();
        var confirmar = $('#confirmar').val();

        switch (validate(nombre,correo,contraseña,confirmar)) {
            case 0:
                TeRegistro(nombre,correo,contraseña,confirmar);
                break;
            case 1:
                shw('nombre');
                break;
            case 10:
                shw('correo');
                break;
            case 11:
                shw('nombre');
                shw('correo');
                break;
            case 100:
                shw('contra');
                break;
            case 101:
                shw('nombre');
                shw('contra');
                break;
            case 110:
                shw('correo');
                shw('contra');
                break;
            case 111:
                shw('nombre');
                shw('correo');
                shw('contra');
                break;
            case 1000:
                shw('confi');
                break;
            case 1001:
                shw('nombre');
                shw('confi');
                break;
            case 1010:
                shw('correo');
                shw('confi');
                break;
            case 1011:
                shw('nombre');
                shw('correo');
                shw('confi');
                break;
            case 1100:
                shw('contra');
                shw('confi');
                break;
            case 1101:
                shw('nombre');
                shw('contra');
                shw('confi');
                break;
            case 1110:
                shw('correo');
                shw('contra');
                shw('confi');
                break;
            case 1111:
                shw('nombre');
                shw('correo');
                shw('contra');
                shw('confi');
                break;
        }
    });
}

function validate(nombre,correo,contraseña,confirmar){
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var result = 0;
    hid('nombre');
    hid('correo');
    hid('contra');
    hid('confi');
    if (!(nombre)) {
        result += 1;
    }
    if (!(re.test(correo))) {
        result += 10;
    }
    if (!(contraseña)) {
        result += 100;
    }
    if (!(contraseña===confirmar)) {
        result += 1000;
    }
    return result;
}

function shw(object){
    $('#invalid_'+object).show();
}

function hid(object){
    $('#invalid_'+object).hide();
}

function TeRegistro(nombre,correo,contraseña,confirmar){
    $.ajax({
        type:"POST",
        url:api_dev+"home/usr_register",
        data:{
            key:api_key,
            mail:correo,
            contra:contraseña,
            nombre:nombre,
            phone:$("#phone").val()
        },
        dataType:"text",
        beforeSend: function () {
            Swal.fire({
                    title: 'Procesando información',
                    html: 'Un momento porfavor, estamos procesando su información',
                    onBeforeOpen: () => {
                            Swal.showLoading();
                    }
            });
        },
        success:function(data){
            var backup = data;
            var data = data.slice(0, -265);
            if(data!=='Invalid key'){
                console.log(backup);
                if (backup !="Correo invalido") 
                {
                    data = JSON.parse(backup);
                    if (data[0] === "Usuario insertado") {
                        Swal.close();
                        var today = new Date();
                        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                        var dateTime = date + ' ' + time;
                        document.cookie = "GlassProtechUserData=" + data[1] + ";expires=" + dateTime + "; path=/";
                        Swal.fire({
                                icon: 'success',
                                title: 'Registro exitoso',
                                text: 'Bienvenido, puede continuar navegando en la app',
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                                onClose: () => {
                                        location.replace(app_root+"/");
                                }
                        }, function (isConfirm) {
                                location.replace(app_root+"/");
                        });
                    } else {
                        Swal.close();
                        Swal.fire({
                                icon: 'error',
                                title: 'Correo ya usado',
                                text: 'Este correo no es valido, porfavor ingresa otro correo',
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
                        title: 'Registro fallido',
                        text: "Por favor revise sus datos. El correo puede ser invalido.",
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
                    title: 'Login fallido',
                    text: 'Esta aplicacion no esta autorizada',
                    showCloseButton: true,
                    confirmButtonText: 'Ok'
                });  
            }
        }
    });
}

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