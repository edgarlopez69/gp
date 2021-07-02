$(document).ready(function () {
   

  getPlataforma();
});

var prodList = [];

function getPlataforma()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getPlataforma', //archivo que recibe la peticion
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
                            location.replace(app_root+"/");
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  
                  var popup = response.inventory[0].plataforma_popup;

                  //var articulos = JSON.parse(inventory.plataforma_articulos_home);

                  prodList = response.inventory[0];
                  $("#popup-img").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/popup/"+popup);
                  
                }
                

            }
    });
}

function uploadImg()
{
    var data = document.getElementById('file_input').value;
    if (data == "") 
    {
      Swal.fire({
        icon: 'error',
        title: 'Archivo no seleccionado',
        text: 'No a elegido una imagen a subir.',
        showCloseButton: true,
        confirmButtonText: 'Ok'
      });
    }
    else
    {
      var parametros = new FormData(document.getElementById("img_form"));
      $.ajax({
              data:  parametros, //datos que se envian a traves de ajax 
              url:   store_root+'Home/changePopup', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: "html",
              cache: false,
              contentType: false,
              processData: false,
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
                  var structure = JSON.parse(response);
                  if (structure.status != "ok") 
                  {
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: structure.result,
                      showCloseButton: true,
                      confirmButtonText: 'Ok',
                      onClose: () => {
                            location.replace(app_root+"/");
                        }
                    });
                  }
                  else
                  {
                    Swal.fire({
                      icon: 'success',
                      title: 'Exito',
                      text: structure.result,
                      showCloseButton: true,
                      confirmButtonText: 'Ok',
                      onClose: () => {
                            location.reload();
                        }
                    });
                  }
                  

              }
      });
    }
    
}