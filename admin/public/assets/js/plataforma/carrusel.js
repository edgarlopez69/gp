$(document).ready(function () {
   

  getPlataforma();
});

var prodList = [];

var cur_slide = "0";

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
                  
                  var inventory = response.inventory[0];

                  var articulos = JSON.parse(inventory.plataforma_articulos_home);

                  var s1 = inventory.plataforma_slider_1;
                  var s2 = inventory.plataforma_slider_2;
                  var s3 = inventory.plataforma_slider_3;
                  var s4 = inventory.plataforma_slider_4;
                  var s5 = inventory.plataforma_slider_5;


                  prodList = inventory;

                  $("#slid1").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/sliders/"+s1);
                  $("#slid2").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/sliders/"+s2);
                  $("#slid3").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/sliders/"+s3);
                  $("#slid4").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/sliders/"+s4);
                  $("#slid5").attr("src", "https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/sliders/"+s5);
                  
                }
                

            }
    });
}

function uploadImg()
{
    var data = document.getElementById('file_input').value;
    if (data == "" || cur_slide == "0") 
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
              url:   store_root+'Home/changeSliders?s='+cur_slide, //archivo que recibe la peticion
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
                  console.log(structure);
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

function setSlide(id)
{
  cur_slide = id;
}


var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});