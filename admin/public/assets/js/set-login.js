
    var parametros = {
        "cookie" : cook

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_checkifIs', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () 
            {
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
                Swal.close();
                if (response.status == "error") 
                {
                  Swal.fire({
                        icon: 'error',
                        title: 'Usuario invalido',
                        text: 'Este usuario no tiene privilegios de administrador',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.replace("http://store.glassprotech.com.mx");
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Sesion iniciada',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            var today = new Date();
                            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            var dateTime = date + ' ' + time;
                            document.cookie = "glassprotechUserData=" + cook + ";expires=" + dateTime + "; path=/";
                            window.location.replace(app_root+"/");
                            location.replace(app_root+"/");
                        }
                    });
                }

            }
    });

	