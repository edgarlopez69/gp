$(document).ready(function () {
    transaccion();
});

function transaccion()
{
    var parametros = {
        "c" : c,
        "status" : "succeeded"
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/compra_updateStatus', //archivo que recibe la peticion
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
                console.log(response);
                Swal.close();
                if (response.status == "error") 
                {
                    Swal.fire({
                    title: 'Error!',
                    text: 'Código invalido.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    });
                }
                else
                {
                    Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: 'Orden exitosa.',
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                            onClose: () => {
                            	localStorage.clear();
                                location.replace(app_root+"/");
                            }
                            }, function (isConfirm) {
                            	localStorage.clear();
                                location.replace(app_root+"/");
                            });
                }
                
            },
            failure: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            	Swal.close();
                Swal.fire({
                title: 'Error!',
                text: 'Código invalido.',
                icon: 'error',
                confirmButtonText: 'Ok'
                });
                
            }

    });
}