$(document).ready(function () {
   

  getPlataforma();
  getProducts();
});

var baseProducts = [];
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
                  
                  var inventory = response.inventory[0];
                  var articulos = JSON.parse(inventory.plataforma_articulos_home);

                  prodList = articulos;

                  updateTable();
                  
                  
                }
                

            }
    });
}

function getProducts()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getInventory', //archivo que recibe la peticion
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
                  
                  var inventory = response.inventory;

                  baseProducts = inventory;

                  var tableArticles = "";
                  
                  for(var i = 0; i < inventory.length; i++)
                  {
                    tableArticles += "<option value='"+i+"'>"+baseProducts[i].articulo_descripción+"</option>";
                    baseProducts[i].articulo_cats = "";
                  }
                  $("#selector-items").html(tableArticles);
                }
                

            }
    });
}

function updateTable()
{
  var ap = prodList.articulos;
  var tableArticles = "";
  for(var i = 0; i < ap.length; i++)
  {
    tableArticles += "<tr>";
    tableArticles += "<td>"+ap[i].articulo_identificador+"</td>";
    tableArticles += "<td>"+ap[i].articulo_descripción+"</td>";
    tableArticles += "<td><img src='https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/productos/"+ap[i].articulo_imagen_1+"' class='slider-img-small'></td>";
    tableArticles += "<td><img src='https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/productos/"+ap[i].articulo_imagen_2+"' class='slider-img-small'></td>";
    tableArticles += "<td><img src='https://app.dsynapse.com/desarrollo/glassprotech/wip/front/public/assets/img/productos/"+ap[i].articulo_imagen_3+"' class='slider-img-small'></td>";
    tableArticles += "<td><a href='#' onclick='deleteItem("+i+")'>Eliminar</a></td>";
    tableArticles += "</tr>";
  }
  $("#table-body").html(tableArticles);

  /*
  $('#table-filt').DataTable({
    "language": {
      "sProcessing": "Procesando...",
      "sSearch": "Buscar",
      "sLengthMenu": "Seleccionar _MENU_ elementos",
      "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ elementos totales",
      "sInfoEmpty": "No se ha encontrado entradas",
      "sInfoFiltered": "(filtrado de _MAX_ elementos totales)",
      "sInfoPostFix": "",
      "sLoadingRecords": "Cargando registro...",
      "sZeroRecords": "No se han encontrado registros",
      "sEmptyTable": "La tabla está vacia",
      "oPaginate": {
      "sFirst": "Primero",
      "sPrevious": "Anterior",
      "sNext": "Siguiente",
      "sLast": "Ultimo"
    },
    "oAria": {
      "sSortAscending": ": Filtrar en orden ascendente",
      "sSortDescending": ": Filtrar en orden descendente"
    },
    "select": {
      "rows": {
        "_": "%d lineas seleccionadas",
        "0": "Ninguna linea seleccionada",
        "1": "1 linea seleccionada"
      }
    }
    },
    "pagingType": "full_numbers" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');*/
}

function addToTable()
{
  var i = document.getElementById("selector-items").value;
  prodList.articulos.push(baseProducts[i]);
  updateTable();
}

function deleteItem(id)
{
  prodList.articulos.splice(id, 1);
  updateTable();
}

function saveSlider()
{
  Swal.fire({
    icon: 'warning',
    title: 'Confirmación',
    text: '¿Estas seguro de que quieres guardar la tabla?',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar',
    onClose: () => 
    {
      
    }
  }).then((value) => {
    
    if (value.isConfirmed) 
    {
      doSave();
    }
    else
    {
    }
  });
}

function doSave()
{
    var cookie = getCookie("glassprotechUserData");
    var products = JSON.stringify(prodList);
    var parametros = {
        "cookie" : cookie,
        "products" : products,

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_updateProductSlider', //archivo que recibe la peticion
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
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Sliders actualizados',
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